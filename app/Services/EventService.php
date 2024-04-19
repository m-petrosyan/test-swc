<?php

namespace App\Services;

use App\Repositories\UserRepository;

class EventService
{
    public function store(array $attributes): void
    {
        UserRepository::getAuthUser()->events()->create($attributes);
    }

    public function destroy(object $event): void
    {
        if (UserRepository::getAuthUser()->id === $event->user_id) {
            $event->delete();
        }
    }
}
