 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$nome 				=	$_POST['confirmnome'];
	$email				=	$_POST['confirmemail'];
	$senha				=	$_POST['confirmsenha'];
	$registeredId 		=	$_POST['confirmid'];

	$sql = "UPDATE DL_ADMIN_registered SET aprovado='1' WHERE id='$registeredId'";

	mysqlexecuta($id, $sql);

    $mensagemHTML = utf8_decode('<img src="http://www.dentedeleao.agr.br/admin/assets/img/template/logo.gif" alt="Logo Dente de Leão">
    <p>Olá, ' . $nome . ' , tudo bem?</p>
    <p>Seu cadastro foi aprovado com sucesso!</p>
    <p>Para começar, acesse esse link para validar seu email:</p>
	<p><a href="http://www.dentedeleao.agr.br/backend/envios/validaUsuario.php?usuario=' . $email . '&code=' . $senha . '" target="_blank">http://www.dentedeleao.agr.br/backend/envios/validaUsuario.php?usuario=' . $email . '&code=' . $senha . '</a></p>
	<p>Qualquer dúvida, entre em contato: (011) 99973-5872</p>
    <br>
    <p>Dente de Leão. Cultive Ideias, Colha Conhecimento.</p>
	<hr>');

	//Variáveis do Email
	$emaildestinatario = $email;
	$assunto = utf8_decode("Cadastro Aprovado Dente de Leão");

	//Envio de Email ==============================
	include_once("email/class.phpmailer.php");

	$nomeDestinatario = utf8_decode('Contato Dente de Leão');

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

	echo '<script>window.location.assign("../../lista-registros.php");</script>';
?>