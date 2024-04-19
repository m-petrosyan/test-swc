<?php

namespace App\Repositories;

use Illuminate\Contracts\Auth\Authenticatable;

class UserRepository
{
    public static function getAuthUser(): Authenticatable
    {
        return auth()->user();
    }
}
