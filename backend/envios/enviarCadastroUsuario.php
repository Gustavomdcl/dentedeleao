 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$nome 			=	utf8_decode($_POST['nome']);
	$cpf  			=	$_POST['cpf'];
	$email 			=	$_POST['email'];
	$senha 			=	md5($_POST['senha']);
	$aprovado   = false;

	//Verifica se esse cadastro já existe no registered
	$nomeRegisteredVerify = mysql_query("SELECT * FROM teste WHERE nome = '$nome'");
	$cpfRegisteredVerify = mysql_query("SELECT * FROM teste WHERE cpf = '$cpf'");
	$emailRegisteredVerify = mysql_query("SELECT * FROM teste WHERE email = '$email'");

	//Verifica se email ou cpf existem no banco da lista do Admin
	$emailVerify = mysql_query("SELECT * FROM DL_ADMIN_emailList WHERE email = '$email'");
	$cpfVerify = mysql_query("SELECT * FROM DL_ADMIN_cpfList WHERE cpf = '$cpf'");

	//Variáveis do Email
	$emaildestinatario = $email;
	$assunto = utf8_decode("Cadastro Dente de Leão");

	//Condições se existe um cadastro na registered do banco de dados ==============================
	if(mysql_num_rows($cpfRegisteredVerify) > 0) {
		echo 'CPF Já Registrado';
	} else if (mysql_num_rows($emailRegisteredVerify) > 0) {
		echo 'Email Já Registrado';
	} else {
		//Condições se foi encontrado ou não no banco da lista do admin ==============================
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

			//echo '<script>window.location.assign("../../lista-cpf.php");</script>';

		}

		//Envio para o Banco ==============================
		$sql = "INSERT INTO teste(nome, cpf, email, senha, aprovado) VALUES ('$nome', '$cpf', '$email', '$senha', '$aprovado')";

		mysqlexecuta($id, $sql);


		//Envio de Email ==============================
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

		//Volta para a anterior
		//echo '<script>window.location.assign("../../lista-email.php");</script>';

	}

?>