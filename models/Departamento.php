<?php
class Departamento extends Conectar
{


    public function insert_departamento(
        $departamento_nombre,
        $departamento_descripcion
    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_departamento (
                departamento_id,
                departamento_nombre,
                departamento_descripcion
                
            
              
                ) VALUES (NULL,?,?);";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $departamento_nombre);
        $sql->bindValue(2, $departamento_descripcion);


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
        $departamento_nombre,
        $departamento_descripcion


    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "INSERT INTO tm_departamento (
            departamento_id,
            departamento_nombre,
            departamento_descripcion
            
        
          
            ) VALUES (NULL,?,?);";
        $sql = $conectar->prepare($sql);

        $sql->bindValue(1, $departamento_nombre);
        $sql->bindValue(2, $departamento_descripcion);


        // $sql->execute();
        // return $resultado=$sql->fetch();
        return $sql->execute();
    }


    public function update_departamento(
        $departamento_id,
        $departamento_nombre,
        $departamento_descripcion


    ) {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_departamento set
                departamento_nombre = ?,
                departamento_descripcion = ?
                
            
                WHERE
                departamento_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $departamento_nombre);
        $sql->bindValue(2, $departamento_descripcion);


        $sql->bindValue(3, $departamento_id);
        // $sql->execute();
        // return $resultado = $sql->fetchAll();
        return $sql->execute();
    }

    public function listar_departamentos()
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = " SELECT 
        *from tm_departamento
            WHERE
                estado = 1
            ORDER BY tm_departamento.departamento_id DESC ";
        $sql = $conectar->prepare($sql);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function get_departamento_x_id($departamento_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "SELECT 
         tm_departamento.departamento_id ,
	          tm_departamento.departamento_nombre ,
	          tm_departamento.departamento_descripcion 
	          
	        

          FROM 
          tm_departamento

          WHERE
          tm_departamento.departamento_id=?
          ";

        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $departamento_id);
        $sql->execute();
        return $resultado = $sql->fetchAll();
    }

    public function delete_departamento($departamento_id)
    {
        $conectar = parent::conexion();
        parent::set_names();
        $sql = "UPDATE tm_departamento set
        estado = 2
        WHERE
        departamento_id = ?";
        $sql = $conectar->prepare($sql);
        $sql->bindValue(1, $departamento_id);
        // $sql->execute();
        // return $resultado = $sql->fetchAll();

        return $sql->execute();
    }
}
