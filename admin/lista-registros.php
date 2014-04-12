<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Nome</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Registros">
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
							<li><a href="painel.php" title="">Painel</a> /</li>
							<li>Lista de Registros</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Registros <i class="fa fa-users"></i></h1>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cover -->

		<!-- dashboard
		======================================================== -->
		<section class="l-dashboard">

			<div class="l-container cf">

				<div class="l-row">

					<div class="l-col12">

						<div class="content">

							<h2>Últimos Registros</h2>

							<nav>
								<ul class="l-row">

									<li class="l-col12">
										<p class="btn l-row sumary">
											<span class="l-col4">Nome</span>
											<span class="l-col4">Cpf</span>
											<span class="l-col4">Email</span>
										</p>
									</li>

									<?php

									$sqlRegisteredList = "SELECT * FROM DL_ADMIN_registered WHERE aprovado = '0' order by id desc";

									$resultRegisteredList = mysql_query($sqlRegisteredList);

								   	while ($row=mysql_fetch_array($resultRegisteredList)) {
								   		$id=$row['id'];
										$nome=$row['nome'];
										$cpf=$row['cpf'];
										$email=$row['email'];
										$senha=$row['senha'];

									?> 

									<li class="l-col12">
										<p class="btn l-row">
											<span class="l-col4"><?php echo $nome ?></span>
											<span class="l-col4"><?php echo $cpf ?></span>
											<span class="l-col4"><?php echo $email ?></span>
											<a href="#confirm_form" title="" data-id="<?php echo $id ?>" data-nome="<?php echo $nome ?>" data-email="<?php echo $email ?>" data-senha="<?php echo $senha ?>" class="icon validar modal"><i class="fa fa-check"></i></a>
										</p>
									</li>

									<?php } ?>
								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-dashboard -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<div id="confirm_form" class="modal-content" style="width:500px;min-height:200px;">

		<h2><i class="fa fa-exclamation-triangle"></i> Atenção</h2>

			<br>

		<p>Você realmente deseja aprovar <span id="nomeselecionado"></span> para participar da plataforma?<p>

			<br>

		<form id="formConfirmNome" method="post" action="backend/envios/confirmarRegistro.php">

			<input type="hidden" name="confirmnome" id="confirmnome">

			<input type="hidden" name="confirmemail" id="confirmemail">

			<input type="hidden" name="confirmsenha" id="confirmsenha">

			<input type="hidden" name="confirmid" id="confirmid">

			<div class="l-row">
				<div class="l-col5">

					<button type="submit"><span>Confirmar</span></button>

				</div><!-- .l-col5 -->

				<div class="l-col2">

				</div><!-- .l-col2 -->

				<div class="l-col5">

					<button type="button" class="close-fancybox"><span>Cancelar</span></button>

				</div><!-- .l-col5 -->
			</div><!-- .l-row -->

		</form>

	</div>

	<?php include 'template/script.php'; ?>
	<script>
	$('.modal').click(function(){
		//nome
		$('#nomeselecionado').text($(this).attr('data-nome'));
		$('#confirmnome').val($(this).attr('data-nome'));
		$('#confirmemail').val($(this).attr('data-email'));
		$('#confirmsenha').val($(this).attr('data-senha'));
		$('#confirmid').val($(this).attr('data-id'));
	});
	$('.close-fancybox').click(function(){
		$.fancybox.close();
	});
	</script>

</body>
</html>