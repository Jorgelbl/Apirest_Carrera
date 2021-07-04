<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=sac1",
						"root",
						"");
		$link->exec("set names utf8");

		return $link;

	}
}