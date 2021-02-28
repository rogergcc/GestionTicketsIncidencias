<?php
    require_once("../config/conexion.php");
    require_once("../models/Departamento.php");
    $departamento = new Departamento();

    switch($_GET["op"]){
      
        case "guardaryeditar":
            if(empty($_POST["departamento_id"])){ 

                $retorno=$departamento->insert_departamento(
                
                    $_POST["departamento_nombre"],
                    $_POST["departamento_descripcion"]
               
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
                $retorno=$departamento->update_departamento(
                    $_POST["departamento_id"],
                    $_POST["departamento_nombre"],
                    $_POST["departamento_descripcion"]
                   
                  
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
            $datos=$departamento->listar_departamentos();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();

                $sub_array[] = $row["departamento_id"];
                $sub_array[] = $row["departamento_nombre"];
                $sub_array[] = $row["departamento_descripcion"];
              
        
                // $sub_array[] = $row["estado"];
                
             

                $sub_array[] = '<button type="button" onClick="editar('.$row["departamento_id"].');"  id="'.$row["departamento_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["departamento_id"].');"  id="'.$row["departamento_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $retorno=$departamento->delete_departamento($_POST["departamento_id"]);

        
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
            $datos=$departamento->get_departamento_x_id($_POST["departamento_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["departamento_id"] = $row["departamento_id"];
                    $output["departamento_nombre"] = $row["departamento_nombre"];
                    $output["departamento_descripcion"] = $row["departamento_descripcion"];
           
                }
                echo json_encode($output);
            }   
        break;

  

 
    }
