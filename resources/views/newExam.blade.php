@extends('layouts.master')
@section('title', 'home')
@section('content')
<div>
    <div class="container" style="margin-top:5vh;">
        <div class="row" style="margin-top:1rem;">
            <form class="col-8 col-md-12" action="/exam" method="POST">
                @csrf
                <label class="mr-sm-2" for="inlineFormCustomSelect">Numero de Parcial</label>
                <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="numparcial">
                    @foreach(range(1, $course->num_parciales) as $h)
                        <option value="{{$h}}"  required>{{$h}}</option>
                    @endforeach
                </select>
                <label class="mr-sm-2" for="cal" style="margin-top:5vh;">Calificación</label>
                <input type="text" class="form-control" id="cal" aria-describedby="basic-addon3" name="calificacion">
                <input type="hidden" name="idcourse" value="{{$course->id}}">
                <button type="submit"  class="btn btn-primary" style="margin-top:5vh;" required>Guardar</button>
            </form>
        </div>
    </div>
</div>

@endsection
