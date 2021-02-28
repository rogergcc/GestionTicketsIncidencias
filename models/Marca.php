<?php
class Marca extends Conectar
{


    public function insert_marca(
        $marca_nombre,
        $marca_descripcion
    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_marca (
                marca_id,
                marca_nombre,
                marca_descripcion
                
            
              
                ) VALUES (NULL,?,?);";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $marca_nombre);
        $sql->bindValue(2, $marca_descripcion);


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
        $marca_nombre,
        $marca_descripcion


    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_marca (
            marca_id,
            marca_nombre,
            marca_descripcion
            
        
          
            ) VALUES (NULL,?,?);";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $marca_nombre);
        $sql->bindValue(2, $marca_descripcion);


        // $sql->execute();
        // return $resultado=$sql->fetch();
        return $sql->execute();
    }


    public function update_marca(
        $marca_id,
        $marca_nombre,
        $marca_descripcion


    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_marca set
                marca_nombre = ?,
                marca_descripcion = ?
                
            
                WHERE
                marca_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $marca_nombre);
        $sql->bindValue(2, $marca_descripcion);


        $sql->bindValue(3, $marca_id);
        // $sql->execute();
        // return $resultado = $sql->fetchAll();
        return $sql->execute();
    }

    public function listar_marcas()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = " SELECT 
        *from tm_marca
            WHERE
                estado = 1
            ORDER BY tm_marca.marca_id DESC ";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_marca_x_id($marca_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
         tm_marca.marca_id ,
	          tm_marca.marca_nombre ,
	          tm_marca.marca_descripcion 
	          
	        

          FROM 
          tm_marca

          WHERE
          tm_marca.marca_id=?
          ";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $marca_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_marca($marca_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_marca set
        estado = 2
        WHERE
        marca_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $marca_id);
        // $sql->execute();
        // return $resultado = $sql->fetchAll();

        return $sql->execute();
    }
}
