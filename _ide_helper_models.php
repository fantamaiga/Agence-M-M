<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $nom
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Option newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Option query()
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereNom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Option whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperOption {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $titre
 * @property string $type
 * @property string $description
 * @property int $surface
 * @property int $nombre_chambres
 * @property int $nombre_pieces
 * @property int $num_etage
 * @property int $prix
 * @property string $ville
 * @property string $quartier
 * @property int $statut
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Option> $options
 * @property-read int|null $options_count
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete query()
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereNombreChambres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereNombrePieces($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereNumEtage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete wherePrix($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereQuartier($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereStatut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereSurface($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereTitre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Propriete whereVille($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperPropriete {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperUser {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|clients newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|clients newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|clients query()
 * @method static \Illuminate\Database\Eloquent\Builder|clients whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clients whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|clients whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	#[\AllowDynamicProperties]
	class IdeHelperclients {}
}

