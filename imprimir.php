<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title> Operaciones con BD </title>
</head>
<body>
	<h1> Consulta con base de datos </h1>
	<?php 
		require_once("Alumno.php");
		require_once("ServidorBD.php");
	
		$cedula = $_POST['txtCedula'];
		$grupo = $_POST['txtGrupo'];
		$cuotaBase = $_POST['txtCuotaBase'];
	
		$alumno = new Alumno($cedula,$grupo,$cuotaBase);
		$bdAlumnos = new ServidorBD();
		$bdAlumnos->insertarAlumno($alumno);
		$bdAlumnos->obtenerAlumnos();
	?>
</body>
</html>
