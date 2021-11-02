<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartamentRating extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "apartament_ratings";
    protected $fillable = [
        "id_user",
        "id_apartament",
        "rating",
    ];
    protected $hidden = [
        "id",
        "id_user",
        "id_apartament",
    ];
}
