<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Subject;


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

    public function subjects()
    {
        return $this->hasOne(Subject::class);
    }
}
