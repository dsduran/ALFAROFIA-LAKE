<?php


    class operacionesBD
    {
        private $conexion;
        private $resultado;

        /**
         *
         * Función constructor, hacemos conexión con BD utilizando los parametros definicos en  parametros.php
         */
        function __construct(){
            require_once 'parametros.php';
            require_once 'parametrosInfo.php';

            $this->conexion = new mysqli(servidor,usuario,contraseña,basededatos);
        }
        /*
         *
         * Función para ejecutar las consultas del código, le pasamos $consulta y ejecutamos*/
        function ejecutarConsulta($consulta){

            $this->resultado=$this->conexion->query($consulta);
        }
        /*
         *
         * Recorre el resultado de la consulta. Una o varias filas de la BD
         */
        function recorrerFilas(){

            return $this->resultado->fetch_array();
        }
        /*
         *
         * Comprueba que mediante la consulta ejecutada ha habido cambios en alguna/s fila/s de la BD
         */
        function filasAfectadas(){

            return $this->conexion->affected_rows;
        }
        /*
         *
         * Comprueba el número de filas que devuelve la ejecución de la consulta
         */
        function numeroFilas(){

            return $this->resultado->num_rows;
        }
        /*
         *
         * En caso de producirse error, devuelve el número asociado al tipo de error que ha aparecido
         */
        function numeroError(){

            return $this->conexion->errno;
        }
        /**
         *
         * En caso de producirse error, devuelve texto descriptivo del tipo de error que ha aparecido
         */
        function error(){

            return $this->conexion->error;
        }
        /**
         *
         * Cerrar sesión en conexiones iniciadas
         */
        function cierreSesion(){

            $this->conexion->close();
        }

    }


?>