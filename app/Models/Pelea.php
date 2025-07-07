<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelea extends Model
{
    use HasFactory;

    protected $fillable = [
        'evento_id', 'toro_1_id', 'toro_2_id', 'ganador_id', 'observaciones'
    ];

    public function evento()  { return $this->belongsTo(Evento::class); }
    public function toro1()   { return $this->belongsTo(Toro::class, 'toro_1_id'); }
    public function toro2()   { return $this->belongsTo(Toro::class, 'toro_2_id'); }
    public function ganador() { return $this->belongsTo(Toro::class, 'ganador_id'); }
}