<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('municipio');
            $table->string('uf');
            $table->string('pais');
            $table->string('local');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('habitat');
            $table->string('observacao');
            $table->unsignedInteger('exsicata_id');
            $table->foreign('exsicata_id')->references('id')->on('exsicatas')->onDelete('cascade');
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
        Schema::dropIfExists('enderecos');
    }
}
