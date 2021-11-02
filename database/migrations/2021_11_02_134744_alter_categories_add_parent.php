<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterCategoriesAddParent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table("categories", function(Blueprint $table){
            $table->foreignId("id_parent")
                  ->nullable()
                  ->references("id")
                  ->on("categories")
                  ->cascadeOnDelete()
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("categories", function(Blueprint $table){
            $table->dropColumn("id_parent");
        });
    }
}
