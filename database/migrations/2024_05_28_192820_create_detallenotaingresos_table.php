<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetallenotaingresosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detallenotaingresos', function (Blueprint $table) {
            //$table->primary(['notaingreso_id', 'producto_id']);
            
            $table->foreignId('notaingreso_id')
                ->nullable()
                ->constrained('notaingresos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->nullOnDelete();
            $table->foreignId('producto_id')
                ->nullable()
                ->constrained('productos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->nullOnDelete();
            
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->integer('cantidad');
            $table->timestamps();
            
            
            
            /*
            $table->foreign('notaingreso_id')->on('notaingresos')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('producto_id')->on('productos')->references('id')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('precio_compra');
            $table->integer('precio_venta');
            $table->integer('cantidad');
            $table->timestamps(); */
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detallenotaingresos');
    }
}
