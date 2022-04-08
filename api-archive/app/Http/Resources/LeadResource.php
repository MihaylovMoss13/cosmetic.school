<?php

namespace App\Http\Resources;

use App\Models\Course;
use App\Models\TrainingSchedule;
use Illuminate\Http\Resources\Json\JsonResource;

class LeadResource extends JsonResource
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
            'lead_name'  => $this->lead_name,
            'lead_email' => $this->lead_email,
            'lead_phone' => $this->lead_phone,
            'course_id' => Course::find($this->course_id)
        ];
    }

}