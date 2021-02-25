<?php
    require_once("../config/conexion.php");
    require_once("../models/Equipo.php");
    $equipo = new Equipo();

    switch($_GET["op"]){
      
        case "guardaryeditar":
            if(empty($_POST["usu_id"])){       
                $usuario->insert_usuario($_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"]);     
            }
            else {
                $usuario->update_usuario($_POST["usu_id"],$_POST["usu_nom"],$_POST["usu_ape"],$_POST["usu_correo"],$_POST["usu_pass"],$_POST["rol_id"]);
            }
        break;
        
        case "listar":
            $datos=$equipo->listar_equipos();
            $data= Array();
            foreach($datos as $row){
                $sub_array = array();
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

        
        // case "eliminar":
        //     $equipo->delete_usuario($_POST["usu_id"]);
        // break;

        // case "mostrar";
        //     $datos=$equipo->get_usuario_x_id($_POST["usu_id"]);  
        //     if(is_array($datos)==true and count($datos)>0){
        //         foreach($datos as $row)
        //         {
        //             $output["usu_id"] = $row["usu_id"];
        //             $output["usu_nom"] = $row["usu_nom"];
        //             $output["usu_ape"] = $row["usu_ape"];
        //             $output["usu_correo"] = $row["usu_correo"];
        //             $output["usu_pass"] = $row["usu_pass"];
        //             $output["rol_id"] = $row["rol_id"];
        //         }
        //         echo json_encode($output);
        //     }   
        // break;

  

 
    }
?>