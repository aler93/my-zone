<?php

namespace App\Repositories;

use App\Models\Apartament;
use Exception;
use Illuminate\Support\Facades\DB;

class ApartamentRepository
{
    private ApartamentPropertiesRepository $propertiesRepository;

    public function __construct()
    {
        $this->propertiesRepository = new ApartamentPropertiesRepository();
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
            DB::beginTransaction();

            $props = [];
            if( isset( $data["properties"] )) {
                $props = $data["properties"];
                unset($data["properties"]);
            }

            Apartament::whereId($id)->update($data);

            $this->propertiesRepository->destroy($id);
            $this->propertiesRepository->store($id, $props);

            DB::commit();

            return $data;
        } catch( Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }
}