<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScreeningResource extends JsonResource
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
            'movieId' => $this->movie_id,
            'showtime' => $this->showtime,
            'hallId' => $this->hall_id,
            'reservedSeats' => $this->reserved_seats,
            'remainingSeats' => $this->remaining_seats,
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
        ];
    }
}
