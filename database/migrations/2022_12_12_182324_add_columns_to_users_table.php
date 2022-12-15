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
        Schema::table('users', function (Blueprint $table) {
            $table->text('adress')->nullable();
            $table->integer('INN')->nullable();
            $table->integer('KPP')->nullable();
            $table->integer('RSCH')->nullable();
            $table->integer('KSCH')->nullable();
            $table->integer('OKPO')->nullable();
            $table->integer('OGRN')->nullable();
            $table->integer('phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('adress');
            $table->dropColumn('INN');
            $table->dropColumn('KPP');
            $table->dropColumn('RSCH');
            $table->dropColumn('KSCH');
            $table->dropColumn('OKPO');
            $table->dropColumn('OGRN');
            $table->dropColumn('phone');

        });
    }
};
