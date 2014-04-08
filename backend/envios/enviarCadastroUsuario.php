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

	//Informações para envio de email ============================== http://www.uolhost.com.br/blog/como-enviar-e-mails-via-smtp-usando-php#rmcl || http://www.uolhost.com.br/faq/hospedagem/como-enviar-mensagens-com-php-por-autenticacao-smtp.html
	/*if (!isset($_POST))
	    die("N&atilde;o recebi nenhum par&acitc;metro. Por favor volte ao formulario.html antes");
	if (eregi('tempsite.ws$|locaweb.com.br$|hospedagemdesites.ws$|websiteseguro.com$', $_SERVER[HTTP_HOST])) {
	    $emailsender = 'contato@dentedeleao.agr.br';
	} else {
	    $emailsender = "contato@" . $_SERVER[HTTP_HOST];
	}

	if (PHP_OS == "Linux") {
	    $quebra_linha = "\n";
	} elseif (PHP_OS == "WINNT") {
	    $quebra_linha = "\r\n";
	} else {
	    die("Este script nao esta preparado para funcionar com o sistema operacional de seu servidor");
	}*/

	echo $quebra_linha;

	//$emailremetente = $email;
	$emaildestinatario = $email;
	//$comcopia = $email;
	//$comcopiaoculta = $email;
	$assunto = utf8_decode("Cadastro Dente de Leão");


	//Condições se foi encontrado ou não no banco ==============================
	if(mysql_num_rows($cpfVerify) > 0 || mysql_num_rows($emailVerify) > 0) {
	    //echo 'tem';

	    echo 'Obrigado por cadastrar. <br> Verifique sua caixa de entrada, um email foi enviado para você validar seu usuário';

	    $mensagemHTML = utf8_decode('<img src="http://www.dentedeleao.agr.br/admin/assets/img/template/logo.gif" alt="Logo Dente de Leão">
	    <p>Olá, ' . $nome . ' , tudo bem? Obrigado pelo cadastro!</p>
	    <p>Para começar, acesse esse link para validar seu email:</p>
		<p><a href="http://www.dentedeleao.agr.br" target="_blank">http://www.dentedeleao.agr.br</a></p>
		<p>Qualquer dúvida, entre em contato: (011) 99973-5872</p>
	    <br>
	    <p>Dente de Leão. Cultive Ideias, Colha Conhecimento.</p>
		<hr>');

		//echo '<script>window.location.assign("../../lista-cpf.php?error=' . $cpf . '");</script>';

	} else {
	    //echo 'nao tem';

	    echo 'Obrigado por cadastrar. <br> Seu email está passando por um processo de validação, por favor aguarde o nosso contato por email';

	   	$mensagemHTML = utf8_decode('<img src="http://www.dentedeleao.agr.br/admin/assets/img/template/logo.gif" alt="Logo Dente de Leão">
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

	include_once("email/class.phpmailer.php");

$nomeDestinatario = $nome;

$usuario = 'contato@dentedeleao.agr.br';

$senha = 'ddl2014';

$To = $email;
$Subject = $assunto;
$Message = $mensagemHTML;

$Host = 'smtp.'.substr(strstr($usuario, '@'), 1);
$Username = $usuario;
$Password = $senha;
$Port = "587";

$mail = new PHPMailer();
$body = $Message;
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host = $Host; // SMTP server
$mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
// 1 = errors and messages
// 2 = messages only
$mail->SMTPAuth = true; // enable SMTP authentication
$mail->Port = $Port; // set the SMTP port for the service server
$mail->Username = $Username; // account username
$mail->Password = $Password; // account password

$mail->SetFrom($usuario, $nomeDestinatario);
$mail->Subject = $Subject;
$mail->MsgHTML($body);
$mail->AddAddress($To, "");

if(!$mail->Send()) {
$mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
} else {
$mensagemRetorno = 'E-mail enviado com sucesso!';
}

	/*//Envio do email ==============================
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


	//$resultado = mail($emaildestinatario, $assunto, $mensagemHTML, $headers, "-r" . $emailsender);
	//echo 'Veja: ' . $emaildestinatario . '=email destinatario | ' . $assunto . '=assunto | ' . $mensagemHTML . '=mensagemHTML | ' . $headers . '=headers | ' . $emailsender . '=emailsender';


	if ($resultado == 1) {
	    //header('Location: /cadastro_backend.php?sucesso=true');
	} else {
	    //header('Location: /cadastro_backend.php?sucesso=false');
	}*/
?>