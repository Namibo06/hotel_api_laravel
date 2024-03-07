<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuitesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name'=>$this->name,
            'number'=>$this->number,
            'number_of_bedroom'=>$this->number_of_bedroom,
            'number_of_bathroom'=>$this->number_of_bathroom,
            'area'=>$this->area,
            'price'=>$this->price
        ];
    }
}
