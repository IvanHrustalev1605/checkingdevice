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
        Schema::create('oders', function (Blueprint $table) {
            $table->id('odid');
            $table->string('ObjID')->nullable();
            $table->string('name')->nullable();
            $table->string('where')->nullable();
            $table->date('when')->nullable();
            $table->string('paidfor')->default(0);
            $table->date('whenPaid')->nullable();
            $table->string('paidNumber')->nullable();
            $table->date('delivery')->nullable();
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
        Schema::dropIfExists('oders');
    }
};
