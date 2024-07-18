<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalleventas', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_notaventa');
            $table->unsignedBigInteger('id_producto');
            $table->string('descripcion');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('importe');
            $table->foreign('id_producto')->on('productos')->references('id')->onDelete('cascade');
            $table->foreign('id_notaventa')->on('notaventas')->references('id')->onDelete('cascade');
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
        Schema::dropIfExists('detalleventas');
    }
}
