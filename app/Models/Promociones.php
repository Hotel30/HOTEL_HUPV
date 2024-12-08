<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promociones extends Model
{
    use HasFactory;

    protected $table = 'promociones';

    protected $fillable = [
        'nombre',
        'descripcion',
        'tipo',
        'fecha_inicio',
        'fecha_fin',
        'codigo_promocional',
        'descuento',
        'restricciones',
        'activo',
    ];

    public function esValida()
    {
        $hoy = now();
        return $this->activo && $hoy->between($this->fecha_inicio, $this->fecha_fin);
    }
}
