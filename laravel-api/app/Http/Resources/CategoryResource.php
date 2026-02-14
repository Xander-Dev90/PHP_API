<?php

namespace App\Http\Resources;

use App\Http\Resources\TicketResource;


use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'type' => 'category',
            'atributes' => [
                'name' => $this->name,
                  ],

            'relationsships' =>[
                'tickets' => TicketResource::collection($this->whenLoaded('tickets')),
            ]
        ];
    }
}
