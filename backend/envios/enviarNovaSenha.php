 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$usuarioAlterar 	=	$_POST['usuario'];
	$senhaAntiga		=	$_POST['senhaantiga'];
	$senhaNova			=	md5($_POST['senhanova']);

	//Verifica se esse cadastro já existe no DL_USER
	$usuarioVerify = mysql_query("SELECT * FROM DL_USER WHERE usuario = '$usuarioAlterar' AND senha = '$senhaAntiga'");

	if(mysql_num_rows($usuarioVerify) > 0) {

		$sql = "UPDATE DL_USER SET senha='$senhaNova' WHERE usuario='$usuarioAlterar'";

		mysqlexecuta($id, $sql);

		//!\ MUDAR PARA PROFILE /!\
		$usuarioName = mysql_query("SELECT * FROM DL_ADMIN_registered WHERE email = '$usuarioAlterar'");//!\ MUDAR PARA PROFILE /!\
		//!\ MUDAR PARA PROFILE /!\

		while ($row=mysql_fetch_array($usuarioName)) {
			$nome=$row['nome'];
		}

	    $mensagemHTML = utf8_decode('<img src="http://www.dentedeleao.agr.br/admin/assets/img/template/logo.gif" alt="Logo Dente de Leão">
	    <p>Olá, ' . $nome . ' , tudo bem?</p>
	    <p>Sua senha foi alterada!</p>
	    <p>Insira sua nova senha pelo seguinte link:</p>
		<p><a href="http://www.dentedeleao.agr.br/" target="_blank">http://www.dentedeleao.agr.br/</a></p>
		<p>Qualquer dúvida, entre em contato: (011) 99973-5872</p>
	    <br>
	    <p>Dente de Leão. Cultive Ideias, Colha Conhecimento.</p>
		<hr>');

		//Variáveis do Email
		$emaildestinatario = $usuarioAlterar;
		$assunto = utf8_decode("Senha Alterada - Dente de Leão");

		//Envio de Email ==============================
		include_once("email/class.phpmailer.php");

		$nomeDestinatario = utf8_decode('Contato Dente de Leão');

		$usuario = 'contato@dentedeleao.agr.br';

		$senha = 'ddl2014';

		$To = $usuarioAlterar;
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

		//echo 'Senha alterada!';
		//Volta para a anterior
		echo '<script>window.location.assign("../../index.php?sucesso=senhaalterada");</script>';

	} else {
		echo '<script>window.location.assign("../../index.php?error=emailnaocadastrado");</script>';
		//echo utf8_decode("Usuário não existente");
	}

?>