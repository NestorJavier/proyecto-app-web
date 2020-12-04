<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8' />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ asset('fullcalendar/lib/main.css') }}"z rel='stylesheet' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="{{ asset('fullcalendar/lib/main.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            
            var calendar = new FullCalendar.Calendar(calendarEl, {

                headerToolbar: {
                    left: 'prev,next today myCustomButton',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                initialDate: '2020-09-12',
                navLinks: true, // can click day/week names to navigate views
                selectable: true,
                selectMirror: true,
                
                customButtons: {
                    myCustomButton: {
                        text: 'custom!',
                        click: function() {
                            console.log(calendar.events)
                        }
                    },
                },

                dateClick: function(info) {
                    $('#fecha').val(info.dateStr);
                    $('#exampleModal').modal('toggle');
                },

                eventClick: function(arg) {
                    console.log(arg.event)
                    mes = arg.event.start.getMonth()+1;
                    mes = (mes < 10) ? '0' + mes : mes;
                
                    dia = arg.event.start.getDate();
                    dia = (dia < 10) ? '0' + dia : dia;
                    anio = arg.event.start.getFullYear();
                    $('#fecha').val(anio+'-'+mes+'-'+dia);
                    console.log(anio+'-'+mes+'-'+dia)
                    
                    $('#titulo').val(arg.event.title);
                    $('#txtDescripcion').val(arg.event.extendedProps.description);
                    $('#eventoId').val(arg.event.id);
                
                    $('#exampleModal').modal('toggle');
                    /*if (confirm('Are you sure you want to delete this event?')) {
                    arg.event.remove()
                    }*/
                },
                
                editable: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: "{{ url('/evento/show') }}"
            });

            calendar.setOption('locale', 'Es');
            calendar.render();
            
            $("#btnAgregar").click(function(){
                var objEvento = recolectarDatosGUI('POST');
                EnviarInformacion('', objEvento);
            });

            $("#btnEliminar").click(function(){
                var objEvento = recolectarDatosGUI('DELETE');
                EnviarInformacion('/'+$('#eventoId').val(), objEvento);
            });
            
            $("#btnModificar").click(function(){
                var objEvento = recolectarDatosGUI('PATCH');
                console.log(objEvento);
                EnviarInformacion('/'+$('#eventoId').val(), objEvento);
            });
            
            function recolectarDatosGUI(method){
                nuevoEvento = {
                    id: $('#eventoId').val(),
                    titulo: $('#titulo').val(),
                    descripcion: $('#txtDescripcion').val(),
                    fecha: $('#fecha').val() + " " + "01:00:00",
                    '_token': $("meta[name='csrf-token']").attr("content"),
                    '_method': method
                }
                return nuevoEvento;
            }
            
            function EnviarInformacion(accion, objEvento){
                $.ajax({
                    type: "POST",
                    url: "{{ url('evento') }}" + accion,
                    data: objEvento,
                    success: function (msg){
                        $('#exampleModal').modal('toggle');
                        calendar.refetchEvents();
                    },
                    error: function () { 
                        $('#exampleModal').modal('toggle');
                        alert("Hay un error")
                    }
                });
            }
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>


    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 1rem;
        }

        #calendar {
            max-width: 80vw;
            margin: 3rem auto;
        }

        a {
            color: black;
        }
    </style>
</head>
<body>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-8">
                            <label for="titulo">Titulo:</label>
                            <input class="form-control" type="text" name="titulo" id="titulo">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fecha">Inicio:</label>
                            <input class="form-control" disabled type="text" name="fecha" id="fecha">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="txtDescripcion">Descripción:</label>
                            <textarea class="form-control" name="txtDescripcion" id="txtDescripcion" cols="30" rows="3"></textarea>
                        </div>
                        <input type="hidden" id="eventoId" name="eventoId" value="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-success" id="btnAgregar">Agregar</button>
                    <button class="btn btn-warning" id="btnModificar">Modificar</button>
                    <button class="btn btn-danger" id="btnEliminar">Borrar</button>
                    <button class="btn btn-light" id="btnCancelar">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
    <div id='calendar'></div>
</body>
</html>
