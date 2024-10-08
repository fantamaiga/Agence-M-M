<?php

namespace App\Models;

use App\Models\Option;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Propriete extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'type',
        'description',
        'surface',
        'nombre_pieces',
        'nombre_chambres',
        'num_etage',
        'prix',
        'ville',
        'quartier',
        'statut'
    ];

    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    public function getSlug(): string
    {
        return Str::slug($this->titre);
    }
}
