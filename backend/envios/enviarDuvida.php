 <?php //http://stackoverflow.com/questions/18972518/rename-a-file-if-already-exists-php-upload-system
	require_once("../conecta.php");
	require_once("../executa.php");

	$titulo 			=	$_POST['titulo'];//String Texto
	$conteudo 			=	$_POST['conteudo'];//String Texto

	$perfil				=	$_POST['perfil'];//String 00

	$pessoas 			=	$_POST['pessoas'];
	$pessoas 			=	substr($pessoas, 1);//String 0|0|0

	$data_inicio		=	$_POST['data'];
	$dataTotal			=	explode("/", $data_inicio);
	$data_inicio		=	$dataTotal[2].'-'.$dataTotal[1].'-'.$dataTotal[0];//String AAAA-MM-DD
	$data_fim			=	date('o\-m\-d') . " 23:59:59";

	$umidade;
	$umidade_do_solo;
	$temperatura;
	$chuva;

	$devicePlantacao 	=	$_POST['deviceplantation'];//String 0

	$plantacaoArr 		=	$_POST['plantacao'];
	$plantacao;
	foreach ($plantacaoArr as $value){
		$plantacao = $plantacao . '/' . $value;
	}
	$plantacao = substr($plantacao, 1);//String 00/00/00/00/00

	$imagens 			=	$_FILES['image'];
	$nome_img			=	$imagens['name'];
	$tmps				=	$imagens['tmp_name'];
	$types				=	$imagens['type'];
	$error_img			=	$imagens['error'];
	$qtd				=	count($nome_img);
	$dir				=	'assets/img/upload/';
	$uploadDir          =   '../../' . $dir;
	$imagemTabelaId		=	'';

	$video 				=	$_FILES['video'];

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
			$insertimg = mysql_query("INSERT INTO teste(caminho, nome_imagem) VALUES('$dir', '$nome_img[$i]')");
			$resultedimg = mysql_query($insertimg);	
			/*echo 'Imagem enviada com sucesso';
			echo '<br><img src="'.$uploadDir.$nome_img[$i].'">';
			echo '<br>';*/

			//O ID DA IMAGEM QUE SUBIU PARA SER USADO NO PRÓXIMO INSERT
			$imagemTabelaId = $imagemTabelaId . mysql_insert_id().'-';
		}

	}
	$imagemTabelaId = substr($imagemTabelaId, 0, -1);//String 00-00-00-00-00

	// DADOS ============

	$data_inicio_final;
	$data_fim_final;
	$dispositivo_final;

	if($devicePlantacao==null){} else {
		$sqlDispositivoUsuario = "SELECT * FROM DL_ADMIN_deviceuser WHERE data_fim > '$data_inicio' OR data_fim = '' AND usuario = '$perfil' AND plantacao = '$devicePlantacao' order by id desc limit 1";
		$resultDispositivoUsuario = mysql_query($sqlDispositivoUsuario);
		while ($row=mysql_fetch_array($resultDispositivoUsuario)) {
			$idDispositivoUsuario	=	$row['id'];
			$dispositivo 			=	$row['dispositivo'];
			$data_inicio_alpha 		=	$row['data_inicio'];
			$data_fim_alpha			=	$row['data_fim'];

			//Data Inicio

			if(strtotime($data_inicio_alpha) > strtotime($data_inicio)){
				$data_inicio_final = $data_inicio_alpha;
			} else if (strtotime($data_inicio_alpha) < strtotime($data_inicio)) {
				$data_inicio_final = $data_inicio;
			} else if (strtotime($data_inicio_alpha) == strtotime($data_inicio)) {
				$data_inicio_final = $data_inicio_alpha;
			}

			//Data Fim

			if($data_fim_alpha!=''){
				$data_fim_final = $data_fim_alpha;
			} else {
				$data_fim_final = $data_fim;
			}

			//Dispositivo

			$dispositivo_final = $dispositivo;

			//Calculo Final
			$dadosFinal = 0;
			$sqlDispositivoBeta = "SELECT * FROM DL_DEVICE WHERE data BETWEEN '$data_inicio_final' and '$data_fim_final' AND dispositivo = '$dispositivo_final' order by id asc";
			$resultDispositivoBeta = mysql_query($sqlDispositivoBeta);

			while ($row=mysql_fetch_array($resultDispositivoBeta)) {

				$umidade = $umidade + $row['umidade'];
				$umidade_do_solo = $umidade_do_solo + $row['umidade_do_solo'];
				$temperatura = $temperatura + $row['temperatura'];
				$chuva = $chuva + $row['chuva'];

				$dadosFinal = $dadosFinal + 1;

			}

			$umidade = intval($umidade/$dadosFinal);//String 00
			$umidade_do_solo = intval($umidade_do_solo/$dadosFinal);//String 00
			$temperatura = intval($temperatura/$dadosFinal);//String 00
			$chuva = intval($chuva/$dadosFinal);//String 00

			echo $umidade;
			echo '<br>';
			echo $umidade_do_solo;
			echo '<br>';
			echo $temperatura;
			echo '<br>';
			echo $chuva;
		}
	}

	// VIDEOS ===========

?>