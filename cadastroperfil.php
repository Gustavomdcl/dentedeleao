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
?>
<!DOCTYPE html>
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

		<!-- ADRIAN: ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-cadastrarperfil para .l-cadastrarperfil ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-cadastrarperfil">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<img class="logo" src="assets/img/template/logo-home.png" alt="Logo Dente de Leão">
						<h2>Olá <span><?php echo $nome; ?></span>,<br>
							Seja bem vindo!</h2>
					</header>
					<div>
						<form id="enviarPerfil" method="post" action="backend/envios/enviarPerfilUsuario.php" enctype="multipart/form-data">
							<input type="hidden" name="usuario" id="usuario" value="<?php echo $usuarioLogadoID; ?>">
							<input type="hidden" name="nome" id="nome" value="<?php echo $nome; ?>">
							<input type="hidden" name="cpf" id="cpf" value="<?php echo $cpf; ?>">
							<input type="hidden" name="email" id="email" value="<?php echo $usuarioLogadoEmail; ?>">
							<div class="l-row inicio-cadastro-img">
								<div class="l-col6">
									<p class="texto-fotografia">Obrigado por se cadastrar. Antes de começar gostaríamos de te conhecer. Envie-nos uma foto no campo a seguir...</p>
								</div><!-- .l-col6 -->
								<div class="l-col6">
									<span><img src="assets/img/template/photo-cadastro-perfil.png" id="preview" width="150" height="150" /></span><br>
									<input type="file" name="foto[]" id="foto" onchange="readURL(this);" class="ignore filestyle" accept="image/png, image/gif, image/bmp, image/jpeg, image/jpg">
								</div><!-- .l-col6 -->
							</div><!-- .l-row -->
							<div class="informacoes-pessoais">
								<h3 class="title" style="margin-bottom:5px;">Qual o seu número de telefone?</h3>
								<input type="text" name="telefone" placeholder="TELEFONE" id="telefone" required>
								<input type="text" name="celular" placeholder="CELULAR" id="celular">
								<h3 class="title" style="margin-bottom:5px;margin-top:20px;">Conte-nos sobre sua fazenda</h3>
								<input type="text" name="nomefazenda" placeholder="NOME" id="nomefazenda" required>
								<input type="text" name="cnpjfazenda" placeholder="CNPJ" id="cnpjfazenda" required>
								<h3 class="title" style="margin-top:20px;">Onde ela está localizada?</h3>
								<p class="subtitle">(Arraste a marcação no mapa se preciso)</p>
								<input type="text" name="enderecofazenda" placeholder="ENDEREÇO" id="start" class="enderecofazenda" required><br>
								<input type="text" name="cepfazenda" placeholder="CEP" id="cepfazenda" required>
								<select name="estado" id="estado">
									<option selected disabled>Estado</option>
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
								</select>
								<span class="carregando" style="display:none; width:255px;">Carregando Cidades...</span>
								<select name="cidade" id="cidade" style="display:none;" required></select>
							</div><!-- .informacoes-pessoais --><br>
							<div id="map-canvas" style="width:557px;height:409px;"></div><!-- div#map-canvas -->
							<div class="map-container" style="display:none;">
								<!-- Unidade de Local -->
							    <div class="map-place" data-lat="-23.5505199" data-long="-46.63330939999997" id="mark-0"> <!-- o id deve mudar -->
							    	<p>Unidade de Marcação</p>
							    	<label>latitude</label>
								    <input type="text" name="lat" id="lat-input" value="-23.5505199" >

								    <label>longitude</label>
								    <input type="text" name="long" id="long-input" value="-46.63330939999997">
							    </div><!-- .map-place -->
							    <!-- Unidade de Local -->
							</div><!-- .map-container -->
							<h3 class="title plantacoes">O que você cultiva?</h3>
							<span class="plantacoes">
								<ul class="l-row">
								<?php

								$sqlPlantacaoList = "SELECT * FROM DL_ADMIN_plantationList WHERE valido = '1' order by id desc";

								$resultPlantacaoList = mysql_query($sqlPlantacaoList);

							   	while ($row=mysql_fetch_array($resultPlantacaoList)) {
							   		$id=$row['id'];
									$plantacao=$row['plantacao'];
									$imagem=$row['imagem'];

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
								<li class="borda-radios">
									<label for="plantacao-<?php echo $id ?>">
										<img src="<?php echo $imagem; ?>" id="preview" class="plantacaofigura" />
										<?php echo $plantacao ?>
									</label>
									<input type="checkbox" name="platacao[]" id="plantacao-<?php echo $id ?>" value="<?php echo $id ?>">
								</li>
								<?php } ?>
								</ul>
							</span>
							<div class="mais-plantacoes">
								<p class="subtitle"> Você cultiva algo mais?<br>
								Separe as plantações com ponto e vírgula (,).</p>
								<input type="text" name="demaisplantacoes" placeholder="EU TAMBÉM PLANTO...">
							</div><!-- .mais-plantacoes --><br>
							<button type="submit" class="salvar-cadastro-perfil">Salvar</button>
						</form>
					</div><!-- Formulário de cadastro-->
					

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cadastrarperfil -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

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
	<!--filestyle -->
  	<script type="text/javascript" src="assets/js/bootstrap-filestyle.js"> </script>
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