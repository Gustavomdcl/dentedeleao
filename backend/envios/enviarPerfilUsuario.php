 <?php //http://stackoverflow.com/questions/18972518/rename-a-file-if-already-exists-php-upload-system
	require_once("../conecta.php");
	require_once("../executa.php");

	$caracteres = array(".", "-", " ", "(", ")", "[", "]", "/");

	$usuarioId 			=	$_POST['usuario'];
	$nome 				=	$_POST['nome'];
	$cpf  				=	str_replace($caracteres, "", $_POST['cpf']);
	$email 				=	$_POST['email'];

	$foto 				=	$_FILES['foto'];
	$nome_img			=	$foto['name'];
	$tmps				=	$foto['tmp_name'];
	$types				=	$foto['type'];
	$error_img			=	$foto['error'];
	$qtd				=	count($nome_img);
	$dir				=	'assets/img/upload/';
	$uploadDir          =   '../../' . $dir;
	$imagemTabelaId		=	'';

	$telefone   		=	str_replace($caracteres, "", $_POST['telefone']);
	$celular   			=	str_replace($caracteres, "", $_POST['celular']);

	$nomefazenda 		=	$_POST['nomefazenda'];
	$cnpjfazenda 		=	str_replace($caracteres, "", $_POST['cnpjfazenda']);

	$enderecofazenda 	=	$_POST['enderecofazenda'];
	$lat 				=	$_POST['lat'];
	$long 				=	$_POST['long'];
	$cepfazenda 		=	str_replace($caracteres, "", $_POST['cepfazenda']);

	$estado 			=	$_POST['estado'];
	$cidade 			=	$_POST['cidade'];

	$platacaoArr 		=	$_POST['platacao'];
	$plantacao;
	foreach ($platacaoArr as $value){
		$plantacao = $plantacao . '/' . $value;
	}

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

	// IMAGENS ==========
	
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
	}

	// ENVIO ==========

	$sqlFinal = "INSERT INTO DL_PROFILE(usuario, nome, foto, cpf, email, telefone, celular, fazenda, cnpj, endereco, latitude, longitude, cep, estado, cidade, plantacoes) VALUES('$usuarioId', '$nome', '$imagemTabelaId', '$cpf', '$email', '$telefone', '$celular', '$nomefazenda', '$cnpjfazenda', '$enderecofazenda', '$lat', '$long', '$cepfazenda', '$estado', '$cidade', '$plantacao')";
	mysqlexecuta($id, $sqlFinal);

	$mensagemValidacao = 'primeiro-perfil-atualizado';

	echo '<script>window.location.assign("../../painel.php?sucesso=' . $mensagemValidacao . '");</script>';

?>