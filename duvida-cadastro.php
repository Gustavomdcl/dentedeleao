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

		<!-- .l-main
	    ======================================================== -->
	    <section class="l-main">

	      <div class="l-container cf">

	        <?php include 'template/sidebar.php'; ?>

	        <!-- .l-content
	        =================================================== -->
	        <section class="l-content">

				<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
				======================================================== -->
				<section class="l-duvida-cadastro">

					<header>
						<h2>Dúvidas</h2>
					</header>
					<div id="cadastrar-duvida">
						<h3>Cadastrar Dúvida</h3>
						<p>Preencha os campos abaixo para publicar sua dúvida.</p>
						<form id="enviarDuvida" method="post" action="backend/envios/enviarDuvida.php" enctype="multipart/form-data">
							<input type="text" name="titulo" id="titulo" placeholder="Título" required><br>
							<textarea id="ckeditor" rows="3" cols="60" name="conteudo" placeholder="Descrição" required></textarea>
							<input type="hidden" name="perfil" id="perfil" value="<?php echo $profile_id; ?>">
							<p style="margin-top:15px;">Deseja marcar algum amigo em sua publicação? Digite as duas primeiras letras do nome e selecione.</p>
							<div id="pessoas_container"></div><!-- #pessoas_container -->
							<input type="hidden" name="pessoas" id="pessoas">
							<input type="text" name="amigos" id="amigos"><br>
							<p>Qual a data de início do problema?</p>
							<input type="text" name="data" id="datepicker">
							<p style="color:#7a7460; margin-top:50px;">Selecione o cultivo relacionado a sua dúvida:</p>
							<input type="hidden" name="deviceplantation" id="devicePlantation">
							<span class="plantacoes">
								<ul style="height:470px;">
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
											<label for="plantacao-<?php echo $id ?>"><img src="<?php echo $imagem ?>" alt="<?php echo $plantacao ?>" /><?php echo $plantacao ?></label>
											<input type="radio"  name="plantacao[]" value="<?php echo $id ?>" id="plantacao-<?php echo $id ?>">
										</li>
									
								<?php }//while ?>
							</ul><!--l-row-->
							</span><!-- .plantacoes -->
							<p style="clear:both; color:#7a7460; margin:10px auto;">Deseja enviar fotos?</p>
							<!--UL para upload das 5 fotos permitidas, peguei no airu e comentei-->
							<ul class="lista-imagens">
								<li id="img_li_1">
									<!--Visualizar thumbnail-->
									<div class="imageWrapper">
			                        	<img src="assets/img/template/bg-subir-foto.png" alt="Ver imagem pequena" width="130" height="99">
			                        </div>
			                        <input type="file" name="image[]" class="productImage ignore filestyle" onchange="readURL(this);" accept="image/png, image/gif, image/bmp, image/jpeg, image/jpg" id="image_1">
			                    </li><!-- #img_li_1 -->

			                    <li id="img_li_2">
									<!--Visualizar thumbnail-->
									<div class="imageWrapper">
			                        	<img src="assets/img/template/bg-subir-foto.png" alt="Ver imagem pequena" width="130" height="99">
			                        </div>
			                        <input type="file" name="image[]" class="productImage ignore filestyle" onchange="readURL(this);" accept="image/png, image/gif, image/bmp, image/jpeg, image/jpg" id="image_2">
			                    </li><!-- #img_li_2 -->

			                    <li id="img_li_3">
									<!--Visualizar thumbnail-->
									<div class="imageWrapper">
			                        	<img src="assets/img/template/bg-subir-foto.png" alt="Ver imagem pequena" width="130" height="99">
			                        </div>
			                        <input type="file" name="image[]" class="productImage ignore filestyle" onchange="readURL(this);" accept="image/png, image/gif, image/bmp, image/jpeg, image/jpg" id="image_3">
			                    </li><!-- #img_li_3 -->

			                    <li id="img_li_4">
									<!--Visualizar thumbnail-->
									<div class="imageWrapper">
			                        	<img src="assets/img/template/bg-subir-foto.png" alt="Ver imagem pequena" width="130" height="99">
			                        </div>
			                        <input type="file" name="image[]" class="productImage ignore filestyle" onchange="readURL(this);" accept="image/png, image/gif, image/bmp, image/jpeg, image/jpg" id="image_4">
			                    </li><!-- #img_li_4 -->

			                </ul>
							<p style="clear:both; color:#7a7460; margin:10px auto;">E vídeo? (tamanho de até 20mb)</p>
							<div id="uploadVideo">
								<input  accept="video/*" id="file_video" type="file" size="20" class="ignore filestyle" name="video[]" data-buttonText="Enviar Vídeo " data-input="true" data-buttonBefore="true"/>
							  
							</div>
							<p id="videoMensagem"></p> <!-- #uploadVideo -->
							<button type="submit" class="salva-postar">Publicar dúvida</button>
						</form>
					</div>
				</section><!-- .l-duvida-exibicao -->

			</section><!-- .l-content -->

    	</div><!-- .l-container.cf -->

    </section><!-- .l-main -->

	<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

	<?php include 'template/script.php'; ?>
  	<script src="assets/min/jquery.ui.min.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  	<!--filestyle -->
  	<script type="text/javascript" src="assets/js/bootstrap-filestyle.js"> </script>
  	<!-- autocomplete >
	<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css"-->
  	
	<!-- cookies antigos sendo lidos -->
	<script>
  	if(readCookie('duvidaSituation')){
  		var duvidaSituation = readCookie('duvidaSituation').split("|");
  		if(duvidaSituation[0].indexOf("-") >= 0) {
  			var duvidaSituationPlantation = duvidaSituation[0].split("-");
  			$.each(duvidaSituationPlantation, function( index, value ) {
			  $("#plantacao-"+value).attr('checked', true);
			});
  		} else {
  			$("#plantacao-"+duvidaSituation[0]).attr('checked', true);
  			//$("#plantacao-"+duvidaSituation[0]).attr('disabled', 'disabled');
  			$('#devicePlantation').val(duvidaSituation[0]);
  		}
  		if(duvidaSituation[1]!=""){
  			$('#datepicker').val(duvidaSituation[1]);
  		}
  	}
  	</script>
  	<!-- tamanho arquivo -->
  	<script>
	$("#file_video").on("change", function (e) {

	    var files = e.currentTarget.files; // puts all files into an array

	    // call them as such files[0].size will get you the file size of the 0th file
	    for (var x in files) {

	        var filesize = ((files[x].size/1024)/1024).toFixed(4); // MB

	        if (files[x].name != "item" && typeof files[x].name != "undefined") {
	        	
	        	if(filesize <= 20) {
	        		//ok
	        		$('#videoMensagem').text('Vídeo está dentro do limite de 20mb, ele possui: '+ filesize + 'mb');
	        	} else {
		        	$("#file_video").replaceWith($("#file_video").clone());
		        	$('#videoMensagem').text('Vídeo excede o limite de 20mb, ele possui: '+ filesize + 'mb');
		        }

	        }
	    }
	});
  	</script>
  	<!-- busca para marcar pessoas -->
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
	<!-- Script do Input File imagem -->
	<script>
		function readURL(input){
			if (input.files && input.files[0]){
				var reader = new FileReader();
				reader.onload = function (e) {
	                $(input).parent('li').children('.imageWrapper').children('img').attr('src',e.target.result);
				};
				reader.readAsDataURL(input.files[0]);
			}
		}

		$(document).ready(function(){
		  $(":file").filestyle();
		});

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