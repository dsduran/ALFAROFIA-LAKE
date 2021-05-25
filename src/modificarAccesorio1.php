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

    if(isset($_POST["modificar"])){    //Comprueba que exista en botón Enviar.

        require 'operacionesBD.php';    //Conexion con la clase

        $conexionBD = new operacionesBD();

        $consulta = "UPDATE accesorios set nombre = '".$_POST["nombre"]."', descripcion = '".$_POST["descripcion"]."', precio_dia = '".$_POST["precio_dia"]."' WHERE Id_accesorio = '".$_POST["accesorio"]."';";
        $conexionBD->ejecutarConsulta($consulta);

        if($conexionBD->filasAfectadas()){
            echo 'Accesorio modificado correctamente<br/>';
            echo '<a href="modificarAccesorio.php">Modificar otro puesto</a>';
        }else{
            echo 'Se ha producido un error al modificar el Puesto seleccionado.<br/>';
            echo '<a href="modificarAccesorio.php">Volver a intentarlo</a>';
        }

    }else{  //Formulario de seleccion accesorio a modificar.
        require 'operacionesBD.php';    //Conexion con la clase

        $conexionBD = new operacionesBD();

        $consulta = "Select * from accesorios Where Id_accesorio = '".$_GET["accesorio"]."';";
        $conexionBD->ejecutarConsulta($consulta);

        while($valor = $conexionBD->recorrerFilas()) {
            echo '
                    <div id="añadirPuesto">
                        <form id="formularioPuesto" action="modificarAccesorio1.php" method="POST">
                            <label>Nombre del Puesto</label><br/>
                                <input type="text" name="nombre" value="' . $valor["nombre"] . '"/><br/><br/>
                                <label>Capacidad (Pescadores)</label><br/>
                                <input type="text" name="descripcion" value="' . $valor["descripcion"] . '"/><br/><br/>
                                <label>Precio (por día)</label><br/>
                                <input type="text" name="precio_dia" value="' . $valor["precio_dia"] . '"/><br/><br/> <br/>                                  
                                <input type="hidden" name="accesorio" value="'.$_GET["accesorio"].'"/>
                                <input type="submit" name="modificar" value="Modificar Accesorio"/>
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
