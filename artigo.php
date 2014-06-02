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

						<p class="evento-header"><span>25 de Maio de 2014</span></p>
						<div class="conteudo">
							<div class="retangle-img">
				              <a class="galeria-imagens" rel="imagenspost" href="assets/img/template/artigo-noticia.jpg"><img src="assets/img/upload/artigo-noticia.jpg" alt="Pessoa" border="0" /></a>
				            </div><!-- .retangle-img -->
							<p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam</p>
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
						<div class="contetComment">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor amet invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam.</div><!-- .contetComment -->
					</div><!-- #comentario -->

					<div id="comentario1" class="comentario">
						<p class="header-comment">Por <a href="perfil.php?produtor=4">Rafael</a> | <span class="evento-header">28 de Maio de 2014</span></p>
						<div class="contetComment">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor amet invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam.</div><!-- .contetComment -->
					</div><!-- #comentario -->

				</section><!-- .l-evento-exibicao -->

			</section><!-- .l-content -->

    	</div><!-- .l-container.cf -->

    </section><!-- .l-main -->

	<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

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