<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->unsignedBigInteger('notaVenta_id');
            $table->unsignedBigInteger('vendedor_id');  
            $table->string('nombre_vendedor')->nullable();
            $table->string('direccion');
            $table->float('monto');
            $table->foreign('notaVenta_id')->on('notaventas')->references('id')->onDelete('cascade');
            $table->foreign('vendedor_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('envios');
    }
}
