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
            'id'                 => $this->id,
            'title'              => $this->title,
            'slug'               => $this->slug,
            'category_id'        => Category::find($this->category_id),
            'description'        => $this->description,
            'duration'           => $this->duration,
            'price'              => $this->price,
            'old_price'          => $this->old_price,
            'credit_info'        => $this->credit_info,
            'medicine_info'      => $this->medicine_info,
            'thumb'              => $this->thumb,
            'video'              => $this->video,
            'training_schedules' => $this->training_schedules,
            'advantages'         => $this->advantages,
            'program'            => $this->program,
            'program_pdf'        => $this->program_pdf,
            'contract_url'       => $this->contract_url,
            'limit_users'        => $this->limit_users,
            'type'               => $this->type
        ];
    }
}
