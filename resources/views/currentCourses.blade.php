@extends('layouts.master')
@section('title', 'home')
@section('content')
<div>
<h1>Materias en curso</h1>
    <div class="container" style="margin-top:5vh;">
        <table class="table table-bordered table-hover" align="center" id="subjects-table">
            <thead>
                <tr>
                    <td width="10%" class="table-warning"></td>
                    <td width="25%" class="table-warning"><b>Nombre</b></td>
                    <td width="20%" class="table-warning"><b>Profesor</b></td>
                    <td width="10%" class="table-warning"><b>Créditos</b></td>
                    <td width="10%" class="table-warning"><b>Parciales</b></td>
                    <td width="10%" class="table-warning"><b>Inicio</b></td>
                    <td width="10%" class="table-warning"><b>Fin</b></td>
                </tr>
            </thead>
            <tbody id="content-table">
                @if(!is_null($array_cursos_activos))
                        @foreach($array_cursos_activos as $curso)
                            @if($loop->index % 2 == 0)
                            <tr class="table-info">
                                <td>
                                    <button class="btn btn-primary" onclick="infoCurso({{$curso['id']}})">Info</button>
                                </td>
                                <td>{{$curso['nombre_materia']}}</td>
                                <td>{{$curso['nombre_profesor']}}</td>
                                <td>{{$curso['creditos']}}</td>
                                <td>{{$curso['num_parciales']}}</td>
                                <td>{{$curso['hora_inicio']}}:00</td>
                                <td>{{$curso['hora_fin']}}:00</td>
                            </tr>
                            @else
                            <tr class="table-light">
                                <td>
                                    <button class="btn btn-primary" onclick="infoCurso({{$curso['id']}})">Info</button>
                                </td>
                                <td>{{$curso['nombre_materia']}}</td>
                                <td>{{$curso['nombre_profesor']}}</td>
                                <td>{{$curso['creditos']}}</td>
                                <td>{{$curso['num_parciales']}}</td>
                                <td>{{$curso['hora_inicio']}}:00</td>
                                <td>{{$curso['hora_fin']}}:00</td>
                            </tr>
                            @endif
                        @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>

let materias = {!! json_encode($array_cursos_activos) !!};
let exams = "{{ url('exam') }}";

function infoCurso(params) {
    window.location.href = exams+"/"+params;
}

</script>
@endsection
