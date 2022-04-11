<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingSchedule extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'training_schedules';
    protected $fillable = [
        'date',
        'weekday',
        'course_id'
    ];

    public function course()
    {
        return $this->hasOne(Course::class);
    }
}
