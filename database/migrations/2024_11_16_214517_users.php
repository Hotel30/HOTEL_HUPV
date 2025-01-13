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
            $table->foreign('id_hotel')->references('id')->on('hoteles')->onDelete('set null');
        });

         // Tabla para tokens de restablecimiento de contraseña
    Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // Tabla para sesiones
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
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
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
}