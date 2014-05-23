 <?php //http://stackoverflow.com/questions/18972518/rename-a-file-if-already-exists-php-upload-system
	require_once("../conecta.php");
	require_once("../executa.php");

	$titulo 			=	$_POST['titulo'];//String Texto

	$conteudo 			=	$_POST['conteudo'];
	$letters 			=	array('<html>', '<head>', '<title>', '</title>', '</head>', '<body>', '</body>', '</html>');
	$conteudo 			=	str_replace($letters, '', $conteudo);//String Texto

	$perfil				=	$_POST['perfil'];//String 00

	$pessoas 			=	$_POST['pessoas'];
	if($pessoas==null){} else {
		$pessoas 		=	substr($pessoas, 1);//String 0|0|0
	}

	$data_inicio		=	$_POST['data'];
	if($data_inicio==null){} else {
		$dataTotal			=	explode("/", $data_inicio);
		$data_inicio		=	$dataTotal[2].'-'.$dataTotal[1].'-'.$dataTotal[0];//String AAAA-MM-DD
	}
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
	$nome_video			=	$video['name'];
	$tmps_video			=	$video['tmp_name'];
	$types_video		=	$video['type'];
	$error_video		=	$video['error'];
	$qtd_video			=	count($nome_video);
	$dir_video			=	'assets/video/upload/';
	$uploadDir_video    =   '../../' . $dir_video;
	$videoTabelaId		=	'';

	//Valida se os campos obrigatórios foram preenchidos
	if($titulo==null || $conteudo==null || $perfil==null){

		echo '<script>window.location.assign("../../duvida-cadastro.php");</script>';

	} else {

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
			}
			$imagemTabelaId = substr($imagemTabelaId, 0, -1);//String 00-00-00-00-00
		}

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
			}
		}

		// VIDEOS ===========

		if($nome_video[0]==null){} else {//Se video foi enviado
		
			for($i = 0; $i < $qtd_video; $i++){

				//SE NOME EXISTE =========

				$namevideo = explode(".", $nome_video[$i]);

				$increment_video = ''; //start with no suffix

				$nome_videoFinal = '';

				for($j = 0; $j < (count($namevideo)-1); $j++){
					$nome_videoFinal = $nome_videoFinal . $namevideo[$j];
				}

				while(file_exists($uploadDir_video . $nome_videoFinal . $increment_video . '.' . end($namevideo))) {
				    $increment_video++;
				}

				$nome_video[$i] = $nome_videoFinal . $increment_video . '.' . end($namevideo);

				//SOBE NO SITE ===========

				move_uploaded_file($tmps_video[$i], $uploadDir_video.$nome_video[$i]);
				$insert_video = mysql_query("INSERT INTO DL_VIDEOS(caminho, nome_video) VALUES('$dir_video', '$nome_video[$i]')");
				$resulted_video = mysql_query($insert_video);	
				/*echo 'Imagem enviada com sucesso';
				echo '<br><img src="'.$uploadDir_video.$nome_img[$i].'">';
				echo '<br>';*/

				//O ID DA IMAGEM QUE SUBIU PARA SER USADO NO PRÓXIMO INSERT
				$videoTabelaId = $videoTabelaId . mysql_insert_id().'-';
			}
			$videoTabelaId = substr($videoTabelaId, 0, -1);//String 00-00-00-00-00
		}

		// ENVIO ===========

		$sqlFinal = "INSERT INTO DL_FORUM(titulo, texto, perfil, data, plantacao, imagem, video, tag, data_inicio, plantacao_dispositivo, umidade, umidade_do_solo, temperatura, chuva) VALUES('$titulo', '$conteudo', '$perfil', NOW(), '$plantacao', '$imagemTabelaId', '$videoTabelaId', '$pessoas', '$data_inicio', '$devicePlantacao', '$umidade', '$umidade_do_solo', '$temperatura', '$chuva')";
		mysqlexecuta($id, $sqlFinal);
		$duvidaPost = mysql_insert_id();

		// NOTIFICACOES ============

		if($pessoas==null){} else {
			$pessoasTotal = explode("|", $pessoas);
			foreach ($pessoasTotal as $unidade) {
				$insert_pessoa = mysql_query("INSERT INTO DL_NOTIFICATION(prestador, tomador, forum, tipo) VALUES('$perfil', '$unidade', '$duvidaPost', '1')");
				$resulted_pessoa = mysql_query($insert_pessoa);
			}
		}

		echo '<script>window.location.assign("../../duvida.php?numero=' . $duvidaPost . '");</script>';

	}//Valida se os campos obrigatórios foram preenchidos

?>