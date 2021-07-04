<?php

$arrayRutas = explode("/", $_SERVER['REQUEST_URI']);

if (isset($_GET["page"]) && is_numeric($_GET["page"])) {
	
	$carrera = new ControladorCarrera();
	$carrera -> index($_GET["page"]);

}else{

	if (count(array_filter($arrayRutas)) == 0) {

		/*============================================
		Cuando no se hace ninguna petición a la API
		============================================*/

		$json = array(
			"detalle" => "no encontrado 1" 
		);

		echo json_encode($json, true);
		return;
	}else{
		/*============================================
		Cuando pasamos solo un índice en el array $arrayRutas
		============================================*/

		if (count(array_filter($arrayRutas)) == 1) {

			/*============================================
			Cuando se hace peticiones desde carrera
			============================================*/

			if (array_filter($arrayRutas)[1] == "carrera") {
				
				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$carrera = new ControladorCarrera();
					$carrera -> index(null);
				}
				/*============================================
				Peticiones POST
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array( "CARRERA"=>$_POST["CARRERA"],
									"RETICULA"=>$_POST["RETICULA"],
									"NIVEL_ESCOLAR"=>$_POST["NIVEL_ESCOLAR"],
									"CLAVE_OFICIAL"=>$_POST["CLAVE_OFICIAL"],
									"NOMBRE_CARRERA"=>$_POST["NOMBRE_CARRERA"],
									"NOMBRE_REDUCIDO"=>$_POST["NOMBRE_REDUCIDO"],
									"CARGA_MAXIMA"=>$_POST["CARGA_MAXIMA"],
									"CREDITOS_TOTALES"=>$_POST["CREDITOS_TOTALES"],
									"NIVEL"=>$_POST["NIVEL"],
									"MODALIDAD"=>$_POST["MODALIDAD"],);

					$crearCarrera = new ControladorCarrera();
					$crearCarrera -> create($datos);

					echo '<pre>'; print_r($_SERVER["REQUEST_METHOD"]); echo '</pre>';
					
					return;

				}else{
					$json = array(
						"detalle" => "no encontrado 2" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado 3" 
				);

				echo json_encode($json, true);
				return;
			}	
		}else{

			/*============================================
			Cuando se hace peticiones desde una sola carrera
			============================================*/

			if (array_filter($arrayRutas)[1] == "carrera" && is_numeric(array_filter($arrayRutas)[2])) {

				/*============================================
				Peticiones GET
				============================================*/

				if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "GET") {
					
					$carrera = new ControladorCarrera();
					$carrera -> show(array_filter($arrayRutas)[2]);
				}
				/*============================================
				Peticiones PUT
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "PUT") {

					/*============================================
					Capturar datos
					============================================*/

					$datos = array();
					
					parse_str(file_get_contents('php://input'), $datos);

					$editarCarrera = new ControladorCarrera();
					$editarCarrera -> update(array_filter($arrayRutas)[2], $datos);
				}
				/*============================================
				Peticiones DELETE
				============================================*/

				else if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "DELETE") {
					
					$borrarCarrera = new ControladorCarrera();
					$borrarCarrera -> delete(array_filter($arrayRutas)[2]);
				}else{
					$json = array(
						"detalle" => "no encontrado 4" 
					);

					echo json_encode($json, true);
					return;
				}
			}else{
				$json = array(
					"detalle" => "no encontrado 5" 
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
}