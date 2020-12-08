<?php

namespace App\Http\Controllers;

use App\Evento;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('eventos.calendario');
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
        /*$datosEvento = request()->except(['_token', '_method']);
        //Evento::insert($datosEvento);*/
        
        $evento = new Evento;
        $evento->title = $request->titulo;
        $evento->description = $request->descripcion;
        $evento->start = $request->fecha;
        $evento->user_id = Auth::user()->id;
        $evento->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find(Auth::user()->id);
        return $user->eventos;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $evento = Evento::find($request->id);
        $evento->title = $request->titulo;
        $evento->description = $request->descripcion;
        $evento->start = $request->fecha;

        $evento->save();
        return response()->json($evento);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Evento  $evento
     * @return \Illuminate\Http\Response
     */
    public function destroy($eventoid)
    {
        $ev = Evento::find($eventoid);
        $ev->delete();
        return response()->json($ev);

    }
}
