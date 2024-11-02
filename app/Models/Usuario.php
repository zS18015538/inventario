<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'idUsuario'; 
    protected $table = 'usuarios'; 
    protected $fillable = [
        'nombre',
        'correo',
        'contrasena',
        'idRol',
        'estatus',
    ];

    protected $hidden = [
        'contrasena',
        'remember_token',
    ];

    /**
     * Relación con el modelo Rol
     */
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'idRol');
    }

    /**
     * Relación con el modelo Movimiento
     */
    public function movimientos()
    {
        return $this->hasMany(Movimiento::class, 'idUsuario');
    }
}