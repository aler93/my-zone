<?php

namespace App\Repositories;

use App\Models\Apartament;
use App\Models\ApartamentProperty;
use App\Models\ApartamentRating;
use App\Support\Exceptions;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ApartamentRepository
{
    private array $like   = ["slug", "description", "location"];
    private array $select = [
            "apartaments.name",
            "apartaments.price",
            "apartaments.description",
            "apartaments.rating",
            "apartaments_properties.property",
            "apartaments_properties.value",
        ];

    private array $orderBy;
    private array $specialCols;

    private ApartamentPropertiesRepository $propertiesRepository;

    public function __construct()
    {
        $this->propertiesRepository = new ApartamentPropertiesRepository();

        $this->orderBy     = array_values(Schema::getColumnListing('apartaments'));
        $this->specialCols = array_column(ApartamentProperty::select("property")->distinct()->get()->toArray(), "property");
    }

    public function list(array $filter = [], array $orderBy = [], int $perPage = 50, ?string $toCurrency = null): array
    {
        try {
            $ap = Apartament::query()->join("apartaments_properties", "apartaments_properties.id_apartament", "=", "apartaments.id")
                                     ->with("properties");
            /*$ap = Apartament::select(array_merge($this->select))
                            ->join("categories", "categories.id", "=", "apartaments.id_category")
                            ->join("apartaments_properties", "apartaments_properties.id_apartament", "=", "apartaments.id")
                            ->with("properties");*/

            foreach( $filter as $key => $val ) {
                if( $key == "name" ) {
                    $key = "slug";
                    $val = Str::slug($val);
                }

                $opr = "=";
                if( in_array($key, $this->like) ) {
                    $opr = "like";
                    $val = "%" . $val . "%";
                }

                if( in_array($key, $this->specialCols) ) {
                    $ap->where("apartaments_properties.property", "=", $key)
                       ->where("apartaments_properties.value", $opr, $val);

                    continue;
                }

                $ap->where($key, $opr, $val);

                // Special case for self reference table,
                // probably better offload into a function receiving the object and applying a "id_parent" condition
                if( $key == "id_category" ) {
                    $ap->orWhere("id_parent", "=", $val);
                }
            }

            $specialOrder = [];
            foreach( $orderBy as $order ) {
                if( !in_array($order[0], ["+", "-"]) ) {
                    $order = "+" . $order;
                }
                $col = substr($order, 1);

                if( in_array($col, $this->specialCols) ) {
                    $specialOrder[] = $order;
                    continue;
                }

                if( !in_array($col, $this->orderBy) ) {
                    Exceptions::badRequest("Column '$col' doesn't exist");
                }

                if( $order[0] == "+" ) {
                    $ap->orderByDesc($col);
                } else {
                    $ap->orderBy($col);
                }
            }

            if( $toCurrency ) {
                // TODO: Convert to requested currency here
                // Currently unable to register a key at fixer.io
            }

            $list = $ap->paginate($perPage)->toArray();

            /*if( count($specialOrder) > 0 ) {
                $list = $this->applySpecialOrderBy($list, $specialOrder);
            }*/

            return $list;
        } catch( Exception $e ) {
            throw new Exception($e);
        }
    }

    /*private function applySpecialOrderBy($object, array $order): array
    {
        $toOrder = $object["data"];

        foreach($order as $o) {
            dd($toOrder);
            array_multisort($order["properties"]);
        }

        $object["data"] = $toOrder;
        return $object;
    }*/

    public function store(array $data): array
    {
        try {
            DB::beginTransaction();

            $props = [];
            if( isset($data["properties"]) ) {
                $props = $data["properties"];
                unset($data["properties"]);
            }

            $ap = new Apartament($data);
            $ap->save();

            $this->propertiesRepository->store($ap->id, $props);

            DB::commit();

            return $ap->toArray();
        } catch( Exception $e ) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function update(int $id, array $data)
    {
        try {
            $props = [];
            if( isset($data["properties"]) ) {
                $props = $data["properties"];
                unset($data["properties"]);
            }

            Apartament::whereId($id)->update($data);

            $this->propertiesRepository->destroy($id);
            $this->propertiesRepository->store($id, $props);

            return $data;
        } catch( Exception $e ) {
            throw new Exception($e);
        }
    }

    public function updateRating(int $idApartament): float
    {
        try {
            DB::beginTransaction();

            $ratings = ApartamentRating::where("id_apartament", "=", $idApartament)->get();

            $total = 0.0;
            foreach( $ratings as $r ) {
                $total += (float) $r->rating;
            }
            $avg = ($total / $ratings->count());

            Apartament::where("id", "=", $idApartament)->update(["rating" => $avg]);

            DB::commit();

            return $avg;
        } catch( Exception $e ) {
            DB::rollBack();
            throw new Exception($e);
        }
    }
}
