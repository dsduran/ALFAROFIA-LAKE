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
                require 'operacionesBD.php';

                $conexionBD = new operacionesBD();

                $consulta = "Select * from puestos";
                $conexionBD->ejecutarConsulta($consulta);

                echo '<h4>Puestos de Pesca en Alfarofia Lake</h4><br/>';
                while($valor = $conexionBD->recorrerFilas()){
                    echo'Nombre: '.$valor["nombre"].'<br/>Capacidad: '.$valor["capacidad"].'<br/>Precio/día: '.$valor["precio_dia"].'<br/><br/>';
                }
            ?>
        </article>
        <footer>
            <img id ="imgFooter" src="imagenes/logo.png">
        </footer><br>
    </body>
</html>
