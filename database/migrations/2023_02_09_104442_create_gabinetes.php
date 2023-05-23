<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGabinetes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gabinetes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('categoria_id')->unsigned();
            $table->integer('marca_id')->unsigned();
            $table->string('serial', 70)->nullable();
            $table->string('estante', 70)->nullable();
            $table->string('faja', 256)->nullable();
            $table->string('precinto', 256)->nullable();
            $table->string('descripcion', 256)->nullable();
            $table->string('estado', 70);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->string('id_setarticulo')->nullable();
            $table->timestamps();


            //   clave foranea
            $table->foreign('categoria_id')->references('id')->on('categorias');
         //    
             $table->foreign('marca_id')->references('id')->on('marcas');
         });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gabinetes');
    }
}
