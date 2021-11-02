<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
