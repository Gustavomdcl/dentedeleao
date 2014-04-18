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
	var_dump($nome);
	var_dump($cpf);
	var_dump($email);

	var_dump($foto);
	var_dump($nome_img);
	var_dump($tmps);
	var_dump($types);
	var_dump($qtd);
	var_dump($dir);

	
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

			//O ID DA IMAGEM QUE SUBIU PARA SER USADO NO PRÓXIMO INSERT
			$imagemTabelaId = mysql_insert_id();
		}

	var_dump($telefone);
	var_dump($celular);

	var_dump($nomefazenda);
	var_dump($cnpjfazenda);

	var_dump($enderecofazenda);
	var_dump($cepfazenda);

	var_dump($estado);
	var_dump($cidade);

	echo "array( ";
	foreach ($platacao as $value){
		echo $value." ";
	}
	echo ")";

	var_dump($demaisplantacoes);

?>