<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");

  // VARIAVEIS GLOBAIS ==================================
  $usuarioLogadoID = $_SESSION['usuarioUserID'];
  $usuarioLogadoEmail = $_SESSION['usuarioUserNome'];

  // VALIDA PERFIL ======================================
  $perfilCriado = mysql_query("SELECT * FROM DL_PROFILE WHERE usuario = '$usuarioLogadoID'");

  if(mysql_num_rows($perfilCriado) > 0) {
  	header("Location: painel.php");
  } else {}

  // PEGA INFORMAÇÕES ===================================
  $informacoesUsuario = mysql_query("SELECT * FROM DL_ADMIN_registered WHERE email = '$usuarioLogadoEmail'");
  $nome;
  $cpf;

  while ($row=mysql_fetch_array($informacoesUsuario)) {
  	$nome=$row['nome'];
  	$cpf=$row['cpf'];
  }

?><!DOCTYPE html>
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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-cadastrarperfil para .l-cadastrarperfil ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-cadastrarperfil">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Olá <span><?php echo $nome; ?></span></h2>
						<p>Seja bem vindo ao Dente de Leão, uma plataforma que o auxiliará diariamente. Antes de começar a utilizá-la, queremos te conhecer!</p>
					</header>
					<div>
						<form>
							<input type="hidden" name="usuario" id="usuario" value="<?php echo $usuarioLogadoID; ?>">
							<input type="hidden" name="nome" id="nome" value="<?php echo $nome; ?>">
							<input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>">
							<input type="hidden" name="email" id="email" value="<?php echo $usuarioLogadoEmail; ?>">
							<p>Envie-nos uma foto no campo abaixo</p>
							<span><img src="" width="150" height="150" /></span>
							<input type="file">
							<p>Qual o seu número de telefone?</p>
							<input type="text" name="telefone" placeholder="Telefone" id="telefone" required><br>
							<input type="text" name="celular" placeholder="Celular" id="celular" required><br>
							<h2>Conte-nos sobre sua fazenda</h2>
							<input type="text" name="nomefazenda" placeholder="Nome de sua fazenda" required><br>
							<input type="text" name="cnpjfazenda" placeholder="CNPJ de sua fazenda" id="cnpjfazenda" required><br>
							<p>Onde ela está localizada?</p>
							<input type="text" name="enderecofazenda" placeholder="Endereço" required><br>
							<input type="text" name="cepfazenda" placeholder="CEP" id="cepfazenda" required><br>
							<select>
							  <option value="Acre">AC</option>
							  <option value="Alagoas">AL</option>
							  <option value="Amapá">AP</option>
							  <option value="Amazonas">AM</option>
							  <option value="Bahia">BA</option>
							  <option value="Ceará">CE</option>
							  <option value="Distrito Federal">DF</option>
							  <option value="Espírito Santo">ES</option>
							  <option value="Goiás">GO</option>
							  <option value="Maranhão">MA</option>
							  <option value="Mato Grosso">MT</option>
							  <option value="Mato Grosso do Sul">MS</option>
							  <option value="Minas Gerais">MG</option>
							  <option value="Pará">PA</option>
							  <option value="Paraíba">PB</option>
							  <option value="Paraná">PR</option>
							  <option value="Pernambuco">PE</option>
							  <option value="Piauí">PI</option>
							  <option value="Rio de Janeiro">RJ</option>
							  <option value="Rio Grande do Norte">RN</option>
							  <option value="Rio Grande do Sul">RS</option>
							  <option value="Rondônia">RO</option>
							  <option value="Roraima">RR</option>
							  <option value="Santa Catarina">SC</option>
							  <option value="São Paulo" selected>SP</option>
							  <option value="Sergipe">SE</option>
							  <option value="Tocantins">TO</option>
							</select>
							<input type="text" name="cidade" placeholder="Cidade" required><br>
							<p>O que você cultiva?</p>
							<span class="plantacoes">
								<input type="checkbox" name="tomate" value="Tomate">
								<input type="checkbox" name="cebola" value="Cebola">
								<input type="checkbox" name="morango" value="Morango">
								<input type="checkbox" name="espinafre" value="Espinafre">
								<input type="checkbox" name="batata" value="Batata">
							</span>
							<p> Você cultiva algo mais? Separe com ponto-vírgula (;)</p>
							<input type="text" name="demaisplantacoes"><br>
							<button type="submit">Salvar Informações</button>
						</form>
					</div>
					

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cadastrarperfil -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<?php include 'template/footer.php'; ?><!-- ADRIAN: Não delete isso pois é o rodapé do site, tudo bem? Ele está puxando o arquivo da pasta template. Ele vai repetir esse rodapé em todas as páginas -->

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
  	<!-- Script do accordion -->
	<script>
		jQuery(function($){
		   $("#telefone").mask("(99)9999-9999");
		   $("#celular").mask("(99)99999-9999");
		   $("#cnpjfazenda").mask("99.999.999/9999-99");
		   $("#cepfazenda").mask("99999-999");
		});
	</script>

</body>
</html>