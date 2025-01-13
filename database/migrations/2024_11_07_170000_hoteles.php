<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Hoteles extends Migration
{

    public function up()
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id(); 
            $table->string('nombre'); //id=1 Hotel Sol, id=2 Hotel Luna id=3 Hotel Estrella
            $table->string('direccion'); 
            $table->string('telefono'); 
            $table->timestamps(); 
        });
    }

    /**
     * Revertir las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoteles');
    }
}
