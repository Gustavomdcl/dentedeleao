 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$usuarioAlterar 		=	$_POST['email'];

	//Verifica se esse cadastro já existe no DL_USER
	$usuarioVerify = mysql_query("SELECT * FROM DL_USER WHERE usuario = '$usuarioAlterar'");
	//!\ MUDAR PARA PROFILE /!\
	$usuarioName = mysql_query("SELECT * FROM DL_ADMIN_registered WHERE email = '$usuarioAlterar'");//!\ MUDAR PARA PROFILE /!\
	//!\ MUDAR PARA PROFILE /!\

	while ($row=mysql_fetch_array($usuarioName)) {
		$nome=$row['nome'];
	}

	while ($rowsecond=mysql_fetch_array($usuarioVerify)) {
		$senha=$rowsecond['senha'];
	}

	//Variáveis do Email
	$email = $usuarioAlterar;
	$assunto = utf8_decode("Alterar Senha - Dente de Leão");

	//Condições se existe um cadastro na registered do banco de dados ==============================
	if(mysql_num_rows($usuarioVerify) > 0) {
	    //echo 'tem';

	    echo "Um código para trocar sua senha foi enviado para o seu email.";

	    $mensagemHTML = utf8_decode('<img src="http://www.dentedeleao.agr.br/admin/assets/img/template/logo.gif" alt="Logo Dente de Leão">
	    <p>Olá, ' . $nome . ' , tudo bem?</p>
	    <p>Você está tentando alterar a sua senha, correto?</p>
	    <p>Para continuar acesse <a href="http://www.dentedeleao.agr.br/alterar-senha.php?usuario=' . $usuarioAlterar . '&code=' . $senha . '" target="_blank">www.dentedeleao.agr.br/alterar-senha.php?usuario='.$usuarioAlterar.'&code=' . $senha . '</a> e insira sua nova senha!</p>
	    <p>Se não, ignore essa mensagem. Houve uma solicitação para alterar a senha desse usuário.</p>
		<p>Qualquer dúvida, entre em contato: (011) 99973-5872</p>
	    <br>
	    <p>Dente de Leão. Cultive Ideias, Colha Conhecimento.</p>
		<hr>');

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

		//Volta para a anterior
		//echo '<script>window.location.assign("../../lista-email.php");</script>';
	} else {
		echo "Email não cadastrado";
	}

?>