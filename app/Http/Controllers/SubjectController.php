<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $career = Career::find($user->career_id);
        $materias = $career->subjects;
        $materias_aprobadas = $user->courses;

        $array_id_aprobadas = array();
        $array_materias_faltantes = array();

        foreach ($materias_aprobadas as $key => $value) {
            if($value->cursando == 0)
            {
                array_push($array_id_aprobadas, $value->subject_id);
            }
        }

        ////////
        foreach ($materias as $key => $value) {
            if (!in_array($value->id, $array_id_aprobadas))
            {
                array_push($array_materias_faltantes, $value);
            }
        }
        ///////
        return view('registerCurrentSubjects')->with(compact('array_materias_faltantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career = Career::find($id);
        return $career->subjects;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
