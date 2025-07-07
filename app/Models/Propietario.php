<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietario extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'correo', 'password'];

    public function toros()
    {
        return $this->hasMany(Toro::class);
    }
}
