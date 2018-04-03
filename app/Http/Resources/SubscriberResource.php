<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SubscriberResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'email'=>$this->email_address,
            'name'=>$this->name,
            'state'=>$this->state
        ];
    }
}
