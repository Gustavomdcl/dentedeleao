<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");
?>
<!DOCTYPE html>
<html lang="pt_BR">
<head>

	<title>Dente de Leão | Lista de Plantação</title>

	<!-- SEO rel="nofollow" on links
	======================================================== -->
	<meta name="robots" content="NOINDEX, nofollow" />	
	<meta name="title" content="Dente de Leão | Lista de Plantação">
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
							<li>Lista de Plantação</li>
						</ul>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<div class="l-row">

					<div class="l-col12">

						<h1>Lista de Plantação <i class="fa fa-leaf"></i></h1>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-cover -->

		<!-- new
		======================================================== -->
		<section class="l-new">

			<div class="l-container cf">

				<div class="l-row">

					<form id="formPlantacaoList" method="post" action="backend/envios/enviarPlantacaoList.php" enctype="multipart/form-data">

					<div class="l-col4">

						<span class="input-field"><input type="text" name="nomenovaplantacao" id="nomenovaplantacao" placeholder="Plantação" class="error-left" required></span>

					</div><!-- .l-col4 -->

					<div class="l-col5">

						<span class="input-field"><input type="file" name="imgnovaplantacao[]" id="imgnovaplantacao" onchange="readURL(this);" class="ignore" accept="image/png, image/gif, image/bmp, image/jpeg, image/jpg"></span>

					</div><!-- .l-col5 -->

					<div class="l-col1">
	
						<img src="assets/img/template/logo.gif" id="preview" class="plantacaofigura" width="50" height="50" />

					</div><!-- .l-col1 -->

					<div class="l-col2">

						<button type="submit"><span>Enviar</span> <i class="fa fa-caret-right"></i> </button>

					</div><!-- .l-col2 -->

					</form>

					<div class="l-col12">

						<?php

						$error = isset($_GET['error']) ? $_GET['error'] : null;
						if($error) {
							echo '<p class="btn">A plantação ' . $error . ' já existe <i class="fa fa-exclamation-triangle"></i></p>';
						}
						?>

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-new -->

		<!-- dashboard
		======================================================== -->
		<section class="l-dashboard">

			<div class="l-container cf">

				<?php 

				$sqlPlantacaoUserList = "SELECT * FROM DL_ADMIN_plantationList WHERE valido = '0' order by id desc";

				$resultPlantacaoUserList = mysql_query($sqlPlantacaoUserList);

				if (mysql_num_rows($resultPlantacaoUserList) > 0) {

				?>

				<div class="l-row">

					<div class="l-col12">

						<div class="content">

							<h2>Plantações Pendentes</h2>

							<nav>
								<ul class="l-row">
									<?php

								   	while ($row=mysql_fetch_array($resultPlantacaoUserList)) {
								   		$id=$row['id'];
										$plantacao=$row['plantacao'];
										$imagem=$row['imagem'];

										if($imagem == null){ 
											$imagem = 'assets/img/template/logo.gif'; 
										} else { 

											$imagemId = explode('-', $imagem);

											$sqlPlantacaoimg = "SELECT * FROM DL_IMAGES WHERE id = '$imagemId[0]' order by id desc";
											$resultPlantacaoimg = mysql_query($sqlPlantacaoimg);

											while ($row=mysql_fetch_array($resultPlantacaoimg)) {
												$imagem = '../'.$row['caminho'] . $row['nome_imagem'];
											}
										}

									?> 

									<li class="l-col1"><img src="<?php echo $imagem ?>" id="preview" class="plantacaofigura" width="40" height="40" /></li>
									<li class="l-col11"><p class="btn"><?php echo $plantacao ?> 
										<a href="#confirm_form" data-id="<?php echo $id ?>" data-plantacao="<?php echo $plantacao ?>" data-img="<?php echo $imagem ?>" class="icon excluir modal"><i class="fa fa-trash-o"></i></a>
										<a href="#edit_form" data-id="<?php echo $id ?>" data-plantacao="<?php echo $plantacao ?>" data-img="<?php echo $imagem ?>" class="icon editar modal"><i class="fa fa-pencil"></i></a>
										<a href="#valida_form" data-id="<?php echo $id ?>" data-plantacao="<?php echo $plantacao ?>" data-img="<?php echo $imagem ?>" class="icon validar modal"><i class="fa fa-check"></i></a>
									</p></li>

									<?php } ?>

								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

				<?php } ?>

				<div class="l-row">

					<div class="l-col12">

						<div class="content">

							<h2>Plantações Validadas</h2>

							<nav>
								<ul class="l-row">
									<?php

									$sqlPlantacaoList = "SELECT * FROM DL_ADMIN_plantationList WHERE valido = '1' order by id desc";

									$resultPlantacaoList = mysql_query($sqlPlantacaoList);

								   	while ($row=mysql_fetch_array($resultPlantacaoList)) {
								   		$id=$row['id'];
										$plantacao=$row['plantacao'];
										$imagem=$row['imagem'];

										if($imagem == null){ 
											$imagem = 'assets/img/template/logo.gif'; 
										} else { 

											$imagemId = explode('-', $imagem);

											$sqlPlantacaoimg = "SELECT * FROM DL_IMAGES WHERE id = '$imagemId[0]' order by id desc";
											$resultPlantacaoimg = mysql_query($sqlPlantacaoimg);

											while ($row=mysql_fetch_array($resultPlantacaoimg)) {
												$imagem = '../'.$row['caminho'] . $row['nome_imagem'];
											}
										}

									?> 

									<li class="l-col1"><img src="<?php echo $imagem; ?>" id="preview" class="plantacaofigura" width="40" height="40" /></li>
									<li class="l-col11"><p class="btn"><?php echo $plantacao ?> 
										<a href="#confirm_form" data-id="<?php echo $id ?>" data-plantacao="<?php echo $plantacao ?>" data-img="<?php echo $imagem; ?>" class="icon excluir modal"><i class="fa fa-trash-o"></i></a>
										<a href="#edit_form" data-id="<?php echo $id ?>" data-plantacao="<?php echo $plantacao ?>" data-img="<?php echo $imagem; ?>" class="icon editar modal"><i class="fa fa-pencil"></i></a>
									</p></li>

									<?php } ?>
								</ul>
							</nav>

						</div><!-- .content -->

					</div><!-- .l-col12 -->

				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-dashboard -->

		<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<div id="confirm_form" class="modal-content" style="width:500px;min-height:200px;">

		<h2><i class="fa fa-exclamation-triangle"></i> Atenção</h2>

			<br>

		<p>Você realmente deseja deletar a plantação <span id="deletplantacaoname"></span>?<p>

			<br>

		<form id="formDeletPlantacao" method="post" action="backend/deletes/deletarPlantacaoList.php">

			<input type="hidden" name="deletplantacao" id="deletplantacao">

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

	<div id="edit_form" class="modal-content" style="width:960px;min-height:200px;">

		<h2><i class="fa fa-pencil"></i> Editar <span id="editarplantacaoname"></span></h2>

		<br>

		<div class="l-container cf">

			<div class="l-row">

				<form id="formEditPlantacaoList" method="post" action="backend/envios/editarPlantacaoList.php" enctype="multipart/form-data">

				<input type="hidden" name="idnovaplantacaoeditar" id="idnovaplantacaoeditar">

				<div class="l-col4">

					<span class="input-field"><input type="text" name="nomenovaplantacaoeditar" id="nomenovaplantacaoeditar" placeholder="Plantação" class="error-left" required></span>

				</div><!-- .l-col4 -->

				<div class="l-col5">

					<span class="input-field"><input type="file" name="imgnovaplantacaoeditar[]" id="imgnovaplantacaoeditar" class="ignore" onchange="readURLedit(this);" accept="image/x-png, image/gif, image/bmp, image/jpeg"></span>

				</div><!-- .l-col5 -->

				<div class="l-col1">

					<img src="assets/img/template/logo.gif" id="previewimgeditar" class="plantacaofigura" width="50" height="50" />

				</div><!-- .l-col1 -->

				<div class="l-col2">

					<button type="submit"><span>Enviar</span> <i class="fa fa-caret-right"></i> </button>

				</div><!-- .l-col2 -->

				</form>

			</div><!-- .l-row -->

		</div><!-- .l-container.cf -->

	</div><!-- #edit_form -->

	<div id="valida_form" class="modal-content" style="width:500px;min-height:200px;">

		<h2><i class="fa fa-exclamation-triangle"></i> Atenção</h2>

			<br>

		<p>Você realmente deseja aprovar <span id="nomeselecionado"></span> como plantação válida?<p>

			<br>

		<form id="formConfirmPlantacao" method="post" action="backend/envios/confirmarPlantacao.php">

			<input type="hidden" name="confirmplantacao" id="confirmplantacao">

			<input type="hidden" name="confirmid" id="confirmid">

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

	</div><!-- #valida_form -->

	<?php include 'template/script.php'; ?>
	<script>
	$('.modal').click(function(){
		//excluir plantacao
		$('#deletplantacaoname').text($(this).attr('data-plantacao'));
		$('#deletplantacao').val($(this).attr('data-plantacao'));
		$('#deletid').val($(this).attr('data-id'));
		//editar plantacao
		$('#editarplantacaoname').text($(this).attr('data-plantacao'));
		$('#nomenovaplantacaoeditar').val($(this).attr('data-plantacao'));
		$('#idnovaplantacaoeditar').val($(this).attr('data-id'));
		$('#previewimgeditar').attr('src', $(this).attr('data-img'));
		//aprovar plantacao
		$('#nomeselecionado').text($(this).attr('data-plantacao'));
		$('#confirmplantacao').val($(this).attr('data-plantacao'));
		$('#confirmid').val($(this).attr('data-id'));
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