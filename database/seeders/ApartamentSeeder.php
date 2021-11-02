<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("apartaments")->insert(
            [
                "name"        => "Downtown Apartament",
                "price"       => 250000,
                "currency"    => "USD",
                "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.",
                "rating"      => 8.5,
                "id_category" => 1
            ]
        );
    }
}
