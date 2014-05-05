<!DOCTYPE html>
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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-resultado para .l-duvida-resultado ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-notificacoes">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Notificações</h2>
					</header>
					
					<h3>Dúvidas em que você foi marcado</h3>
					
					<ul id="conteudoNotificacoes" class="scroll">
						
				            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
				              <b>Nome da pessoa</b>
				              <p>Nome da postagem</p>
				              <a href="link" >Saiba mais</a>
				            </li>

				            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
				              <b>Nome da pessoa</b>
				              <p>Nome da postagem</p>
				              <a href="link" >Saiba mais</a>
				            </li>

				            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
				              <b>Nome da pessoa</b>
				              <p>Nome da postagem</p>
				              <a href="link" >Saiba mais</a>
				            </li>

				            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
				              <b>Nome da pessoa</b>
				              <p>Nome da postagem</p>
				              <a href="link" >Saiba mais</a>
				            </li>

				            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
				              <b>Nome da pessoa</b>
				              <p>Nome da postagem</p>
				              <a href="link" >Saiba mais</a>
				            </li>

				            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
				              <b>Nome da pessoa</b>
				              <p>Nome da postagem</p>
				              <a href="link" >Saiba mais</a>
				            </li>
				        
					</ul> <!-- #conteudoNotificacoes -->
					
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-notificacoes -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

	<?php include 'template/footer.php'; ?>	

	</div><!-- #site -->
	
	<?php include 'template/script.php'; ?>
  	<script>
  		$('.scroll').jscroll();
  	</script>
</body>
</html>