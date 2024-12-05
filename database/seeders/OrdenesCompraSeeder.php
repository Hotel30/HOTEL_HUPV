<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdenesCompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ordenes_compra')->insert([
            [
                'hotel_id' => 1,
                'proveedor_id' => 1,
                'fecha_orden' => now(),
                'producto_id' => 1,
                'cantidad' => 10,
                'precio_unitario' => 50.00,
                'subtotal' => 500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'hotel_id' => 1,
                'proveedor_id' => 2,
                'fecha_orden' => now(),
                'producto_id' => 2,
                'cantidad' => 5,
                'precio_unitario' => 100.00,
                'subtotal' => 500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
