<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\modules;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['titre', 'durree', 'groupe_cible', 'keyword'];

    public function quiz()
    {
        return $this->hasMany(modules::class, 'module_id');
        return $this->hasMany(Profs::class, 'prof_id');
    }
}
