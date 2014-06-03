<?php
  require_once ("backend/header.php");
?><!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Projeto para Produtores Orgânicos - Cultive Ideias. Colha Conhecimento</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="INDEX, follow" />	
	<meta name="title" content="Dente de Leão | Cultive Ideias. Colha Conhecimento">
	<meta name="description" content="Projeto Dente de Leão busca a disseminação e troca do conhecimento tácito entre os produtores orgânicos para fortalecer o mercado e os laços entre a comunidade orgânica.">
	<!-- ADRIAN: Importante para acessibilidade e SEO. Coloque sempre o Título e a Descrição da página. Sempre coloque ali em cima no <title> também. Cada página precisa de um diferente. -->

	<?php include 'template/head.php'; ?>
	<!-- Fancybox CSS -->
  	<link rel="stylesheet" href="assets/css/jquery.fancybox.css">

	<!-- modernizr modernizr.com -->
	<script src="assets/min/modernizr.min.js"></script>
	
</head>

<body class="no-js">

	<!-- site
	======================================================== -->
	<div id="clima-img">
	<div id="clima-fx">
	<div id="site">

		<?php include 'template/header.php'; ?>

		<!-- .l-main
	    ======================================================== -->
	    <section class="l-main">

	      <div class="l-container cf">

	        <?php include 'template/sidebar.php'; ?>

	        <!-- .l-content
	        =================================================== -->
	        <section class="l-content">

				<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
				======================================================== -->
				<section class="l-evento-exibicao">

					<h3 class="title">Artigos e Notícias</h3>
					
					<h4 class="title post">Agricultura Orgânica cresce 30% ao ano NO BRASIL</h4>

					<div class="content-topo">

						<p class="evento-header">Por Carlota Cafiero | <span>25 de Maio de 2014</span></p>
						<div class="conteudo">
							<div class="retangle-img">
				              <a class="galeria-imagens" rel="imagenspost" href="assets/img/template/artigo-noticia.jpg"><img src="assets/img/upload/artigo-noticia.jpg" alt="Pessoa" border="0" /></a>
				            </div><!-- .retangle-img -->
							<p>Os alimentos org&acirc;nicos&nbsp;conquistam&nbsp;mais consumidores, como atestam produtores de hortali&ccedil;as, frutas e legumes do Vale do Ribeira e Alto Tiet&ecirc;, que participaram na manh&atilde; deste s&aacute;bado da 16&ordf; Feira de Produtos Org&acirc;nicos da Cidade, que &nbsp;acontece todo primeiro domingo do m&ecirc;s, das 9 &agrave;s 13 horas, no Jardim Bot&acirc;nico Chico Mendes, na Rua Doutor Jos&eacute; Dias de Morais, 801, &nbsp;Bom Retiro, Zona Noroeste.</p>

							<p>H&aacute; 12 anos trabalhando com agricultura sustent&aacute;vel, Geraldo de Lima Rodrigues J&uacute;nior viu a procura por org&acirc;nicos aumentar na &uacute;ltima d&eacute;cada. &ldquo;A demanda cresce de 20 a 30% ao ano&rdquo;, diz o agricultor de 28 anos, que afirma ser muito gratificante conhecer de perto os consumidores de seus produtos. &ldquo;O alimento &eacute; colhido e levado diretamente ao consumidor. &Eacute; muito bom quando as pessoas voltam contentes&rdquo;.</p>

							<p>O sabor mais acentuado dos legumes e frutas e a maciez e sucul&ecirc;ncia das hortali&ccedil;as s&atilde;o algumas qualidades destacadas pelos fregueses da Feira de Produtos Org&acirc;nicos de Santos. &ldquo;Sinto muita diferen&ccedil;a no sabor. A banana &eacute; muito mais docinha&rdquo;, disse a aposentada Regina Gon&ccedil;alves, adepta dos org&acirc;nicos desde 2005.</p>

							<p>Mas, e o pre&ccedil;o, tamb&eacute;m agrada? Apesar da expans&atilde;o na produ&ccedil;&atilde;o e consumo dos org&acirc;nicos no Brasil, a diferen&ccedil;a de pre&ccedil;os entre estes produtos e os convencionais ainda pode ser percebida pelo consumidor &ndash; nos supermercados, o alimento livre de agrot&oacute;xicos, horm&ocirc;nios e adubos qu&iacute;micos pode custar at&eacute; tr&ecirc;s vezes mais que os de produ&ccedil;&atilde;o em escala industrial.</p>

							<p>O ator Conrado Federici saiu da feira carregando bananas, couve, rabanetes e massa grande de pizza integral (por R$ 7,70). &ldquo;&Eacute; a primeira vez que venho aqui. Achei o pre&ccedil;o um pouco mais alto do que nos supermercados, mas acho que vai valer &agrave; pena&rdquo;, disse.</p>

						</div><!-- .conteudo -->

					</div><!-- .content-topo -->

					<div class="cadastrar-comentario">
						<h4 class="title post">Comentar Publicação</h4>
						<form id="enviarComentarioDuvida" method="post" action="">
							<textarea id="ckeditor" rows="4" cols="50" name="comment" > </textarea>
							<input type="hidden" name="duvida" value="<?php echo $profile_id; ?>"><!-- $duvidaPost; -->
							<input type="hidden" name="perfil" value="<?php echo $profile_id; ?>">
							<input type="hidden" name="dono" value="<?php echo $profile_id; ?>"><!-- $idPerfilDuvida; -->
							<button type="submit" class="enviar-comentario">Enviar</button>
						</form>
					</div><!-- .cadastrar-comentario -->
					
					<div id="comentario0" class="comentario">
						<p class="header-comment">Por <a href="perfil.php?produtor=3">Adriana Lima</a> | <span class="evento-header">26 de Maio de 2014</span></p>
						<div class="contetComment">Muito interessante, percebo esse crescimento no calculo do número de vendas que aprendi no workshop do último Evento Raizes.</div><!-- .contetComment -->
					</div><!-- #comentario -->

					<div id="comentario1" class="comentario">
						<p class="header-comment">Por <a href="perfil.php?produtor=4">Rafael</a> | <span class="evento-header">28 de Maio de 2014</span></p>
						<div class="contetComment">Interessante, acho que sentiremos cada vez mais esse crescimento.</div><!-- .contetComment -->
					</div><!-- #comentario -->

				</section><!-- .l-evento-exibicao -->

			</section><!-- .l-content -->

    	</div><!-- .l-container.cf -->

    </section><!-- .l-main -->

	<?php include 'template/footer.php'; ?>

	</div><!-- #site -->
	</div>
	</div>

	<?php include 'template/script.php'; ?>
  	<script src="assets/min/jquery.ui.min.js"></script>
  	<script src="assets/min/jquery.fancybox.min.js"></script>
  	<script>
  	$(".galeria-imagens").fancybox({
			'scrolling'		: 'no',
			'titleShow'		: false,
		});
  	</script>
</body>
</html>