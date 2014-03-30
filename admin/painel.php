<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Painel Administrador</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Painel Administrador">
	<meta name="description" content="Administrador do site Dente de Leão">

	<?php include 'template/head.php'; ?>

	<!-- modernizr modernizr.com -->
	<script src="assets/min/modernizr.min.js"></script>

</head>

<body class="no-js">

	<!-- site
	======================================================== -->
	<div id="site">

		<?php include 'template/header.php'; ?>

		<!-- cover
		======================================================== -->
		<section class="l-cover">

			<div class="l-container cf">

				<div class="l-row">

					<div class="l-col12">

						<ul class="nav">
							<li><!--a href="painel.php" title="">Painel</a> /--></li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Painel <i class="fa fa-cogs"></i></h1>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cover -->

		<!-- dashboard
		======================================================== -->
		<section class="l-dashboard">

			<div class="l-container cf">

				<div class="l-row">

					<div class="l-col4">

						<div class="content">

							<h2>Usuários</h2>

							<nav>
								<ul>
									<li><a href="" title="" class="btn invalid">Registros <i class="fa fa-users"></i></a></li>
									<li><a href="" title="" class="btn invalid">Dispositivos <i class="fa fa-tachometer"></i></a></li>
								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col4 -->

					<div class="l-col4">

						<div class="content">

							<h2>Eventos</h2>

							<nav>
								<ul>
									<li><a href="" title="" class="btn invalid">Próximo Evento <i class="fa fa-certificate"></i></a></li>
									<li><a href="" title="" class="btn invalid">Eventos Anteriores <i class="fa fa-calendar"></i></a></li>
									<li><a href="" title="" class="btn invalid">Fazendas Disponíveis <i class="fa fa-map-marker"></i></a></li>
								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col4 -->

					<div class="l-col4">

						<div class="content">

							<h2>Listas</h2>

							<nav>
								<ul>
									<li><a href="lista-email.php" title="Lista de Email" class="btn">Lista de Email <i class="fa fa-envelope"></i></a></li>
									<li><a href="lista-cpf.php" title="" class="btn">Lista de CPF <i class="fa fa-credit-card"></i></a></li>
									<li><a href="" title="" class="btn invalid">Lista de Plantação <i class="fa fa-leaf"></i></a></li>
								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col4 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-dashboard -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>

</body>
</html>