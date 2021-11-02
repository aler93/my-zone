<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserSubscription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_subscription', function (Blueprint $table) {
            $table->id();
            $table->foreignId("id_user")
                  ->references("id")
                  ->on("users")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->foreignId("id_apartament")
                  ->references("id")
                  ->on("apartaments")
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();
            $table->float("price_alert");
            $table->boolean("sent")->default(false);
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
        Schema::dropIfExists('user_subscription');
    }
}
