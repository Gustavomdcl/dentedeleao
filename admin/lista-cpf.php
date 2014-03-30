<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Cpf</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Cpf">
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
							<li>Lista de Cpf</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Cpf <i class="fa fa-credit-card"></i></h1>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cover -->

		<!-- new
		======================================================== -->
		<section class="l-new">

			<div class="l-container cf">

				<div class="l-row">

					<form id="formCpfList" method="post" action="backend/envios/enviarCpfList.php">

					<div class="l-col10">

						<span class="input-field"><input type="text" name="cpf" id="cpf" placeholder="Insira o CPF" class="error-left" required></span>

					</div><!-- .l-col10 -->

					<div class="l-col2">

						<button type="submit"><span>Enviar</span> <i class="fa fa-caret-right"></i> </button>

					</div><!-- .l-col2 -->

					</form>

					<div class="l-col12">

						<?php

						$error = isset($_GET['error']) ? $_GET['error'] : null;
						if($error) {
							echo '<p class="btn">O cpf ' . $error . ' já existe <i class="fa fa-exclamation-triangle"></i></p>';
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

							<h2>Cpf's Cadastrados</h2>

							<nav>
								<ul class="l-row">
									<?php

									$sqlCpfList = "SELECT * FROM DL_ADMIN_cpfList order by id desc";

									$resultCpfList = mysql_query($sqlCpfList);

								   	while ($row=mysql_fetch_array($resultCpfList)) {
								   		$id=$row['id'];
										$cpf=$row['cpf'];

									?> 

									<li class="l-col12"><p class="btn"><?php echo $cpf ?> <a href="#confirm_form" title="" data-id="<?php echo $id ?>" data-cpf="<?php echo $cpf ?>" class="icon excluir modal"><i class="fa fa-trash-o"></i></a></p></li>

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

		<p>Você realmente deseja deletar o cpf <span id="deletcpfname"></span>?<p>

			<br>

		<form id="formDeletcpf" method="post" action="backend/deletes/deletarCpfList.php">

			<input type="hidden" name="deletcpf" id="deletcpf">

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
		//cpf
		$('#deletcpfname').text($(this).attr('data-cpf'));
		$('#deletcpf').val($(this).attr('data-cpf'));
		$('#deletid').val($(this).attr('data-id'));
	});
	$('.close-fancybox').click(function(){
		$.fancybox.close();
	});
	</script>

</body>
</html>