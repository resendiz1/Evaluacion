<?php 

Class conexion{

	static public function conectar(){
		$link = new PDO("mysql:host=localhost;dbname=DB_Univer_Prodesat","root","");


		return $link;
	}
}





 ?>