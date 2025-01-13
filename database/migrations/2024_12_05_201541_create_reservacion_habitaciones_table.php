<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionHabitacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion_habitaciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservacion_id'); // Relación con reservaciones
            $table->unsignedBigInteger('habitacion_id'); // Relación con habitaciones
            $table->decimal('tarifa', 8, 2); // Copia de la tarifa de la habitación
            $table->timestamps();
        
            $table->foreign('reservacion_id')->references('id')->on('reservaciones')->onDelete('cascade');
            $table->foreign('habitacion_id')->references('id')->on('habitaciones')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacion_habitaciones');
    }
}
