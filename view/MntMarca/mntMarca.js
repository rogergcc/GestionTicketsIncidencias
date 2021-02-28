var tabla;

function init(){
    $("#usuario_form").on("submit",function(e){
        guardaryeditar(e);	
    });
}

function guardaryeditar(e){
    // $_POST["marca_nombre"],
    // $_POST["marca_descripcion"]

    e.preventDefault();
    var formData = new FormData($("#usuario_form")[0]);
    if ($('#marca_nombre').val()=='' ){
        swal("Advertencia!", "Campos Vacios", "warning");
    }else{
        $.ajax({
            url: "../../controller/Marca.php?op=guardaryeditar",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(datos){  
                console.log("datos=>",datos);
                const respuesta= JSON.parse(datos)

                $('#usuario_form')[0].reset();
                $("#modalmantenimiento").modal('hide');
                $('#Marca_data').DataTable().ajax.reload();
                
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
    



    tabla=$('#Marca_data').dataTable({
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
            url: '../../controller/Marca.php?op=listar',
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

function editar(marca_id){
    $('#mdltitulo').html('Editar Registro');

    $.post("../../controller/Marca.php?op=mostrar", {marca_id : marca_id}, function (data) {
        data = JSON.parse(data);

        $('#marca_id').val(data.marca_id);
        $('#marca_nombre').val(data.marca_nombre);
        $('#marca_descripcion').val(data.marca_descripcion);
      
    }); 

    $('#modalmantenimiento').modal('show');
}

function eliminar(marca_id){
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
            $.post("../../controller/Marca.php?op=eliminar", {marca_id : marca_id}, function (data) {

                const respuesta = JSON.parse(data);
                $("#Marca_data").DataTable().ajax.reload();
    
                if (respuesta.estado == "1") {
                  swal({
                    title: "GestionTickets!",
                    text: respuesta.mensaje,
                    type: "success",
                    confirmButtonClass: "btn-success",
                  });
                } else {
                  swal({
                    title: "GestionTickets",
                    text: respuesta.mensaje,
                    type: "error",
                    confirmButtonClass: "btn-danger",
                  });
                }
            }); 

           
                
        }
    });
}

$(document).on("click","#btnnuevo", function(){
    $('#mdltitulo').html('Nuevo Registro');
    $('#usuario_form')[0].reset();

    // $('#marca_id').val(null);

    $("input[type=hidden]").val(null);

    $('#modalmantenimiento').modal('show');
    
});

init();