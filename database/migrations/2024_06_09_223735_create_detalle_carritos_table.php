<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleCarritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_carritos', function (Blueprint $table) {

            $table->foreignId('carrito_id')
                ->nullable()
                ->constrained('carritos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->nullOnDelete();
            $table->foreignId('producto_id')
                ->nullable()
                ->constrained('productos')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->nullOnDelete();
            
            $table->integer('cantidad');
            $table->integer('precio');
            $table->integer('importe');
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
        Schema::dropIfExists('detalle_carritos');
    }
}
