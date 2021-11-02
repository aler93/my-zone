<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Apartament extends Model
{
    use HasFactory;

    protected $table    = "apartaments";
    protected $fillable = [
        "name",
        "price",
        "currency",
        "description",
        "rating",
        "id_category",
    ];
    protected $hidden = [
        "id_category",
        "created_at",
        "updated_at",
    ];

    public function category()
    {
        return $this->hasOne("App\Models\Category", "id", "id_category");
    }

    public function properties()
    {
        return $this->hasMany("App\Models\ApartamentProperty", "id_apartament", "id");
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function(Apartament $apartament) {
            $slug = Str::slug($apartament->name);

            $count = static::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

            $apartament->slug = $count ? "{$slug}-{$count}" : $slug;
        });

    }
}
