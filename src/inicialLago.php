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
			<img id="imghistoria1" src="imagenes/hola1.png">
			<img id="imghistoria2" src="imagenes/hola2.png"><br><br><br>
			<?php
            require 'operacionesBD.php';    //Conexion con la clase

            $conexionBD = new operacionesBD();

            echo '<h1>Presentación</h1><br/><div id="inicialInfo">'.presentacion.'</div><br/>';
            echo '<h1>Historia</h1><br/><div id="inicialInfo">'.historia.'</div><br/>';
            echo '<h1>Detalles</h1><br/><div id="inicialInfo">'.lago.'</div><br/></div>';
            echo '<h1>Normas del Lago</h1><br/><div id="inicialInfo">'.normas.'</div>';
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