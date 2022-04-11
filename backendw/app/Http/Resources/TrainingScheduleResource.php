<?php

namespace App\Http\Resources;

use App\Models\Course;
use Illuminate\Http\Resources\Json\JsonResource;

class TrainingScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $this
     * @return array
     */
    public function toArray($request)
    {
        return [
            'date'    => $this->date,
            'weekday' => $this->weekday,
            'course_id' => Course::find($this->course_id)
        ];
    }

}