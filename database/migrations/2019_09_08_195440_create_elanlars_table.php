<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateElanlarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('elanlars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category');
            $table->string('title',500);
            $table->string('email');
            $table->text('info');
            $table->string('photo',500);
            $table->integer('price');
            $table->string('country');
            $table->string('city');
            $table->string('adress');
            $table->string('name');
            $table->integer('status');
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
        Schema::dropIfExists('elanlars');
    }
}
