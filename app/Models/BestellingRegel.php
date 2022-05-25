<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BestellingRegel extends Model
{
    use HasFactory;
    protected $fillable = ['bestelling_id', 'artikel_id', 'aantal', 'eenheid_id', 'picked_bestelregel'];

    public function bestelling()
    {
        return $this->belongsTo(Bestelling::class);
    }

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }

    public function eenheid()
    {
        return $this->belongsTo(Eenheid::class);
    }

}
