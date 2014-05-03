 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$cod_profile = mysql_real_escape_string( $_GET['cod_profile'] );

	$plantacao = array();
	$listaPlantacoes;



	$sqlPlantacao = "SELECT plantacoes
			FROM DL_PROFILE
			WHERE id=$cod_profile
			ORDER BY id asc";
	$resPlantacao = mysql_query( $sqlPlantacao );
	while ( $row = mysql_fetch_assoc( $resPlantacao ) ) {
		$listaPlantacoes = $row['plantacoes'];
	}

	$listaPlantacoes = substr($listaPlantacoes, 1);

	$listaPlantacoesFinal = explode("/", $listaPlantacoes);

	foreach ($listaPlantacoesFinal as $key => $value) {
	    $PlantationVerify = mysql_query("SELECT * FROM DL_ADMIN_deviceuser WHERE data_fim = '' AND plantacao = '$value'");
		if(mysql_num_rows($PlantationVerify) > 0) {
			//echo 'tem';
			unset($listaPlantacoesFinal[$key]);
		} else {
			//echo 'nao tem';
		}
	}

	$sqlPlantacaoLista = "SELECT id, plantacao
			FROM DL_ADMIN_plantationList
			WHERE id IN (" . implode(',', $listaPlantacoesFinal) . ")
			AND valido = 1
			ORDER BY id asc";
	$resPlantacaoLista = mysql_query( $sqlPlantacaoLista );
	while ( $row = mysql_fetch_assoc( $resPlantacaoLista ) ) {
		$plantacao[] = array(
			'cod_plantacao'		=> $row['id'],
			'plantacao'			=> $row['plantacao'],
		);
	}

	echo( json_encode( $plantacao ) );
?>