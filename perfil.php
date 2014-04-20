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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-perfil para .l-perfil ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-perfil">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>MEU PERFIL</h2>
					</header>
					<img src="" border="0" width="150" height="150" align="left" class="fotoperfil" />
					<div id="perfil-content">
						<h3>Nome do usuário</h3>
						<p><span>Sobre</span></p>
						<p style="clear:both;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nulla diam, fringilla sit amet vestibulum sit amet, elementum sed elit. Phasellus aliquet est nec erat laoreet consectetur quis eu eros. Ut sollicitudin odio et eleifend bibendum. Ut vel venenatis justo. Nulla sagittis urna sit amet purus varius, ut cursus elit vestibulum. Vestibulum accumsan ipsum in nibh adipiscing, sed tincidunt lacus condimentum. Suspendisse ultrices nulla a eros pharetra, sed fringilla ipsum blandit. Aliquam ultricies suscipit aliquet. Fusce diam neque, porttitor a est et, varius tristique elit. Fusce lacinia, erat sed auctor rutrum, eros eros congue quam, in porta justo elit ac leo. Phasellus consequat augue dapibus, ornare enim eu, faucibus neque. Nullam rutrum odio id orci posuere semper.</p>
						<p><span>Fazenda</span> 1234</p>
						<p><span>CNPJ</span> 1234</p>
						<p><span>Telefone</span> 1234</p>
						<p><span>Celular</span> 1234</p>
						<p><span>E-mail</span> 1234</p>
						<p><span>Localização</span></p>
						<img src="" alt="mapa" style="clear:both;"/>
						<p>Endereço</p>

					</div>
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-perfil -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->
	</div><!-- #site -->
	<?php include 'template/footer.php'; ?>
	<?php include 'template/script.php'; ?>
  	
</body>
</html>