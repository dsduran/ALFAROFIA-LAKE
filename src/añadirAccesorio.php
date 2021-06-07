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
            if(empty($_POST["puestos"] && $_POST["nombre"] && $_POST["descripcion"] && $_POST["precio_dia"])){

                echo 'Debes de introducir todos los datos pedidos en el formulario <br/><br/>';
                echo '<a class="otro" href="añadirAccesorio.php">Volver a intentarlo</a>';
            }else{

                require 'operacionesBD.php';

                $conexionBD = new operacionesBD();

                $consulta = "INSERT INTO accesorios (Id_puesto,nombre,descripcion,precio_dia) VALUES ('".$_POST["puestos"]."', '".$_POST["nombre"]."', '".$_POST["descripcion"]."', '".$_POST["precio_dia"]."')";

                $conexionBD->ejecutarConsulta($consulta);

                if($conexionBD->filasAfectadas()){

                    echo 'Accesorio añadido al puesto <b>'.$_POST["puestos"].'</b><br/><br/>';
                    echo '<a class="otro" href="añadirAccesorio.php">Añadir otro accesorio</a>';
                }else{

                    echo 'Se ha producido un error al añadir el Accesorio <br/><br/>';
                    echo '<a class="otro" href="añadirAccesorio.php">Volver a intentarlo</a>';
                }
            }

        }else{  //Formulario de seleccion puesto a modificar.
            require 'operacionesBD.php';

            $conexionBD = new operacionesBD();

            $consulta = "Select * from puestos";
            $conexionBD->ejecutarConsulta($consulta);
            echo'
                <div id="añadirPuesto">
                    <form id="formularioPuesto" action="añadirAccesorio.php" method="POST">
                       <select name="puestos">
                       <option value="0">Selecciona Puesto</option>';

                        while ($valor = $conexionBD->recorrerFilas()) {
                            // En esta sección estamos llenando el select con datos extraidos de una base de datos.
                            echo '<option value="'.$valor["Id_puesto"].'">'.$valor["nombre"].'</option>';
                         }
                         echo '</select><br/><br/>
                         <label>Nombre</label><br/>
                         <input type="text" name="nombre"/> <br/><br/>
                         <label>Descripción</label><br/>
                         <input type="text" name="descripcion"/> <br/><br/>
                         <label>Precio (€/dia)</label><br/>
                         <input type="text" name="precio_dia"/> <br/><br/>                         
                         <input type="submit" name="enviar" value="Enviar"/>
                    </form><br/><br/>
                </div>
            ';
            echo '<a href="añadirAccesorio.php">Volver</a>';
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
