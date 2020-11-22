<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreditosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creditos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('monto_solicitado')->nullable();
            $table->string('interes')->nullable();
            $table->string('monto_valuacion')->nullable();
            $table->string('descripcion_valucion')->nullable();
            $table->string('promedio')->nullable();


            $table->unsignedBigInteger('empresas_id')->unsigned();
            $table->foreign('empresas_id')
            ->references('id')->on('empresas')
            ->onDelete('cascade');
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
        Schema::dropIfExists('creditos');
    }
}
