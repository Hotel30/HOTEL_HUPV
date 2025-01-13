<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    use HasFactory;

    // Nombre de la tabla
    protected $table = 'ordenes_compra';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'hotel_id',
        'proveedor_id',
        'fecha_orden',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'subtotal',
    ];

    // Relación con el modelo Hotel
    public function hotel()
    {
        return $this->belongsTo(Hoteles::class, 'hotel_id');
    }

    // Relación con el modelo Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class, 'proveedor_id');
    }

    // Relación con el modelo Producto (Inventario)
    public function producto()
    {
        return $this->belongsTo(Inventario::class, 'producto_id');
    }
}
