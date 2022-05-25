<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bestelling extends Model
{
    use HasFactory;
    protected $table = 'bestellingen';
    protected $fillable = ['klant_id', 'afgerond'];

    public function klant()
    {
        return $this->belongsTo(Klant::class);
    }

    public function bestellingregels()
    {
        return $this->hasMany(BestellingRegel::class);
    }

    public function artikelen()
    {
        return $this->belongsToMany(Artikel::class, 'bestelling_regels', 'bestelling_id', 'artikel_id');
    }
}
