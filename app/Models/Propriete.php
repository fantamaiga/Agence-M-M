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
        'statut',
    ];

    /**
     * The options that belong to the property.
     */
    public function options(): BelongsToMany
    {
        return $this->belongsToMany(Option::class);
    }

    /**
     * Get the slug for the property based on its title.
     *
     * @return string
     */
    public function getSlug(): string
    {
        return Str::slug($this->titre);
    }

    // Optional: Add validation rules in a boot method or other relevant places
    // protected static function boot()
    // {
    //     parent::boot();
    // 
    //     static::creating(function ($model) {
    //         // Add validation logic here
    //     });
    // }
}
