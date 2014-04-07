 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$nome 			=	utf8_decode($_POST['nome']);
	$cpf 			=	$_POST['cpf'];
	$email 			=	$_POST['email'];
	$senha 			=	md5($_POST['senha']);

	//Verifica se email ou cpf existem no banco
	$emailVerify = mysql_query("SELECT * FROM DL_ADMIN_emailList WHERE email = '$email'");
	$cpfVerify = mysql_query("SELECT * FROM DL_ADMIN_cpfList WHERE cpf = '$cpf'");

	//Informações para envio de email ==============================
	if (!isset($_POST))
	    die("N&atilde;o recebi nenhum par&acitc;metro. Por favor volte ao formulario.html antes");
	if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
	    $emailsender = 'seu@e-mail.com.br';
	} else {
	    $emailsender = "contato@" . $_SERVER[HTTP_HOST];
	}

	if (PHP_OS == "Linux") {
	    $quebra_linha = "\n";
	} elseif (PHP_OS == "WINNT") {
	    $quebra_linha = "\r\n";
	} else {
	    die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
	}

	$emailremetente = $email;
	$emaildestinatario = $email;
	$comcopia = $email;
	$comcopiaoculta = $email;

	//Condições se foi encontrado ou não no banco ==============================
	if(mysql_num_rows($cpfVerify) > 0 || mysql_num_rows($emailVerify) > 0) {
	    //echo 'tem';

	    echo 'Obrigado por cadastrar. <br> Verifique sua caixa de entrada, um email foi enviado para você validar seu usuário';

	    $mensagemHTML = utf8_decode('<img src="assets/img/template/logo.gif" alt="Logo Dente de Leão">
	    <p>Olá,' . $nome . ', tudo bem? Obrigado pelo cadastro!</p>
	    <p>Para começar, acesse esse link para validar seu email:</p>
		<p><a href="http://www.dentedeleao.agr.br" target="_blank">http://www.dentedeleao.agr.br</a></p>
		<p>Qualquer dúvida, entre em contato: (011) 99973-5872</p>
	    <br>
	    <p>Dente de Leão. Cultive Ideias, Colha Conhecimento.</p>
		<hr>');

		//echo '<script>window.location.assign("../../lista-cpf.php?error=' . $cpf . '");</script>';

	} else {
	    //echo 'nao tem';

	    echo 'Obrigado por cadastrar. <br> Seu email está passando por um processo de validação, por favor aguarde Verifique sua caixa de entrada, um email foi enviado para você validar seu usuário';

	   	$mensagemHTML = utf8_decode('<img src="assets/img/template/logo.gif" alt="Logo Dente de Leão">
	    <p>Olá,' . $nome . ', tudo bem? Obrigado pelo cadastro!</p>
	    <p>Seu email está passando por um processo de validação, por favor aguarde Verifique sua caixa de entrada, um email foi enviado para você validar seu usuário</p>
	    <p>Assim que tudo estiver ok enviaremos um email.</p>
	    <p>Qualquer dúvida, entre em contato: (011) 99973-5872</p>
	    <br>
	    <p>Dente de Leão. Cultive Ideias, Colha Conhecimento.</p>
		<hr>');

		//$sql = "INSERT INTO DL_ADMIN_cpfList(cpf) VALUES ('$cpf')";

		//mysqlexecuta($id, $sql);

		//echo '<script>window.location.assign("../../lista-cpf.php");</script>';

	}

	//Envio do email ==============================
	$headers = "MIME-Version: 1.1" . $quebra_linha;
	$headers .= "Content-type: text/html; charset=iso-8859-1" . $quebra_linha;

	$headers .= "From: " . $emailsender . $quebra_linha;
	$headers .= "Return-Path: " . $emailsender . $quebra_linha;

	if (strlen($comcopia) > 0) {
	    $headers .= "Cc: " . $comcopia . $quebra_linha;
	}
	if (strlen($comcopiaoculta) > 0) {
	    $headers .= "Bcc: " . $comcopiaoculta . $quebra_linha;
		$headers .= "Reply-To: " . $emailremetente . $quebra_linha;
	}


	$resultado = mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r" . $emailsender);

	echo $resultado;

	if ($resultado == 1) {
	    //header('Location: /cadastro_backend.php?sucesso=true');
	} else {
	    //header('Location: /cadastro_backend.php?sucesso=false');
	}
?>