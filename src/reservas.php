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
                echo '<link href="estilo.css" rel="stylesheet" type="text/css">';
                require 'operacionesBD.php';    //Conexion con la clase

                $conexionBD = new operacionesBD();

                if(isset($_POST["enviar"])){    //Comprueba que exista en botón Enviar.

                    $consulta = "SELECT * from usuarios Where correo = '".$_POST["correo"]."' && password = '".$_POST["password"]."';";

                    $resultado = $conexionBD->ejecutarConsulta($consulta);  //Ejecución de la consulta

                    if($conexionBD->numeroFilas()){     //Comprueba el número de filas que contiene el resultado
                        while($valor = $conexionBD->recorrerFilas()){   //recorre las filas resueltas

                            $_SESSION["Id_usuario"] = $valor["Id_usuario"];
                            $_SESSION["nombre"] = $valor["nombre"];

                            echo 'Sesión iniciada para el usuario '.$_SESSION["nombre"].'<br/><br/>';

                            if($valor["tipo"] == "a"){

                                echo '
                                    <div id="divContenedor">                                  
                                        <div class="divPuestos">
                                            <h2>Gestión de Puestos<h2/>
                                            <a href="añadirPuesto.php">Añadir un Puesto</a><br/>
                                            <a href="modificarPuesto.php">Modificar un Puesto</a><br/>
                                            <a href="eliminarPuesto.php">Eliminar un Puesto</a><br/>
                                            <a href="consultarPuesto.php">Consultar un Puesto</a>
                                        </div>
                                        <div class="divUsuarios">
                                            <h2>Gestión de Usuarios<h2/>
                                            <a href="eliminarUsuario.php">Eliminar un Usuario</a><br/>
                                            <a href="consultarUsuario.php">Consultar un Usuario</a>
                                        </div>
                                        <div class="divAccesorios">
                                            <h2>Gestión de Accesorios<h2/>
                                            <a href="añadirAccesorio.php">Añadir un Accesorios</a><br/>
                                            <a href="modificarAccesorio.php">Modificar un Accesorios</a><br/>
                                            <a href="eliminarAccesorio.php">Eliminar un Accesorios</a><br/>
                                            <a href="consultarAccesorio.php">Consultar un Accesorios</a>
                                        </div>
                                    </div>
                                ';
                            }
                            if($valor["tipo"] == "c"){

                                echo'
                                    <div class="divUsuarios">
                                        <h2>Gestión de Reservas<h2/>
                                        <a href="añadirReserva.php">Realizar una Reserva</a><br/>
                                        <a href="modificarReserva.php">Mis Reservas</a><br/><br/>
                                        <a href="cerrarSesión.php">Cerrar Sesión</a>
                                    </div>
                                ';
                            }
                        }
                    }else{ //En caso de no haber ninguna fila en el resultado de la consulta
                        echo 'Los datos introducidos son incorrectos.<br/>';
                        echo '<a href="reservas.php">Vuelva a intentarlo</a>';
                    }
                }else{  //Formulario de inicio de sesión.
                    echo '
                        <div id="inicioSesion">
                            <form action="reservas.php" method="POST">
                                <label>Correo electrónico</label><br/>
                                <input type="text" name="correo"/><br/><br/>
                                <label>Contraseña</label><br/>
                                <input type="password" name="password"/><br/><br/>
                                <input id="botonEnviar" type="submit" name="enviar" value="Enviar"/><br/><br/>
                                <a href="registro.php">¿No tienes cuenta? Registrate</a>
                            </form>
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
            <img id ="imgFooter" src="imagenes/logo.png">
        </footer><br>
    </body>
</html>
