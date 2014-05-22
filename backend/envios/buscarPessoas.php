 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$term = mysql_real_escape_string( $_GET['term'] );

	$pessoas = array();

	$sqlPeople = "SELECT * FROM DL_PROFILE WHERE nome LIKE '%$term%'";
	$resPeople = mysql_query( $sqlPeople );
	while ( $row = mysql_fetch_assoc( $resPeople ) ) {

		$pessoaId=$row['id'];
		$nome=$row['nome'];
		$foto=$row['foto'];

		if($foto == null){ 
			$foto = 'admin/assets/img/template/logo.gif'; 
		} else {

			$fotoId = explode('-', $foto);

			$sqlFotoProfile = "SELECT * FROM DL_IMAGES WHERE id = '$fotoId[0]' order by id desc";
			$resultFotoProfile = mysql_query($sqlFotoProfile);

			while ($row=mysql_fetch_array($resultFotoProfile)) {
				$foto = $row['caminho'] . $row['nome_imagem'];
			}
		}

		$pessoas[] = array(
			'id'				=> $pessoaId,
			'label'				=> $nome,
			'value'				=> $foto,
		);
	}

	echo( json_encode( $pessoas ) );

	/*sleep( 3 );
	// no term passed - just exit early with no response
	if (empty($_GET['term'])) exit ;
	$q = strtolower($_GET["term"]);
	// remove slashes if they were magically added

	if (get_magic_quotes_gpc()) $q = stripslashes($q);
	$items = mysql_query("SELECT nome FROM DL_PROFILE WHERE nome LIKE '%$q%'");
	$result = array();
	foreach ($items as $key=>$value) {
	    if (strpos(strtolower($key), $q) !== false) {
	  array_push($result, array("id"=>$value, "label"=>$key, "value" => strip_tags($key)));
	    }
	    if (count($result) > 11)
	        break;
	}
	// json_encode is available in PHP 5.2 and above, or you can install a PECL module in earlier versions
	echo json_encode($result);*/
?>