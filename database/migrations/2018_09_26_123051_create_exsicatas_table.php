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
            $table->integer('numero');
            $table->string('name')->nullable();
            $table->string('autor')->nullable();
            $table->string('escaninho')->nullable();
            $table->string('coletor');
            $table->text('data');
            $table->string('determinador')->nullable();
            $table->integer('quantidade')->nullable();
            $table->string('bdd')->nullable();
            $table->longtext('image')->nullable();
            $table->longtext('qrcode')->nullable();
            $table->unsignedInteger('genero_id')->default(1)->nullable();
            $table->foreign('genero_id')->references('id')->on('generos')->onDelete('set null');
            $table->unsignedInteger('epiteto_id')->default(1)->nullable();
            $table->foreign('epiteto_id')->references('id')->on('epitetos')->onDelete('set null');
            $table->unsignedInteger('familia_id')->default(1)->nullable();
            $table->foreign('familia_id')->references('id')->on('familias')->onDelete('set null');
            $table->unsignedInteger('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos')->onDelete('set null');
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
