<?php

namespace App\Http\Resources\V1;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
    

class CustomerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'address' => $this->address,
            'city' => $this->city,
            'zipcode' => $this->zipcode,
            'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
        ];
    }
}
