<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Course extends Model
{
    use HasFactory, SoftDeletes, Sluggable;
    protected $table = 'courses';
    protected $fillable = [
        'title',
        'slug',
        'category_id',
        'description',
        'duration',
        'price',
        'old_price',
        'credit_info',
        'medicine_info',
        'thumb',
        'video',
        'advantages',
        'program',
        'program_pdf',
        'contract_url',
        'limit_users',
        'type'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function training_schedules()
    {
        return $this->hasMany(TrainingSchedule::class);
    }
}
