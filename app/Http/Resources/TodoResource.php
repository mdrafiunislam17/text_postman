<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->__get('id'),
            'description' => $this->__get('description'),
            'created_at' => $this->__get('created_at')?->toDateTimeString(),
            'updated_at' => $this->__get('updated_at')?->toDateTimeString(),
        ];
    }
}
