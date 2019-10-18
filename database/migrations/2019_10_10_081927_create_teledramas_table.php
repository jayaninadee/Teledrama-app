<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeledramasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teledramas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('te_Name');
            $table->integer('te_Is_Enable')->default(0);
            $table->string('te_Image');
            $table->unsignedInteger('ch_Id');
            $table->foreign('ch_Id')->references('id')->on('channels')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('teledramas');

    }
}
