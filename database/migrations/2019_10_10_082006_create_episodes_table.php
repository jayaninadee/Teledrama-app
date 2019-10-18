<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ep_videoID');
            $table->string('ep_DateTime');
            $table->string('ep_Title');
            $table->longText('ep_Description');
            $table->integer('ep_Is_Enable')->default(0);
            $table->unsignedInteger('te_Id');
            $table->foreign('te_Id')->references('id')->on('teledramas')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('episodes');
    }
}
