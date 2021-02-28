<?php
    require_once("../config/conexion.php");
    require_once("../models/Marca.php");
    $marca = new Marca();

    switch($_GET["op"]){
      
        case "guardaryeditar":
            if(empty($_POST["marca_id"])){ 

                $retorno=$marca->insert_marca(
                
                    $_POST["marca_nombre"],
                    $_POST["marca_descripcion"]
               
                );     
                
                // echo json_encode($retorno);

                if ($retorno) {
                    print json_encode(
                        array(
                            'estado' => '1',
                            'mensaje' => 'Registrado')
                    );
                } else {
                    print json_encode(
                        array(
                            'estado' => '2',
                            'mensaje' => 'Creacion fallida')
                    );
                }

            }
           
            else {
                $retorno=$marca->update_marca(
                    $_POST["marca_id"],
                    $_POST["marca_nombre"],
                    $_POST["marca_descripcion"]
                   
                  
                );

                if ($retorno) {
                    // C�digo de �xito
                    print json_encode(
                        array(
                            'estado' => '1',
                            'mensaje' => 'Actualizacion exitosa')
                    );
                } else {
                    // C�digo de falla
                    print json_encode(
                        array(
                            'estado' => '2',
                            'mensaje' => 'Actualizacion fallida')
                    );
                }

            }
        break;
        
        
        case "listar":
            $datos=$marca->listar_marcas();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();

                $sub_array[] = $row["marca_id"];
                $sub_array[] = $row["marca_nombre"];
                $sub_array[] = $row["marca_descripcion"];
              
        
                // $sub_array[] = $row["estado"];
                
             

                $sub_array[] = '<button type="button" onClick="editar('.$row["marca_id"].');"  id="'.$row["marca_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["marca_id"].');"  id="'.$row["marca_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
                $data[] = $sub_array;
            }

            $results = array(
                "sEcho"=>1,
                "iTotalRecords"=>count($data),
                "iTotalDisplayRecords"=>count($data),
                "aaData"=>$data);
            echo json_encode($results);
        break;

        
        case "eliminar":
            $retorno=$marca->delete_marca($_POST["marca_id"]);

        
            // echo json_encode($retorno);

            if ($retorno) {
                print json_encode(
                    array(
                        'estado' => '1',
                        'mensaje' => 'Registrado Eliminado')
                );
            } else {
                print json_encode(
                    array(
                        'estado' => '2',
                        'mensaje' => 'No se elimino')
                );
            }

        break;

        case "mostrar";
            $datos=$marca->get_marca_x_id($_POST["marca_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["marca_id"] = $row["marca_id"];
                    $output["marca_nombre"] = $row["marca_nombre"];
                    $output["marca_descripcion"] = $row["marca_descripcion"];
           
                }
                echo json_encode($output);
            }   
        break;

  

 
    }
