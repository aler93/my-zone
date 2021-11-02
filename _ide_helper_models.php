<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Apartament
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property string $currency
 * @property string|null $description
 * @property float $rating
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $id_category
 * @property string|null $slug
 * @property-read \App\Models\Category|null $category
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\ApartamentProperty[] $properties
 * @property-read int|null $properties_count
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament query()
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereCurrency($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereIdCategory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereRating($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Apartament whereUpdatedAt($value)
 */
	class Apartament extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ApartamentProperty
 *
 * @property int $id
 * @property int $id_apartament
 * @property string $property
 * @property string $value
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentProperty newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentProperty newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentProperty query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentProperty whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentProperty whereIdApartament($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentProperty whereProperty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentProperty whereValue($value)
 */
	class ApartamentProperty extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\ApartamentRating
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_apartament
 * @property float $rating
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentRating newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentRating newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentRating query()
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentRating whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentRating whereIdApartament($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentRating whereIdUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ApartamentRating whereRating($value)
 */
	class ApartamentRating extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property int $id
 * @property string $name
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereName($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
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
 */
	class User extends \Eloquent {}
}

