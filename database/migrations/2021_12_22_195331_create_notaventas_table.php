<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('notaventas', function (Blueprint $table) {
            $table->id();
            $table->integer('monto_total');
            $table->unsignedBigInteger('id_vendedor');
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_vendedor')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('id_cliente')->on('users')->references('id')->onDelete('cascade');
            $table->timestamps();
            
        });*/
        
        
        Schema::create('notaventas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->on('users')->references('id')->onDelete('cascade');
            $table->string('nombre_usuario');
            $table->integer('monto_total');
            $table->date('fecha');
            
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
        Schema::dropIfExists('notaventas');
    }
}
