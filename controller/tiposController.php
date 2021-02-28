<?php
    require_once("../config/conexion.php");
    require_once("../models/TiposModel.php");
    $tipos = new TiposModel();

    switch($_GET["op"]){
        case "combo_marca":
            $datos = $tipos->get_marca();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['marca_id']."'>".$row['marca_nombre']."</option>";
                }
                echo $html;
            }
        break;
        
        case "combo_personal":
            $datos = $tipos->get_personal();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['usu_id']."'>".$row['usu_nom'].' '. $row['usu_ape']."</option>";
                }
                echo $html;
            }
        break;
        case "combo_tipoequipo":
            $datos = $tipos->get_tipoequipo();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['tipoequipo_id']."'>".$row['tipo']."</option>";
                }
                echo $html;
            }
        break;
        case "combo_area":
            $datos = $tipos->get_area();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['area_id']."'>".$row['area_nombre']."</option>";
                }
                echo $html;
            }
        break;

        case "combo_calificaciones":
            $datos = $tipos->get_area();
            if(is_array($datos)==true and count($datos)>0){
                foreach($datos as $row)
                {
                    $html.= "<option value='".$row['area_id']."'>".$row['area_nombre']."</option>";
                }
                echo $html;
            }
        break;

    }




    
?>