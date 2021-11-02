<?php

namespace App\Repositories;

use App\Models\Apartament;
use App\Support\Exceptions;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class ApartamentRepository
{
    private array $like = ["slug", "description"];

    private ApartamentPropertiesRepository $propertiesRepository;

    public function __construct()
    {
        $this->propertiesRepository = new ApartamentPropertiesRepository();
    }

    public function list(array $filter = [], array $orderBy = [], int $perPage = 50): array
    {
        try {
            $ap = Apartament::query();

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

                $ap->where($key, $opr, $val);
            }

            foreach( $orderBy as $order ) {
                if( !in_array($order[0], ["+", "-"]) ) {
                    $order = "+" . $order;
                }
                $col = substr($order, 1);

                if( !in_array($col, array_values(Schema::getColumnListing('apartaments'))) ) {
                    Exceptions::badRequest("Column '$col' doesn't exist");
                }

                if( $order[0] == "+" ) {
                    $ap->orderByDesc($col);
                } else {
                    $ap->orderBy($col);
                }
            }

            return $ap->paginate($perPage)->toArray();
        } catch( Exception $e ) {
            throw new Exception($e);
        }
    }

    public function store(array $data): array
    {
        try{
            DB::beginTransaction();

            $props = [];
            if( isset( $data["properties"] )) {
                $props = $data["properties"];
                unset($data["properties"]);
            }

            $ap = new Apartament($data);
            $ap->save();

            $this->propertiesRepository->store($ap->id, $props);

            DB::commit();

            return $ap->toArray();
        } catch( Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function update(int $id, array $data)
    {
        try{
            $props = [];
            if( isset( $data["properties"] )) {
                $props = $data["properties"];
                unset($data["properties"]);
            }

            Apartament::whereId($id)->update($data);

            $this->propertiesRepository->destroy($id);
            $this->propertiesRepository->store($id, $props);

            return $data;
        } catch( Exception $e) {
            throw new Exception($e);
        }
    }
}
