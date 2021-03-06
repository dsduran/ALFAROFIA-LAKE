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

                    if(empty($_POST["nombre"] && $_POST["capacidad"] && $_POST["precio_dia"])){

                        echo 'Debes rellenar todos los campos visibles en el formulario.<br/><br/>';
                        echo '<a class="otro" href="añadirPuesto.php">Intentarlo de nuevo</a>';
                    }else{
                        $consulta = "INSERT INTO puestos (nombre,capacidad,precio_dia) VALUES ('".$_POST["nombre"]."', '".$_POST["capacidad"]."', '".$_POST["precio_dia"]."');";

                        $resultado = $conexionBD->ejecutarConsulta($consulta);  //Ejecución de la consulta

                        $numeroError = $conexionBD->numeroError(); //Compruebo si hay errores

                        if($numeroError == 1062){ //Si el error es este número ya existe mismo correo en BD
                            echo 'El nombre introducido pertenece a otro puesto de pesca.<br/>';
                            echo '<a href="añadirPuesto.php">Vuelva a intentarlo</a>';
                        }else{
                            if($conexionBD->filasAfectadas()){     //Comprueba el número de filas que contiene el resultado
                                echo 'Puesto de pesca añadido correctamente.<br/><br/>';
                                echo '<a class="otro" href="añadirPuesto.php">Registrar otro Puesto</a>';
                            }else{ //En caso de no haber ninguna fila en el resultado de la consulta
                                echo 'Los datos introducidos son incorrectos.<br/><br/>';
                                echo '<a class="otro" href="añadirPuesto.php">Vuelva a intentarlo</a>';
                            }
                        }
                    }
                }else{  //Formulario de inicio de sesión.
                    echo '
                        <div id="añadirPuesto">
                            <form id="formularioPuesto" action="añadirPuesto.php" method="POST">
                                <label id="tituloForm">¡Nuevo Puesto!</label><br/><br/>
                                <label>Nombre del Puesto</label><br/>
                                <input type="text" name="nombre"/><br/><br/>
                                <label>Capacidad (Pescadores)</label><br/>
                                <input type="text" name="capacidad"/><br/><br/>
                                <label>Precio (por día)</label><br/>
                                <input type="text" name="precio_dia"/><br/><br/> <br/>                                  
                                <input id="botonCrearPuesto" type="submit" name="registro" value="Crear Puesto"/>
                           </form>
                        </div><br/>
                     
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