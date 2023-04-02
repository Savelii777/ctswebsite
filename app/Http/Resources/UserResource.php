<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {


        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'place_of_work' => $this->place_of_work,
            'roles' => $this->roles,
            'sex' => $this->sex,
            'city' => $this->city,
            'birth' => $this->birth,
            'completed' => $this->courses()->find(1)->pivot->completed ?? 0
        ];
    }
}
