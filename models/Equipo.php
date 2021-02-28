<?php
class Equipo extends Conectar
{


    public function insert_equipo(
        $codigo_bien,
        $marca_id,
        $personal_id,
        $tipoequipo_id,
        $area_id
    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_equipo (
                equipo_id,
                codigo_bien,
                marca_id,
                personal_id,
                tipoequipo_id,
                area_id
              
                ) VALUES (NULL,?,?,?,?,?);";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $codigo_bien);
        $sql->bindValue(2, $marca_id);
        $sql->bindValue(3, $personal_id);
        $sql->bindValue(4, $tipoequipo_id);
        $sql->bindValue(5, $area_id);
        // $sql->execute();
        // return $resultado=$sql->fetch();

        return $sql->execute();
    }

    /**
     * Insertar una nueva meta
     *
     * @param $titulo      titulo del nuevo registro
     * @param $descripcion descripci�n del nuevo registro
     * @param $fechaLim    fecha limite del nuevo registro
     * @param $categoria   categoria del nuevo registro
     * @param $prioridad   prioridad del nuevo registro
     * @return PDOStatement
     */

    public static function insert(
        $codigo_bien,
        $marca_id,
        $personal_id,
        $tipoequipo_id,
        $area_id
    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_equipo (
            equipo_id,
            codigo_bien,
            marca_id,
            personal_id,
            tipoequipo_id,
            area_id
          
            ) VALUES (NULL,?,?,?,?,?);";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $codigo_bien);
        $sql->bindValue(2, $marca_id);
        $sql->bindValue(3, $personal_id);
        $sql->bindValue(4, $tipoequipo_id);
        $sql->bindValue(5, $area_id);
        // $sql->execute();
        // return $resultado=$sql->fetch();
        return $sql->execute();
    }


    public function update_equipo(
        $equipo_id,
        $codigo_bien,
        $marca_id,
        $personal_id,
        $tipoequipo_id,
        $area_id
    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_equipo set
                codigo_bien = ?,
                marca_id = ?,
                personal_id = ?,
                tipoequipo_id = ?,
                area_id = ?
                WHERE
                equipo_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $codigo_bien);
        $sql->bindValue(2, $marca_id);
        $sql->bindValue(3, $personal_id);
        $sql->bindValue(4, $tipoequipo_id);
        $sql->bindValue(5, $area_id);
        $sql->bindValue(6, $equipo_id);
        // $sql->execute();
        // return $resultado = $sql->fetchAll();
        return $sql->execute();
    }

    public function listar_equipos()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = " SELECT 
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
            tm_equipo.estado='Activo' 
            ORDER BY tm_equipo.equipo_id DESC ";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_equipo_x_id($equipo_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql = "SELECT 
         tm_equipo.equipo_id ,
	          tm_equipo.codigo_bien ,
	          tm_equipo.marca_id ,
	          tm_equipo.personal_id ,
	          tm_equipo.tipoequipo_id ,
	          tm_equipo.area_id 

          FROM 
          tm_equipo

          WHERE
          tm_equipo.equipo_id=?
          ";

        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $equipo_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

    public function delete_equipo($equipo_id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="call sp_d_equipo_01(?)";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1, $equipo_id);
        $sql->execute();
        return $resultado=$sql->fetchAll();
    }

}
