<?php
// IDENTIFICA LOGIN ===================================
require_once ("backend/seguranca.php");
if(isset($_SESSION['usuarioUserID'])){ header("Location: painel.php"); }

// ERROR ==============================================
$error = isset($_GET['error']) ? $_GET['error'] : null;
if($error == "cadastrocpfexistente") {
	$mensagem = '<p>/!\ CPF Já Registrado /!\</p>';
} else if ($error == "cadastroemailexistente") {
	$mensagem = '<p>/!\ Email Já Registrado /!\</p>';
} else if ($error == "usuarionaoaprovado") {
	$mensagem = '<p>/!\ Usuário ainda não foi aprovado. Aguarde aprovação da nossa equipe. /!\</p>';
} else if ($error == "usuarionaoexiste") {
	$mensagem = '<p>/!\ Usuário não existe /!\</p>';
} else if ($error == "emailnaocadastrado") {
	$mensagem = '<p>/!\ Email não cadastrado /!\</p>';
}
// SUCESSO ==============================================
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : null;
if($sucesso == "aprovado") {
	$mensagem = '<p>/!\ Obrigado por cadastrar. <br> Verifique sua caixa de entrada, um email foi enviado para você validar seu usuário /!\</p>';
} else if ($sucesso == "validacao") {
	$mensagem = '<p>/!\ Obrigado por cadastrar. <br> Seu email está passando por um processo de validação, por favor aguarde o nosso contato por email /!\</p>';
} else if ($sucesso == "validado") {
	$mensagem = '<p>/!\ Seu cadastro foi confirmado com sucesso! /!\</p>';
} else if ($sucesso == "alterarsenha") {
	$mensagem = '<p>/!\ Um código para trocar sua senha foi enviado para o seu email. /!\</p>';
} else if ($sucesso == "senhaalterada") {
	$mensagem = '<p>/!\ Sua senha foi alterada! /!\</p>';
}

?><!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Projeto para Produtores Orgânicos - Cultive Ideias. Colha Conhecimento</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="INDEX, follow">	
	<meta name="title" content="Dente de Leão | Cultive Ideias. Colha Conhecimento">
	<meta name="description" content="Projeto Dente de Leão busca a disseminação e troca do conhecimento tácito entre os produtores orgânicos para fortalecer o mercado e os laços entre a comunidade orgânica.">
	<!-- ADRIAN: Importante para acessibilidade e SEO. Coloque sempre o Título e a Descrição da página. Sempre coloque ali em cima no <title> também. Cada página precisa de um diferente. -->

	<?php include 'template/head.php'; ?>
	<!-- Fancybox CSS -->
  	<link rel="stylesheet" href="assets/css/jquery.fancybox.css">

	<!-- modernizr modernizr.com -->
	<script src="assets/min/modernizr.min.js"></script>

</head>

