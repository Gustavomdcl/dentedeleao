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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-resultado para .l-duvida-resultado ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-duvida-inicial">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Dúvidas</h2>
					</header>
					
					<form method="post" action="duvida-resultado.php">
						<input type="text" name="busca" placeholder="Pesquise aqui"><button type="submit">Buscar</button>
					</form><!-- barra de busca -->

					<h3>Dúvidas Recentes</h3>
					
					<ul id="conteudoDuvidas">
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						<li>
							<img src="" alt="nome do post" width="200" height="150" />
							<p class="postnome">Nome da Postagem</p>
							<a href="tag" title="Tag">Tag</a>
							<a href="duvida.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
						</li>
						
					</ul> <!-- #conteudoDuvidas -->
					<div id="paginacao">
						<ul>
							<li>1</li>
							<li>| <a href="#">2</a> |</li>
							<li><a href="#">3</a></li>
						</ul>
					</div><!-- #paginacao -->
					<hr />
					<div id="cadastrarDuvida">
						<p>Não encontrou uma solução para seu problema? Inicie uma nova dúvida!</p>
						<a href="duvida-inicial.php" title="Quero cadastrar minha dúvida" class="btCadastrarDuvida">Quero cadastrar minha dúvida</a>
					</div> <!-- #cadastrarDuvida -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-duvida-inicial -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

	<?php include 'template/footer.php'; ?>	

	</div><!-- #site -->
	
	<?php include 'template/script.php'; ?>
  	<script>
  		$('.scroll').jscroll();
  	</script>
</body>
</html>