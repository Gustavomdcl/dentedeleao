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
	<!-- picker CSS -->
  	<link rel="stylesheet" href="assets/css/jquery-ui-datepicker.css">

	<!-- modernizr modernizr.com -->
	<script src="assets/min/modernizr.min.js"></script>
	
</head>

<body class="no-js">

	<!-- site
	======================================================== -->
	<div id="site">

		<?php include 'template/header.php'; ?>

		<!-- ADRIAN: ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-duvida-cadastro">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Dúvidas</h2>
					</header>
					
					<h3>Cadastrar Dúvida</h3>
					<p>Preencha os campos abaixo para publicar sua dúvida.</p>
					<form>
						<input type="text" name="titulopost" id="titulo" placeholder="Título" required><br>
						<textarea rows="5" cols="60" name="conteudo" placeholder="Descrição" required></textarea>
						<p>Deseja marcar algum amigo em sua publicação? Caso deseje marcar mais de um, separe-os com ponto-vírgula (;)</p>
						<input type="text" name="amigos" id="amigos"><br>
						<p>Qual a data de início do problema?</p>
						<input type="text" id="datepicker">
						<p>A qual platação está relacionada a sua dúvida?</p>
						<span class="plantacoes">
							<input type="checkbox" name="platacao[]" value="Tomate">
							<input type="checkbox" name="platacao[]" value="Cebola">
							<input type="checkbox" name="platacao[]" value="Morango">
							<input type="checkbox" name="platacao[]" value="Espinafre">
							<input type="checkbox" name="platacao[]" value="Batata">
						</span>
						<p>Deseja enviar fotos?</p>
						<!--UL para upload das 5 fotos permitidas, peguei no airu e comentei-->
						<ul>
							<li id="img_li_1">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" style="display:none;" width="130" height="130">
                                </div>
                                <!--Clicar e visualizar a imagem no tamanho real-->
                                <div class="previewButtonWrapper showFullImage" style="display: none;">
                                <div>
                                    <button type="button">Pré visualização</button>
                                </div>
                            	</div>
                            	<!--Caso tenha subido a imagem errada, opção de excluir Só aparece depois que a imagem subiu-->
                            	<a title="Excluir" style="display: none;" class="deleteImage" href="/"><span class="deleteIcon">X</span></a>
                            	<!--Subir imagem-->
                            	<div class="uploadImageHidden">
	                                <form id="image_form_1">
	                                	<!--<button type="button" class="addImageButton">Adicionar imagem</button>-->
		                                <div class="fileUploadImage">
		                                	<input type="file" name="image" style="" class="productImage" id="image_1">
		                                </div>
	                                	<input type="hidden" name="uploadImage" value="">
		                                <div style="display: none;">
		                                	<input type="hidden" name="" >
		                                	<input type="hidden" name="" value="">
		                                </div>
                                	</form>
                                </div>
                            </li>

                            <li id="img_li_2">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" style="display:none;" width="130" height="130">
                                </div>
                                <!--Clicar e visualizar a imagem no tamanho real-->
                                <div class="previewButtonWrapper showFullImage" style="display: none;">
                                <div>
                                    <button type="button">Pré visualização</button>
                                </div>
                            	</div>
                            	<!--Caso tenha subido a imagem errada, opção de excluir Só aparece depois que a imagem subiu-->
                            	<a title="Excluir" style="display: none;" class="deleteImage" href="/"><span class="deleteIcon">X</span></a>
                            	<!--Subir imagem-->
                            	<div class="uploadImageHidden">
	                                <form id="image_form_2">
	                                	<!--<button type="button" class="addImageButton">Adicionar imagem</button>-->
		                                <div class="fileUploadImage">
		                                	<input type="file" name="image" style="" class="productImage" id="image_2">
		                                </div>
	                                	<input type="hidden" name="uploadImage" value="">
		                                <div style="display: none;">
		                                	<input type="hidden" name="" >
		                                	<input type="hidden" name="" value="">
		                                </div>
                                	</form>
                                </div>
                            </li>

                            <li id="img_li_3">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" style="display:none;" width="130" height="130">
                                </div>
                                <!--Clicar e visualizar a imagem no tamanho real-->
                                <div class="previewButtonWrapper showFullImage" style="display: none;">
                                <div>
                                    <button type="button">Pré visualização</button>
                                </div>
                            	</div>
                            	<!--Caso tenha subido a imagem errada, opção de excluir Só aparece depois que a imagem subiu-->
                            	<a title="Excluir" style="display: none;" class="deleteImage" href="/"><span class="deleteIcon">X</span></a>
                            	<!--Subir imagem-->
                            	<div class="uploadImageHidden">
	                                <form id="image_form_3">
	                                	<!--<button type="button" class="addImageButton">Adicionar imagem</button>-->
		                                <div class="fileUploadImage">
		                                	<input type="file" name="image" style="" class="productImage" id="image_3">
		                                </div>
	                                	<input type="hidden" name="uploadImage" value="">
		                                <div style="display: none;">
		                                	<input type="hidden" name="" >
		                                	<input type="hidden" name="" value="">
		                                </div>
                                	</form>
                                </div>
                            </li>

                            <li id="img_li_4">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" style="display:none;" width="130" height="130">
                                </div>
                                <!--Clicar e visualizar a imagem no tamanho real-->
                                <div class="previewButtonWrapper showFullImage" style="display: none;">
                                <div>
                                    <button type="button">Pré visualização</button>
                                </div>
                            	</div>
                            	<!--Caso tenha subido a imagem errada, opção de excluir Só aparece depois que a imagem subiu-->
                            	<a title="Excluir" style="display: none;" class="deleteImage" href="/"><span class="deleteIcon">X</span></a>
                            	<!--Subir imagem-->
                            	<div class="uploadImageHidden">
	                                <form id="image_form_4">
	                                	<!--<button type="button" class="addImageButton">Adicionar imagem</button>-->
		                                <div class="fileUploadImage">
		                                	<input type="file" name="image" style="" class="productImage" id="image_4">
		                                </div>
	                                	<input type="hidden" name="uploadImage" value="">
		                                <div style="display: none;">
		                                	<input type="hidden" name="" >
		                                	<input type="hidden" name="" value="">
		                                </div>
                                	</form>
                                </div>
                            </li>

                            <li id="img_li_5">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" style="display:none;" width="130" height="130">
                                </div>
                                <!--Clicar e visualizar a imagem no tamanho real-->
                                <div class="previewButtonWrapper showFullImage" style="display: none;">
                                <div>
                                    <button type="button">Pré visualização</button>
                                </div>
                            	</div>
                            	<!--Caso tenha subido a imagem errada, opção de excluir Só aparece depois que a imagem subiu-->
                            	<a title="Excluir" style="display: none;" class="deleteImage" href="/"><span class="deleteIcon">X</span></a>
                            	<!--Subir imagem-->
                            	<div class="uploadImageHidden">
	                                <form id="image_form_5">
	                                	<!--<button type="button" class="addImageButton">Adicionar imagem</button>-->
		                                <div class="fileUploadImage">
		                                	<input type="file" name="image" style="" class="productImage" id="image_5">
		                                </div>
	                                	<input type="hidden" name="uploadImage" value="">
		                                <div style="display: none;">
		                                	<input type="hidden" name="" >
		                                	<input type="hidden" name="" value="">
		                                </div>
                                	</form>
                                </div>
                            </li>
						</ul>
						<p>E vídeo?</p>
						<form action="URL?nexturl=http%3A%2F%2Fwww.example.com" method="post" enctype="multipart/form-data" onsubmit="return checkForFile();">
						  <input id="file" type="file" name="file"/>
						  <div id="errMsg" style="display:none;color:red">
						    You need to specify a file.
						  </div>
						  <input type="hidden" name="token" value="TOKEN"/>
						  <!--Retirei botão, o publicar dúvida que será responsável por subir o vídeo. Pode form dentro de form?-->
						</form>
						<button type="submit">Publicar dúvida</button>
					</form>
					
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-duvida-exibicao -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

	<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
  	<script src="assets/min/jquery.ui.min.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  	<script>
	  $(function() {
	    $("#datepicker").datepicker({
		    dateFormat: 'dd/mm/yy',
		    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
		    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
		    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
		    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
		    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
		    nextText: 'Próximo',
		    prevText: 'Anterior'
		});
	});
	  </script>
</body>
</html>