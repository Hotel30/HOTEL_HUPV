<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Para autenticación
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * La tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Los atributos que son asignables.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'password',
        'telefono',
        'direccion',
        'rol',
        'puesto',
        'turno',
        'hora_entrada',
        'hora_salida',
        'fecha_ingreso',
        'area_asignada',
        'tarea_asignada',
        'estado',
        'id_hotel',
    ];

    /**
     * Los atributos que deben ser ocultos para arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Los atributos que deben ser convertidos a tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'hora_entrada' => 'time',
        'hora_salida' => 'time',
        'fecha_ingreso' => 'date',
        'estado' => 'boolean',
    ];

    /**
     * Relación con el modelo Hotel.
     * 
     * Un usuario pertenece a un hotel.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function hotel()
    {
        return $this->belongsTo(Hotel::class, 'id_hotel');
    }

    /**
     * Establecer el password encriptado.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
