var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    console.log('FormDAta=> ',formData);
    if ($('#codigo_bien').val()=='' ){
        swal("Advertencia!", "Campos Vacios", "warning");
    }else{
        $.ajax({
            url: "../../controller/equipo.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                console.log("datos=>",datos);
                const respuesta= JSON.parse(datos)

                $('#usuario_form')[0].reset();
                $("#modalmantenimiento").modal('hide');
                $('#Equipo_data').DataTable().ajax.reload();
                
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



$(document).ready(function(){
    



    $.post("../../controller/tiposController.php?op=combo_marca",function(data, status){
        $('#marca_id').html(data);
    });

    $.post("../../controller/tiposController.php?op=combo_personal",function(data, status){
        $('#personal_id').html(data);
    });

    $.post("../../controller/tiposController.php?op=combo_tipoequipo",function(data, status){
        $('#tipoequipo_id').html(data);
    });

    $.post("../../controller/tiposController.php?op=combo_area",function(data, status){
        $('#area_id').html(data);
    });


    tabla=$('#Equipo_data').dataTable({
        "aProcessing": true,
        "aServerSide": true,
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: [		          
                'csvHtml5',
                'pdfHtml5'
                ],
        "ajax":{
            url: '../../controller/equipo.php?op=listar',
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
});

function editar(equipo_id){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/equipo.php?op=mostrar", {equipo_id : equipo_id}, function (data) {
        data = JSON.parse(data);

        $('#equipo_id').val(data.equipo_id);
        $('#codigo_bien').val(data.codigo_bien);
        $('#marca_id').val(data.marca_id);
        $('#personal_id').val(data.personal_id);
        $('#tipoequipo_id').val(data.tipoequipo_id);
        $('#area_id').val(data.area_id);

        // $('#usu_id').val(data.usu_id);
        // $('#usu_nom').val(data.usu_nom);
        // $('#usu_ape').val(data.usu_ape);
        // $('#usu_correo').val(data.usu_correo);
        // $('#usu_pass').val(data.usu_pass);
        // $('#rol_id').val(data.rol_id).trigger('change');
    }); 

    $('#modalmantenimiento').modal('show');
}

function eliminar(equipo_id){
    swal({
        title: "GestionTickets",
        text: "Esta seguro de Eliminar el registro?",
        type: "error",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si",
        cancelButtonText: "No",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            $.post("../../controller/equipo.php?op=eliminar", {equipo_id : equipo_id}, function (data) {

            }); 

            $('#Equipo_data').DataTable().ajax.reload();	

            swal({
                title: "GestionTickets!",
                text: "Registro Eliminado.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();
    $("input[type=hidden]").val(null);
    $('#modalmantenimiento').modal('show');
});

init();