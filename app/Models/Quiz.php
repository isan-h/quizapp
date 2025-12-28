<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\modules;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = [
        'titre',
        'duree',
        'groupe_cible',
        'keyword',
        'prof_id',
        'module_id',
        'is_active'
    ];

    public function prof()
    {
        return $this->belongsTo(\App\Models\Profs::class, 'prof_id');
    }

    public function module()
    {
        return $this->belongsTo(\App\Models\Modules::class, 'module_id');
    }
}
