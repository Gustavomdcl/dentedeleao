 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$cod_device = mysql_real_escape_string( $_GET['cod_device'] );

	$data;
	$dataDevice;



	$sqlDevice = "SELECT data
			FROM DL_DEVICE
			WHERE dispositivo=$cod_device
			ORDER BY id desc
			limit 1";
	$resDevice = mysql_query( $sqlDevice );
	while ( $row = mysql_fetch_assoc( $resDevice ) ) {
		$dataDevice = explode(" ", $row['data']);
		$data[] = array(
			'last_data_device'		=> $dataDevice[0],
		);
	}

	echo( json_encode( $data ) );
?>