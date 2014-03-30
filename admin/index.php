<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Admin</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Admin">
	<meta name="description" content="Administrador do site Dente de Leão">

	<?php include 'template/head.php'; ?>

	<!-- modernizr modernizr.com -->
	<script src="assets/min/modernizr.min.js"></script>

</head>

<body class="no-js">

	<!-- site
	======================================================== -->
	<div id="site">

		<!-- main
		======================================================== -->
		<section class="l-main">

			<div class="l-container cf">

				<div class="l-row">

					<div class="l-col12">

						<header><img src="assets/img/template/logo.gif" alt="Logo Dente de Leão"></header>

						<form id="formLogin" method="post" action="backend/valida.php">

							<span class="input-field"><input type="text" name="usuario" id="usuario" placeholder="Usuário" required></span><br>

							<span class="input-field"><input type="password" name="senha" id="senha" placeholder="Senha" required></span><br>

							<button type="submit"><span>Enviar</span> <i class="fa fa-caret-right"></i> </button>

						</form>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-main -->

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>

</body>
</html>