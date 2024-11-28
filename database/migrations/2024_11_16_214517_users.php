<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id'); // PK
            $table->string('nombre', 255);
            $table->string('apellidos', 255);
            $table->string('email', 255)->unique();
            $table->string('password', 255); // Encriptada
            $table->string('telefono', 15)->nullable();
            $table->text('direccion')->nullable();
            $table->unsignedTinyInteger('rol')->default(1); // 1 = Clientes, 2 = Empleados, 3 = Admins
            
            // Opcionales
            $table->string('puesto', 255)->nullable();
            $table->string('turno', 100)->nullable();
            $table->time('hora_entrada')->nullable();
            $table->time('hora_salida')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('area_asignada', 255)->nullable();
            $table->text('tarea_asignada')->nullable();
            $table->boolean('estado')->default(1); // 1 = Activo, 0 = Inactivo
            $table->unsignedBigInteger('id_hotel')->nullable(); // FK

            // Timestamps
            $table->timestamps();

            // Relaciones
            $table->foreign('id_hotel')->references('id')->on('hotels')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}