<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Eventos Anteriores</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Eventos Anteriores">
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
							<li>Lista de Eventos Anteriores</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Eventos Anteriores <i class="fa fa-calendar"></i></h1>

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

							<h2>Cadastrados</h2>

							<nav>
								<ul class="l-row">

									<li class="l-col12"><p class="btn">EVENTO #01 - PRÁTICAS DE CULTIVO E GESTÃO 
										<a href="#confirm_form" data-id="1" data-email="1" class="icon excluir modal"><i class="fa fa-trash-o"></i></a>
										<a href="#edit_form" data-id="1" data-plantacao="1" data-img="1" class="icon editar modal"><i class="fa fa-pencil"></i></a>
									</p></li>
								
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

		<p>Você realmente deseja deletar o evento <span id="deletemailname"></span>?<p>

			<br>

		<form id="formDeletEmail" method="post" action="">

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

	<div id="edit_form" class="modal-content" style="width:500px;min-height:200px;">

		<h2><i class="fa fa-exclamation-triangle"></i> Editar</h2>

		<input type="text" value="Evento #01 - Práticas de cultivo e gestão"><br>

		<textarea id="ckeditor" rows="3" cols="60" name="conteudo" placeholder="Descrição" required>
			<p class="posttexto"><p class="evento-header"><span>25 de Maio de 2014</span></p>
			<p>A primeira edição do evento, que ocorreu na sede da AAO no Parque da Água Branca, trouxe workshops/palestras relacionadas ao ensino financeiro e estratégico para os produtores orgânicos.</p>
			<p>Contou com aproximadamente 35 produtores de todo o pais.</p>
			<p>Tivemos destaque com a palestra "Perguntas e respostas básicas de Finanças", na qual contamos com a presença de Hugo Azevedo, operador de mercado que destilou de seu profundo conhecimento acadêmico e prático o cuidado de organizar cada pacote de perguntas seguindo uma ordem lógica e agrupando-as de maneira a permitir um aprendizado financeiro.</p>
			<p>Outro destaque foi a palestra da Dra. Ana Primavesi, primeira associada da AAO que recebeu o prêmio americano "One World Award" pela dedicação de uma vida inteira a favor da agricultura orgânica:</p>
			<p><em>"A Ecologia se refere ao sistema natural de cada local, envolvendo o solo, o clima, os seres vivos, bem como as inter-relações entre esses três componentes."</em></p>
		</textarea>

			<br>

		<form id="formDeletEmail" method="post" action="">

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
		/*$('#deletemailname').text($(this).attr('data-email'));
		$('#deletemail').val($(this).attr('data-email'));
		$('#deletid').val($(this).attr('data-id'));*/
	});
	$('.close-fancybox').click(function(){
		$.fancybox.close();
	});
	</script>

</body>
</html>