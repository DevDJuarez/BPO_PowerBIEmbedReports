<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Empresa extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'uuid',
        'nombre',
        'correo',
        'usuario',
        'clave',
        'client_id',
        'client_secret',
        'token',
        'refresh_token',
        'fecha_expiracion_token',
    ];

    protected $hidden = [
        'clave',
        'token',
        'refresh_token',
    ];

    protected $casts = [
        'fecha_expiracion_token' => 'datetime:Y-m-d H:i:s',
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function workspaces()
    {
        return $this->hasMany(Workspace::class);
    }
}
