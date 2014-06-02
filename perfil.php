<?php
  require_once ("backend/header.php");
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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-perfil para .l-perfil ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-perfil">

				<?php
				
				$produtor = isset($_GET['produtor']) ? $_GET['produtor'] : null;
				if($produtor != null && $produtor != $idProfile) {
					// VALIDA PERFIL ======================================
					  $perfilCriado = mysql_query("SELECT * FROM DL_PROFILE WHERE id = '$produtor'");
					  $nome; $foto; $cpf; $email; $telefone; $celular; $fazenda; $cnpj; $endereco; $latitude; $longitude; $cep; $estado; $uf; $cidade; $plantacoes; $sobre;

				    while ($row=mysql_fetch_array($perfilCriado)) {
				      $nome=$row['nome'];
				      $foto=$row['foto'];
				      $cpf=$row['cpf'];
				      $email=$row['email'];
					  $telefone=$row['telefone'];
					  $celular=$row['celular'];
					  $fazenda=$row['fazenda'];
					  $cnpj=$row['cnpj'];
					  $endereco=$row['endereco'];
					  $latitude=$row['latitude'];
					  $longitude=$row['longitude'];
					  $cep=$row['cep'];
					  $estado=$row['estado'];
					  $cidade=$row['cidade'];
					  $plantacoes=$row['plantacoes'];
					  $sobre=$row['sobre'];

				      if($foto == null){ 
				        $foto = 'admin/assets/img/template/logo.gif'; 
				      } else {

				        $fotoId = explode('-', $foto);

				        $sqlPlantacaoimg = "SELECT * FROM DL_IMAGES WHERE id = '$fotoId[0]' order by id desc";
				        $resultPlantacaoimg = mysql_query($sqlPlantacaoimg);

				        while ($row=mysql_fetch_array($resultPlantacaoimg)) {
				          $foto = $row['caminho'] . $row['nome_imagem'];
				        }
				      }

				      if($sobre == null){
				      	$sobre = 'Não há nenhuma descrição cadastrada';
				      }

				      $sqlState = "SELECT * FROM DL_STATE WHERE id = '$estado' order by id asc";
					  $resultState = mysql_query($sqlState);
				   	  while ($row=mysql_fetch_array($resultState)) {
						  $uf=$row['uf'];
					  }

					  $sqlCity = "SELECT * FROM DL_CITY WHERE id = '$cidade' order by id asc";
					  $resultCity = mysql_query($sqlCity);
				   	  while ($row=mysql_fetch_array($resultCity)) {
						  $cidade=$row['cidade'];
					  }

				    }
				}

				?>

				<div class="l-row">
					<div class="round-img">
						<img src="<?php echo $foto ?>" border="0" class="fotoperfil" />
					</div>
					<div id="perfil-content">
						<h2><?php echo $nome ?></h2>
						<p style="margin-bottom:35px;"><?php echo $sobre; ?></p>
						<p><span>Fazenda</span> <?php echo $fazenda; ?></p>
						<p><span>CNPJ</span> <?php echo $cnpj; ?></p>
						<p><span>Telefone</span> <?php echo $telefone; ?></p>
						<p><span>Celular</span> <?php echo $celular; ?></p>
						<p><span>E-mail</span> <?php echo $email; ?></p>
						
						<br><br>
							
						<p><span>Localização</span></p>
						
						<div id="map-canvas" style="width:695px;height:420px;"></div><!-- div#map-canvas -->
						<!-- Unidade de Local -->
					    <div class="map-place" data-lat="<?php echo $latitude; ?>" data-long="<?php echo $longitude; ?>" id="mark-0"> <!-- o id deve mudar -->
					    	<p><?php echo $endereco; ?><br>
					    		CEP <?php echo $cep; ?> - <?php echo $cidade; ?>/<?php echo $uf; ?></p>
					    </div><!-- .map-place -->
					    <!-- Unidade de Local -->

					</div><!-- #perfil-content -->
				</div><!-- .l-row -->

		</section><!-- .l-perfil -->

		        </section><!-- .l-content -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-main -->

		<?php include 'template/footer.php'; ?>

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->
	</div><!-- #site -->
	<?php include 'template/script.php'; ?>
	<!-- google maps api -->
	<script src="assets/js/jquery.mapsperfil.js" type="text/javascript"></script>
  	
</body>
</html>