<?php

namespace App\Http\Controllers;

use App\Course;
use App\Career;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $cursos = $user->courses;
        $array_cursos_activos = array();
        $curso = array();
        //dd(gettype($cursos[0]));
        foreach ($cursos as $key => $value) {
            if($value->cursando == 1)
            {
                $curso['id'] = $value->id;
                $curso['subject_id'] = $value->subject_id;
                $curso['hora_inicio'] = $value->hora_inicio;
                $curso['hora_fin'] = $value->hora_fin;
                $curso['num_parciales'] = $value->num_parciales;
                $curso['nombre_profesor'] = $value->nombre_profesor;
                $curso['nombre_materia'] = $value->subject->name;
                $curso['creditos'] = $value->subject->creditos;
                
                array_push($array_cursos_activos, $curso);
            }
        }

        //dd($array_cursos_activos);
        return view('currentCourses')->with(compact('array_cursos_activos'));
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
        try {
            $i = 0;
            do {
                $curse = new Course;
                $curse->subject_id = $request[$i]["id"];
                $curse->hora_inicio = $request[$i]["Inicio"];
                $curse->hora_fin = $request[$i]["Fin"];
                $curse->num_parciales = $request[$i]["Parciales"];
                $curse->nombre_profesor = $request[$i]["Profesor"];
                $curse->cursando = true;
                $curse->aprobada = false;
                $curse->user_id = Auth::user()->id;
                $curse->save();
                $i++;
            } while ($request[$i] != null);
            return response()->json("Success");
        } catch (\Throwable $th) {
            $i = 0;
            do {
                if($request[$i]["Aprobada"] == "true")
                {
                    $curse = new Course;
                    $curse->subject_id = $request[$i]["id"];
                    $curse->cursando = false;
                    $curse->aprobada = true;
                    $curse->user_id = Auth::user()->id;
                    $curse->save();
                }
                $i++;
            } while ($request[$i] != null);

            return response()->json("Success");
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
