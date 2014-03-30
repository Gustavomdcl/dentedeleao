 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$cpf 			=	$_POST['cpf'];

	$cpfVerify = mysql_query("SELECT * FROM DL_ADMIN_cpfList WHERE cpf = '$cpf'");

	if(mysql_num_rows($cpfVerify) > 0) {
	    // echo 'tem';

		echo '<script>window.location.assign("../../lista-cpf.php?error=' . $cpf . '");</script>';

	} else {
	    //echo 'nao tem';

		$sql = "INSERT INTO DL_ADMIN_cpfList(cpf) VALUES ('$cpf')";

		mysqlexecuta($id, $sql);

			echo '<script>window.location.assign("../../lista-cpf.php");</script>';

	}
?>