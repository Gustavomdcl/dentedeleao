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

<body class="no-js">

	<!-- site
	======================================================== -->
	<div id="site">

		<!-- ADRIAN: ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<!-- MENSAGEM DE ERRO ADRIANA ARRASTE PARA ONDE PREFERIR. AS MENSAGENS ESTÃO NO TOPO DO ARQUIVO -->
		<?php echo $mensagem; ?>
		<!-- MENSAGEM DE ERRO ADRIANA ARRASTE PARA ONDE PREFERIR. AS MENSAGENS ESTÃO NO TOPO DO ARQUIVO -->

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-login para .l-login ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-login">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">

					<header><h1><img src ="assets/img/template/dente-de-leao-logo.png" alt="Dente de Leão" border="none"></h1>
					<h2>Cultive ideias. Colha conhecimento.</h2></header>
						<div id="accordion">
							<a class="btcadastrar">Cadastrar</a>
							<form id="formCadastroUsuario" method="post" action="backend/envios/enviarCadastroUsuario.php" style="display:none;">
								<input type="text" name="nome" placeholder="Nome" required><br>
								<input type="text" name="cpf" id="cpf" placeholder="CPF" required><br>
								<input type="email" name="email" placeholder="Email" required><br>
								<input type="password" name="senha" placeholder="Senha" required><br>
								<p><input type="checkbox" name="termos" value="Termos e condições" class="termos" required >Li e estou de acordo com os <a href="" title="termos e condições">Termos e condições</a> </p><br>
								<button type="submit">Cadastrar</button>
							</form>
						</div>
						
					<p>ou <a href="#login_form" class="btLogar" id="homeLogin">Logar</a></p>

					<div style="display:none" >
						<form id="login_form" method="post" action="backend/valida.php">
						    
							<input type="text" name="usuario" id="usuario" placeholder="Email" required><br>
							<input type="password" name="senha" id="senha" placeholder="Senha" required><br>
							<input type="checkbox" name="conectado" value="Continuar Conectado">Continuar Conectado 
							<p><button type="submit">Fazer Login</button></p>
							<a href="#lembrar_form" id="lembrarSenha">Esqueceu sua senha?</a>
							
						</form>
					</div>
					<div style="display:none" >

						<form id="lembrar_form" method="post" action="backend/envios/mudarSenha.php">
							<p>Não consegue lembrar sua senha? Digite abaixo seu e-mail que a enviaremos para você.</p>
							<input type="email" name="email" placeholder="Digite aqui seu e-mail"><br>
							<p><button type="submit">Enviar</button></p>
	
						</form>
					</div>
					
					<footer><div id="saiba-mais"><a>Saiba mais</a></div></footer>

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
		jQuery(function($){
		   $("#cpf").mask("999.999.999-99");
		});
	</script>

</body>
</html>