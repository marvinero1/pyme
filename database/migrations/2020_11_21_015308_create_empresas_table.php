<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('rubro');
            $table->string('nit');
            $table->string('direccion')->nullable();
            $table->string('año_gestion');
            $table->string('ingreso_enero');
            $table->string('ingreso_febrero');
            $table->string('ingreso_marzo');
            $table->string('ingreso_abril');
            $table->string('ingreso_mayo');
            $table->string('ingreso_junio');
            $table->string('ingreso_julio');
            $table->string('ingreso_agosto');
            $table->string('ingreso_septiembre');
            $table->string('ingreso_octubre');
            $table->string('ingreso_noviembre');
            $table->string('ingreso_diciembre');
            
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
        Schema::dropIfExists('empresas');
    }
}
