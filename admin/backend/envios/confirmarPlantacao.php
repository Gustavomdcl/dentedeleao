 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$plantacao			=	$_POST['confirmplantacao'];
	$registeredId 		=	$_POST['confirmid'];

	$sql = "UPDATE DL_ADMIN_plantationList SET valido='1' WHERE id='$registeredId'";

	mysqlexecuta($id, $sql);

	echo '<script>window.location.assign("../../lista-plantacao.php");</script>';
?>