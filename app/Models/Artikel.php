<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    use HasFactory;
    protected $table = 'artikelen';
    protected $fillable = ['omschrijving', 'prijs', 'eenheid_id'];

    public function bestellingregels()
    {
        return $this->hasMany(BestellingRegel::class);
    }

    public function eenheid()
    {
        return $this->belongsTo(Eenheid::class);
    }

    public function leveringdoor()
    {
        return $this->belongsToMany(Leverancier::class, 'leverancier_artikel_regels', 'artikel_id', 'leverancier_id');
    }

    public function bestellingen()
    {
        return $this->belongsToMany(Bestelling::class, 'bestelling_regels', 'artikel_id', 'bestelling_id');
    }

    public function voorraadregels()
    {
        return $this->hasMany(VoorraadRegel::class);
    }
}
