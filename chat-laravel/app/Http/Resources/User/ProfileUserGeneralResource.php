<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class ProfileUserGeneralResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            "name"=> $this->resource->name,
            "surname"=> $this->resource->surname,
            "email"=> $this->resource->email,
            "phone"=> $this->resource->phone,
            "birthdate"=> $this->resource->birthdate->format('Y-m-d'),
            "website"=> $this->resource->website,
            "address"=> $this->resource->address,
            "avatar"=> env("APP_URL")."storage/".$this->resource->avatar,
            'fb' => $this->resource->fb,
            'tw' => $this->resource->tw,
            'inst' => $this->resource->inst,
            'linke' => $this->resource->linke,
        ];
    }
}
