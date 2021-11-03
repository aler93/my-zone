<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = "categories";
    protected $fillable = [
        "name",
        "id_parent",
    ];
    protected $hidden = [
        "id_parent"
    ];

    public function parent()
    {
        return $this->hasOne("App\Models\Category", "id", "id_parent");
    }
}
