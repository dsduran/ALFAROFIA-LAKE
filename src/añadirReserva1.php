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
                if(empty($_POST["puestos"] )){

                    echo 'Debes seleccionar un Puesto de pesca obligatoriamente <br/><br/>';
                    echo '<a class="otro" href="añadirReserva1.php">Volver a intentarlo</a>';
                }else{

                    require 'operacionesBD.php';

                    $conexionBD = new operacionesBD();

                    echo 'Has seleccionado el Puesto "'.$_POST["puestos"].'" para realizar la reserva <br/><br/>';
                    echo '<a class="otro" href="añadirReserva2.php?puesto='.$_POST["puestos"].'">Continuar</a>';
                }

            }else{  //Formulario de seleccion puesto a modificar.
                require 'operacionesBD.php';

                $conexionBD = new operacionesBD();

                $consulta = "Select * from puestos";
                $conexionBD->ejecutarConsulta($consulta);
                echo'                    
                    <div id="añadirPuesto">
                        <form id="formularioPuesto" action="añadirReserva1.php" method="POST">
                            <h3>Puesto a reservar</h3><br/>                                                
                            <select name="puestos">
                            <option value="0"></option>';
                            while ($valor = $conexionBD->recorrerFilas()) {
                                // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                echo '<option value="'.$valor["Id_puesto"].'">'.$valor["nombre"].'</option>';
                            }
                            echo '</select><br/><br/>
                            <input type="submit" name="enviar" value="Enviar"/>
                        </form><br/>
                    </div>
                ';
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
            <img id="imgFooter" src="imagenes/logo.png">
        </footer><br>
    </body>
</html>
