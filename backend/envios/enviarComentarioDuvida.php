 <?php //http://stackoverflow.com/questions/18972518/rename-a-file-if-already-exists-php-upload-system
	require_once("../conecta.php");
	require_once("../executa.php");

	$duvida 			=	$_POST['duvida'];//String Texto

	$conteudo 			=	$_POST['comment'];
	$letters 			=	array('<html>', '<head>', '<title>', '</title>', '</head>', '<body>', '</body>', '</html>');
	$conteudo 			=	str_replace($letters, '', $conteudo);//String Texto

	$perfil				=	$_POST['perfil'];//String 00
	$dono				=	$_POST['dono'];//String 00

	//Valida se os campos obrigatórios foram preenchidos
	if($conteudo==null){

		echo '<script>window.location.assign("../../duvida.php?numero=' . $duvida . '");</script>';

	} else if ($duvida==null || $perfil==null || $dono==null) {

		echo '<script>window.location.assign("../../duvidas.php");</script>';

	} else {

		// ENVIO ===========

		$sqlFinal = "INSERT INTO DL_FORUM_coments(forum, perfil, texto, data) VALUES('$duvida', '$perfil', '$conteudo', NOW())";
		mysqlexecuta($id, $sqlFinal);

		// NOTIFICACOES ============

		$insertNotification = mysql_query("INSERT INTO DL_NOTIFICATION(prestador, tomador, forum, tipo) VALUES('$perfil', '$dono', '$duvida', '0')");
		$resultedNotification = mysql_query($insertNotification);

		echo '<script>window.location.assign("../../duvida.php?numero=' . $duvida . '");</script>';

	}//Valida se os campos obrigatórios foram preenchidos

?>