<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExsicatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('exsicatas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('autor');
            $table->string('escavaninho');
            $table->string('coletor');
            $table->date('data');
            $table->string('determinador');
            $table->integer('quantidade');
            $table->string('bdd');
            $table->text('image')->nullable();
            $table->unsignedInteger('genero_id');
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('cascade');
            $table->unsignedInteger('epiteto_id');
            $table->foreign('epiteto_id')->references('id')->on('epitetos')->onDelete('cascade');
            $table->unsignedInteger('familia_id');
            $table->foreign('familia_id')->references('id')->on('familias')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('exsicatas');
    }
}
