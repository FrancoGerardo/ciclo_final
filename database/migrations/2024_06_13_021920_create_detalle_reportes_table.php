<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_reportes', function (Blueprint $table) {
            $table->unsignedBigInteger('reporte_id');
            $table->unsignedBigInteger('notaventas_id');
            $table->foreign('reporte_id')->on('reportes')->references('id')->onDelete('cascade');
            $table->foreign('notaventas_id')->on('notaventas')->references('id')->onDelete('cascade');
            $table->string('nombre');
            $table->float('total');
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
        Schema::dropIfExists('detalle_reportes');
    }
}
