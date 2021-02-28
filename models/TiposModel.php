<?php
    class TiposModel extends Conectar{

        public function get_tipoequipo(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_tipoequipo ;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_marca(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_marca;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_area(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_area;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function get_personal(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_usuario;";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>