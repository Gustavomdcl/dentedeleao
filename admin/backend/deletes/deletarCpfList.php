 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$cpf 			=	$_POST['deletcpf'];

	$sql = "DELETE FROM DL_ADMIN_cpfList WHERE cpf='$cpf'";

	mysqlexecuta($id, $sql);

		echo '<script>window.location.assign("../../lista-cpf.php");</script>';
?>