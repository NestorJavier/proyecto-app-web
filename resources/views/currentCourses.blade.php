@extends('layouts.master')
@section('title', 'home')
@section('content')
<div>
    <div class="container" style="margin-top:5vh;">
        <div class="col-8 col-md-2" style="margin">
                <h6 style="visibility: hidden;">con</h6>
                <a class="btn btn-primary" href="/home" role="button">Regresa</a>
        </div>
        <table class="table table-bordered table-hover" align="center" id="subjects-table" style="margin-top:5vh;">
            <thead>
                <tr>
                    <td width="10%" class="table-warning"></td>
                    <td width="10%" class="table-warning"></td>
                    <td width="25%" class="table-warning"><b>Nombre</b></td>
                    <td width="20%" class="table-warning"><b>Profesor</b></td>
                    <td width="10%" class="table-warning"><b>Créditos</b></td>
                    <td width="10%" class="table-warning"><b>Parciales</b></td>
                    <td width="5%" class="table-warning"><b>Inicio</b></td>
                    <td width="5%" class="table-warning"><b>Fin</b></td>
                </tr>
            </thead>
            <tbody id="content-table">
                @if(!is_null($array_cursos_activos))
                        @foreach($array_cursos_activos as $curso)
                            @if($loop->index % 2 == 0)
                            <tr class="table-info">
                                <td>                                
                                    <a href="{{ url('exam') }}/{{$curso['id']}}" role="button" class="btn btn-primary">
                                        Info
                                    </a>
                                </td>
                                <td>                                
                                    <a href="{{ url('course') }}/{{$curso['id']}}" role="button" class="btn btn-primary">
                                        Finalizar
                                    </a>
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
                                    <a href="{{ url('exam') }}/{{$curso['id']}}" role="button" class="btn btn-primary">
                                        Info
                                    </a>
                                </td>
                                <td>                                
                                    <a href="{{ url('course') }}/{{$curso['id']}}" role="button" class="btn btn-primary">
                                        Finalizar
                                    </a>
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
