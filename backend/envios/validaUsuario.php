 <?php 
	require_once("../conecta.php");
	require_once("../executa.php");

	$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : null;
	$code = isset($_GET['code']) ? $_GET['code'] : null;

	//Verifica se esse cadastro já existe no DL_USER
	$usuarioVerify = mysql_query("SELECT * FROM DL_USER WHERE usuario = '$usuario'");

	//Verifica se email e senha batem no banco DL_ADMIN_registered
	$registeredVerify = mysql_query("SELECT * FROM DL_ADMIN_registered WHERE email = '$usuario' AND senha = '$code'");
	$aprovedVerify = mysql_query("SELECT * FROM DL_ADMIN_registered WHERE email = '$usuario' AND senha = '$code' AND aprovado = '1'");

	while ($row=mysql_fetch_array($registeredVerify)) {
		$email=$row['email'];
		$nome=$row['nome'];
	}

	//Variáveis do Email
	$emaildestinatario = $email;
	$assunto = utf8_decode("Confirmação Dente de Leão");

	//Condições se existe um cadastro na registered do banco de dados ==============================
	if(mysql_num_rows($usuarioVerify) > 0) {
		echo 'Usuário já cadastrado';
	} else {
		if(mysql_num_rows($registeredVerify) > 0) {
			if(mysql_num_rows($aprovedVerify) > 0) {
			    //echo 'tem';

			    //echo 'Obrigado por cadastrar. <br>';

			    $mensagemHTML = utf8_decode('<img src="http://www.dentedeleao.agr.br/admin/assets/img/template/logo.gif" alt="Logo Dente de Leão">
			    <p>Olá, ' . $nome . ' , tudo bem?</p>
			    <p>Seu cadastro foi confirmado com sucesso!</p>
			    <p>Para começar, acesse <a href="http://www.dentedeleao.agr.br" target="_blank">www.dentedeleao.agr.br</a> e insira seu usuário e senha!</p>
				<p>Qualquer dúvida, entre em contato: (011) 99973-5872</p>
			    <br>
			    <p>Dente de Leão. Cultive Ideias, Colha Conhecimento.</p>
				<hr>');

				//echo '<script>window.location.assign("../../lista-cpf.php?error=' . $cpf . '");</script>';

				//Envio para o Banco ==============================
				$sql = "INSERT INTO DL_USER(usuario, senha) VALUES ('$usuario', '$code')";

				mysqlexecuta($id, $sql);


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
				echo '<script>window.location.assign("../../index.php?sucesso=validado");</script>';
			} else {
				//echo "Usuário não aprovado";
				echo '<script>window.location.assign("../../index.php?error=usuarionaoaprovado");</script>';
			}
		} else {
			//echo "Usuário não existente";
			echo '<script>window.location.assign("../../index.php?error=usuarionaoexiste");</script>';
		}
	}

?>