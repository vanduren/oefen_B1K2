<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeverancierArtikelRegel extends Model
{
    use HasFactory;
    protected $table = 'leverancier_artikel_regels';
    protected $fillable = ['leverancier_id', 'artikel_id', 'prijs'];

    public function leverancier()
    {
        return $this->belongsTo(Leverancier::class);
    }

    public function artikel()
    {
        return $this->belongsTo(Artikel::class);
    }
}
