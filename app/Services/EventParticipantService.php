<?php

namespace App\Services;

use App\Repositories\UserRepository;

class EventParticipantService
{
    public function store(object $event): void
    {
        UserRepository::getAuthUser()->participants()->syncWithoutDetaching($event->id);
    }

    public function destroy(object $event): void
    {
        UserRepository::getAuthUser()->participants()->detach($event->id);
    }
}
