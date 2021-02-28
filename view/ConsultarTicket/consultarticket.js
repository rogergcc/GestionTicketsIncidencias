var tabla;
var usu_id =  $('#user_idx').val();
var rol_id =  $('#rol_idx').val();

function init(){
    $("#usuario_form").on("submit",function(e){
        calificar(e);	
    });
}
function calificar(e){
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    if ($('#puntuacion').val()=='0' ){
        swal("Advertencia!", "Seleccion la puntuacion", "warning");
    }else{
        $.ajax({
            url: "../../controller/ticket.php?op=calificar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                console.log("datos=>",datos);
                const respuesta= JSON.parse(datos)

                $('#usuario_form')[0].reset();
                $("#modalmantenimiento").modal('hide');
                $('#ticket_data').DataTable().ajax.reload();
                
                if (respuesta.estado=="1") {
                    swal({
                        title: "GestionTickets!",
                        text: respuesta.mensaje,
                        type: "success",
                        confirmButtonClass: "btn-success"
                    });
                } else {
                    swal({
                        title: "GestionTickets",
                        text: respuesta.mensaje,
                        type: "error",
                        confirmButtonClass: "btn-danger"
                    });
                }
                

            }  
        }); 
    }
    
}
function editar(tick_id){
    $('#mdltitulo').html('Calificar Incidencia');

//     $.post("../../controller/ticket.php?op=calificar", {departamento_id : departamento_id}, function (data) {
//         data = JSON.parse(data);

//         $('#departamento_id').val(data.departamento_id);
//         $('#puntuacion').val(data.puntuacion);

//         $('#departamento_nombre').val(data.departamento_nombre);
//         $('#departamento_descripcion').val(data.departamento_descripcion);
      
//     }); 


        $.post("../../controller/ticket.php?op=mostrarParaCalificar", {tick_id : tick_id}, function (data) {
            data = JSON.parse(data);

            $('#tick_id').val(data.tick_id);
            $('#tick_titulo').val(data.tick_titulo);
         
            
            // $('#usu_id').val(data.usu_id);
            // $('#usu_nom').val(data.usu_nom);
            // $('#usu_ape').val(data.usu_ape);
            // $('#usu_correo').val(data.usu_correo);
            // $('#usu_pass').val(data.usu_pass);
            // $('#rol_id').val(data.rol_id).trigger('change');
        }); 

    $('#puntuacion').val(0);
    $('#modalmantenimiento').modal('show');

    

}

$(document).ready(function(){

    // $.post("../../controller/tiposController.php?op=combo_calificaciones",function(data, status){
    //     $('#puntuacion').html(data);
    // });


    if (rol_id==1){
        tabla=$('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [		          
                    // 'copyHtml5',
                    // 'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controller/ticket.php?op=listar_x_usu',
                type : "post",
                dataType : "json",	
                data:{ usu_id : usu_id },						
                error: function(e){
                    console.log(e.responseText);	
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }     
        }).DataTable(); 
    }else{
        tabla=$('#ticket_data').dataTable({
            "aProcessing": true,
            "aServerSide": true,
            dom: 'Bfrtip',
            "searching": true,
            lengthChange: false,
            colReorder: true,
            buttons: [		          
                    // 'copyHtml5',
                    // 'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5'
                    ],
            "ajax":{
                url: '../../controller/ticket.php?op=listar',
                type : "post",
                dataType : "json",						
                error: function(e){
                    console.log(e.responseText);	
                }
            },
            "bDestroy": true,
            "responsive": true,
            "bInfo":true,
            "iDisplayLength": 10,
            "autoWidth": false,
            "language": {
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }     
        }).DataTable(); 
    }

});

function ver(tick_id){
    window.open('http://localhost/GestionTicketsIncidencias/view/DetalleTicket/?ID='+ tick_id +'');
}

init();