<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");

  // VARIAVEIS GLOBAIS ==================================
  $usuarioLogadoID = $_SESSION['usuarioUserID'];
  $usuarioLogadoEmail = $_SESSION['usuarioUserNome'];

  // VALIDA PERFIL ======================================
  $perfilCriado = mysql_query("SELECT * FROM DL_PROFILE WHERE usuario = '$usuarioLogadoID'");

  if(mysql_num_rows($perfilCriado) > 0) {} else {
  	header("Location: cadastroperfil.php");
  }

?><!DOCTYPE html>
<html lang="pt_BR">
<head>
</head>
<body>
	<?php echo $_SESSION['usuarioUserID']; echo $_SESSION['usuarioUserNome']; ?>
</body>
</html>