<body class="no-js index">

	<!-- site
	======================================================== -->
	<div id="site">

		
		<!--<?php echo $mensagem; ?>-->
		<!-- MENSAGEM DE ERRO ADRIANA ARRASTE PARA ONDE PREFERIR. AS MENSAGENS ESTÃO NO TOPO DO ARQUIVO -->

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-login para .l-login ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-login">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
						
						
						
						<section class="beneficios">
							<h2>Benefícios:</h2>
							<ol>
								<li style="margin-top:65px;">Conversar com outros produtores que possuem o mesmo orgulho e prazer em cultivar alimentos saudáveis.<br><img src="assets/img/template/ondinhas.png" alt="ornamento" /></li>
								<li style="margin-top:95px;"><img src="assets/img/template/ondinhas.png" alt="ornamento" /><br>
									Obter respostas de colegas empenhados como você em ter uma plantação melhor a cada dia.</li> 								
								<li>Monitorar em tempo real dados como a umidade do ar e do solo temperatura e chuvas relacionadas a sua plantação. <br><img src="assets/img/template/ondinhas.png" alt="ornamento" /></li>
								<li>Ler artigos e notícias sobre diversos assuntos para ampliar sua visão de mercado, soluções, legislação entre outros <br><img src="assets/img/template/ondinhas.png" alt="ornamento" /></li>
								
							</ol>
						</section><!-- .beneficios -->
						<section class="como-funciona">
							<a id="videohome" href="https://www.youtube.com/watch?v=YJKESYJ4QW8?iframe">Como blevers</a>
							
						</section><!-- .como-funciona -->
						<!--<section class="contato">
							<h2>Contato</h2>
							<p>Ficou interessado ou quer saber mais sobre este projeto? Envie-nos uma mensagem respondendo ao formulário abaixo.</p>
							<form id="contatoHome">
								<input type="text" name="nome" placeholder="Nome" id="nome" required><br>

								<input type="email" name="email" placeholder="Email" id="email" required><br>

								<textarea rows="5" cols="60" name="conteudo" placeholder="Mensagem" required></textarea><br>

								<button type="submit">Enviar</button>
							</form>
						</section> contato-->
						<section class="sobre-projeto">
							<h2>Sobre o Projeto:</h2>
							<p>Com o objetivo de auxiliar produtores orgânicos em suas dúvidas e dificuldades cotidianas relacionadas a plantação, surgiu o projeto Dente de Leão. Nele você poderá trocar informações e conhecimentos com pessoas diretamente relacionadas às plantações e que possam ter passado pelas mesmas situações. A sabedoria que só se adquire na prática está aqui.</p>
						</section><!-- .sobre-projeto -->
						<section class="login">
							<header><h1><img src ="assets/img/template/logo-home.png" alt="Dente de Leão" border="none"></h1>
							<h2>Cultive ideias. Colha conhecimento.</h2></header>
								<div id="accordion">
									<a class="btcadastrar">Cadastrar</a>
									<form id="formCadastroUsuario" method="post" action="backend/envios/enviarCadastroUsuario.php" style="display:none;">

										<input type="text" name="nome" placeholder="Nome" id="nome" required><br>

										<input type="text" name="cpf" id="cpf" placeholder="CPF" required><br>

										<input type="email" name="email" placeholder="Email" id="email" required><br>

										<input type="password" name="senha" placeholder="Senha" id="senha" required><br>

										<p><input type="checkbox" name="termos" value="Termos e condições" class="termos" id="termos" required >Li e estou de acordo com os <a href="" title="termos e condições">Termos e condições</a> </p><br>

										<button type="submit">Cadastrar</button>
									</form>
								</div><!-- #accordion -->
							<p>ou <a href="#login_form" class="btLogar" id="homeLogin">Logar</a></p>

							<div style="display:none" >

								<form id="login_form" method="post" action="backend/valida.php">
								    
									<input type="text" name="usuario" id="usuario" placeholder="Usuário" required><br>

									<input type="password" name="senha" id="senha" placeholder="Senha" required><br>

									<input type="checkbox" name="conectado" value="Continuar Conectado">Continuar Conectado 
									
									<p><button type="submit">Fazer Login</button></p>
									
									<a href="#lembrar_form" id="lembrarSenha">Esqueceu sua senha?</a>
									
								</form>
							</div><!-- Div do formulario de login que abre com fancybox-->

							<div style="display:none" >

								<form id="lembrar_form" method="post" action="backend/envios/mudarSenha.php">
									<p>Não consegue lembrar sua senha? Digite abaixo seu e-mail que a enviaremos para você.</p>
									<input type="email" name="email" placeholder="Digite aqui seu e-mail" id="email"><br>
									<p><button type="submit">Enviar</button></p>
			
								</form>
							</div><!--Div reenvio de senha-->
						</section>
					
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-login -->

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
	<script src="assets/min/jquery.ui.min.js"></script>
  	<script src="assets/min/jquery.fancybox.min.js"></script>
  	<!-- Script do accordion -->
	<script>
		  $('#accordion a').click(function() {
		    $('#accordion form').slideDown();
		    $('.btcadastrar').hide();
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

		$("#videohome").click(function() {
	$.fancybox({
			'padding'		: 0,
			'autoScale'		: false,
			'transitionIn'	: 'none',
			'transitionOut'	: 'none',
			'title'			: this.title,
			'width'		: 680,
			'height'		: 495,
			'href'			: this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
			'type'			: 'swf',
			'swf'			: {
			   	 'wmode'		: 'transparent',
				'allowfullscreen'	: 'true'
			}
		});

	return false;
});

		jQuery(function($){
		   $("#cpf").mask("999.999.999-99");
		});
		$('.bt-saiba-mais').click(function() {
		    $('#saiba-mais').show();
		    $('.bt-saiba-mais').hide();
		  });
	</script>

</body>
</html>