<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; 
use Illuminate\Notifications\Notifiable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * 
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * 
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
     * 
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * 
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
       'hora_entrada' => 'datetime:H:i', 
        'hora_salida' => 'datetime:H:i',   
        'fecha_ingreso' => 'date',
        'estado' => 'boolean',
    ];

    /**
     * 
     * 
     * Un usuario pertenece a un hotel
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
   

    /**
     * 
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function reservaciones()
    {
        return $this->hasMany(Reservacion::class, 'cliente_id');
    }

    public function hotel()
    {
        return $this->belongsTo(Hoteles::class, 'id_hotel');
    }
}