<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;
    protected $table = 'leveranciers';
    protected $fillable = ['bedrijfsnaam', 'contactpersoon', 'telefoonnummer', 'emailadres'];

    public function levert()
    {
        return $this->belongsToMany(Artikel::class, 'leverancier_artikel_regels', 'leverancier_id', 'artikel_id');
    }
}
