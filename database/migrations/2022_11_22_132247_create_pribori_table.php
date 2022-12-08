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
        Schema::create('pribori', function (Blueprint $table) {
            $table->id('PriborID');
            $table->string('name');
            $table->string('number');
            $table->string('ObjID')->nullable();
            $table->date('current date');
            $table->date('next date');
            $table->text('comments');
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
        Schema::dropIfExists('pribori');
    }
};
