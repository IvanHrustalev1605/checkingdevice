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
        Schema::table('objects', function (Blueprint $table) {
            $table->string('adress')->nullable();
            $table->string('contactPerson')->nullable();
            $table->string('phone')->nullable();
            $table->string('INN')->nullable();
            $table->string('KPP')->nullable();
            $table->string('RSCH')->nullable();
            $table->string('KSCH')->nullable();
            $table->string('OKPO')->nullable();
            $table->string('OGRN')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('objects', function (Blueprint $table) {
            //
        });
    }
};
