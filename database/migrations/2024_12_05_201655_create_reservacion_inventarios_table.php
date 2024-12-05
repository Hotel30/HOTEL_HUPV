<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionInventariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservacion_inventarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reservacion_id'); // Relación con reservaciones
            $table->unsignedBigInteger('inventario_id'); // Relación con inventario
            $table->integer('cantidad');
            $table->decimal('precio_unitario', 8, 2);
            $table->decimal('subtotal', 10, 2); // cantidad * precio_unitario
            $table->timestamps();
        
            $table->foreign('reservacion_id')->references('id')->on('reservaciones')->onDelete('cascade');
            $table->foreign('inventario_id')->references('id_producto')->on('inventario')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservacion_inventarios');
    }
}
