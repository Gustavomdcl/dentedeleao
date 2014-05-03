<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Dispositivos</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Dispositivos">
	<meta name="description" content="Administrador do site Dente de Leão">

	<?php include 'template/head.php'; ?>

	<!-- modernizr modernizr.com -->
	<script src="assets/min/modernizr.min.js"></script>

</head>

<body class="no-js">

	<!-- site
	======================================================== -->
	<div id="site">

		<?php include 'template/header.php'; ?>

		<!-- cover
		======================================================== -->
		<section class="l-cover">

			<div class="l-container cf">

				<div class="l-row">

					<div class="l-col12">

						<ul class="nav">
							<li><a href="painel.php" title="">Painel</a> /</li>
							<li>Lista de Dispositivos</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Dispositivos <i class="fa fa-tachometer"></i></h1>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cover -->

		<!-- new
		======================================================== -->
		<section class="l-new">

			<div class="l-container cf">

				<div class="l-row">

					<form id="formDispositivo" method="post" action="backend/envios/enviarDispositivo.php" enctype="multipart/form-data">

					<div class="l-col2">

						<div class="select">
							<select name="dispositivo" id="dispositivo">
								<option selected disabled>Dispositivo</option>
								<?php

								$sqlDispositivoList = "SELECT * FROM DL_DEVICE_code WHERE disponibilidade = '0' order by id desc";

								$resultDispositivoList = mysql_query($sqlDispositivoList);

							   	while ($row=mysql_fetch_array($resultDispositivoList)) {
							   		$idDispositivo=$row['id'];
									$codigoDispositivo=$row['codigo'];

								?>

								<option value="<?php echo $codigoDispositivo ?>"><?php echo $codigoDispositivo ?></option>

								<?php } ?>
							</select>
						</div><!-- .select -->

					</div><!-- .l-col2 -->

					<div class="l-col3">

						<div class="select">

							<span class="message-waiting-usuario">Escolha um Dispositivo</span>

							<select name="usuario" id="usuario" style="display:none;">
								<option selected disabled>Usuário</option>
								<?php

								$sqlUsuarioList = "SELECT * FROM DL_PROFILE order by id desc";

								$resultUsuarioList = mysql_query($sqlUsuarioList);

							   	while ($row=mysql_fetch_array($resultUsuarioList)) {
							   		$idUsuario=$row['id'];
									$nomeUsuario=$row['nome'];

								?>

								<option value="<?php echo $idUsuario ?>"><?php echo $nomeUsuario ?></option>

								<?php } ?>
							</select>

						</div><!-- .select -->

					</div><!-- .l-col3 -->

					<div class="l-col3">

						<div class="select">

							<span class="message-waiting-plantacao">Escolha um Dispositivo</span>

							<span class="carregando-plantacoes" style="display:none;">Carregando Plantações...</span>

							<select name="plantacao" id="plantacao" style="display:none;">
							</select>

						</div><!-- .select -->

					</div><!-- .l-col3 -->

					<div class="l-col2">

						<span class="input-field"><input type="text" name="data_inicio" id="data_inicio" placeholder="Data AAAA/MM/DD" value="<?php echo date('o\-m\-d'); ?>" class="error-left" required></span>

					</div><!-- .l-col2 -->

					<div class="l-col2">

						<button type="submit"><span>Enviar</span> <i class="fa fa-caret-right"></i> </button>

					</div><!-- .l-col2 -->

					</form>

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-new -->

		<!-- dashboard
		======================================================== -->
		<section class="l-dashboard">

			<div class="l-container cf">

				<div class="l-row">

					<div class="l-col12">

						<div class="content">

							<h2>Dispositivo Atuais</h2>

							<nav>
								<ul class="l-row">

									<li class="l-col12">
										<p class="btn l-row sumary">
											<span class="l-col3">Usuário</span>
											<span class="l-col3">Dispositivo</span>
											<span class="l-col3">Plantação</span>
											<span class="l-col3">Inicio</span>
										</p>
									</li>

									<?php

									$sqlDeviceAtual = "SELECT * FROM DL_ADMIN_deviceuser WHERE data_fim = '' order by id desc";

									$resultDeviceAtual = mysql_query($sqlDeviceAtual);

								   	while ($row=mysql_fetch_array($resultDeviceAtual)) {
								   		$id=$row['id'];
										$dispositivo=$row['dispositivo'];
										$usuario=$row['usuario'];
										$plantacao=$row['plantacao'];
										$data_inicio=$row['data_inicio'];

										$sqlProfile = "SELECT * FROM DL_PROFILE WHERE id = '$usuario' order by id desc";
										$resultProfile = mysql_query($sqlProfile);
										while ($row=mysql_fetch_array($resultProfile)) {
											$usuario = $row['nome'];
										}

										$sqlPlantacao = "SELECT * FROM DL_ADMIN_plantationList WHERE id = '$plantacao' order by id desc";
										$resultPlantacao = mysql_query($sqlPlantacao);
										while ($row=mysql_fetch_array($resultPlantacao)) {
											$plantacao = $row['plantacao'];
										}

									?>

									<li class="l-col12">
										<p class="btn l-row">
											<span class="l-col3"><?php echo $usuario ?></span>
											<span class="l-col3"><?php echo $dispositivo ?></span>
											<span class="l-col3"><?php echo $plantacao ?></span>
											<span class="l-col3"><?php echo $data_inicio ?></span>
											<a href="#confirm_form" data-id="<?php echo $id ?>" data-usuario="<?php echo $usuario ?>" data-dispositivo="<?php echo $dispositivo ?>" data-plantacao="<?php echo $plantacao ?>" data-inicio="<?php echo $data_inicio ?>" class="icon excluir modal"><i class="fa fa-trash-o"></i></a>
											<a href="#stop_form" data-id="<?php echo $id ?>" data-usuario="<?php echo $usuario ?>" data-dispositivo="<?php echo $dispositivo ?>" data-plantacao="<?php echo $plantacao ?>" data-inicio="<?php echo $data_inicio ?>" class="icon parar modal"><i class="fa fa-power-off"></i></a>
										</p>
									</li>

									<?php } ?>
								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<?php 

				$sqlDispositivoHistorico = "SELECT * FROM DL_ADMIN_deviceuser WHERE data_fim != '' order by id desc";

				$resultDispositivoHistorico = mysql_query($sqlDispositivoHistorico);

				if (mysql_num_rows($resultDispositivoHistorico) > 0) {

				?>

				<div class="l-row">

					<div class="l-col12">

						<div class="content">

							<h2>Histórico de Dispositivos</h2>

							<nav>
								<ul class="l-row">

									<li class="l-col12">
										<p class="btn l-row sumary">
											<span class="l-col3">Usuário</span>
											<span class="l-col2">Dispositivo</span>
											<span class="l-col3">Plantação</span>
											<span class="l-col2">Inicio</span>
											<span class="l-col2">Fim</span>
										</p>
									</li>

									<?php

								   	while ($row=mysql_fetch_array($resultDispositivoHistorico)) {
								   		$id=$row['id'];
										$dispositivo=$row['dispositivo'];
										$usuario=$row['usuario'];
										$plantacao=$row['plantacao'];
										$data_inicio=$row['data_inicio'];
										$data_fim=$row['data_fim'];

										$sqlProfileHistorico = "SELECT * FROM DL_PROFILE WHERE id = '$usuario' order by id desc";
										$resultProfileHistorico = mysql_query($sqlProfileHistorico);
										while ($row=mysql_fetch_array($resultProfileHistorico)) {
											$usuario = $row['nome'];
										}

										$sqlPlantacaoHistorico = "SELECT * FROM DL_ADMIN_plantationList WHERE id = '$plantacao' order by id desc";
										$resultPlantacaoHistorico = mysql_query($sqlPlantacaoHistorico);
										while ($row=mysql_fetch_array($resultPlantacaoHistorico)) {
											$plantacao = $row['plantacao'];
										}

									?> 

									<li class="l-col12">
										<p class="btn l-row">
											<span class="l-col3"><?php echo $usuario ?></span>
											<span class="l-col2"><?php echo $dispositivo ?></span>
											<span class="l-col3"><?php echo $plantacao ?></span>
											<span class="l-col2"><?php echo $data_inicio ?></span>
											<span class="l-col2"><?php echo $data_fim ?></span>
										</p>
									</li>

									<?php } ?>

								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<?php } ?>

			</div><!-- .l-container.cf -->

		</section><!-- .l-dashboard -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<div id="confirm_form" class="modal-content" style="width:500px;min-height:200px;">

		<h2><i class="fa fa-exclamation-triangle"></i> Atenção</h2>

			<br>

		<p>Você realmente deseja deletar o dispositivo <span id="dispositivoselecionado"></span>, cadastrado para o usuário <span id="nomeselecionado"></span> em sua plantação <span id="deletplantacaoname"></span>, com inicio em <span id="dataselecionada"></span>?<p>

			<br>

		<form id="formDeletDispositivo" method="post" action="backend/deletes/deletarDispositivo.php">

			<input type="hidden" name="deletdispositivo" id="deletdispositivo">

			<input type="hidden" name="deletid" id="deletid">

			<div class="l-row">
				<div class="l-col5">

					<button type="submit"><span>Confirmar</span></button>

				</div><!-- .l-col5 -->

				<div class="l-col2">

				</div><!-- .l-col2 -->

				<div class="l-col5">

					<button type="button" class="close-fancybox"><span>Cancelar</span></button>

				</div><!-- .l-col5 -->
			</div><!-- .l-row -->

		</form>

	</div><!-- #confirm_form -->

	<div id="stop_form" class="modal-content" style="width:500px;min-height:200px;">

		<h2><i class="fa fa-exclamation-triangle"></i> Atenção</h2>

			<br>

		<p>Você realmente deseja finalizar o dispositivo <span id="dispositivoparar"></span>, cadastrado para o usuário <span id="nomeparar"></span> em sua plantação <span id="stopplantacaoname"></span>, com inicio em <span id="dataparar"></span><br>
		na seguinte data?<p>

			<br>

		<form id="formStopDispositivo" method="post" action="backend/envios/pararDispositivo.php">

			<input type="hidden" name="stopdispositivo" id="stopdispositivo">

			<input type="hidden" name="stopid" id="stopid">

			<input type="text" placeholder="Data AAAA/MM/DD" value="<?php echo date('o\-m\-d'); ?>" name="data_fim" id="data_fim" class="centralize">

			<div class="l-row">
				<div class="l-col5">

					<button type="submit"><span>Confirmar</span></button>

				</div><!-- .l-col5 -->

				<div class="l-col2">

				</div><!-- .l-col2 -->

				<div class="l-col5">

					<button type="button" class="close-fancybox"><span>Cancelar</span></button>

				</div><!-- .l-col5 -->
			</div><!-- .l-row -->

		</form>

	</div><!-- #stop_form -->

	<?php include 'template/script.php'; ?>
	<script>
	/* LIBERA USUÁRIOS */
	$('#dispositivo').change(function(){
		if( $(this).val() ) {
			$('.message-waiting-usuario').hide();
			$('#usuario').show();
			$('.message-waiting-plantacao').text('Escolha um Usuário');
		} else {}
	});
	/* POPULA AS PLANTAÇÕES */
	//http://www.daviferreira.com/posts/populando-selects-de-cidades-e-estados-com-ajax-php-e-jquery
	$('#usuario').change(function(){
		if( $(this).val() ) {
			$('#plantacao').hide();
			$('.message-waiting-plantacao').hide();
			$('.carregando-plantacoes').show();
			$.getJSON('backend/envios/buscarPlantacaoUsuario.php?search=',{cod_profile: $(this).val(), ajax: 'true'}, function(j){
				var options = '<option selected disabled>Plantação</option>';	
				for (var i = 0; i < j.length; i++) {
					options += '<option value="' + j[i].cod_plantacao + '">' + j[i].plantacao + '</option>';
				}
				$('#plantacao').html(options).show();
				$('.carregando-plantacoes').hide();
			});
		} else {
			$('#cod_cidades').html('<option value="">-- Escolha um estado --</option>');
		}
	});
	</script>
	<script>
	$('.modal').click(function(){
		//excluir dispositivo
		$('#nomeselecionado').text($(this).attr('data-usuario'));
		$('#dispositivoselecionado').text($(this).attr('data-dispositivo'));
		$('#dataselecionada').text($(this).attr('data-inicio'));
		$('#deletplantacaoname').text($(this).attr('data-plantacao'));
		$('#deletdispositivo').val($(this).attr('data-dispositivo'));
		$('#deletid').val($(this).attr('data-id'));
		//parar dispositivo
		$('#nomeparar').text($(this).attr('data-usuario'));
		$('#dispositivoparar').text($(this).attr('data-dispositivo'));
		$('#dataparar').text($(this).attr('data-inicio'));
		$('#stopplantacaoname').text($(this).attr('data-plantacao'));
		$('#stopdispositivo').val($(this).attr('data-dispositivo'));
		$('#stopid').val($(this).attr('data-id'));
	});
	$('.close-fancybox').click(function(){
		$.fancybox.close();
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
		function readURLedit(input){
			if (input.files && input.files[0]){
				var reader = new FileReader();
				reader.onload = function (e) {
	                $('#previewimgeditar').attr('src',e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}
	</script>

</body>
</html>