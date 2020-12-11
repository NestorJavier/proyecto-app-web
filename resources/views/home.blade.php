@extends('layouts.master')
@section('title', 'home')
@section('content')
<div class="landign">
    <div class="container">
        <div class="row">
            <div class="col-9" style="margin-top: 10vh;">
                <img src="{{asset('images/puntou.png')}}" alt="calendar">
            </div>
            <div class="col-3 align-self-end" style="height: 50vh;">
                <div class="d-flex align-items-start flex-column" >
                    <div class="mb-auto p-2">
                        <a href="{{ route('course.index') }}" role="button" class="btn btn-success btn-lg btn-block">
                            Materias
                        </a>
                    </div>
                    <div class="mb-auto p-2">
                        <a href="{{ route('evento.index') }}" role="button" class="btn btn-success btn-lg btn-block">
                            Calendario
                        </a>
                    </div>
                    <div class="mb-auto p-2">
                        <a href="{{ route('subject.index') }}" role="button" class="btn btn-success btn-lg btn-block">
                            alta materias
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



<!--
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
-->