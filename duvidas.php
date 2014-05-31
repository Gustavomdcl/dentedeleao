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

				<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-resultado para .l-duvida-resultado ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
				======================================================== -->
				<section class="l-duvida-inicial">

					<header>
						<h2>Dúvidas</h2>
					</header>
					
					<form method="post" action="duvida-resultado.php">
						<input type="text" name="busca" placeholder="Pesquise aqui"><button type="submit">Buscar</button>
					</form><!-- barra de busca -->

					<h3>Dúvidas Recentes</h3>

					<?php

			          $sqlDuvidaPosts = "SELECT * FROM DL_FORUM order by id desc";
			          $resultDuvidaPosts = mysql_query($sqlDuvidaPosts);

			          if (mysql_num_rows($resultDuvidaPosts) > 0) {
			            $id_duvida;
			            $titulo;
			            $plantacao;
			            $imagem_duvida;

			        ?>
					
					<ul id="conteudoDuvidas">

						<?php
			            while ($row=mysql_fetch_array($resultDuvidaPosts)) {
			              $id_duvida = $row['id'];
			              $titulo = $row['titulo'];
			              $plantacaoDuvida = $row['plantacao'];
			              $imagem_duvida = $row['imagem'];

			              //PLANTAÇÃO ===============
			              if($plantacaoDuvida==''){} else {
			                  $plantacaoDuvida     =   explode("/", $plantacaoDuvida);
			                  $plantacaoCount      =   0;
			                  foreach ($plantacaoDuvida as $plantacaoUnidade) {
			                      $sqlPlantacoesCategorias = mysql_query("SELECT `plantacao` FROM DL_ADMIN_plantationList WHERE id = '$plantacaoDuvida[$plantacaoCount]'");
			                      while ($row=mysql_fetch_array($sqlPlantacoesCategorias)) {
			                          $plantacaoNome       =   $row['plantacao'];
			                          if($plantacaoCount==0){
			                              $plantacaoDuvida[$plantacaoCount] = $plantacaoNome;
			                          } else {
			                              if($plantacaoCount+1==count($plantacaoDuvida)){
			                                  $plantacaoDuvida[$plantacaoCount] = ' e ' . $plantacaoNome;
			                              } else {
			                                  $plantacaoDuvida[$plantacaoCount] = ', ' . $plantacaoNome;
			                              }
			                          }
			                      }
			                      $plantacaoCount  =   $plantacaoCount + 1;
			                  }
			              }
			              //Prestador Foto
			              if($imagem_duvida == '' || $imagem_duvida == null) {
			                $imagem_duvida[0] = 'admin/assets/img/template/logo.gif';
			              } else {
			                $imagem_duvida     =   $imagem_duvida . '-';
			                $imagem_duvida     =   explode("-", $imagem_duvida);
			                $sqlDuvidaFoto = "SELECT `caminho`, `nome_imagem` FROM DL_IMAGES WHERE id = '$imagem_duvida[0]' order by id desc limit 1";
			                $resultDuvidaFoto = mysql_query($sqlDuvidaFoto);
			                while ($row=mysql_fetch_array($resultDuvidaFoto)) {
			                  $imagem_duvida[0] = $row['caminho'] . $row['nome_imagem'];
			                }
			              } 
			            ?>
						 <li>
			              <img src="<?php echo $imagem_duvida[0]; ?>" alt="nome do post" width="200" height="150" />
			              <p class="postnome"><?php echo $titulo; ?></p>
			              <?php 
			              if($plantacaoDuvida==''){} else {
			                echo '<a title="Tag">';
			                foreach ($plantacaoDuvida as $plantacaoPart){ 
			                  echo $plantacaoPart; 
			                } 
			                echo '</a>';
			              } 
			              ?>
			              <a href="duvida.php?numero=<?php echo $id_duvida; ?>" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
			            </li>

						<?php }//while ?>
						
					</ul> <!-- #conteudoDuvidas -->

					<!--div id="paginacao">
						<ul>
							<li>1</li>
							<li>| <a href="#">2</a> |</li>
							<li><a href="#">3</a></li>
						</ul>
					</div><!-- #paginacao -->

					<?php } else { ?>

			        <p>Ainda não há dúvidas cadastradas</p>

			        <?php }//else ?>

					<hr />
					<div id="cadastrarDuvida">
						<p>Não encontrou uma solução para seu problema? Inicie uma nova dúvida!</p>
						<a href="duvida-inicial.php" title="Quero cadastrar minha dúvida" class="btCadastrarDuvida">Quero cadastrar minha dúvida</a>
					</div> <!-- #cadastrarDuvida -->

				</section><!-- .l-duvida-inicial -->

			</section><!-- .l-content -->

    	</div><!-- .l-container.cf -->

    </section><!-- .l-main -->

	<?php include 'template/footer.php'; ?>	

	</div><!-- #site -->
	
	<?php include 'template/script.php'; ?>
	<!-- Enviar Interactions Cookies -->
  	<script>
  		createCookie('duvidaSituation', '',0);
  	</script>
  	<script>
  		$('.scroll').jscroll();
  	</script>
</body>
</html>