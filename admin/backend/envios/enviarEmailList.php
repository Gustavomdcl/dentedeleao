 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$email 			=	$_POST['email'];

	$emailVerify = mysql_query("SELECT * FROM DL_ADMIN_emailList WHERE email = '$email'");
	if(mysql_num_rows($emailVerify) > 0) {
	    // echo 'tem';

		echo '<script>window.location.assign("../../lista-email.php?error=' . $email . '");</script>';

	} else {
	    //echo 'nao tem';

		$sql = "INSERT INTO DL_ADMIN_emailList(email) VALUES ('$email')";

		mysqlexecuta($id, $sql);

		echo '<script>window.location.assign("../../lista-email.php");</script>';
	}

?>