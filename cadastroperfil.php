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

		<?php include 'template/header.php'; ?><!-- ADRIAN: Não delete isso pois é o cabeçalho do site, tudo bem? Ele está puxando o arquivo da pasta template. Ele vai repetir esse cabeçalho em todas as páginas -->

		<!-- ADRIAN: ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-cadastrarperfil para .l-cadastrarperfil ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-cadastrarperfil">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">

					<article>
						<header>
							<h2>Olá <span>Nome do usuário</span></h2>
							<p>Seja bem vindo ao Dente de Leão, uma plataforma que o auxiliará diariamente. Antes de começar a utilizá-la, queremos te conhecer!</p>
						</header>
						<div>

						</div>
					</article>

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cadastrarperfil -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<?php include 'template/footer.php'; ?><!-- ADRIAN: Não delete isso pois é o rodapé do site, tudo bem? Ele está puxando o arquivo da pasta template. Ele vai repetir esse rodapé em todas as páginas -->

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
  	<!-- Script do accordion -->
	<script>
		jQuery(function($){
		   $("#cpf").mask("999.999.999-99");
		});
	</script>

</body>
</html>