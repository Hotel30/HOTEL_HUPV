<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Habitacion;

class HabitacionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $hoteles = [1, 2, 3]; 
        $tiposHabitacion = [1, 2]; 

        foreach ($hoteles as $hotelId) {
            for ($i = 1; $i <= 30; $i++) {
                Habitacion::create([
                    'hotel_id' => $hotelId,
                    'tipo_habitacion_id' => $tiposHabitacion[array_rand($tiposHabitacion)], 
                    'numero_habitacion' => str_pad($i, 3, '0', STR_PAD_LEFT), 
                    'tarifa' => rand(1500, 3000), 
                    'estado' => ['disponible', 'ocupada', 'mantenimiento'][array_rand(['disponible', 'ocupada', 'mantenimiento'])],
                    'piso' => ['1', '2', '3'][array_rand(['1', '2', '3'])], 
                ]);
            }
        }
    }
}
