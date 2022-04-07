<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'course_description',
        'course_duration',
        'course_price',
        'course_old_price',
        'course_credit_info',
        'course_medicine_info',
        'course_thumb',
        'course_video',
        'advantages',
        'course_program',
        'course_program_pdf',
        'course_contract_url',
        'limit_users',
        'course_type'
    ];

    public function training_schedules()
    {
        return $this->hasMany(TrainingSchedule::class);
    }
}
