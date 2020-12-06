@extends('layouts.master')
@section('title', 'home')
@section('content')
<div>
    <div class="container" style="margin-top:5vh;">
        <div class="row">
            <div class="col-8 col-md-4">
                <h6>¿Que Carrera estudias?</h6>        
                <select class="custom-select" id="career">
                    @if(!is_null($carreras))
                        @foreach($carreras as $carrera)
                            @if($carrera->id != 16)
                                <option value="{{$carrera->id}}">{{$carrera->name}}</option>
                            @endif
                        @endforeach
                    @endif
                </select>   
        </div>
    </div>

    <div class="container" style="margin-top:5vh;">
        <table class="table table-bordered table-hover" align="center">
            <tbody>
                <tr>
                    <td colspan="6" class="bg-primary"><b style="color:white;">Materias</b></td>
                </tr>
                <tr>
                    <td width="5%" class="table-warning"><b>Clave</b></td>
                    <td width="5%" class="table-warning"><b>Créditos</b></td>
                    <td width="65%" class="table-warning"><b>Nombre de la Materia</b></td>
                    <td width="5%" class="table-warning"><b>CACEI</b></td>
                    <td width="10%" class="table-warning"><b>Hrs. Teoría</b></td>
                    <td width="10%" class="table-warning"><b>Hrs. Laboratorio</b></td>
                </tr>
            
                <tr class="table-success">
                    <td>0071</td>
                    <td>8</td>
                    <td><a href="plan/75/programas/0071.pdf" target="_blank">QUIMICA A</a></td>
                    <td>CB</td>
                    <td>3</td>
                    <td>2</td>
                </tr>
                
                <tr class="table-primary">
                    <td>2151</td>
                    <td>8</td>
                    <td><a href="plan/75/programas/2151.pdf" target="_blank">MATEMATICAS DISCRETAS I</a></td>
                    <td>CB</td>
                    <td>4</td>
                    <td>0</td>
                </tr>
                
                <tr class="table-success">
                    <td>2229</td>
                    <td>8</td>
                    <td><a href="plan/75/programas/2229.pdf" target="_blank">PENSAMIENTO ALGORITMICO</a></td>
                    <td>CI</td>
                    <td>4</td>
                    <td>0</td>
                </tr>
                
                <tr class="table-primary">
                    <td>2150</td>
                    <td>8</td>
                    <td><a href="plan/75/programas/2150.pdf" target="_blank">TEMAS SELECTOS DE MATEMATICAS</a></td>
                    <td>CB</td>
                    <td>4</td>
                    <td>0</td>
                </tr>
                
                <tr class="table-success">
                    <td>2805</td>
                    <td>8</td>
                    <td><a href="plan/75/programas/2805.pdf" target="_blank">HERRAMIENTAS DE SOFTWARE</a></td>
                    <td>IA</td>
                    <td>4</td>
                    <td>0</td>
                </tr>
                
                <tr class="table-primary">
                    <td>2002</td>
                    <td>2</td>
                    <td><a href="plan/75/programas/2002.pdf" target="_blank">SEMINARIO DE ORIENTACION EN COMPUTACION</a></td>
                    <td>CC</td>
                    <td>2</td>
                    <td>0</td>
                </tr>
                
                <tr class="table-success">
                    <td>1005</td>
                    <td>4</td>
                    <td><a href="plan/75/programas/1005.pdf" target="_blank">METODOLOGIA DE LA INVESTIGACION</a></td>
                    <td>CS</td>
                    <td>0</td>
                    <td>4</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
