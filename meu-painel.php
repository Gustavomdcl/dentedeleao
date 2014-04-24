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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-painel">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Meu Painel</h2>
					</header>
					<div id="com-sensor">
						<h3>Dados recentes da plantação</h3>
						<p>Selecione abaixo a aba correspondente ao cultivo que deseja visualizar</p>
						
						<ul id="abas">
							<li><a class="tomate">Tomate</a></li>
							<li><a class="batata">Batata</a></li>
							<li><a class="morango">Morango</a></li>
							<li><a class="amora">Amora</a></li>
						</ul>
						<div id="resultados">
							<div id="tomate">
								<ul>
									<li>Dados da chuva</li>
									<li>Umidade do Solo</li>
									<li>Umidade</li>
									<li>Temperatura</li>
								</ul>
								<a href="#" title="Veja mais">Veja mais</a>
							</div>
							<div id="batata">
								<ul>
									<li>Dados da chuva</li>
									<li>Umidade do Solo</li>
									<li>Umidade</li>
									<li>Temperatura</li>
								</ul>
								<a href="#" title="Veja mais">Veja mais</a>
							</div>
							<div id="morango">
								<ul>
									<li>Dados da chuva</li>
									<li>Umidade do Solo</li>
									<li>Umidade</li>
									<li>Temperatura</li>
								</ul>
								<a href="#" title="Veja mais">Veja mais</a>
							</div>
							<div id="amora">
								<ul>
									<li>Dados da chuva</li>
									<li>Umidade do Solo</li>
									<li>Umidade</li>
									<li>Temperatura</li>
								</ul>
								<a href="#" title="Veja mais">Veja mais</a>
							</div>
						</div>
					</div>
					<div id="sem-sensor">
						<h3>Ainda não conhece o dispositivo?</h3>
						<p>Monitore sua plantação 24h por dia, tenha acesso a gráficos e comece um banco de dados de informações para saber como resolver seus problemas em qualquer situação.</p>
						<img src="" width="700" height="300" />
					</div>
					<hr />
					<h3>Notificações</h3>
					<p>Alguém te marcou</p>

					<ul id="notificacoes">
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
					</ul>
					<hr style="clear:both;" />
					<h3>Dúvidas postadas recentemente</h3>
					<p>Confira as últimas dúvidas e contribua</p>
					<ul id="duvidas-recentes">
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="linkdapostagem.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>

						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="linkdapostagem.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>

						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="linkdapostagem.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
					</ul>

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-duvida-exibicao -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

	<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
  	<script>
  		// Optional code to hide all divs
		$("div#resultados > div").hide();
		$("div#tomate").show();


		// Selector
		var divs = $("#tomate, #morango, #batata, #amora");

		// Show chosen div, and hide all others
		$("li a").click(function () {
		    $(divs).hide();
		    $("#" + $(this).attr("class")).show();
		});
  	</script>
</body>
</html>