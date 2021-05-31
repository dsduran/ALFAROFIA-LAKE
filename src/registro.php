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
            require 'operacionesBD.php';    //Conexion con la clase

            $conexionBD = new operacionesBD();

            if(isset($_POST["registro"])){    //Comprueba que exista en botón Enviar.

                if(empty($_POST["nombre"] && $_POST["correo"] && $_POST["password1"] && $_POST["password2"] && $_POST["telefono"] && $_POST["direccion"])){

                    echo 'Debes rellenar todos los campos visibles en el formulario.<br/>';
                    echo '<a href="registro.php">Intentarlo de nuevo</a>';
                }else{

                    if($_POST["password1"] == $_POST["password2"]){ //Comprueba que las claves introducidas sean iguales.
                        $consulta = "INSERT INTO usuarios (nombre,correo,password,telefono,direccion,tipo) VALUES ('".$_POST["nombre"]."', '".$_POST["correo"]."', '".$_POST["password1"]."', '".$_POST["telefono"]."', '".$_POST["direccion"]."','c');";

                        $conexionBD->ejecutarConsulta($consulta);  //Ejecución de la consulta

                        $numeroError = $conexionBD->numeroError(); //Compruebo si hay errores

                        if($numeroError == 1062){ //Si el error es este número ya existe mismo correo en BD
                            echo 'El correo introducido ya se encuentra en la Base de Datos.<br/>';
                            echo '<a href="registro.php">Vuelva a intentarlo</a>';
                        }else{
                            if($conexionBD->filasAfectadas()){     //Comprueba el número de filas que contiene el resultado
                                echo 'Usuario registrado correctamente.<br/>';
                                echo '<a href="reservas.php">Iniciar Sesión</a>';
                            }else{ //En caso de no haber ninguna fila en el resultado de la consulta
                                echo 'Los datos introducidos son incorrectos.<br/>';
                                echo '<a href="reservas.php">Vuelva a intentarlo</a>';
                            }
                        }
                    }else{ //En caso de no coincidir las dos clavez introducidas
                        echo 'Las contraseñas introducidas no coinciden.<br/>';
                        echo '<a href="registro.php">Intentarlo de nuevo</a>';
                    }
                }
            }else{  //Formulario de inicio de sesión.
                echo '
                    <div id="registro">
                        <form action="registro.php" method="POST">
                            <label>Nombre</label><br/>
                            <input type="text" name="nombre"/><br/><br/>
                            <label>Correo electrónico</label><br/>
                            <input type="text" name="correo"/><br/><br/>
                            <label>Contraseña</label><br/>
                            <input type="password" name="password1"/><br/><br/>
                            <label>Repite Contraseña</label><br/>
                            <input type="password" name="password2"/><br/><br/>
                            <label>Telefono</label><br/>
                            <input type="text" name="telefono"/><br/><br/>
                            <label>Dirección</label><br/>
                            <input type="text" name="direccion"/><br/><br/><br/>
                            <input id="botonEnviar" type="submit" name="registro" value="Registrar"/>
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
