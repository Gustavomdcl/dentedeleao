<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Próximo Evento</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Próximo Evento">
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
							<li>Lista de Próximo Evento</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Próximo Evento <i class="fa fa-certificate"></i></h1>

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

									<li class="l-col12"><p class="btn">EVENTO #02 - PRÁTICAS DE CULTIVO E SERVIÇO 
										<a href="#confirm_form" data-id="1" data-email="1" class="icon excluir modal"><i class="fa fa-trash-o"></i></a>
										<a href="#edit_form" data-id="1" data-plantacao="1" data-img="1" class="icon editar modal"><i class="fa fa-pencil"></i></a>
									</p></li>
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

		<input type="text" value="EVENTO #02 - PRÁTICAS DE CULTIVO E SERVIÇO"><br>

		<textarea id="ckeditor" rows="3" cols="60" name="conteudo" placeholder="Descrição" required>
			<p class="posttexto">A segunda edição do Evento Raizes ocorrá na fazenda da <a href="perfil.php?produtor=2">Beatriz Victorio</a>, trará workshops e palestras relacionadas às boas práticas no cultivo orgânico e o ensino de inovação no atendimento e na prestação de serviços aos clientes.<br>
              Contará com no máximo 35 produtores.<br>
              As palestras serão:<br><br>
              1) "Inovação em Serviços, Como pensar de maneira sistêmica para impactar positivamente o cliente", na qual contaremos com a presença de Juliana Proserpio, Socia e Co-fundadora na empresa Design Echos, formada em Social Design, Social Innovation na instituição de ensino School of Visual Arts e na Hasso-Plattner-Institut em Berlim.<br>
              2) "1º curso prático de Agricultura Orgânica", palestra de Yoshio Tsuzuki, que, após uma profunda reflexão sobre o sistema convencional de agricultura baseado nos agroquímicos, resolveu mudar radicalmente seu enfoque, adotando desde então uma visão Holística  para o sistema, onde pragas e doenças nas plantas são encaradas como consequências e não causas dos problemas na Agricultura.<br>
              3) "Oficininha de Germinação e Panificação SEM GLUTÉN e Açúcar", realizado por Matheus Arantes, produtor alemão de pães orgânicos desde 1973.</p>
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