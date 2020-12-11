<?php

namespace App\Http\Controllers;

use App\Exam;
use App\Course;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($idCurso)
    {
        $course = Course::find($idCurso);
        $exams = $course->exams;
        //dd($course);
        return view('newExam')->with(compact('exams', 'course'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam;
        $exam->course_id = $request->idcourse;
        $exam->num_parcial = $request->numparcial;
        $exam->calificacion = $request->calificacion;
        $exam->save();

        return redirect('/exam/'.$request->idcourse);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show($idCurso)
    {
        $course = Course::find($idCurso);
        $exams = $course->exams;

        $info_exams = array();
        $examen = array();
        $i = 0;
        $calificacion_acum = 0;
        foreach ($exams as $key => $exam) {

            $examen['num_parcial'] = $exam->num_parcial;
            $examen['calificacion'] = $exam->calificacion;
            $calificacion_acum += $exam->calificacion;
            $i++;

            $examen['promedio'] = $calificacion_acum/$i;
            $examen['restante'] = ($course->num_parciales*6) - $calificacion_acum;
            array_push($info_exams, $examen);
        }

        //dd($info_exams);

        /////////////////////////////
        return view('exams')->with(compact('info_exams', 'idCurso'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam $exam)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}
