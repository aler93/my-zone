<?php

use Faker\Provider\Uuid;

if (!function_exists("uuid")) {
    function uuid(): string
    {
        return Uuid::uuid();
    }
}
