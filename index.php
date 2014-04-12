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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-login para .l-login ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-login">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">

					<article>
						<header><h1><img src ="" alt="Dente de Leão" border="none" /></h1>
						<h2>Cultive ideias. Colha conhecimento</h2></header>
							<div id="accordion">
								<a class"btCadastrar">Cadastrar</a>
								<form style="display:none;">
									<input type="text" name="nome" placeholder="Nome" /><br>
									<input type="text" name="cpf" id="cpf" placeholder="CPF" /><br>
									<input type="email" name="email" placeholder="E-mail" /><br>
									<input type="password" name="senha" placeholder="Senha" /><br>
									<input type="checkbox" name="termos" value="Termos e condições">Li e estou de acordo com os <a href="" title="termos e condições">Termos e condições</a> <br>
									<button type="submit">Cadastrar</button>
								</form>
							</div>
							
						<p>ou <a href="#login_form" class="btLogar" id="homeLogin">Logar</a></p>

						<div style="display:none" >
							<form id="login_form" method="post" action="">
							    
								<input type="text" name="nome" placeholder="Nome de usuário" /><br>
								<input type="password" name="senha" placeholder="Senha" /><br>
								<input type="checkbox" name="conectado" value="Continuar Conectado">Continuar Conectado 
								<p>
									<button type="submit">Fazer Login</button>
								</p>
								<a href="#lembrar_form" id="lembrarSenha">Esqueceu sua senha?</a>
								
							</form>
						</div>
						<div style="display:none" >

							<form id="lembrar_form" method="post" action="">
								<p>Não consegue lembrar sua senha? Digite abaixo seu e-mail que a enviaremos para você.</p>
								<input type="email" name="email" placeholder="Digite aqui seu e-mail" /><br>
								<p><button type="submit">Enviar</button></p>
		
							</form>
						</div>
						
						<footer><a>Saiba mais</a></footer>
					</article>

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-login -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<?php include 'template/footer.php'; ?><!-- ADRIAN: Não delete isso pois é o rodapé do site, tudo bem? Ele está puxando o arquivo da pasta template. Ele vai repetir esse rodapé em todas as páginas -->

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
  	<script src="assets/min/jquery.ui.min.js"></script>
  	<script src="assets/min/jquery.fancybox.min.js"></script>
  	<!-- Script do accordion -->
	<script>
		  $('#accordion a').click(function() {
		    $('#accordion form').slideDown();
		  });
	//<!-- botão login -->
	//<!-- scripts fancybox de login e recuperar senha -->
		$("#homeLogin").fancybox({
			'scrolling'		: 'no',
			'titleShow'		: false,
			'onClosed'		: function() {
			    $("#login_error").hide();
			}
		});

		$("#lembrarSenha").fancybox({
			'scrolling'		: 'no',
			'titleShow'		: false,
		});
		jQuery(function($){
		   $("#cpf").mask("999.999.999-99");
		});
	</script>

</body>
</html>