<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoorraadRegel extends Model
{
    use HasFactory;
    protected $table = 'voorraad_regels';
    protected $fillable = ['voorraad_id', 'artikel_id', 'aantal', 'locatie'];

    public function artikelen()
    {
        return $this->hasMany(Artikel::class);
    }
}
