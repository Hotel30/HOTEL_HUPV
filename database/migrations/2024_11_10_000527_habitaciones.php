<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Habitaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('tipo_habitacion_id');
            $table->string('numero_habitacion', 10);
            $table->decimal('tarifa', 8, 2);
            $table->enum('estado', ['disponible', 'ocupada', 'mantenimiento']);
            $table->enum('piso', ['1', '2', '3']); // Nuevo campo agregado
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hoteles')->onDelete('cascade');
            //$table->foreign('tipo_habitacion_id')->references('id')->on('tipos_habitacion')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitaciones');
    }
}
