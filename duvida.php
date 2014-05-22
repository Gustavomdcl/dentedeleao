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

		<!-- ADRIAN: ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-duvida-exibicao">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Minha Dúvida</h2>
					</header>
					
					<h3>Nome da Postagem</h3>
					<p>Por <a href="perfil.php" title="Nome da pessoa">Nome da pessoa</a> | <span>data da postagem</span> | <a href="" title="tag">Nome da categoria</a></p>
					<p>Conteúdo da postagem  Nulla auctor malesuada nunc viverra faucibus. Nulla viverra commodo quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; </p>
					<p>Já ouviram algo sobre? <b>Pessoa Marcada 1</b> <b>Pessoa marcada 2</b></p>
					<hr />
					<a class="galeria-imagens" rel="imagenspost" href="imagem-grande.jpg" title="Imagem 1"><img src="image_small_1.jpg" alt="Imagem 1" width="130" height="130"/></a>
					<a class="galeria-imagens" rel="imagenspost" href="" title="Imagem 2"><img src="image_small_2.jpg" alt="Imagem 2" width="130" height="130"/></a>
					<a class="galeria-imagens" rel="imagenspost" href="" title="Imagem 3"><img src="image_small_3.jpg" alt="Imagem 3" width="130" height="130"/></a>
					<a class="galeria-imagens" rel="imagenspost" href="" title="Imagem 4"><img src="image_small_4.jpg" alt="Imagem 4" width="130" height="130"/></a>
					<a class="galeria-imagens" rel="imagenspost" href="" title="Imagem 5"><img src="image_small_5.jpg" alt="Imagem 5" width="130" height="130"/></a>
					<hr />
					<video width="480" height="360" controls>
						Exibir video
					  <!--<source src="movie.mp4" type="video/mp4">
					  <source src="movie.ogg" type="video/ogg">-->
					
					</video>
					<hr />
					<h3>Comentários</h3>
					<form>
						<textarea rows="4" cols="50" name="comment" > </textarea>
						<button type="submit">Enviar Comentário</button>
					</form>
					<div id="comentario1" class="comentario">
						<p class="titulo"><b>Nome da pessoa</b> | data | horário </p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla auctor malesuada nunc viverra faucibus. Nulla viverra commodo quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam posuere lorem ipsum, at varius eros condimentum ac. Aenean eget elit vitae lacus tempus pretium. Integer vitae libero magna. Aenean sit amet ligula at dui tristique mattis. Suspendisse cursus rhoncus sem, eget fermentum ante hendrerit vel.</p>
					</div><!-- #comentario1-->
					<div id="comentario2" class="comentario">
						<p class="titulo"><b>Nome da pessoa</b> | data | horário </p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla auctor malesuada nunc viverra faucibus. Nulla viverra commodo quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam posuere lorem ipsum, at varius eros condimentum ac. </p>
					</div><!-- #comentario2-->
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-duvida-exibicao -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

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