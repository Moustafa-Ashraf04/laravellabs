<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'IDno' => $this->IDno,
            'name' => $this->name,
            'age' => $this->age,
            // 'Registrar' => RegisterResource($regit)
        ];
    }
}