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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-produtores para .l-produtores ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-produtores">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Produtores</h2>
					</header>
					<form>
						<p>Buscar produtores</p>
						<select name="cultivo" id="cultivo">
						  <option value="Amora">Amora</option>
						  <option value="Banana">Banana</option>
						  <option value="Batata">Batata</option>
						  <option value="Maçã">Maçã</option>
						  <option value="Tomate">Tomate</option>
						</select><br>
						<select name="estado" id="estado">
						  <option value="Acre">AC</option>
						  <option value="Alagoas">AL</option>
						  <option value="Amapá">AP</option>
						  <option value="Amazonas">AM</option>
						  <option value="Bahia">BA</option>
						  <option value="Ceará">CE</option>
						  <option value="Distrito Federal">DF</option>
						  <option value="Espírito Santo">ES</option>
						  <option value="Goiás">GO</option>
						  <option value="Maranhão">MA</option>
						  <option value="Mato Grosso">MT</option>
						  <option value="Mato Grosso do Sul">MS</option>
						  <option value="Minas Gerais">MG</option>
						  <option value="Pará">PA</option>
						  <option value="Paraíba">PB</option>
						  <option value="Paraná">PR</option>
						  <option value="Pernambuco">PE</option>
						  <option value="Piauí">PI</option>
						  <option value="Rio de Janeiro">RJ</option>
						  <option value="Rio Grande do Norte">RN</option>
						  <option value="Rio Grande do Sul">RS</option>
						  <option value="Rondônia">RO</option>
						  <option value="Roraima">RR</option>
						  <option value="Santa Catarina">SC</option>
						  <option value="São Paulo" selected>SP</option>
						  <option value="Sergipe">SE</option>
						  <option value="Tocantins">TO</option>
						</select>
						<input type="text" name="cidade" placeholder="Cidade" id="cidade" required><br>
						<button type="submit">Buscar</button>
					</form>
					<hr />
					<div id="resultadoprodutores">
						<img src="mapa" width="800" height="300" />
						<ul>
							<li><img src="" width="150" height="150" />
								<strong>Nome</strong>
								<p>Telefone: (11) 12345-6789</p>
								<p>Sítio ALegria, Rua do Limão meu Limoeiro.</p>
								<p>CEP 06052-020 - Osasco-SP</p>
								<a href="" title="Saiba mais">Saiba mais</a>
							</li>
							<li><img src="" width="150" height="150" />
								<strong>Nome</strong>
								<p>Telefone: (11) 12345-6789</p>
								<p>Sítio ALegria, Rua do Limão meu Limoeiro.</p>
								<p>CEP 06052-020 - Osasco-SP</p>
								<a href="" title="Saiba mais">Saiba mais</a>
							</li> 
							<li><img src="" width="150" height="150" />
								<strong>Nome</strong>
								<p>Telefone: (11) 12345-6789</p>
								<p>Sítio ALegria, Rua do Limão meu Limoeiro.</p>
								<p>CEP 06052-020 - Osasco-SP</p>
								<a href="" title="Saiba mais">Saiba mais</a>
							</li> 
							<li><img src="" width="150" height="150" />
								<strong>Nome</strong>
								<p>Telefone: (11) 12345-6789</p>
								<p>Sítio ALegria, Rua do Limão meu Limoeiro.</p>
								<p>CEP 06052-020 - Osasco-SP</p>
								<a href="" title="Saiba mais">Saiba mais</a>
							</li>  
						</ul>
					</div>
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-produtores -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
  	
</body>
</html>