<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartamentPropertiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("apartaments_properties")->insert(
            [
                "id_apartament" => 1,
                "property"      => "size",
                "value"         => "50 sqr. M.",
            ],
        );
        DB::table("apartaments_properties")->insert(
            [
                "id_apartament" => 1,
                "property"      => "location",
                "value"         => "Within Milky Way",
            ],
        );
    }
}
