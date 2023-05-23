<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_articulos', function (Blueprint $table) {
            
            $table->increments('id');
            $table->string('codigo');
            $table->string('sede', 70);
            $table->string('piso', 70);
            $table->string('sector', 70);
            $table->string('puesto', 70);
            $table->string('responsable', 256)->nullable();
            $table->integer('dni')->unsigned();
            $table->string('serial', 70);
            $table->string('estado', 70);

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            
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
        Schema::dropIfExists('set_articulos');
    }
}
