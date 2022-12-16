<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orginisations', function (Blueprint $table) {
            $table->id('orgid');
            $table->string('name');
            $table->text('adress')->nullable();
            $table->integer('INN')->nullable();
            $table->integer('KPP')->nullable();
            $table->integer('RSCH')->nullable();
            $table->integer('KSCH')->nullable();
            $table->integer('OKPO')->nullable();
            $table->integer('OGRN')->nullable();
            $table->integer('phone')->nullable();
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
        Schema::dropIfExists('orginisations');
    }
};
