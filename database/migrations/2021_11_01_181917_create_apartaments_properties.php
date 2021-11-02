<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartamentsProperties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartaments_properties', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_apartament")
                  ->references("id")
                  ->on("apartaments")
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
            $table->string("property");
            $table->string("value");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartaments_properties');
    }
}
