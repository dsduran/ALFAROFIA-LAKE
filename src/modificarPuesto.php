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
                    <li><a href="inicialLago.html">Conoce el Lago</a></li>
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

                    $consulta = "Select * from puestos Where Id_Puesto = '".$_POST["puestos"]."';";
                    $conexionBD->ejecutarConsulta($consulta);

                    while($valor = $conexionBD->recorrerFilas()) {

                        echo 'Has seleccionado el Puesto '.$valor["nombre"].' para modificar. <br/>';
                        echo '<a href="modificarPuesto1.php?puesto='.$valor["Id_puesto"].'">Continuar</a>';
                    }
                }else{  //Formulario de seleccion puesto a modificar.
                    require 'operacionesBD.php';

                    $conexionBD = new operacionesBD();

                    $consulta = "Select * from puestos";
                    $conexionBD->ejecutarConsulta($consulta);
                    echo'
                        <h2>Modificación de Puestos</h2>
                        <form action="modificarPuesto.php" method="POST">
                            <select name="puestos">
                                <option value="0">Selecciona Puesto</option>';

                            while ($valor = $conexionBD->recorrerFilas()) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo '<option value="'.$valor["Id_puesto"].'">'.$valor["nombre"].'</option>';
                            }
                            echo '</select><br/><br/>                            
                            <input type="submit" name="enviar" value="Enviar"/>
                        </form><br/><br/>
                    ';

                    echo '<a href="modificarPuesto.html">Volver</a>';
                }
            ?>
        </article>
        <footer>
            <img id ="imgFooter" src="imagenes/logo.png">
        </footer><br>
    </body>
</html>