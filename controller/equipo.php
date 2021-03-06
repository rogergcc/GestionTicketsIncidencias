<?php
    require_once("../config/conexion.php");
    require_once("../models/Equipo.php");
    $equipo = new Equipo();

    switch($_GET["op"]){
      
        case "guardaryeditar":
            if(empty($_POST["equipo_id"])){ 

                $retorno=$equipo->insert_equipo(
                
                    $_POST["codigo_bien"],
                    $_POST["marca_id"],
                    $_POST["personal_id"],
                    $_POST["tipoequipo_id"],
                    $_POST["area_id"]
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
                $retorno=$equipo->update_equipo(
                    $_POST["equipo_id"],
                    $_POST["codigo_bien"],
                    $_POST["marca_id"],
                    $_POST["personal_id"],
                    $_POST["tipoequipo_id"],
                    $_POST["area_id"]
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
            $datos=$equipo->listar_equipos();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
                $sub_array[] = $row["equipo_id"];
                $sub_array[] = $row["codigo_bien"];
                $sub_array[] = $row["marca_nombre"];
                $sub_array[] = $row["usu_nom"] ." ". $row["usu_ape"] ;
                
                $sub_array[] = $row["tipo"];
                
                $sub_array[] = $row["area_nombre"];
                // $sub_array[] = $row["estado"];
                
             

                $sub_array[] = '<button type="button" onClick="editar('.$row["equipo_id"].');"  id="'.$row["equipo_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
                $sub_array[] = '<button type="button" onClick="eliminar('.$row["equipo_id"].');"  id="'.$row["equipo_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';
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
            $equipo->delete_equipo($_POST["equipo_id"]);
        break;

        case "mostrar";
            $datos=$equipo->get_equipo_x_id($_POST["equipo_id"]);  
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $output["equipo_id"] = $row["equipo_id"];
                    $output["codigo_bien"] = $row["codigo_bien"];
                    $output["marca_id"] = $row["marca_id"];
                    $output["personal_id"] = $row["personal_id"];
                    $output["tipoequipo_id"] = $row["tipoequipo_id"];
                    $output["area_id"] = $row["area_id"];
                  
                }
                echo json_encode($output);
            }   
        break;

  

 
    }
