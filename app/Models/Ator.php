<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Ator extends Model
{
    use HasFactory;

    protected $table = 'atores';
    protected $fillable = [
        'nome',
        'altura',
        'peso',
        'manequim',
        'sexo',
        'data_nasc',
        'sapato',
        'pele',
        'olhos',
        'cabelo',
        'video',
    ];

    protected $appends = array('idade');

    public function getIdadeAttribute()
    {
        return Carbon::parse($this->attributes['data_nasc'])->age;
    }
}
