<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class TodoCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
//        return parent::toArray($request);

        return [
            'data' => $this->collection->map(function ($todo) {
                return [
                    'id'          => $todo->id,
                    'description' => $todo->description,
                    'status'      => $todo->status,
                    'created_at'  => $todo->created_at->toDateTimeString(),
                ];
            }),
            'meta' => [
                'total' => $this->collection->count(),
            ]
        ];

    }
}
