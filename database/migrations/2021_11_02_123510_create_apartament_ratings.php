<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartamentRatings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartament_ratings', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")
                  ->references("id")
                  ->on("users")
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->foreignId("id_apartament")
                  ->references("id")
                  ->on("apartaments")
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();
            $table->float("rating");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartament_ratings');
    }
}
