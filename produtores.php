<?php
  require_once ("backend/header.php");

  // RESULTADO BUSCAS ======================================
  $cultivoBusca 		=	$_POST['cultivo'];
  $estadoBusca 			=	$_POST['estado'];
  $cidadeBusca 			=	$_POST['cidade'];

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

				<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-produtores para .l-produtores ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
				======================================================== -->
				<section class="l-produtores">

					<header>
						<h2>Produtores</h2>
					</header>
				<div id="formulario">
					<h3>Buscar produtores</h3>
					<form method="post" action="produtores.php">
						<select name="cultivo" id="cultivo">
							<option selected disabled>Plantação</option>
							<?php

							$sqlPlantacaoList = "SELECT * FROM DL_ADMIN_plantationList WHERE valido = '1' order by id desc";

							$resultPlantacaoList = mysql_query($sqlPlantacaoList);

						   	while ($row=mysql_fetch_array($resultPlantacaoList)) {
						   		$idPlantacao=$row['id'];
								$plantacaoPlantacao=$row['plantacao'];

							?>

							<option value="<?php echo $idPlantacao ?>"><?php echo $plantacaoPlantacao ?></option>

							<?php } ?>
							<option value="null">Nenhuma</option>
						</select><br>
						<select name="estado" id="estado">
							<option selected disabled>Estado</option>
							<?php

							$sqlState = "SELECT * FROM DL_STATE order by id asc";

							$resultState = mysql_query($sqlState);

						   	while ($row=mysql_fetch_array($resultState)) {
						   		$idEstado=$row['id'];
								$estadoEstado=$row['estado'];
								$ufEstado=$row['uf'];

							?>

							<option value="<?php echo $idEstado; ?>"><?php echo $estadoEstado; ?></option>

							<?php } ?>
							<option value="null">Nenhum</option>
						</select>
						<span class="carregando" style="display:none;">Carregando Cidades...</span>
						<select name="cidade" id="cidade" style="display:none;">
						</select>
						<button type="submit">Buscar</button>
					</form>
				</div><!-- #formulario-->
					<hr />
					<div id="resultadoprodutores">
						<div id="map-canvas" style="width:100%;height:500px;"></div><!-- div#map-canvas -->
						<ul>
							<?php
								// Query Produtores ======================================
								  $condicoes = "";
								  $condicaoCount = 0;
								  /*if($cultivoBusca != null && $cultivoBusca != 'null') {
								  	$condicoes = $condicoes + "WHERE id = ";
								  }*/

								  if($estadoBusca != null && $estadoBusca != 'null') {
								  	$condicoes = $condicoes . "WHERE";
								  } else if ($cidadeBusca != null && $cidadeBusca != 'null') {
								  	$condicoes = $condicoes . "WHERE";
								  }

								  if($estadoBusca != null && $estadoBusca != 'null') {
								  	if ($condicaoCount == 0) { $condicaoCount = 1; } else { $condicoes = $condicoes . " and "; }
								  	$condicoes =  $condicoes . " estado = '" . $estadoBusca . "' ";
								  }

								  if($cidadeBusca != null && $cidadeBusca != 'null') {
								  	if ($condicaoCount == 0) { $condicaoCount = 1; } else { $condicoes = $condicoes . " and "; }
								  	$condicoes =  $condicoes . " cidade = '" . $cidadeBusca . "' ";
								  }

								  $produtoresLista = mysql_query("SELECT * FROM DL_PROFILE $condicoes order by id asc");
								  $nome;
								  $foto;
								  $cpf;
								  $email;
								  $telefone;
								  $celular;
								  $fazenda;
								  $cnpj;
								  $endereco;
								  $latitude;
								  $longitude;
								  $cep;
								  $estado;
								  $uf;
								  $cidade;
								  $plantacoes;
								  $sobre;

								  $produtor_contador = 0;

							    while ($row=mysql_fetch_array($produtoresLista)) {
							      $idProdutor=$row['id'];
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

								  if($cultivoBusca == null && $cultivoBusca == 'null') {

								  ?>
								  <li class="map-place" data-lat="<?php echo $latitude; ?>" data-long="<?php echo $longitude; ?>" id="mark-<?php echo $produtor_contador; ?>"><img src="<?php echo $foto ?>" width="150" height="150" />
								  	<strong><?php echo $nome ?></strong>
									<p>Telefone: <?php echo $telefone; ?></p>
									<p><?php echo $endereco; ?></p>
									<p>CEP <?php echo $cep; ?> - <?php echo $cidade; ?>/<?php echo $uf; ?></p>
									<a href="perfil.php?produtor=<?php echo $idProdutor; ?>" title="Saiba mais">Saiba mais</a>
								  </li>

								  <?php 

								    	$produtor_contador = $produtor_contador + 1; 

								    	} else {

								    		$plantacoes;
								    		$listaPlantacoes = explode("/", $plantacoes);
								    		if(in_array($cultivoBusca, $listaPlantacoes)){

								    			?>

											  <li class="map-place" data-lat="<?php echo $latitude; ?>" data-long="<?php echo $longitude; ?>" id="mark-<?php echo $produtor_contador; ?>"><img src="<?php echo $foto ?>" width="150" height="150" />
											  	<strong><?php echo $nome ?></strong>
												<p>Telefone: <?php echo $telefone; ?></p>
												<p><?php echo $endereco; ?></p>
												<p>CEP <?php echo $cep; ?> - <?php echo $cidade; ?>/<?php echo $uf; ?></p>
												<a href="perfil.php?produtor=<?php echo $idProdutor; ?>" title="Saiba mais">Saiba mais</a>
											  </li>

											  <?php 
											  $produtor_contador = $produtor_contador + 1;
								    		}

								    	}

									} //while

									?>  
							</ul>
						</div>

					</section><!-- .l-produtores -->

				</section><!-- .l-content -->

	    	</div><!-- .l-container.cf -->

	    </section><!-- .l-main -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
	<!-- google maps api -->
	<script src="assets/js/jquery.mapsprodutores.js" type="text/javascript"></script>
	<script>
	/* POPULA AS CIDADES */
	//http://www.daviferreira.com/posts/populando-selects-de-cidades-e-estados-com-ajax-php-e-jquery
	$('#estado').change(function(){
		if( $(this).val() ) {
			$('.carregando').show();
			$.getJSON('backend/envios/buscarCidades.php?search=',{cod_estados: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option selected disabled>Cidade</option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].cod_cidades + '">' + j[i].cidade + '</option>';
				}	
				options += '<option value="null">Nenhuma</option>';
				$('#cidade').html(options).show();
				$('.carregando').hide();
			});
		} else {
			$('#cod_cidades').html('<option value="">-- Escolha um estado --</option>');
		}
	});
	</script>
  	
</body>
</html>