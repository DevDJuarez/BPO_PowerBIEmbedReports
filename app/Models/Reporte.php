<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Reporte extends Model
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'reportType',
        'name',
        'webUrl',
        'embedUrl',
        'datasetId',
        'reportId',
        'workspace_id'
    ];

    protected $hidden = [];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }

    public function workspace()
    {
        return $this->belongsTo(Workspace::class);
    }
}
