<?php
    class Equipo extends Conectar{

      
        public function listar_equipos(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql=" SELECT 
          tm_equipo.equipo_id as equipo_id,
            tm_equipo.codigo_bien as codigo_bien,
            tm_marca.marca_nombre as marca_nombre,
            tm_usuario.usu_nom as usu_nom,
            tm_usuario.usu_ape as usu_ape,
            tm_tipoequipo.tipo as tipo,
            tm_area.area_nombre as area_nombre,
            tm_equipo.estado as estado
            FROM 
            tm_equipo
            INNER join tm_marca ON tm_equipo.marca_id = tm_marca.marca_id
            INNER JOIN tm_usuario ON tm_equipo.personal_id = tm_usuario.usu_id
            INNER JOIN tm_tipoequipo ON tm_equipo.tipoequipo_id = tm_tipoequipo.tipoequipo_id
            INNER JOIN tm_area ON tm_equipo.area_id = tm_area.area_id
            WHERE
            tm_equipo.estado='Activo' ";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

    }
?>