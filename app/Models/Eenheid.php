<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eenheid extends Model
{
    use HasFactory;
    protected $table = 'eenheden';
    protected $fillable = ['eenheid'];

    public function artikelen()
    {
        return $this->hasMany(Artikel::class);
    }

    public function bestellingregels()
    {
        return $this->hasMany(BestellingRegel::class);
    }
}
