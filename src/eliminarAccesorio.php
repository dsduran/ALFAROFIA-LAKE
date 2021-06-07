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

            if(isset($_POST["enviar"])){    //Comprueba que exista en botón Enviar.

                require 'operacionesBD.php';    //Conexion con la clase

                $conexionBD = new operacionesBD();

                $consulta = "Select * from accesorios Where Id_Puesto = '".$_POST["puestos"]."';";
                $conexionBD->ejecutarConsulta($consulta);

                if($conexionBD->numeroFilas()){
                    while($valor = $conexionBD->recorrerFilas()) {
                        echo '<div id="divInfo">';
                         echo '<b><h2>Accesorio '.$valor["Id_accesorio"].'</h2></b><b>Nombre del Accesorio: </b>'.$valor["nombre"].'<br/><b>Precio (día): </b>'.$valor["precio_dia"].'<br/><br/>';
                         echo '<a class="otro" href="eliminarAccesorio1.php?accesorio='.$valor["Id_accesorio"].'">Eliminar Accesorio</a><br/><br/>';
                        echo '</div>';
                    }
                }else{
                    echo '<div id="divInfo">';
                    echo 'No hay accesorios asociados al puesto seleccionado<br/><br/>';
                    echo '<a class="otro" href="eliminarAccesorio.php">Volver</a>';
                    echo '</div>';
                }

            }else{  //Formulario de seleccion puesto a modificar.
                require 'operacionesBD.php';

                $conexionBD = new operacionesBD();

                $consulta = "Select * from puestos";
                $conexionBD->ejecutarConsulta($consulta);
                echo'
                            <div id="añadirPuesto">
                                <form id="formularioPuesto" action="eliminarAccesorio.php" method="POST">
                                    <label id="tituloForm">Selecciones Puesto</label><br/><br/>
                                    <select name="puestos">
                                        <option value="0">--Puestos--</option>';
                while ($valor = $conexionBD->recorrerFilas()) {
                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                    echo '<option value="'.$valor["Id_puesto"].'">'.$valor["nombre"].'</option>';
                }
                echo '</select><br/><br/>                            
                                         <input type="submit" name="enviar" value="Enviar"/>
                                </form><br/><br/>
                            </div>
                        ';
                echo '<a href="eliminarAccesorio.php">Volver</a>';
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
