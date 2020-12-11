@extends('layouts.master')
@section('title', 'home')
@section('content')
<div>
<h1>Nuevo examen</h1>
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

<script>

const tabla = document.querySelector('#content-table');
let numMaterias = 0;
let idMateriasAgregadas = [];
let home_url = "{{ url('home') }}";

function muestraParciales(params) {
    console.log(params);
}

async function agregaInfoMateria() {
    //tabla.innerHTML = '';

    materia_seleccionada_id = document.querySelector('#selectCareerControl').value;
    hInicioSeleccionada = document.querySelector('#horaInicio').value;
    hFinSeleccionada = document.querySelector('#horaFin').value;
    numParcialesSeleccionada = document.querySelector('#selectNumParciales').value;
    nombreProfesor = document.querySelector('#nombreProf').value;
    

    if(idMateriasAgregadas.indexOf(Number(materia_seleccionada_id)) === -1 && hInicioSeleccionada < hFinSeleccionada){
        materias.forEach(materia => {
            if(materia.id == materia_seleccionada_id){
                if (!(numMaterias%2 == 0)) {
                    tabla.innerHTML += `
                        <tr class="table-light">
                            <td>${materia.id}</td>
                            <td>${materia.creditos}</td>
                            <td>${materia.name}</td>
                            <td>${hInicioSeleccionada}</td>
                            <td>${hFinSeleccionada}</td>
                            <td>${numParcialesSeleccionada}</td>
                            <td>${nombreProfesor}</td>
                        </tr>
                    `;
                }
                else{
                    tabla.innerHTML += `
                        <tr class="table-info">
                            <td>${materia.id}</td>
                            <td>${materia.creditos}</td>
                            <td>${materia.name}</td>
                            <td>${hInicioSeleccionada}</td>
                            <td>${hFinSeleccionada}</td>
                            <td>${numParcialesSeleccionada}</td>
                            <td>${nombreProfesor}</td>
                        </tr>
                    `;
                }
                idMateriasAgregadas.push(materia.id);
            }
        });
        numMaterias++;
    } else {
        if(hInicioSeleccionada >= hFinSeleccionada)
            alert("La hora de inicio tiene que ser menor que la final");
        else
            alert("Esa materia ya esta agregada");
    
    }
}

function changeStateofSubject(selected){

    selected.parentNode.parentNode.children[1].textContent = selected.checked.toString();
}
/* Este fue el código que pegue de la pagina*/
$( document ).ready(function() {
!function(a){"use strict";a.fn.tableToJSON=function(b){var c={ignoreColumns:[],onlyColumns:null,ignoreHiddenRows:!0,ignoreEmptyRows:!1,headings:null,allowHTML:!1,includeRowId:!1,textDataOverride:"data-override",textExtractor:null};b=a.extend(c,b);var d=function(a){return void 0!==a&&null!==a},e=function(c){return d(b.onlyColumns)?-1===a.inArray(c,b.onlyColumns):-1!==a.inArray(c,b.ignoreColumns)},f=function(b,c){var e={},f=0;return a.each(c,function(a,c){f<b.length&&d(c)&&(e[b[f]]=c,f++)}),e},g=function(c,d,e){var f=a(d),g=b.textExtractor,h=f.attr(b.textDataOverride);return null===g||e?a.trim(h||(b.allowHTML?f.html():d.textContent||f.text())||""):a.isFunction(g)?a.trim(h||g(c,f)):"object"==typeof g&&a.isFunction(g[c])?a.trim(h||g[c](c,f)):a.trim(h||(b.allowHTML?f.html():d.textContent||f.text())||"")},h=function(c,d){var e=[],f=b.includeRowId,h="boolean"==typeof f?f:"string"==typeof f?!0:!1,i="string"==typeof f==!0?f:"rowId";return h&&"undefined"==typeof a(c).attr("id")&&e.push(i),a(c).children("td,th").each(function(a,b){e.push(g(a,b,d))}),e},i=function(a){var c=a.find("tr:first").first();return d(b.headings)?b.headings:h(c,!0)},j=function(c,h){var i,j,k,l,m,n,o,p=[],q=0,r=[];return c.children("tbody,*").children("tr").each(function(c,e){if(c>0||d(b.headings)){var f=b.includeRowId,h="boolean"==typeof f?f:"string"==typeof f?!0:!1;n=a(e);var r=n.find("td").length===n.find("td:empty").length?!0:!1;!n.is(":visible")&&b.ignoreHiddenRows||r&&b.ignoreEmptyRows||n.data("ignore")&&"false"!==n.data("ignore")||(q=0,p[c]||(p[c]=[]),h&&(q+=1,"undefined"!=typeof n.attr("id")?p[c].push(n.attr("id")):p[c].push("")),n.children().each(function(){for(o=a(this);p[c][q];)q++;if(o.filter("[rowspan]").length)for(k=parseInt(o.attr("rowspan"),10)-1,m=g(q,o),i=1;k>=i;i++)p[c+i]||(p[c+i]=[]),p[c+i][q]=m;if(o.filter("[colspan]").length)for(k=parseInt(o.attr("colspan"),10)-1,m=g(q,o),i=1;k>=i;i++)if(o.filter("[rowspan]").length)for(l=parseInt(o.attr("rowspan"),10),j=0;l>j;j++)p[c+j][q+i]=m;else p[c][q+i]=m;m=p[c][q]||g(q,o),d(m)&&(p[c][q]=m),q++}))}}),a.each(p,function(c,g){if(d(g)){var i=d(b.onlyColumns)||b.ignoreColumns.length?a.grep(g,function(a,b){return!e(b)}):g,j=d(b.headings)?h:a.grep(h,function(a,b){return!e(b)});m=f(j,i),r[r.length]=m}}),r},k=i(this);return j(this,k)}}(jQuery);
});

function guardaCursos() {
    var table = $('#subjects-table').tableToJSON({
        ignoreColumns: [1, 2]
    }); // Convert the table into a javascript object
    infoArray = JSON.stringify(table);
    
    /*table.forEach(element => {
        console.log(element)
    });*/

    let data = { materiasInfo: infoArray };
    let url = "{{ url('course') }}";
    console.log(url);
    
    fetch(url, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            "Accept": "application/json, text-plain, *//*",
            "X-Requested-With": "XMLHttpRequest",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify(table),
    })
    .then(response => response.json())
    .then(data => {
        console.log('Success:', data);
        console.log("Yeiiiiiiiii");
        window.location.href = home_url;
    })
    .catch((error) => {
        console.log('Error:', error);
    });
    
}

</script>
@endsection
