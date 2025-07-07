<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Toro extends Model
{
    use HasFactory;

    protected $fillable = [
    'nombre',
    'edad',
    'peso',
    'categoria',
    'ranking',
    'propietario_id',
    'foto',
    'victorias',
    'derrotas',
    'empates'
];


    public function propietario(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Propietario::class);
    }
}
