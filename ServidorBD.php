<?php 
require_once("Alumno.php");
class ServidorBD {
	private $servidor;		// En Xampp es "localhost"
	private $usuario;			// En Xampp es "root"
	private $password;		// En Xampp es ""
	private $nombreBD;		// El nombre del archivo sql en phpmyadmin
	private $conexion;		// Para las operaciones con MySQL
	
	function __construct() {
		$this->servidor = "localhost";
		$this->usuario = "root";
		$this->password = "";
		$this->nombreBD = "ej_alumnos";
		$this->conexion = $this->nuevaConexion();
	}
/********************************************************************************/
// Funciones específicas de la tabla alumnos
	public function insertarAlumno($a) {
		$consulta = "INSERT INTO alumnos (cedula, grupo, cuotaBase)
              		VALUES ('$a->getCedula()','$a->getGrupo()','$a->getCuotaBase()')";

		$sentencia= $conexion->prepare($consulta);

		if ($sentencia != true) {
  			echo "\nPDO::errorInfo():\n";
  			print_r($conexion->errorInfo());
		}
		/* Ejecuta la sentencia SQL */
		$sentencia->execute();
	}
/********************************************************************************/	
	public function obtenerAlumnos() {
		$consulta = "SELECT cedula, grupo, cuotaBase FROM alumnos";
		$sentencia= $conexion->prepare($consulta);

		if ($sentencia != true) {
		  	echo "\nPDO::errorInfo():\n";
  			print_r($conexion->errorInfo());
		}
		/*Ejecuta la sentencia SQL*/
		$sentencia->execute();

		$numero = $sentencia->rowCount();
		if($num > 0){
    		$listado = [];
    		while($fila = $sentencia->fetch(PDO::FETCH_ASSOC)){
      		//array_push($listado, $fila);
      		$listado[] = $fila;
    		}
		}
		var_dump($listado);
		//return $listado;
	}	
/********************************************************************************/	
	public function nuevaConexion() {
		$con = null;
		try {
  			$con = new PDO('mysql:host='.$servidor.';dbname='.$nombreBD
  										.';charset=utf8',$usuario,$password);
  			echo "Conexión exitosa: $conexion";
		} catch (PDOException $excepcion) {
      	die($excepcion->getMessage());
		}
		return $con;
	}	
/********************************************************************************/		
}
/*
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "ej_personas";

try {
  $conn = new PDO('mysql:host='.$servername.';dbname='.$dbname.';charset=utf8', $username, $password);
  //echo "Estamos conectados";
} catch (PDOException $e) {
        die($e->getMessage());

}
*/



