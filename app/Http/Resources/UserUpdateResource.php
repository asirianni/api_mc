<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class UserUpdateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'surname' => $this->surname,
            'address' => $this->address,
            'location' => $this->location,
            'province' => $this->province,
            'country' => $this->country,
            'id_type' => $this->id_type,
            'birth' => $this->birth,
            'id_activitie' => $this->id_activitie,
        ];
    }
}
