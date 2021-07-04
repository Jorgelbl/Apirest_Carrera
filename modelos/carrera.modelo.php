<?php

require_once "conexion.php";

class ModeloCarrera{

	/*============================================
	Mostrar todas las carreras
	============================================*/

	static public function index($tabla, $cantidad, $desde){

		if ($cantidad != null) {
			
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_CARRERA, $tabla.CARRERA, $tabla.RETICULA, $tabla.NIVEL_ESCOLAR, $tabla.CLAVE_OFICIAL, $tabla.NOMBRE_CARRERA, $tabla.NOMBRE_REDUCIDO, $tabla.CARGA_MAXIMA, $tabla.CREDITOS_TOTALES, $tabla.NIVEL, $tabla.MODALIDAD FROM $tabla LIMIT $desde, $cantidad");

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_CARRERA, $tabla.CARRERA, $tabla.RETICULA, $tabla.NIVEL_ESCOLAR, $tabla.CLAVE_OFICIAL, $tabla.NOMBRE_CARRERA, $tabla.NOMBRE_REDUCIDO, $tabla.CARGA_MAXIMA, $tabla.CREDITOS_TOTALES, $tabla.NIVEL, $tabla.MODALIDAD FROM $tabla");

		}

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Creacion de una carrera
	============================================*/

	static public function create($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(CARRERA, RETICULA, NIVEL_ESCOLAR, CLAVE_OFICIAL, NOMBRE_CARRERA, NOMBRE_REDUCIDO, CARGA_MAXIMA, CREDITOS_TOTALES, NIVEL, MODALIDAD) VALUES (:CARRERA, :RETICULA, :NIVEL_ESCOLAR, :CLAVE_OFICIAL, :NOMBRE_CARRERA, :NOMBRE_REDUCIDO, :CARGA_MAXIMA, :CREDITOS_TOTALES, :NIVEL, :MODALIDAD)");

		$stmt -> bindParam(":CARRERA", $datos["CARRERA"], PDO::PARAM_STR);
		$stmt -> bindParam(":RETICULA", $datos["RETICULA"], PDO::PARAM_STR);
		$stmt -> bindParam(":NIVEL_ESCOLAR", $datos["NIVEL_ESCOLAR"], PDO::PARAM_STR);
		$stmt -> bindParam(":CLAVE_OFICIAL", $datos["CLAVE_OFICIAL"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOMBRE_CARRERA", $datos["NOMBRE_CARRERA"], PDO::PARAM_STR);
		$stmt -> bindParam(":NOMBRE_REDUCIDO", $datos["NOMBRE_REDUCIDO"], PDO::PARAM_STR);
		$stmt -> bindParam(":CARGA_MAXIMA", $datos["CARGA_MAXIMA"], PDO::PARAM_STR);
		$stmt -> bindParam(":CREDITOS_TOTALES", $datos["CREDITOS_TOTALES"], PDO::PARAM_STR);
		$stmt -> bindParam(":NIVEL", $datos["NIVEL"], PDO::PARAM_STR);
		$stmt -> bindParam(":MODALIDAD", $datos["MODALIDAD"], PDO::PARAM_STR);
		
		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Mostrar una sola carrera
	============================================*/

	static public function show($tabla, $id){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla.ID_CARRERA, $tabla.CARRERA, $tabla.RETICULA, $tabla.NIVEL_ESCOLAR, $tabla.CLAVE_OFICIAL, $tabla.NOMBRE_CARRERA, $tabla.NOMBRE_REDUCIDO, $tabla.CARGA_MAXIMA, $tabla.CREDITOS_TOTALES, $tabla.NIVEL, $tabla.MODALIDAD FROM $tabla WHERE $tabla.ID_CARRERA =:ID_CARRERA");
		
		$stmt -> bindParam(":ID_CARRERA", $id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll(PDO::FETCH_CLASS);
		$stmt -> close();
		$stmt = null;
	}

	/*============================================
	Actualizacion de una carrera
	============================================*/

	static public function update($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET CARRERA=:CARRERA,RETICULA=:RETICULA,NIVEL_ESCOLAR=:NIVEL_ESCOLAR,CLAVE_OFICIAL=:CLAVE_OFICIAL,NOMBRE_CARRERA=:NOMBRE_CARRERA, NOMBRE_REDUCIDO=:NOMBRE_REDUCIDO,CARGA_MAXIMA=:CARGA_MAXIMA,CREDITOS_TOTALES=:CREDITOS_TOTALES,NIVEL=:NIVEL,MODALIDAD=:MODALIDAD WHERE ID_CARRERA = :ID_CARRERA");

		$stmt -> bindParam(":ID_CARRERA", $datos["ID_CARRERA"], PDO::PARAM_INT);
		$stmt -> bindParam(":CARRERA", $datos["CARRERA"], PDO::PARAM_STR);
		$stmt -> bindParam(":RETICULA", $datos["RETICULA"], PDO::PARAM_STR);
		$stmt -> bindParam(":NIVEL_ESCOLAR", $datos["NIVEL_ESCOLAR"], PDO::PARAM_INT);
		$stmt -> bindParam(":CLAVE_OFICIAL", $datos["CLAVE_OFICIAL"], PDO::PARAM_INT);
		$stmt -> bindParam(":NOMBRE_CARRERA", $datos["NOMBRE_CARRERA"], PDO::PARAM_INT);
		$stmt -> bindParam(":NOMBRE_REDUCIDO", $datos["NOMBRE_REDUCIDO"], PDO::PARAM_INT);
		$stmt -> bindParam(":CARGA_MAXIMA", $datos["CARGA_MAXIMA"], PDO::PARAM_INT);
		$stmt -> bindParam(":CREDITOS_TOTALES", $datos["CREDITOS_TOTALES"], PDO::PARAM_STR);
		$stmt -> bindParam(":NIVEL", $datos["NIVEL"], PDO::PARAM_STR);
		$stmt -> bindParam(":MODALIDAD", $datos["MODALIDAD"], PDO::PARAM_STR);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
	/*============================================
	Borrar carrera 
	============================================*/

	static public function delete($tabla, $id){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE ID_CARRERA = :ID_CARRERA");

		$stmt -> bindParam(":ID_CARRERA", $id, PDO::PARAM_INT);

		if ($stmt -> execute()) {
			
			return "ok";

		}else{

			print_r(Conexion::conectar()->errorInfo());

		}

		$stmt-> close();
		$stmt= null;

	}
}