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
        Schema::create('emergency_exits', function (Blueprint $table) {
            $table->id('eid');
            $table->date('date')->nullable();
            $table->time('time_call')->nullable();
            $table->time('time_departure')->nullable();
            $table->time('time_end')->nullable();
            $table->string('ObjID')->nullable();
            $table->string('sum')->nullable();
            $table->string('uid')->nullable();
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
        Schema::dropIfExists('emergency_exits');
    }
};
