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

            $consulta = "DELETE from accesorios WHERE Id_accesorio = '".$_GET["accesorio"]."';";
            $conexionBD->ejecutarConsulta($consulta);


            if($conexionBD->filasAfectadas()){
                echo '<div id="divInfo">';
                echo 'Accesorio eliminado correctamente<br/>';
                echo '<a href="eliminarAccesorio.php">Eliminar otro accesorio</a>';
                echo '</div>';
            }else{
                echo '<div id="divInfo">';
                echo 'Se ha producido un error al eliminar el Accesorio seleccionado.<br/>';
                echo '<a href="eliminarAccesorio.php">Volver a intentarlo</a>';
                echo '</div>';
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
