<?php
  require_once ("backend/header.php");
  // RESULTADO BUSCA ======================================
  $buscaPalavra     = $_POST['busca'];
  $devicePlantacao  = $_POST['platacaoDevice'];
  $data_inicio      = $_POST['data_inicio'];
  $perfil			= $_POST['perfil'];
  $simplesPlantacao = null;
  $simplesPlantacaoNome;
  if($_POST['platacao']!=null){
  	$simplesPlantacao	= $_POST['platacao'];
  	$simplesPlantacao	= $simplesPlantacao[0];
  } else if ($_GET['plantacao']!=null) {
  	$simplesPlantacao	= $_GET['plantacao'];
  }

  if($buscaPalavra!=null){
  } else if($devicePlantacao!=null && $data_inicio!=null) {
  } else if($simplesPlantacao!=null) {
  } else { header("Location: duvidas.php"); }
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

		<?php include 'template/header.php'; ?>

		<!-- .l-main
	    ======================================================== -->
	    <section class="l-main">

	      <div class="l-container cf">

	        <?php include 'template/sidebar.php'; ?>

	        <!-- .l-content
	        =================================================== -->
	        <section class="l-content">

				<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-resultado para .l-duvida-resultado ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
				======================================================== -->
				<section class="l-duvida-resultado">

					<header>
						<h2>Dúvidas</h2>
					</header>

					<?php 

					if($buscaPalavra!=null){
						require_once ("backend/modules/duvidaBuscaPalavra.php");
					} else if($devicePlantacao!=null && $data_inicio!=null) {
						require_once ("backend/modules/duvidaBuscaDevice.php");
					} else if($simplesPlantacao!=null) {
						$sqlSimplesPlantacao = "SELECT `plantacao` FROM DL_ADMIN_plantationList WHERE id = '$simplesPlantacao' order by id desc limit 1";
                        $resultSimplesPlantacao = mysql_query($sqlSimplesPlantacao);
                        while ($row=mysql_fetch_array($resultSimplesPlantacao)) {
                        	$simplesPlantacaoNome = $row['plantacao'];
                        }
						require_once ("backend/modules/duvidaBuscaPlantacao.php");
					}

					?>

					<hr />
					<div id="cadastrarDuvida">
						<p>As sugestões não te ajudaram? Preencha sua dúvida.</p>
						<a href="duvida-cadastro.php" title="Formulário para cadastrar dúvida" class="btCadastrarDuvida">Cadastrar minha dúvida</a>
					</div> <!-- #cadastrarDuvida -->

				</section><!-- .l-duvida-resultado -->

			</section><!-- .l-content -->

    	</div><!-- .l-container.cf -->

    </section><!-- .l-main -->

	<?php include 'template/footer.php'; ?>	

	</div><!-- #site -->
	
	<?php include 'template/script.php'; ?>
  	<script>
  		$('.scroll').jscroll();
  	</script>
</body>
</html>