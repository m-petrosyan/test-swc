<?php

namespace App\Http\Resources;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'date' => $this->created_at,
            'participants' => new UserCollection($this->participants),
            'owner' => UserRepository::getAuthUser()->id === $this->user_id,
            'joined' => UserRepository::getAuthUser()->participants()->where('event_id', $this->id)->exists(),
        ];
    }
}
