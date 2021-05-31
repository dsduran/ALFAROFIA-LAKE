<?php

    session_start();

    require 'operacionesBD.php';

    $conexionBD = new operacionesBD();

    $conexionBD->cierreSesion();

    echo 'Sesión cerrada. <br/><br/>';
    echo'<a href="reservas.php">Volver al Inicio de Sesión</a>';





?>
