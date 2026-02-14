<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
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
            'type' => 'ticket',
            'attributes' => parent::toArray($request),
            'relationships' => [
                'category' => new CategoryResource($this->whenLoaded('category')),
                'tags' => TagResource::collection($this->whenLoaded('tags')),
            ]
        ];
    }
}
