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


                    require 'operacionesBD.php';

                    $conexionBD = new operacionesBD();
                    /*Asignar Id del usuario*/
                    $consulta = "Select * from usuarios where correo = '".$_POST["correo"]."'";
                    $resultado = $conexionBD->ejecutarConsulta($consulta);

                    if($valor = $conexionBD->recorrerFilas()){
                        $id = $valor["Id_usuario"];
                    }

                    /*Reserva de Puesto*/
                    $consulta1 = "INSERT INTO reservapuesto (Id_usuario, Id_puesto, fecha_inicio, fecha_fin, precio)
                     values (".$id.",'".$_POST["puesto"]."','".$_POST["entrada"]."','".$_POST["salida"]."',30)";

                    $conexionBD->ejecutarConsulta($consulta1);

                    if($conexionBD->filasAfectadas()){

                        if(isset($_POST["accesorios"])){
                            foreach($_POST["accesorios"] as $llave => $valor){
                                $consulta2 = "INSERT INTO reservaaccesorio (Id_usuario, Id_accesorio, fecha_inicio, fecha_fin, precio)
                                values (".$id.",'$valor','".$_POST["entrada"]."','".$_POST["salida"]."',30)";

                                $conexionBD->ejecutarConsulta($consulta2);
                            }
                                if($conexionBD->filasAfectadas()){

                                    echo 'Reserva de Puesto y Accesorio/s completada con éxito';
                                }else{

                                    echo 'Se ha producido un error en la reserva del accesorio.';
                                    echo '<a class="otro" href="añadirReserva2.php">Intentar de nuevo</a>';
                                }

                        }else{
                            echo 'Reserva de puesto realizada con éxito.';
                        }

                    }else{
                        echo 'Error al realizar la reserva del puesto seleccionado.';
                        echo '<a class="otro" href="añadirReserva2.php">Intentar de nuevo</a>';
                    }
            }else{  //Formulario de seleccion puesto a modificar.
                require 'operacionesBD.php';

                $conexionBD = new operacionesBD();

                $consulta = "Select * from accesorios where Id_puesto = '".$_GET["puesto"]."'";
                $conexionBD->ejecutarConsulta($consulta);
                echo'
                    <div id="añadirPuesto">
                        <form id="formularioPuesto" action="añadirReserva2.php" method="POST">                     
                            <label>Nombre</label><br/>
                            <input type="text" name="nombre"/><br/><br/>
                            <label>Correo</label><br/>
                            <input type="text" name="correo"/><br/><br/>
                            <label>Contraseña</label><br/>
                            <input type="password" name="passwrod"/><br/><br/>
                            <label>Repite Contraseña</label><br/>
                            <input type="password" name="passwrod1"/><br/><br/>
                            <div id="columna2">                                            
                            <label>Fecha de entrada</label><br/>
                            <input type="date" name="entrada"/><br/><br/>
                            <label>Fecha de salida</label><br/>
                            <input type="date" name="salida"/><br/><br/> 
                            <label>Selecciona Accesorios</label><br/><br/>';
                                while ($valor = $conexionBD->recorrerFilas()) {
                                    // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                                    echo '<input class="accesorio" type="checkbox" name="accesorios[]" value="'.$valor["Id_accesorio"].'">';
                                    echo '<label >'.$valor["nombre"].'</label><br/><br/>';
                                }echo'                        
                            <input type="hidden" name="puesto" value="'.$_GET["puesto"].'"/>
                            <input type="submit" name="enviar" value="Enviar"/>
                        </form><br/><br/>
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
