<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'lead';
    protected $fillable = [
        'lead_name',
        'lead_email',
        'lead_phone',
        'course_id'
    ];
}
