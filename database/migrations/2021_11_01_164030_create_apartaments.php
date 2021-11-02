<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartaments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartaments', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->double("price");
            $table->string("currency", 3);
            $table->text("description")->nullable();
            $table->float("rating");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartaments');
    }
}
