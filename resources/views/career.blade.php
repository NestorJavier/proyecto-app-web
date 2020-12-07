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
            <div class="col-8 col-md-4">
                <button class="btn btn-primary" id="btnTojson">tojson</button>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top:5vh;">
        <table class="table table-bordered table-hover" align="center" id="subjects-table">
            <thead>
                <tr>
                    <td width="10%" class="table-warning"><b>id</b></td>
                    <td width="10%" class="table-warning"><b>Créditos</b></td>
                    <td width="65%" class="table-warning"><b>Nombre de la Materia</b></td>
                    <td width="15%" class="table-warning"><b>Aprobada</b></td>
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
                    <td>${materia.id}</td>
                    <td>${materia.creditos}</td>
                    <td>${materia.name}</td>
                    <td>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" onchange="changeStateofSubject(this)">
                            </div>
                            <p style="visibility: hidden;"> false </p>
                        </div>
                    </td>
                </tr>
            `;
        }
        else{
            tabla.innerHTML += `
                <tr class="table-info">
                    <td>${materia.id}</td>
                    <td>${materia.creditos}</td>
                    <td>${materia.name}</td>
                    <td>
                        <div class="input-group-prepend">
                            <div class="input-group-text">
                                <input type="checkbox" onchange="changeStateofSubject(this)">
                            </div>
                            <p style="visibility: hidden;"> false </p>
                        </div>
                    </td>
                </tr>
            `;
        }
        
    });
}

function changeStateofSubject(selected){

    selected.parentNode.parentNode.children[1].textContent = selected.checked.toString();
}
/* Este fue el código que pegue de la pagina*/
$( document ).ready(function() {
!function(a){"use strict";a.fn.tableToJSON=function(b){var c={ignoreColumns:[],onlyColumns:null,ignoreHiddenRows:!0,ignoreEmptyRows:!1,headings:null,allowHTML:!1,includeRowId:!1,textDataOverride:"data-override",textExtractor:null};b=a.extend(c,b);var d=function(a){return void 0!==a&&null!==a},e=function(c){return d(b.onlyColumns)?-1===a.inArray(c,b.onlyColumns):-1!==a.inArray(c,b.ignoreColumns)},f=function(b,c){var e={},f=0;return a.each(c,function(a,c){f<b.length&&d(c)&&(e[b[f]]=c,f++)}),e},g=function(c,d,e){var f=a(d),g=b.textExtractor,h=f.attr(b.textDataOverride);return null===g||e?a.trim(h||(b.allowHTML?f.html():d.textContent||f.text())||""):a.isFunction(g)?a.trim(h||g(c,f)):"object"==typeof g&&a.isFunction(g[c])?a.trim(h||g[c](c,f)):a.trim(h||(b.allowHTML?f.html():d.textContent||f.text())||"")},h=function(c,d){var e=[],f=b.includeRowId,h="boolean"==typeof f?f:"string"==typeof f?!0:!1,i="string"==typeof f==!0?f:"rowId";return h&&"undefined"==typeof a(c).attr("id")&&e.push(i),a(c).children("td,th").each(function(a,b){e.push(g(a,b,d))}),e},i=function(a){var c=a.find("tr:first").first();return d(b.headings)?b.headings:h(c,!0)},j=function(c,h){var i,j,k,l,m,n,o,p=[],q=0,r=[];return c.children("tbody,*").children("tr").each(function(c,e){if(c>0||d(b.headings)){var f=b.includeRowId,h="boolean"==typeof f?f:"string"==typeof f?!0:!1;n=a(e);var r=n.find("td").length===n.find("td:empty").length?!0:!1;!n.is(":visible")&&b.ignoreHiddenRows||r&&b.ignoreEmptyRows||n.data("ignore")&&"false"!==n.data("ignore")||(q=0,p[c]||(p[c]=[]),h&&(q+=1,"undefined"!=typeof n.attr("id")?p[c].push(n.attr("id")):p[c].push("")),n.children().each(function(){for(o=a(this);p[c][q];)q++;if(o.filter("[rowspan]").length)for(k=parseInt(o.attr("rowspan"),10)-1,m=g(q,o),i=1;k>=i;i++)p[c+i]||(p[c+i]=[]),p[c+i][q]=m;if(o.filter("[colspan]").length)for(k=parseInt(o.attr("colspan"),10)-1,m=g(q,o),i=1;k>=i;i++)if(o.filter("[rowspan]").length)for(l=parseInt(o.attr("rowspan"),10),j=0;l>j;j++)p[c+j][q+i]=m;else p[c][q+i]=m;m=p[c][q]||g(q,o),d(m)&&(p[c][q]=m),q++}))}}),a.each(p,function(c,g){if(d(g)){var i=d(b.onlyColumns)||b.ignoreColumns.length?a.grep(g,function(a,b){return!e(b)}):g,j=d(b.headings)?h:a.grep(h,function(a,b){return!e(b)});m=f(j,i),r[r.length]=m}}),r},k=i(this);return j(this,k)}}(jQuery);
});


$("#btnTojson").click( function() {
    var table = $('#subjects-table').tableToJSON(); // Convert the table into a javascript object
    console.log(JSON.stringify(table));
});

</script>
@endsection
