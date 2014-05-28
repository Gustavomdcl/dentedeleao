 <?php //http://stackoverflow.com/questions/18972518/rename-a-file-if-already-exists-php-upload-system
	require_once("../conecta.php");
	require_once("../executa.php");

	$caracteres = array(".", "-", " ", "(", ")", "[", "]", "/");

	$profile 			=	$_POST['profile'];
	$nome 				=	$_POST['nome'];

	$foto 				=	$_FILES['foto'];
	$nome_img			=	$foto['name'];
	$tmps				=	$foto['tmp_name'];
	$types				=	$foto['type'];
	$error_img			=	$foto['error'];
	$qtd				=	count($nome_img);
	$dir				=	'assets/img/upload/';
	$uploadDir          =   '../../' . $dir;
	$imagemTabelaId		=	'';

	$telefone   		=	$_POST['telefone'];
	$celular   			=	$_POST['celular'];

	$nomefazenda 		=	$_POST['nomefazenda'];
	$cnpjfazenda 		=	$_POST['cnpjfazenda'];

	$enderecofazenda 	=	$_POST['enderecofazenda'];
	$lat 				=	$_POST['lat'];
	$long 				=	$_POST['long'];
	$cepfazenda 		=	$_POST['cepfazenda'];

	$estado 			=	$_POST['estado'];
	$cidade 			=	$_POST['cidade'];

	$platacaoArr 		=	$_POST['platacao'];
	$plantacao;
	foreach ($platacaoArr as $value){
		$plantacao = $plantacao . '/' . $value;
	}

	$sobre 				=	$_POST['sobre'];

	if($profile==null){
		echo '<script>window.location.assign("../../painel.php");</script>';
	} else {

		//DEMAIS PLANTACOES ========

		$demaisplantacoes 	=	$_POST['demaisplantacoes'];
		if ($_POST['demaisplantacoes'] != null && $_POST['demaisplantacoes'] != 'null') {
			function multiexplode ($delimiters,$string) {
			    $ready = str_replace($delimiters, $delimiters[0], $string);
			    $launch = explode($delimiters[0], $ready);
			    return  $launch;
			}
			$condition = array(',' , ', ' , ' , ' , ' ,');
			$plantacoesValidar = multiexplode($condition, $demaisplantacoes);
			foreach ($plantacoesValidar as $values){

				$sqlPlantacaoValidar = "INSERT INTO DL_ADMIN_plantationList(plantacao, valido) VALUES ('$values', '0')";
				mysqlexecuta($id, $sqlPlantacaoValidar);
				$plantacao = $plantacao . '/' . mysql_insert_id();
			}
		}

		// NOME ==========

		if($nome==null){} else {//OK
			$sqlNome = "UPDATE DL_PROFILE SET nome='$nome' WHERE id='$profile'";
			mysqlexecuta($id, $sqlNome);
		}

		// IMAGENS ==========

		if($nome_img[0]==null){} else {//Se imagem foi enviada
		
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
				$insertimg = mysql_query("INSERT INTO DL_IMAGES(caminho, nome_imagem) VALUES('$dir', '$nome_img[$i]')");
				$resultedimg = mysql_query($insertimg);	
				/*echo 'Imagem enviada com sucesso';
				echo '<br><img src="'.$uploadDir.$nome_img[$i].'">';
				echo '<br>';*/

				//O ID DA IMAGEM QUE SUBIU PARA SER USADO NO PRÓXIMO INSERT
				$imagemTabelaId = $imagemTabelaId . mysql_insert_id().'-';
				$sqlImagem = "UPDATE DL_PROFILE SET foto='$imagemTabelaId' WHERE id='$profile'";
				mysqlexecuta($id, $sqlImagem);
			}

		}

		// TELEFONE ==========

		if($telefone==null){} else {//OK
			$telefone   		=	str_replace($caracteres, "", $telefone);
			$sqltelefone = "UPDATE DL_PROFILE SET telefone='$telefone' WHERE id='$profile'";
			mysqlexecuta($id, $sqltelefone);
		}

		// CELULAR ==========

		if($celular==null){} else {//OK
			$celular   			=	str_replace($caracteres, "", $celular);
			$sqlcelular = "UPDATE DL_PROFILE SET celular='$celular' WHERE id='$profile'";
			mysqlexecuta($id, $sqlcelular);
		}

		// FAZENDA ==========

		if($nomefazenda==null){} else {//OK
			$sqlnomefazenda = "UPDATE DL_PROFILE SET fazenda='$nomefazenda' WHERE id='$profile'";
			mysqlexecuta($id, $sqlnomefazenda);
		}

		// CNPJ ==========

		if($cnpjfazenda==null){} else {//OK
			$cnpjfazenda 		=	str_replace($caracteres, "", $cnpjfazenda);
			$sqlcnpjfazenda = "UPDATE DL_PROFILE SET cnpj='$cnpjfazenda' WHERE id='$profile'";
			mysqlexecuta($id, $sqlcnpjfazenda);
		}

		// ENDEREÇO ==========

		if($enderecofazenda==null){} else {//OK
			$sqlenderecofazenda = "UPDATE DL_PROFILE SET endereco='$enderecofazenda' WHERE id='$profile'";
			mysqlexecuta($id, $sqlenderecofazenda);
		}

		// LATITUDE ==========

		if($lat==null){} else {//OK
			$sqllat = "UPDATE DL_PROFILE SET latitude='$lat' WHERE id='$profile'";
			mysqlexecuta($id, $sqllat);
		}

		// LONGITUDE ==========

		if($long==null){} else {//OK
			$sqllong = "UPDATE DL_PROFILE SET longitude='$long' WHERE id='$profile'";
			mysqlexecuta($id, $sqllong);
		}

		// CEP ==========

		if($cepfazenda==null){} else {//OK
			$cepfazenda 		=	str_replace($caracteres, "", $cepfazenda);
			$sqlcepfazenda = "UPDATE DL_PROFILE SET cep='$cepfazenda' WHERE id='$profile'";
			mysqlexecuta($id, $sqlcepfazenda);
		}

		// ESTADO ==========

		if($estado==null){} else {//OK
			$sqlestado = "UPDATE DL_PROFILE SET estado='$estado' WHERE id='$profile'";
			mysqlexecuta($id, $sqlestado);
		}

		// CIDADE ==========

		if($cidade==null){} else {//OK
			$sqlcidade = "UPDATE DL_PROFILE SET cidade='$cidade' WHERE id='$profile'";
			mysqlexecuta($id, $sqlcidade);
		}

		//PLANTACAO ==========
		
		$sqlplantacao = "UPDATE DL_PROFILE SET plantacoes='$plantacao' WHERE id='$profile'";
		mysqlexecuta($id, $sqlplantacao);

		// SOBRE ==========

		if($sobre==null){} else {//OK
			$sqlsobre = "UPDATE DL_PROFILE SET sobre='$sobre' WHERE id='$profile'";
			mysqlexecuta($id, $sqlsobre);
		}

		// ENVIO ==========

		echo '<script>window.location.assign("../../perfil.php");</script>';
	}

?>