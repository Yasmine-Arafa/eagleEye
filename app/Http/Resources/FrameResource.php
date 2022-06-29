<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FrameResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return parent::toArray($request);
        // return [
        //     'id'=> $this->id,
        //     'frames'=> $this->frames,
        //     'frames_no'=> $this->frames_no,
        //     'happened_at'=> $this->happened_at
        // ];

    }

    public function with($request)
    {
        return [
            'add' => [
                'Laravel-version' => '9.3.1',
                'Author' => 'Yasmine Arafa'
            ],
        ];
    }
    
}
