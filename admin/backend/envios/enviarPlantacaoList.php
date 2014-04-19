 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	//Variáveis =========================

	$nomenovaplantacao 	=	$_POST['nomenovaplantacao'];

	$imgnovaplantacao 	=	$_FILES['imgnovaplantacao'];
	$nome_img			=	$imgnovaplantacao['name'];
	$tmps				=	$imgnovaplantacao['tmp_name'];
	$types				=	$imgnovaplantacao['type'];
	$error_img			=	$imgnovaplantacao['error'];
	$qtd				=	count($nome_img);
	$dir				=	'assets/img/upload/';
	$uploadDir          =   '../../../' . $dir;
	$imagemTabelaId		=	'';

	//Envio Plantacao ==================

	$plantacaoVerify = mysql_query("SELECT * FROM testenovo WHERE plantacao = '$nomenovaplantacao'");
	if(mysql_num_rows($plantacaoVerify) > 0) {
	    // echo 'tem';

		echo '<script>window.location.assign("../../lista-plantacao.php?error=' . $nomenovaplantacao . '");</script>';

	} else {
	    //echo 'nao tem';

	    //Upload de imagem ==================

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
				$insertimg = mysql_query("INSERT INTO teste (caminho, nome_imagem) VALUES('$dir', '$nome_img[$i]')");
				$resultedimg = mysql_query($insertimg);	

				//O ID DA IMAGEM QUE SUBIU PARA SER USADO NO PRÓXIMO INSERT
				$imagemTabelaId = $imagemTabelaId . mysql_insert_id().'-';
			}

		}

		$sql = "INSERT INTO testenovo(plantacao, imagem, valido) VALUES ('$nomenovaplantacao', '$imagemTabelaId', '1')";

		mysqlexecuta($id, $sql);

		echo '<script>window.location.assign("../../lista-plantacao.php");</script>';
	}

?>