<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'publisher' =>  $this->whenLoaded('publisher', fn() => $this->publisher->name),
            'authors' =>   $this->whenLoaded('authors', fn() => $this->authors->implode('name', ',') ),
            'genres' =>   $this->whenLoaded('genres', fn() => $this->genres->implode('name', ',')),
        ];
    }
}
