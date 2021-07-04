<?php

class ControladorCarrera{

	/*============================================
	Mostrar todos los registros
	============================================*/

	public function index($page){


		if ($page != null) {
			
			/*============================================
			Mostrar carreras con paginación
			============================================*/

			$cantidad = 10;
			$desde = ($page-1)*$cantidad;

			$carrera = ModeloCarrera::index("carrera", $cantidad, $desde);

		}else{

			/*============================================
			Mostrar todas las carreras
			============================================*/

			$carrera = ModeloCarrera::index("carrera", null, null);

		}

		
		if (!empty($carrera)) {
			

			$json = array(
				"status"=>200,
				"total_registros"=>count($carrera),
				"detalle"=> $carrera
			);

			echo json_encode($json, true);
			return;
		}else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ninguna carrera registrada"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Crear una carrera
	============================================*/

	public function create($datos){
		
		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}
		}

		/*============================================
		Validar que la reticula no esté repetida
		============================================*/

		$carrera = ModeloCarrera::index("carrera", null, null);
		foreach ($carrera as $key => $value) {
			
			if ($value->RETICULA == $datos["RETICULA"]) {

				$json = array(
					"status"=>404,
					"detalle"=>"La reticula ya existe en la base de datos"
				);

				echo json_encode($json, true);
				return;
			}
			
		}

		/*============================================
		Llevar datos al modelo
		============================================*/

		$datos = array( "CARRERA"=>$datos["CARRERA"],
						"RETICULA"=>$datos["RETICULA"],
						"NIVEL_ESCOLAR"=>$datos["NIVEL_ESCOLAR"],
						"CLAVE_OFICIAL"=>$datos["CLAVE_OFICIAL"],
						"NOMBRE_CARRERA"=>$datos["NOMBRE_CARRERA"],
						"NOMBRE_REDUCIDO"=>$datos["NOMBRE_REDUCIDO"],
						"CARGA_MAXIMA"=>$datos["CARGA_MAXIMA"],
						"CREDITOS_TOTALES"=>$datos["CREDITOS_TOTALES"],
						"NIVEL"=>$datos["NIVEL"],
						"MODALIDAD"=>$datos["MODALIDAD"]);


		$create = ModeloCarrera::create("carrera", $datos);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($create == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Su registro ha sido guardado"
			);

			echo json_encode($json, true);
			return;
		}
	}
	/*============================================
	Mostrando una sola carrera
	============================================*/

	public function show($id){
			
		/*============================================
		Mostrar todas las carreras
		============================================*/

		$carrera = ModeloCarrera::show("carrera", $id);

		if (!empty($carrera)) {
			

			$json = array(
				"status"=>200,
				"detalle"=> $carrera
			);

			echo json_encode($json, true);
			return;
		}else{

			$json = array(
				"status"=>200,
				"total_registros"=>0,
				"detalle"=> "No hay ninguna carrera registrada"
			);

			echo json_encode($json, true);
			return;

		}

	}
	/*============================================
	Editar una carrera
	============================================*/

	public function update($id, $datos){

		/*============================================
		Validar datos
		============================================*/

		foreach ($datos as $key => $valueDatos) {
	
			if (isset($ValueDatos) && !preg_match('/^[(\\)\\=\\&\\$\\;\\-\\_\\*\\"\\<\\>\\?\\¿\\!\\¡\\:\\,\\.\\0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]+$/', $ValueDatos)) {

				$json = array(
					"status"=>404,
					"detalle"=>"Error en el campo nombre".$key
				);

				echo json_encode($json, true);
				return;
			}

			/*============================================
			Llevar datos al modelo
			============================================*/

			$datos = array( "ID_CARRERA"=>$id,
							"CARRERA"=>$datos["CARRERA"],
							"RETICULA"=>$datos["RETICULA"],
							"NIVEL_ESCOLAR"=>$datos["NIVEL_ESCOLAR"],
							"CLAVE_OFICIAL"=>$datos["CLAVE_OFICIAL"],
							"NOMBRE_CARRERA"=>$datos["NOMBRE_CARRERA"],
							"NOMBRE_REDUCIDO"=>$datos["NOMBRE_REDUCIDO"],
						    "CARGA_MAXIMA"=>$datos["CARGA_MAXIMA"],
						    "CREDITOS_TOTALES"=>$datos["CREDITOS_TOTALES"],
						    "NIVEL"=>$datos["NIVEL"],
						    "MODALIDAD"=>$datos["MODALIDAD"]);

			$update = ModeloCarrera::update("carrera", $datos);
			/*============================================
			Respuesta del modelo
			============================================*/

			if ($update == "ok") {

				$json = array(
					"status"=>200,
					"detalle"=>"Su registro ha sido actualizado"
				);

				echo json_encode($json, true);
				return;
			}
		}
	}
	/*============================================
	Borrar carrera
	============================================*/

	public function delete($id){

		/*============================================
		Llevar datos al modelo
		============================================*/

		$delete = ModeloCarrera::delete("carrera", $id);
		/*============================================
		Respuesta del modelo
		============================================*/

		if ($delete == "ok") {

			$json = array(
				"status"=>200,
				"detalle"=>"Se ha borrado con éxito"
			);

			echo json_encode($json, true);
			return;
		}
	}
}