<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Job extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // todo: this is hacky an not final way to get state of job
        $state = -1;
        if ($this->tasks()->first()->events()->count()) {
            $state = $this->tasks()->first()->events()->orderby('id', 'desc')->first()->data->state;
        }

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'state' => $state
        ];
    }
}
