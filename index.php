
<?php

require_once "controladores/rutas.controlador.php";
require_once "controladores/carrera.controlador.php";

require_once "modelos/carrera.modelo.php";

$rutas = new controladorRutas();
$rutas -> index();