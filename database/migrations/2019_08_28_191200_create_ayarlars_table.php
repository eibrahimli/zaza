<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAyarlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ayarlars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title',256);
            $table->string('logo',256);
            $table->string('desc',256);
            $table->string('keyw',256);
            $table->string('email',256);
            $table->string('location',256);
            $table->string('tel',256);
            $table->string('social',256);
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
        Schema::dropIfExists('ayarlars');
    }
}
