 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$dispositivo 		=	$_POST['deletdispositivo'];
	$idDispositivo 		=	$_POST['deletid'];

	$sql = "DELETE FROM DL_ADMIN_deviceuser WHERE id='$idDispositivo'";
	mysqlexecuta($id, $sql);

	$sqlDisponibilidade = "UPDATE DL_DEVICE_code SET disponibilidade='0' WHERE codigo='$dispositivo'";
	mysqlexecuta($id, $sqlDisponibilidade);

		echo '<script>window.location.assign("../../lista-dispositivos.php");</script>';
?>