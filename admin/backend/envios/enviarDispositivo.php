<?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$dispositivo 		=	$_POST['dispositivo'];
	$usuario 			=	$_POST['usuario'];
	$plantacao 			=	$_POST['plantacao'];
	$data_inicio		=	$_POST['data_inicio'];

	$sql = "INSERT INTO DL_ADMIN_deviceuser(dispositivo, usuario, plantacao, data_inicio) VALUES ('$dispositivo', '$usuario', '$plantacao', '$data_inicio')";
	mysqlexecuta($id, $sql);

	$sqlDisponibilidade = "UPDATE DL_DEVICE_code SET disponibilidade='1' WHERE codigo='$dispositivo'";
	mysqlexecuta($id, $sqlDisponibilidade);

	echo '<script>window.location.assign("../../lista-dispositivos.php");</script>';

?>