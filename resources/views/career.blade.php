@extends('layouts.master')
@section('title', 'home')
@section('content')
<div>
    <div class="container" style="margin-top:5vh;">
        <div class="row">
            <div class="col-8 col-md-4">
                <h6>¿Que Carrera estudias?</h6>
                
                <select class="custom-select" id="career" onchange="getComboA(this)">
                    @if(!is_null($carreras))
                        @foreach($carreras as $carrera)
                            @if($carrera->id != 16)
                                <option value="{{$carrera->id}}">{{$carrera->name}}</option>
                            @else
                                <option selected value="{{$carrera->id}}">Elije...</option>
                            @endif
                        @endforeach
                    @endif
                </select>   
        </div>
    </div>

    <div class="container" style="margin-top:5vh;">
        <table class="table table-bordered table-hover" align="center">
            <thead>
                <tr>
                    <td colspan="6" class="bg-primary"><b style="color:white;">Materias</b></td>
                </tr>
                <tr>
                    <td width="10%" class="table-warning"><b>Créditos</b></td>
                    <td width="80%" class="table-warning"><b>Nombre de la Materia</b></td>
                    <td width="10%" class="table-warning"><b>Aprobada</b></td>
                </tr>
            </thead>
            <tbody id="content-table">
                
            </tbody>
        </table>
    </div>
</div>

<script>

const tabla = document.querySelector('#content-table');

function getSubjects(url) {
    return fetch(url)
    .then(function(response) {
      return response.json();
    })
}

async function getComboA(selected) {
    console.log(selected.value);
    
    url = "{{ url('/subject') }}" + "/" + selected.value;
    let materias = await getSubjects(url);
    tabla.innerHTML = '';
    materias.forEach(materia => {
        if (materia.id%2 == 0) {
            tabla.innerHTML += `
                <tr class="table-light">
                    <td>${materia.creditos}</td>
                    <td>${materia.name}</td>
                    <td>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input">
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        }
        else{
            tabla.innerHTML += `
                <tr class="table-info">
                    <td>${materia.creditos}</td>
                    <td>${materia.name}</td>
                    <td>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" aria-label="Checkbox for following text input">
                            </div>
                        </div>
                    </td>
                </tr>
            `;
        }
        
    });
}
</script>
@endsection
