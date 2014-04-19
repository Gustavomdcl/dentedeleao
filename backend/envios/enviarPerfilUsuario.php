 <?php //http://stackoverflow.com/questions/18972518/rename-a-file-if-already-exists-php-upload-system
	require_once("../conecta.php");
	require_once("../executa.php");

	$caracteres = array(".", "-", " ", "(", ")", "[", "]", "/");

	$usuarioId 			=	$_POST['usuario'];
	$nome 				=	utf8_decode($_POST['nome']);
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

	$nomefazenda 		=	utf8_decode($_POST['nomefazenda']);
	$cnpjfazenda 		=	str_replace($caracteres, "", $_POST['cnpjfazenda']);

	$enderecofazenda 	=	utf8_decode($_POST['enderecofazenda']);
	$cepfazenda 		=	str_replace($caracteres, "", $_POST['cepfazenda']);

	$estado 			=	utf8_decode($_POST['estado']);
	$cidade 			=	utf8_decode($_POST['cidade']);

	$platacao 			=	$_POST['platacao'];

	$demaisplantacoes 	=	utf8_decode($_POST['demaisplantacoes']);

	// ==========

	var_dump($usuarioId);
	echo '<br>';
	var_dump($nome);
	echo '<br>';
	var_dump($cpf);
	echo '<br>';
	var_dump($email);
	echo '<br>';
	echo '<br>';

	var_dump($foto);
	echo '<br>';
	var_dump($nome_img);
	echo '<br>';
	var_dump($tmps);
	echo '<br>';
	var_dump($types);
	echo '<br>';
	var_dump($qtd);
	echo '<br>';
	var_dump($dir);
	echo '<br>';
	echo '<br>';

	
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
			echo 'Imagem enviada com sucesso';
			echo '<br><img src="'.$uploadDir.$nome_img[$i].'">';
	echo '<br>';

			//O ID DA IMAGEM QUE SUBIU PARA SER USADO NO PRÓXIMO INSERT
			$imagemTabelaId = $imagemTabelaId . mysql_insert_id().'-';
			echo $imagemTabelaId;
	echo '<br>';
	echo '<br>';
		}

	var_dump($telefone);
	echo '<br>';
	var_dump($celular);
	echo '<br>';
	echo '<br>';

	var_dump($nomefazenda);
	echo '<br>';
	var_dump($cnpjfazenda);
	echo '<br>';
	echo '<br>';

	var_dump($enderecofazenda);
	echo '<br>';
	var_dump($cepfazenda);
	echo '<br>';
	echo '<br>';

	var_dump($estado);
	echo '<br>';
	var_dump($cidade);
	echo '<br>';
	echo '<br>';

	echo "array( ";
	foreach ($platacao as $value){
		echo $value." ";
	}
	echo ")";
	echo '<br>';

	var_dump($demaisplantacoes);

?>