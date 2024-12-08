<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservacionesTable extends Migration
{
    public function up()
{
    Schema::create('reservaciones', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('cliente_id'); // Relación con la tabla de usuarios (rol = 1)
        $table->unsignedBigInteger('hotel_id'); // Relación con hoteles
        $table->date('fecha_entrada');
        $table->date('fecha_salida');
        $table->integer('noches'); // Calculado como diferencia entre fecha_entrada y fecha_salida
        $table->decimal('monto_total', 10, 2); // Calculado automáticamente
        $table->string('codigo_promocional', 50)->nullable(); // Relación con promociones
        $table->decimal('descuento_aplicado', 10, 2)->nullable(); // Descuento aplicado
        $table->text('notas')->nullable();
        $table->enum('metodo_pago', ['paypal']);
        $table->boolean('estado')->default(1); // 1=Activa, 0=Cancelada
        $table->string('nombre', 255); // Nombre del cliente
        $table->string('telefono', 20); // Teléfono del cliente
        $table->string('direccion', 255); // Dirección del cliente
        $table->string('email', 255); // Email del cliente
        $table->timestamps();

        $table->foreign('cliente_id')->references('id')->on('users')->onDelete('cascade');
        $table->foreign('hotel_id')->references('id')->on('hoteles')->onDelete('cascade');
    });
}


    public function down()
    {
        Schema::dropIfExists('reservaciones');
    }
}
