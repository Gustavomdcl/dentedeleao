<!DOCTYPE html>
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

						<form id="formCadastroUsuario" method="post" action="backend/envios/enviarCadastroUsuario.php">

							<input type="text" name="nome" id="nome" placeholder="Nome" required>

							<input type="text" name="cpf" id="cpf" placeholder="CPF" required>

							<input type="text" name="email" id="email" placeholder="Email" required>

							<input type="password" name="senha" id="senha" placeholder="Senha" required>

							<button type="submit">Enviar</button>

						</form>

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