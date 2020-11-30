@extends('layouts.master')
@section('title', 'landing')
@section('content')
<div class="landign">
    <div class="container">
        <div class="row">
            <div class="col-5 align-self-center frase">
                <p class="text-left">Manten ordenadas tus materias y concentrate en lo que importa</p>
            </div>
            <div class="col-3 align-self-end">
                <a href="{{ route('login') }}" role="button" class="btn btn-light btn-lg btn-block">Login</a>
            </div>
            <div class="col-1">

            </div>
            <div class="col-3">
                <img src="{{asset('images/calendario.png')}}" alt="calendar">
            </div>
        </div>
        <div class="row">
            <div class="col-4">

            </div>
            <div class="col-3 align-self-end">
                <a href="{{ route('register') }}" role="button" class="btn btn-success btn-lg btn-block">
                    Registrate
                </a>
            </div>
            <div class="col-1">

            </div>
            <div class="col-4">
                <img src="{{asset('images/portapapeles.png')}}" alt="calendar">
            </div>
        </div>
    </div>
</div>
@endsection

