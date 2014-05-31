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

				<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-cadastrarperfil para .l-cadastrarperfil ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
				======================================================== -->
				<section class="l-duvida-cadastro">

					<header>
						<h2>Editar Perfil</h2>
					</header>

					<h3>Olá <?php echo $nome; ?></h3>
					<p>Preencha os campos abaixo para editar seu perfil.</p>
					<form id="editarPerfil" method="post" action="backend/envios/editarPerfilUsuario.php" enctype="multipart/form-data">
						<input type="hidden" name="profile" id="profile" value="<?php echo $profile_id; ?>">
						<input type="text" name="nome" id="nome" placeholder="<?php echo $nome; ?>">
						<p>Conte mais sobre que você é para os outros produtores:</p>
						<textarea id="ckeditor" rows="5" cols="60" name="sobre" placeholder="Descrição"><?php if($sobre!='Não há nenhuma descrição cadastrada'){ echo $sobre; } else { } ?></textarea>
						<p>Envie-nos uma foto no campo abaixo</p>
						<span><img src="<?php echo $foto; ?>" id="preview" width="150" height="150" /></span><br>
						<input type="file" name="foto[]" id="foto" onchange="readURL(this);" class="ignore" accept="image/png, image/gif, image/bmp, image/jpeg, image/jpg">
						<p>Qual o seu número de telefone?</p>
						<input type="text" name="telefone" placeholder="<?php if($telefone!=null||$telefone!=''){ echo $telefone; } else { echo 'Telefone'; } ?>" id="telefone"><br>
						<input type="text" name="celular" placeholder="<?php if($celular!=null||$celular!=''){ echo $celular; } else { echo 'Celular'; } ?>" id="celular"><br>
						<h2>Conte-nos sobre sua fazenda</h2>
						<input type="text" name="nomefazenda" placeholder="<?php if($fazenda!=null||$fazenda!=''){ echo $fazenda; } else { echo 'Nome de sua fazenda'; } ?>" id="nomefazenda"><br>
						<input type="text" name="cnpjfazenda" placeholder="<?php if($cnpj!=null||$cnpj!=''){ echo $cnpj; } else { echo 'CNPJ de sua fazenda'; } ?>" id="cnpjfazenda"><br>
						<p>Onde ela está localizada? (Arraste a marcação no mapa se preciso)</p>
						<input type="text" name="enderecofazenda" placeholder="<?php if($endereco!=null||$endereco!=''){ echo $endereco; } else { echo 'Endereço'; } ?>" id="start"><br>
						<input type="text" name="cepfazenda" placeholder="<?php if($cep!=null||$cep!=''){ echo $cep; } else { echo 'CEP'; } ?>" id="cepfazenda"><br>
						<select name="estado" id="estado" style="width:255px;">
							<option selected disabled>Estado - <?php echo $uf; ?> | <?php echo $cidade; ?> </option>
							<?php

							$sqlState = "SELECT * FROM DL_STATE order by id asc";

							$resultState = mysql_query($sqlState);

						   	while ($row=mysql_fetch_array($resultState)) {
						   		$id=$row['id'];
								$estado=$row['estado'];
								$uf=$row['uf'];

							?>

							<option value="<?php echo $id; ?>"><?php echo $estado; ?></option>

							<?php } ?>
						</select><br>
						<span class="carregando" style="display:none; width:255px;">Carregando Cidades...</span>
						<select name="cidade" id="cidade" style="display:none; width:255px;"></select><br>
						<div id="map-canvas" style="width:100%;height:500px;"></div><!-- div#map-canvas -->
						<div class="map-container" style="display:none;">
							<!-- Unidade de Local -->
						    <div class="map-place" data-lat="<?php echo $latitude; ?>" data-long="<?php echo $longitude; ?>" id="mark-0"> <!-- o id deve mudar -->
						    	<p>Unidade de Marcação</p>
						    	<label>latitude</label>
							    <input type="text" name="lat" id="lat-input" placeholder="<?php if($latitude!=null||$latitude!=''){ echo $latitude; } else { echo 'Latitude'; } ?>">

							    <label>longitude</label>
							    <input type="text" name="long" id="long-input" placeholder="<?php if($longitude!=null||$longitude!=''){ echo $longitude; } else { echo 'Longitude'; } ?>">
						    </div><!-- .map-place -->
						    <!-- Unidade de Local -->
						</div><!-- .map-container -->
						<h4>Suas plantações:</h4>
			            <!-- Suas Plantações -->
			            <span class="plantacoes">
			              <?php foreach ($plantacoesLista as $value) {  ?>
			                <label for="plantacao-<?php echo $value['id']; ?>"><img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['plantacao']; ?>" /><?php echo $value['plantacao']; ?></label>
			                <input type="checkbox" name="platacao[]" value="<?php echo $value['id']; ?>" id="plantacao-<?php echo $value['id']; ?>" checked>
			              <?php
			                  $myPlantations[] = $value['id'];
			                }//foreach
			              ?>
			            </span><!-- .plantacoes -->
			            <!-- Suas Plantações -->
			            <h4>Outras plantações:</h4>
						<span class="plantacoes">
							<?php

							$sqlPlantacaoList = "SELECT * FROM DL_ADMIN_plantationList WHERE valido = '1' order by id desc";

							$resultPlantacaoList = mysql_query($sqlPlantacaoList);

						   	while ($row=mysql_fetch_array($resultPlantacaoList)) {
						   		$id=$row['id'];
								$plantacao=$row['plantacao'];
								$imagem=$row['imagem'];

								if(in_array($id, (array) $myPlantations)){//Se a plantação já existe
                        		} else {

									if($imagem == null){ 
										$imagem = 'admin/assets/img/template/logo.gif'; 
									} else { 

										$imagemId = explode('-', $imagem);

										$sqlPlantacaoimg = "SELECT * FROM DL_IMAGES WHERE id = '$imagemId[0]' order by id desc";
										$resultPlantacaoimg = mysql_query($sqlPlantacaoimg);

										while ($row=mysql_fetch_array($resultPlantacaoimg)) {
											$imagem = $row['caminho'] . $row['nome_imagem'];
										}
									}

							?> 
							<img src="<?php echo $imagem; ?>" id="preview" class="plantacaofigura" width="50" height="50" />
							<input type="checkbox" name="platacao[]" id="plantacao-<?php echo $id ?>" value="<?php echo $id ?>">
							<label for="plantacao-<?php echo $id ?>"><?php echo $plantacao ?></label>
							<?php }//else 
								}//while ?>
						</span>
						<p> Você cultiva algo mais? Separe com vírgula (,)</p>
						<input type="text" name="demaisplantacoes"><br>
						<button type="submit">Salvar Informações</button>
					</form>

					</section><!-- .l-duvida-cadastro -->

				</section><!-- .l-content -->

    		</div><!-- .l-container.cf -->

    	</section><!-- .l-main -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
	<!-- google maps api -->
	<script src="assets/js/jquery.mapsedit.js" type="text/javascript"></script>
  	<!-- Script da mascara -->
	<script>
		jQuery(function($){
		   $("#telefone").mask("(99)9999-9999");
		   $("#celular").mask("(99)99999-9999");
		   $("#cnpjfazenda").mask("99.999.999/9999-99");
		   $("#cepfazenda").mask("99999-999");
		});
	</script>
	<!-- popula as cidades -->
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
				$('#cidade').html(options).show();
				$('.carregando').hide();
			});
		} else {
			$('#cod_cidades').html('<option value="">-- Escolha um estado --</option>');
		}
	});
	</script>
	<!-- Script do Input File -->
	<script>
		function readURL(input){
			if (input.files && input.files[0]){
				var reader = new FileReader();
				reader.onload = function (e) {
	                $('#preview').attr('src',e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>

</body>
</html>