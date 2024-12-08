<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'hotel_id',
        'fecha_entrada',
        'fecha_salida',
        'noches',
        'monto_total',
        'codigo_promocional',
        'descuento_aplicado',
        'notas',
        'metodo_pago',
        'estado',
    ];

    public function cliente()
    {
        return $this->belongsTo(User::class, 'cliente_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hoteles::class);
    }

    public function habitaciones()
    {
        return $this->belongsToMany(Habitacion::class, 'reservacion_habitacion','reservacion_id', 'habitacion_id')
                    ->withPivot('tarifa')
                    ->withTimestamps();
    }

   

    public function inventarios()
    {
        return $this->belongsToMany(Inventario::class, 'reservacion_inventarios')
                    ->withPivot('cantidad', 'precio_unitario', 'subtotal')
                    ->withTimestamps();
    }
}
