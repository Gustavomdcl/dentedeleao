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
						<textarea id="ckeditor" rows="5" cols="60" name="conteudo" placeholder="Descrição" required></textarea>
						<p>Deseja marcar algum amigo em sua publicação? Digite as duas primeiras letras do nome e selecione.</p>
						<div id="pessoas_container"></div><!-- #pessoas_container -->
						<input type="hidden" name="pessoas" id="pessoas">
						<input type="text" name="amigos" id="amigos"><br>
						<p>Qual a data de início do problema?</p>
						<input type="text" id="datepicker">
						<p>A qual platação está relacionada a sua dúvida?</p>
						<span class="plantacoes">
							<?php foreach ($plantacoesLista as $value) {  ?>
								<label for="plantacao-<?php echo $value['id']; ?>"><img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['plantacao']; ?>" /><?php echo $value['plantacao']; ?></label>
								<input type="checkbox" name="platacao[]" value="<?php echo $value['id']; ?>" id="plantacao-<?php echo $value['id']; ?>">
							<?php }//foreach ?>
						</span><!-- .plantacoes -->
						<p>Deseja enviar fotos?</p>
						<!--UL para upload das 5 fotos permitidas, peguei no airu e comentei-->
						<ul>
							<li id="img_li_1">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" width="130" height="130">
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
                            </li><!-- #img_li_1 -->

                            <li id="img_li_2">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" width="130" height="130">
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
                            </li><!-- #img_li_2 -->

                            <li id="img_li_3">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" width="130" height="130">
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
                            </li><!-- #img_li_3 -->

                            <li id="img_li_4">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" width="130" height="130">
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
                            </li><!-- #img_li_4 -->

                            <li id="img_li_5">
								<!--Visualizar thumbnail-->
								<div class="imageWrapper">
                                	<img src="" alt="Ver imagem pequena" width="130" height="130">
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
                            </li><!-- #img_li_5 -->
						</ul>
						<p>E vídeo?</p>
						<div id="uploadVideo">
						  <input id="file" type="file" name="file"/>
						  <div id="errMsg" style="display:none; color:red;">
						    You need to specify a file.
						  </div>
						  <input type="hidden" name="token" value="TOKEN"/>
						</div> <!-- #uploadVideo -->
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
  	<!-- autocomplete >
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"-->
  	<style>
	/* Autocomplete
	----------------------------------*/    
	.ui-autocomplete-loading { background: white url('assets/img/modules/ui-anim_basic_16x16.gif') right center no-repeat; }

	/* workarounds */
	* html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */

	/* Menu
	----------------------------------*/
	/* Layout helpers
	----------------------------------*/
	.ui-helper-hidden {
		display: none;
	}
	.ui-helper-hidden-accessible {
		border: 0;
		clip: rect(0 0 0 0);
		height: 1px;
		margin: -1px;
		overflow: hidden;
		padding: 0;
		position: absolute;
		width: 1px;
	}
	.ui-helper-reset {
		margin: 0;
		padding: 0;
		border: 0;
		outline: 0;
		line-height: 1.3;
		text-decoration: none;
		font-size: 100%;
		list-style: none;
	}
	.ui-helper-clearfix:before,
	.ui-helper-clearfix:after {
		content: "";
		display: table;
		border-collapse: collapse;
	}
	.ui-helper-clearfix:after {
		clear: both;
	}
	.ui-helper-clearfix {
		min-height: 0; /* support: IE7 */
	}
	.ui-helper-zfix {
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		position: absolute;
		opacity: 0;
		filter:Alpha(Opacity=0);
	}

	.ui-front {
		z-index: 100;
	}


	/* Interaction Cues
	----------------------------------*/
	.ui-state-disabled {
		cursor: default !important;
	}


	/* Icons
	----------------------------------*/

	/* states and images */
	.ui-icon {
		display: block;
		text-indent: -99999px;
		overflow: hidden;
		background-repeat: no-repeat;
	}


	/* Misc visuals
	----------------------------------*/

	/* Overlays */
	.ui-widget-overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
	}
	.ui-menu-item a {
		padding: 10px;
		display: block;
		font-size: 14px;
	}
	.ui-menu-item a:hover {
		background: #666;
		color: #fff;
	}
	.ui-accordion .ui-accordion-header {
		display: block;
		cursor: pointer;
		position: relative;
		margin-top: 2px;
		padding: .5em .5em .5em .7em;
		min-height: 0; /* support: IE7 */
	}
	.ui-accordion .ui-accordion-icons {
		padding-left: 2.2em;
	}
	.ui-accordion .ui-accordion-noicons {
		padding-left: .7em;
	}
	.ui-accordion .ui-accordion-icons .ui-accordion-icons {
		padding-left: 2.2em;
	}
	.ui-accordion .ui-accordion-header .ui-accordion-header-icon {
		position: absolute;
		left: .5em;
		top: 50%;
		margin-top: -8px;
	}
	.ui-accordion .ui-accordion-content {
		padding: 1em 2.2em;
		border-top: 0;
		overflow: auto;
	}
	.ui-autocomplete {
		position: absolute;
		top: 0;
		left: 0;
		cursor: default;
		background: #fff;
	}
	.ui-button {
		display: inline-block;
		position: relative;
		padding: 0;
		line-height: normal;
		margin-right: .1em;
		cursor: pointer;
		vertical-align: middle;
		text-align: center;
		overflow: visible; /* removes extra width in IE */
	}
	.ui-button,
	.ui-button:link,
	.ui-button:visited,
	.ui-button:hover,
	.ui-button:active {
		text-decoration: none;
	}
	/* to make room for the icon, a width needs to be set here */
	.ui-button-icon-only {
		width: 2.2em;
	}
	/* button elements seem to need a little more width */
	button.ui-button-icon-only {
		width: 2.4em;
	}
	.ui-button-icons-only {
		width: 3.4em;
	}
	button.ui-button-icons-only {
		width: 3.7em;
	}

	/* button text element */
	.ui-button .ui-button-text {
		display: block;
		line-height: normal;
	}
	.ui-button-text-only .ui-button-text {
		padding: .4em 1em;
	}
	.ui-button-icon-only .ui-button-text,
	.ui-button-icons-only .ui-button-text {
		padding: .4em;
		text-indent: -9999999px;
	}
	.ui-button-text-icon-primary .ui-button-text,
	.ui-button-text-icons .ui-button-text {
		padding: .4em 1em .4em 2.1em;
	}
	.ui-button-text-icon-secondary .ui-button-text,
	.ui-button-text-icons .ui-button-text {
		padding: .4em 2.1em .4em 1em;
	}
	.ui-button-text-icons .ui-button-text {
		padding-left: 2.1em;
		padding-right: 2.1em;
	}
	/* no icon support for input elements, provide padding by default */
	input.ui-button {
		padding: .4em 1em;
	}

	/* button icon element(s) */
	.ui-button-icon-only .ui-icon,
	.ui-button-text-icon-primary .ui-icon,
	.ui-button-text-icon-secondary .ui-icon,
	.ui-button-text-icons .ui-icon,
	.ui-button-icons-only .ui-icon {
		position: absolute;
		top: 50%;
		margin-top: -8px;
	}
	.ui-button-icon-only .ui-icon {
		left: 50%;
		margin-left: -8px;
	}
	.ui-button-text-icon-primary .ui-button-icon-primary,
	.ui-button-text-icons .ui-button-icon-primary,
	.ui-button-icons-only .ui-button-icon-primary {
		left: .5em;
	}
	.ui-button-text-icon-secondary .ui-button-icon-secondary,
	.ui-button-text-icons .ui-button-icon-secondary,
	.ui-button-icons-only .ui-button-icon-secondary {
		right: .5em;
	}

	/* button sets */
	.ui-buttonset {
		margin-right: 7px;
	}
	.ui-buttonset .ui-button {
		margin-left: 0;
		margin-right: -.3em;
	}
	</style>
  	<script>
	  $(function() {
	    function split( val ) {
	      return val.split( /,\s*/ );
	    }
	    function extractLast( term ) {
	      return split( term ).pop();
	    }
	 
	    $( "#amigos" )
	      // don't navigate away from the field on tab when selecting an item
	      .bind( "keydown", function( event ) {
	        if ( event.keyCode === $.ui.keyCode.TAB &&
	            $( this ).data( "ui-autocomplete" ).menu.active ) {
	          event.preventDefault();
	        }
	      })
	      .autocomplete({
	        source: function( request, response ) {
	          $.getJSON( "backend/envios/buscarPessoas.php", {
	            term: extractLast( request.term )
	          }, response );
	        },
	        search: function() {
	          // custom minLength
	          var term = extractLast( this.value );
	          if ( term.length < 2 ) {
	            return false;
	          }
	        },
	        focus: function() {
	          // prevent value inserted on focus
	          return false;
	        },
	        select: function( event, ui ) {
	          if($('#pessoas').val().indexOf(ui.item.id) > -1) {
	          	$('.pessoa-'+ui.item.id).effect( "shake", {}, 500 );
	          	this.value = "";
	          	return false;
	          } else {
		          //Adiciona a div
		          $('#pessoas_container').append('<div class="pessoa_marcada pessoa-' + ui.item.id + '"><img src="' + ui.item.value + '" width="50" height="50" alt="' + ui.item.label + '"><p>Você marcou ' + ui.item.label + ' na sua dúvida. <a href="javascript:fecha(' + ui.item.id + ');">cancelar</a></p></div><!-- .pessoa_marcada -->');
		          //Limpa o input
		          this.value = "";
		          //Area dos Ids
		          $('#pessoas').val($('#pessoas').val() + '|' + ui.item.id);
		          return false;
	          }
	        }
	      });
	  });
		function fecha(e) {
			$('#pessoas').val($('#pessoas').val().replace('|' + e,''));
			$('.pessoa-'+e).remove();
		}
	  </script>
  	<!-- datepieker -->
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