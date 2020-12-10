<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Course;

class Exam extends Model
{
    protected $fillable = [
        'num_parcial', 'course_id', 'calificacion'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
