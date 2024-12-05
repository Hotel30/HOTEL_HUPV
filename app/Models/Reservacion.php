<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    protected $fillable = [
        'cliente_id', 'hotel_id', 'tipo_reservacion', 'fecha_entrada', 'fecha_salida', 
        'noches', 'monto_total', 'codigo_promocional', 'descuento_aplicado', 
        'notas', 'metodo_pago', 'estado'
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hoteles::class, 'hotel_id');
    }

    public function habitaciones()
    {
        return $this->hasMany(ReservacionHabitacion::class, 'reservacion_id');
    }

    public function inventarios()
    {
        return $this->hasMany(ReservacionInventario::class, 'reservacion_id');
    }
}


