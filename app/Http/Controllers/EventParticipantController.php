<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Services\EventParticipantService;

class EventParticipantController extends Controller
{
    protected EventParticipantService $eventParticipantService;

    public function __construct(EventParticipantService $eventParticipantService)
    {
        $this->eventParticipantService = $eventParticipantService;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Event $event): void
    {
        $this->eventParticipantService->store($event);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): void
    {
        $this->eventParticipantService->destroy($event);
    }
}
