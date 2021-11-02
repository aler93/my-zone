<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $table = "user_subscription";
    protected $fillable = [
        "id_user",
        "id_apartament",
        "price_alert",
    ];
}
