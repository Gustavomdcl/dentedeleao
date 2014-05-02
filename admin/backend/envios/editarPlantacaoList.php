 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	//Variáveis =========================

	$plantacao 			=	$_POST['nomenovaplantacaoeditar'];
	$registeredId 		=	$_POST['idnovaplantacaoeditar'];

	$imagem 			=	$_FILES['imgnovaplantacaoeditar'];
	$nome_img			=	$imagem['name'];
	$tmps				=	$imagem['tmp_name'];
	$types				=	$imagem['type'];
	$error_img			=	$imagem['error'];
	$qtd				=	count($nome_img);
	$dir				=	'assets/img/upload/';
	$uploadDir          =   '../../../' . $dir;
	$imagemTabelaId		=	'';

	$sql = "UPDATE DL_ADMIN_plantationList SET plantacao='$plantacao' WHERE id='$registeredId'";

	mysqlexecuta($id, $sql);

	if ($nome_img[0] == null) {//imagem não existe
	} else {

		for($i = 0; $i < $qtd; $i++){

			//SE NOME EXISTE =========

			$nameimg = explode(".", $nome_img[$i]);

			$increment = ''; //start with no suffix

			$nome_imgFinal = '';

			for($j = 0; $j < (count($nameimg)-1); $j++){
				$nome_imgFinal = $nome_imgFinal . $nameimg[$j];
			}

			while(file_exists($uploadDir . $nome_imgFinal . $increment . '.' . end($nameimg))) {
			    $increment++;
			}

			$nome_img[$i] = $nome_imgFinal . $increment . '.' . end($nameimg);

			//SOBE NO SITE ===========

			move_uploaded_file($tmps[$i], $uploadDir.$nome_img[$i]);
			$insertimg = mysql_query("INSERT INTO DL_IMAGES (caminho, nome_imagem) VALUES('$dir', '$nome_img[$i]')");
			$resultedimg = mysql_query($insertimg);	

			//O ID DA IMAGEM QUE SUBIU PARA SER USADO NO PRÓXIMO INSERT
			$imagemTabelaId = $imagemTabelaId . mysql_insert_id().'-';
		}

		$sqlimg = "UPDATE DL_ADMIN_plantationList SET imagem='$imagemTabelaId' WHERE id='$registeredId'";

		mysqlexecuta($id, $sqlimg);

	}

	echo '<script>window.location.assign("../../lista-plantacao.php");</script>';
?>