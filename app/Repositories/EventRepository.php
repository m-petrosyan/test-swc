<?php

namespace App\Repositories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Collection;

class EventRepository
{
    public static function getAll(): Collection
    {
        return Event::with('participants')->get();
    }
}
