@extends('layouts.master')
@section('title', 'home')
@section('content')
<div>
<h1>Examenes</h1>
    <div class="container" style="margin-top:5vh;">
        <div class="row" style="margin-top:1rem;">
            <div class="col-8 col-md-2" style="margin">
                <h6 style="visibility: hidden;">con</h6>
                <a class="btn btn-primary" href="/exam/nuevo/{{$idCurso}}" role="button">Agrega Parcial</a>
            </div>
            <div class="col-8 col-md-2" style="margin">
                <h6 style="visibility: hidden;">con</h6>
                <a class="btn btn-primary" href="/course" role="button">Regresa</a>
            </div>
        </div>
        <table class="table table-bordered table-hover" align="center" id="subjects-table" style="margin-top:5vh;">
            <thead>
                <tr>
                    <td width="10%" class="table-warning">#</td>
                    <td width="25%" class="table-warning"><b>Calificación</b></td>
                    <td width="20%" class="table-warning"><b>Promedio</b></td>
                    <td width="20%" class="table-warning"><b>Restantes</b></td>
                </tr>
            </thead>
            <tbody id="content-table">
                @if(!is_null($info_exams))
                        @foreach($info_exams as $exam)
                            @if($loop->index % 2 == 0)
                            <tr class="table-info">
                                <td>{{$exam['num_parcial']}}</td>
                                <td>{{$exam['calificacion']}}</td>
                                <td>{{$exam['promedio']}}</td>
                                <td>{{$exam['restante']}}</td>
                            </tr>
                            @else
                            <tr class="table-light">
                                <td>{{$exam['num_parcial']}}</td>
                                <td>{{$exam['calificacion']}}</td>
                                <td>{{$exam['promedio']}}</td>
                                <td>{{$exam['restante']}}</td>
                            </tr>
                            @endif
                        @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
