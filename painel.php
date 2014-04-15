<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>
</head>
<body>
	<?php echo $_SESSION['usuarioUserID']; echo $_SESSION['usuarioUserNome']; ?>
</body>
</html>