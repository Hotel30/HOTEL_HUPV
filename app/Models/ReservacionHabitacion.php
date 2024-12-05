<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservacionHabitacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservacion_id', 
        'habitacion_id', 
        'tarifa',
    ];

    public function reservacion()
    {
        return $this->belongsTo(Reservacion::class, 'reservacion_id');
    }

    public function habitacion()
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }
}
