<?php
	require_once("backend/conecta.php");
	require_once("backend/executa.php");

	$email = isset($_GET['usuario']) ? $_GET['usuario'] : null;
	$senha = isset($_GET['code']) ? $_GET['code'] : null;

	//Verifica se email e senha batem no banco DL_USER
	$userVerify = mysql_query("SELECT * FROM DL_USER WHERE usuario = '$email' AND senha = '$senha'");

	$mensagem = "";

	//Condições se existe um usuario no banco de dados ==============================
	if(mysql_num_rows($userVerify) > 0) {
		$mensagem = $email;
	} else {
		$mensagem = "false";
	}

?><!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>PROJETO</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="PROJETO">
	<meta name="description" content="PROJETO">

	<?php include 'template/head.php'; ?>

	<!-- modernizr modernizr.com -->
	<script src="assets/min/modernizr.min.js"></script>

</head>

<body class="no-js">

	<!-- site
	======================================================== -->
	<div id="site">

		<?php include 'template/header.php'; ?>

		<!-- main
		======================================================== -->
		<section class="l-main">

			<div class="l-container cf">

				<div class="l-main-content">

					<div class="l-row">

						<?php if($mensagem == "false" ) {
							echo "<p>Usuário não existe</p>";
						} else { ?>

						<form id="formMudarSenha" method="post" action="backend/envios/enviarNovaSenha.php">

							<input type="hidden" name="usuario" id="usuario" value="<?php echo $email; ?>">

							<input type="hidden" name="senhaantiga" id="senhaantiga" value="<?php echo $senha; ?>">

							<input type="password" name="novasenha" id="novasenha" placeholder="Nova Senha:" required>

							<button type="submit">Enviar</button>

						</form>

						<?php }//end else ?>

					</div><!-- .l-row -->

				</div><!-- .l-main-content -->

				<div class="l-main-sidebar">

				</div><!-- .l-main-sidebar -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-main -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>

</body>
</html>