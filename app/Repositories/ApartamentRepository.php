<?php

namespace App\Repositories;

use App\Models\Apartament;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApartamentRepository
{
    private array $like = ["slug", "description"];

    private ApartamentPropertiesRepository $propertiesRepository;

    public function __construct()
    {
        $this->propertiesRepository = new ApartamentPropertiesRepository();
    }

    public function list(array $filter = []): array
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

            return $ap->get()->toArray();
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
