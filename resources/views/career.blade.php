@extends('layouts.master')
@section('title', 'home')
@section('content')
<div class="landign">
    <div class="input-group mb-3">
    <div class="input-group-prepend">
        <label class="input-group-text" for="inputGroupSelect01">Options</label>
    </div>
    <select class="custom-select" id="inputGroupSelect01">
        <option selected>Choose...</option>
        @if(!is_null($carreras))
            @foreach($carreras as $carrera)
                <option value="{{$carrera->id}}">{{$carrera->name}}</option>
            @endforeach
        @endif
    </select>
    </div>
</div>

<table class="table table-dark">
        <tr>
            <th>Nombre</th>
            <th>creditos</th>
        </tr>
        @if(!is_null($carreras))
            @foreach($carreras as $carrera)
                <tr>
                    <td>{{$carrera->name}}</td>
                    <td>{{$carrera->total_creditos}}</td>
                </tr>
            @endforeach
        @endif
</table>
@endsection
