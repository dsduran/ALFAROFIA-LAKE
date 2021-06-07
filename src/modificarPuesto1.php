<!--Daniel Sánchez-->
<html>
    <head>
        <title>Principal</title>
        <meta charset="UTF-8">
        <link href="estilo.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <header>
            <img id ="logo" src="imagenes/logo.png">
            <img id ="logo2" src="imagenes/lago2.jpg">
            <img id ="logo3" src="imagenes/bandera.jpg">
        </header>
        <article id="article1">
            <nav>
                <ul>
                    <li><a href="inicialLago.php">Conoce el Lago</a></li>
                    <li><a href="puestos.php">Nuestros Puestos</a>
                        <ul>
                            <li><a href="">Puesto 1</a></li>
                            <li><a href="">Puesto 2</a></li>
                            <li><a href="">Puesto 3</a></li>
                            <li><a href="">Puesto 4</a></li>
                        </ul>
                    </li>
                    <li><a href="llegar.php">¿Cómo llegar?</a></li>
                    <li><a href="reservas.php">Gestionar Reservas</a></li>
                </ul>
            </nav>
        </article>
        <article id="article2">
            <?php

            if(isset($_POST["modificar"])){    //Comprueba que exista en botón Enviar.

                require 'operacionesBD.php';    //Conexion con la clase

                $conexionBD = new operacionesBD();

                $consulta = "UPDATE puestos set nombre = '".$_POST["nombre"]."', capacidad = '".$_POST["capacidad"]."', precio_dia = '".$_POST["precio_dia"]."' WHERE Id_puesto = '".$_POST["puesto"]."';";
                $conexionBD->ejecutarConsulta($consulta);

                if($conexionBD->filasAfectadas()){
                    echo 'Puesto modificado correctamente<br/><br/>';
                    echo '<a class="otro" href="modificarPuesto.php">Modificar otro puesto</a>';
                }else{
                    echo 'Se ha producido un error al modificar el Puesto seleccionado.<br/><br/>';
                    echo '<a class="otro" href="modificarPuesto.php">Volver a intentarlo</a>';
                }

            }else{  //Formulario de seleccion puesto a modificar.
                require 'operacionesBD.php';    //Conexion con la clase

                $conexionBD = new operacionesBD();

                $consulta = "Select * from puestos Where Id_Puesto = '".$_GET["puesto"]."';";
                $conexionBD->ejecutarConsulta($consulta);

                while($valor = $conexionBD->recorrerFilas()) {
                    echo '
                    <div id="añadirPuesto">
                        <form id="formularioPuesto" action="modificarPuesto1.php" method="POST">
                            <label>Nombre del Puesto</label><br/>
                                <input type="text" name="nombre" value="' . $valor["nombre"] . '"/><br/><br/>
                                <label>Capacidad (Pescadores)</label><br/>
                                <input type="text" name="capacidad" value="' . $valor["capacidad"] . '"/><br/><br/>
                                <label>Precio (por día)</label><br/>
                                <input type="text" name="precio_dia" value="' . $valor["precio_dia"] . '"/><br/><br/> <br/>                                  
                                <input type="hidden" name="puesto" value="'.$_GET["puesto"].'"/>
                                <input type="submit" name="modificar" value="Modificar Puesto"/>
                        </form>
                    </div>
                ';
                }
            }
            ?>
        </article>
        <footer>
            <div id="div1">
                Elvas, Portugal<br><br>
                alfarofiaLake@gmail.com<br><br>
                06183 Elvas avenida Lago<br><br>
                924478946
            </div>
            <div id="div2">
                Politica de Privacidad<br><br>
                Política de Cookies<br><br>
                Aviso Legal<br><br>
                Condiciones de uso
            </div>
            <img id ="imgFooter" src="imagenes/logo.png">
        </footer><br>
    </body>
</html>
