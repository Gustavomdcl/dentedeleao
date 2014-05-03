<?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$dispositivo 		=	$_POST['stopdispositivo'];
	$idDispositivo 		=	$_POST['stopid'];
	$data_fim			=	$_POST['data_fim'];

	$sql = "UPDATE DL_ADMIN_deviceuser SET data_fim='$data_fim' WHERE id='$idDispositivo'";
	mysqlexecuta($id, $sql);

	$sqlDisponibilidade = "UPDATE DL_DEVICE_code SET disponibilidade='0' WHERE codigo='$dispositivo'";
	mysqlexecuta($id, $sqlDisponibilidade);

	echo '<script>window.location.assign("../../lista-dispositivos.php");</script>';

?>