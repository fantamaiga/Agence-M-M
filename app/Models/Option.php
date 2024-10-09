<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @mixin IdeHelperOption
 */
class Option extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    /**
     * The properties that belong to the option.
     */
    public function proprietes(): BelongsToMany
    {
        return $this->belongsToMany(Propriete::class);
    }
}
