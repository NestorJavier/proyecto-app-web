document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    
    var calendar = new FullCalendar.Calendar(calendarEl, {

        headerToolbar: {
            //left: 'prev,next today myCustomButton',
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },

        initialDate: '2020-09-12',
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        /*
        customButtons: {
            myCustomButton: {
                text: 'custom!',
                click: function() {
                    console.log(calendar.events)
                }
            },
        },
        */

        dateClick: function(info) {
            
            limpiaformulario();
            $('#fecha').val(info.dateStr);

            $("#btnAgregar").prop("disabled",false);
            $("#btnModificar").prop("disabled",true);
            $("#btnEliminar").prop("disabled",true);

            $('#exampleModal').modal('toggle');
        },

        eventClick: function(arg) {
            mes = arg.event.start.getMonth()+1;
            mes = (mes < 10) ? '0' + mes : mes;
        
            dia = arg.event.start.getDate();
            dia = (dia < 10) ? '0' + dia : dia;
            anio = arg.event.start.getFullYear();
            $('#fecha').val(anio+'-'+mes+'-'+dia);
            
            $('#titulo').val(arg.event.title);
            $('#txtDescripcion').val(arg.event.extendedProps.description);
            $('#eventoId').val(arg.event.id);

            $("#btnAgregar").prop("disabled",true);
            $("#btnModificar").prop("disabled",false);
            $("#btnEliminar").prop("disabled",false);
        
            $('#exampleModal').modal('toggle');
            /*if (confirm('Are you sure you want to delete this event?')) {
            arg.event.remove()
            }*/
        },
        
        editable: true,
        dayMaxEvents: true, // allow "more" link when too many events
        events: url_show
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
            url: url_ + accion,
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

    function limpiaformulario() {
        $('#fecha').val("");
        $('#titulo').val("");
        $('#txtDescripcion').val("");
        $('#eventoId').val("");
    }
});
