<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Workspace extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'isReadOnly',
        'isOnDedicatedCapacity',
        'type',
        'name',
        'workspaceId',
        'empresa_id'
    ];

    protected $hidden = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function reportes()
    {
        return $this->hasMany(Reporte::class);
    }
}
