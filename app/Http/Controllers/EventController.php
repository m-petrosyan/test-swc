<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventCreateRequest;
use App\Http\Resources\EventCollection;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Repositories\EventRepository;
use App\Services\EventService;

class EventController extends Controller
{
    protected EventService $eventService;

    public function __construct(EventService $eventService)
    {
        $this->eventService = $eventService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): EventCollection
    {
        return new EventCollection(EventRepository::getAll());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventCreateRequest $request): void
    {
        $this->eventService->store($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event): EventResource
    {
        return new EventResource($event);
    }

    public function destroy(Event $event): void
    {
        $this->eventService->destroy($event);
    }
}
