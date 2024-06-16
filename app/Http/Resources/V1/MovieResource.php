<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
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
            'name' => $this->name,
            'genre' => $this->genre,
            'runtime' => $this->runtime,
            'studio' => $this->studio,
            'leadActor' => $this->lead_actor,
            'director' => $this->director,
            'screenings' => ScreeningResource::collection($this->whenLoaded('screenings')),
        ];        
        
    }
}
