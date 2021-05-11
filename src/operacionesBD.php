<?php


    class operacionesBD
    {
        private $conexion;
        private $resultado;

        function __construct(){
            require_once 'parametros.php';

            $this->conexion = new mysqli(servidor,usuario,contraseña,basededatos);
        }

        function ejecutarConsulta($consulta){

            $this->resultado=$this->conexion->query($consulta);
        }

        function recorrerFilas(){

            return $this->resultado->fetch_array();
        }

        function filasAfectadas(){

            return $this->conexion->affected_rows;
        }

        function numeroFilas(){

            return $this->resultado->num_rows;
        }

        function numeroError(){

            return $this->conexion->errno;
        }

        function error(){

            return $this->conexion->error;
        }

        function cierreSesion(){

            $this->conexion->close();
        }

    }


?>