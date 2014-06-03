<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Promoções</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Promoções">
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
							<li>Lista de Promoções</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Promoções <i class="fa fa-bullhorn"></i></h1>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cover -->

		<!-- new
		======================================================== -->
		<section class="l-new">

			<div class="l-container cf">

				<div class="l-row">

					<form id="formEmailList" method="post" action="">

					<div class="l-col12">

						<textarea id="ckeditor" rows="3" cols="60" name="conteudo" placeholder="Descrição" required></textarea>

					</div><!-- .l-col12 -->

					<div class="l-col10">

						<!--span class="input-field"><input type="text" name="email" id="email" placeholder="email@exemplo.com" class="error-left" required></span-->

					</div><!-- .l-col10 -->

					<div class="l-col2">

						<button type="submit"><span>Enviar</span> <i class="fa fa-caret-right"></i> </button>

					</div><!-- .l-col2 -->

					</form>

					<div class="l-col12">

						<?php

						$error = isset($_GET['error']) ? $_GET['error'] : null;
						if($error) {
							echo '<p class="btn">O email ' . $error . ' já existe <i class="fa fa-exclamation-triangle"></i></p>';
						}
						?>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-new -->

		<!-- dashboard
		======================================================== -->
		<section class="l-dashboard">

			<div class="l-container cf">

				<div class="l-row">

					<div class="l-col12">

						<div class="content">

							<h2>Promoções Cadastradas</h2>

							<nav>
								<ul class="l-row">

									<!--li class="l-col12"><p class="btn"><?php echo $email ?> <a href="#confirm_form" data-id="<?php echo $id ?>" data-email="<?php echo $email ?>" class="icon excluir modal"><i class="fa fa-trash-o"></i></a></p></li-->
								
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

		<p>Você realmente deseja deletar o email <span id="deletemailname"></span>?<p>

			<br>

		<form id="formDeletEmail" method="post" action="backend/deletes/deletarEmailList.php">

			<input type="hidden" name="deletemail" id="deletemail">

			<input type="hidden" name="deletid" id="deletid">

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
		//email
		$('#deletemailname').text($(this).attr('data-email'));
		$('#deletemail').val($(this).attr('data-email'));
		$('#deletid').val($(this).attr('data-id'));
	});
	$('.close-fancybox').click(function(){
		$.fancybox.close();
	});
	</script>

</body>
</html>