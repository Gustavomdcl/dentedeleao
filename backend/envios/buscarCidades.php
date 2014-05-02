 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$cod_estados = mysql_real_escape_string( $_GET['cod_estados'] );

	$cidades = array();

	$sqlCity = "SELECT id, cidade
			FROM DL_CITY
			WHERE estado=$cod_estados
			ORDER BY id asc";
	$resCity = mysql_query( $sqlCity );
	while ( $row = mysql_fetch_assoc( $resCity ) ) {
		$cidades[] = array(
			'cod_cidades'		=> $row['id'],
			'cidade'			=> $row['cidade'],
		);
	}

	echo( json_encode( $cidades ) );
?>