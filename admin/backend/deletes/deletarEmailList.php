 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$email 			=	$_POST['deletemail'];

	$sql = "DELETE FROM DL_ADMIN_emailList WHERE email='$email'";

	mysqlexecuta($id, $sql);

		echo '<script>window.location.assign("../../lista-email.php");</script>';
?>