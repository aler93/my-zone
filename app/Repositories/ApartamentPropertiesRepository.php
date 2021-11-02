<?php

namespace App\Repositories;

use App\Models\Apartament;
use App\Models\ApartamentProperty;
use Exception;
use Illuminate\Support\Facades\DB;

class ApartamentPropertiesRepository
{
    public function store(int $idApartament, array $data)
    {
        try{
            DB::beginTransaction();
            foreach($data as $row) {
                $row["id_apartament"] = $idApartament;

                $ap = new ApartamentProperty($row);
                $ap->save();
            }

            DB::commit();
        } catch( Exception $e) {
            DB::rollBack();
            throw new Exception($e);
        }
    }

    public function destroy(int $idApartament)
    {
        ApartamentProperty::where("id_apartament", "=", $idApartament)->forceDelete();
    }
}