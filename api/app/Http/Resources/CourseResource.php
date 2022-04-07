<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\TrainingSchedule;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'title'                     => $this->title,
            'slug'                      => $this->slug,
            'category_id'               => Category::find($this->category_id),
            'course_description'        => $this->course_description,
            'course_duration'           => $this->course_duration,
            'course_price'              => $this->course_price,
            'course_old_price'          => $this->course_old_price,
            'course_credit_info'        => $this->course_credit_info,
            'course_medicine_info'      => $this->course_medicine_info,
            'course_thumb'              => $this->course_thumb,
            'course_video'              => $this->course_video,
            'training_schedule'         => $this->training_schedule,
            'advantages'                => $this->advantages,
            'course_program'            => $this->course_program,
            'course_program_pdf'        => $this->course_program_pdf,
            'course_contract_url'       => $this->course_contract_url,
            'limit_users'               => $this->limit_users,
            'course_type'               => $this->course_type
        ];
    }
}
