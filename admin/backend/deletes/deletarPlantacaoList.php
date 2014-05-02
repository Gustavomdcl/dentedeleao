 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$plantacao 			=	$_POST['deletplantacao'];

	$sql = "DELETE FROM DL_ADMIN_plantationList WHERE plantacao='$plantacao'";

	mysqlexecuta($id, $sql);

		echo '<script>window.location.assign("../../lista-plantacao.php");</script>';
?>