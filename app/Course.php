<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;
use App\Exam;


class Course extends Model
{
    protected $fillable = [ 'subject_id',
                            'hora_inicio',
                            'hora_fin',
                            'cursando',
                            'num_parciales',
                            'nombre_profesor',
                            'num_ciclo',
                            'aprobada',
                            'user_id'   ];

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function exams()
    {
        return $this->hasMany(Exam::class);
    }

}
