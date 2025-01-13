<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_producto'; 
    protected $table = 'inventario';
    protected $fillable = [
        'hotel_id',
        'proveedor_id',
        'nombre_producto',
        'cantidad',
        'precio',
        'descripcion',
    ];

    public function hotel()
    {
        return $this->belongsTo(Hoteles::class, 'hotel_id');
    }

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedor_id');
    }

    public function reservaciones()
    {
        return $this->hasMany(ReservacionInventario::class, 'inventario_id');
    }
}
