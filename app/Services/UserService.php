<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function store(array $attributes)
    {
        unset($attributes['re_password']);

        User::create($attributes);
    }
}
