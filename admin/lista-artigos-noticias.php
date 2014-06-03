<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Artigos e Notícias</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Artigos e Notícias">
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
							<li>Lista de Artigos e Notícias</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Artigos e Notícias <i class="fa fa-file-text"></i></h1>

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

									<li class="l-col12"><p class="btn">AGRICULTURA ORGÂNICA CRESCE 30% AO ANO NO BRASIL
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

		<input type="text" value="Agricultura Orgânica cresce 30% ao ano NO BRASIL"><br>

		<textarea id="ckeditor" rows="3" cols="60" name="conteudo" placeholder="Descrição" required>
			<p class="evento-header">Por Carlota Cafiero | <span>25 de Maio de 2014</span></p>
			<div class="retangle-img">
              <a class="galeria-imagens" rel="imagenspost" href="assets/img/template/artigo-noticia.jpg"><img src="assets/img/upload/artigo-noticia.jpg" alt="Pessoa" border="0"></a>
            </div><!-- .retangle-img -->
			<p>Os alimentos orgânicos&nbsp;conquistam&nbsp;mais consumidores, como atestam produtores de hortaliças, frutas e legumes do Vale do Ribeira e Alto Tietê, que participaram na manhã deste sábado da 16ª Feira de Produtos Orgânicos da Cidade, que &nbsp;acontece todo primeiro domingo do mês, das 9 às 13 horas, no Jardim Botânico Chico Mendes, na Rua Doutor José Dias de Morais, 801, &nbsp;Bom Retiro, Zona Noroeste.</p>

			<p>Há 12 anos trabalhando com agricultura sustentável, Geraldo de Lima Rodrigues Júnior viu a procura por orgânicos aumentar na última década. “A demanda cresce de 20 a 30% ao ano”, diz o agricultor de 28 anos, que afirma ser muito gratificante conhecer de perto os consumidores de seus produtos. “O alimento é colhido e levado diretamente ao consumidor. É muito bom quando as pessoas voltam contentes”.</p>

			<p>O sabor mais acentuado dos legumes e frutas e a maciez e suculência das hortaliças são algumas qualidades destacadas pelos fregueses da Feira de Produtos Orgânicos de Santos. “Sinto muita diferença no sabor. A banana é muito mais docinha”, disse a aposentada Regina Gonçalves, adepta dos orgânicos desde 2005.</p>

			<p>Mas, e o preço, também agrada? Apesar da expansão na produção e consumo dos orgânicos no Brasil, a diferença de preços entre estes produtos e os convencionais ainda pode ser percebida pelo consumidor – nos supermercados, o alimento livre de agrotóxicos, hormônios e adubos químicos pode custar até três vezes mais que os de produção em escala industrial.</p>

			<p>O ator Conrado Federici saiu da feira carregando bananas, couve, rabanetes e massa grande de pizza integral (por R$ 7,70). “É a primeira vez que venho aqui. Achei o preço um pouco mais alto do que nos supermercados, mas acho que vai valer à pena”, disse.</p>
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