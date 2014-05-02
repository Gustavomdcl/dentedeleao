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
	$lat 				=	$_POST['lat'];
	$long 				=	$_POST['long'];
	$cepfazenda 		=	str_replace($caracteres, "", $_POST['cepfazenda']);

	$estado 			=	utf8_decode($_POST['estado']);
	$cidade 			=	utf8_decode($_POST['cidade']);

	$platacao 			=	$_POST['platacao'];

	$demaisplantacoes 	=	utf8_decode($_POST['demaisplantacoes']);

	// ==========

	echo $usuarioId;
	echo '<br>';
	echo $nome;
	echo '<br>';
	echo $cpf;
	echo '<br>';
	echo $email;
	echo '<br>';
	echo '<br>';

	echo $foto;
	echo '<br>';
	echo $nome_img;
	echo '<br>';
	echo $tmps;
	echo '<br>';
	echo $types;
	echo '<br>';
	echo $qtd;
	echo '<br>';
	echo $dir;
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

	echo $telefone;
	echo '<br>';
	echo $celular;
	echo '<br>';
	echo '<br>';

	echo $nomefazenda;
	echo '<br>';
	echo $cnpjfazenda;
	echo '<br>';
	echo '<br>';

	echo $enderecofazenda;
	echo '<br>';
	echo $lat;
	echo '<br>';
	echo $long;
	echo '<br>';
	echo $cepfazenda;
	echo '<br>';
	echo '<br>';

	echo $estado;
	echo '<br>';
	echo $cidade;
	echo '<br>';
	echo '<br>';

	echo "array( ";
	foreach ($platacao as $value){
		echo $value." ";
	}
	echo ")";
	echo '<br>';

	echo $demaisplantacoes;

	$sql = "INSERT INTO testenovo(plantacao) VALUES ('$foto')";

	mysqlexecuta($id, $sql);

?>