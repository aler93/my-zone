<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApartamentProperty extends Model
{
    use HasFactory;

    public    $timestamps = false;
    protected $table      = "apartaments_properties";
    protected $fillable   = [
        "id_apartament",
        "property",
        "value",
    ];
    protected $hidden = [
        "id",
        "id_apartament",
    ];
}
