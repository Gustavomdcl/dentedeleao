<?php
  require_once ("backend/header.php");
  // Id da Dúvida ======================================
  $duvidaPost 		=	isset($_GET['numero']) ? $_GET['numero'] : null;
  if($duvidaPost != null) {
  	require_once ("backend/modules/duvidaPost.php");
  } else {
  	header("Location: duvidas.php");
  }
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
	<div id="clima-img">
	<div id="clima-fx">
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
				<section class="l-duvida-exibicao">

					<h3 class="title">Dúvidas</h3>
					
					<h4 class="title post"><?php echo $tituloDuvida; ?></h4>

					<div class="content-topo">

						<p class="duvida-header">Por <a href="perfil.php?produtor=<?php echo $idPerfilDuvida; ?>" title="<?php echo $perfilDuvida; ?>"><?php echo $perfilDuvida; ?></a> | <span><?php echo $dataDuvida; ?></span><?php if($plantacaoDuvida==''){} else { ?> | <?php echo '<a href="duvida-resultado.php?plantacao=' . $plantacaoDuvidaId . '">'; foreach ($plantacaoDuvida as $plantacaoPart){ echo $plantacaoPart; } echo '</a>'; } ?></p>
						<div class="conteudo">
							<p><?php echo $textoDuvida; ?></p>
						</div><!-- .conteudo -->
						<?php if($tagDuvida==''){} else { ?>
						<p><span class="marcacao-pessoas">Já <?php if(count($tagDuvida)>1) { ?>ouviram<?php } else { ?>ouviu<?php } ?> algo sobre</span>,
							<span class="nomes-pessoas"> 
							<?php 
							$pessoasCount = 0;
							$pessoasTexto = '';
							foreach ($tagDuvida as $tagPart){
								$tagPart = explode("|",$tagPart);
								if($pessoasCount==0){
									$pessoasTexto = '';
								} else if ($pessoasCount+1==count($tagDuvida)) {
									$pessoasTexto = ' e ';
								} else {
									$pessoasTexto = ', ';
								}
							?><?php echo $pessoasTexto; ?><a href="perfil.php?produtor=<?php echo $tagPart[0]; ?>" title="<?php echo $tagPart[1]; ?>"><b><?php echo $tagPart[1]; ?></b></a><?php 
								$pessoasCount = $pessoasCount + 1;
							}//foreach 
							?>?</span></p>
						<?php }//else ?>

					</div><!-- .content-topo -->

					<?php if($imagemDuvida==''){} else { ?>
					<div class="duvida-imagens">
						<h4 class="title post">Imagens:</h4>
						<?php foreach ($imagemDuvida as $imagemPart){ ?>
							<a class="galeria-imagens" rel="imagenspost" href="<?php echo $imagemPart; ?>"><img src="<?php echo $imagemPart; ?>" width="130" height="130"/></a>
						<?php }//foreach ?>
					</div><!-- .duvida-imagens -->
					<?php }//else ?>
					<?php if($videoDuvida==''){} else { ?>
					<div class="duvida-videos">
						<h4 class="title post">Video:</h4>
						<video width="480" height="360" controls>
							Exibir video
						  <source src="<?php echo $videoDuvida; ?>" type="video/<?php echo $videoParts[1]; ?>">
						</video>
					</div><!-- .duvida-videos -->
					<?php }//else ?>
					<div class="cadastrar-comentario">
						<h4 class="title post">Comentar Publicação</h4>
						<form id="enviarComentarioDuvida" method="post" action="backend/envios/enviarComentarioDuvida.php">
							<textarea id="ckeditor" rows="4" cols="50" name="comment" > </textarea>
							<input type="hidden" name="duvida" value="<?php echo $duvidaPost; ?>">
							<input type="hidden" name="perfil" value="<?php echo $profile_id; ?>">
							<input type="hidden" name="dono" value="<?php echo $idPerfilDuvida; ?>">
							<button type="submit" class="enviar-comentario">Enviar</button>
						</form>
					</div><!-- .cadastrar-comentario -->
					<?php

			          $sqlCommentsDuvida = "SELECT * FROM DL_FORUM_coments WHERE forum = '$duvidaPost' order by id desc";
			          $resultCommentsDuvida = mysql_query($sqlCommentsDuvida);

			          if (mysql_num_rows($resultCommentsDuvida) > 0) {
			            $perfilCommentId;
			            $perfilCommentNome;
			            $textoComment;
			            $dataComment;
			            $commentCount = 1;

			            while ($row=mysql_fetch_array($resultCommentsDuvida)) {
			              $perfilCommentId = $row['perfil'];
			              $textoComment = $row['texto'];
			              $dataComment = $row['data'];

			              //DATA ===============
					      $dataCommentPartes          =   explode(" ", $dataComment);
					      $dataCommentUnidades        =   explode("-", $dataCommentPartes[0]);
					      if ($dataCommentUnidades[1]=='01'){ $dataCommentUnidades[1] = 'Janeiro'; }
					      else if ($dataCommentUnidades[1]=='02'){ $dataCommentUnidades[1] = 'Fevereiro'; }
					      else if ($dataCommentUnidades[1]=='03'){ $dataCommentUnidades[1] = 'Março'; }
					      else if ($dataCommentUnidades[1]=='04'){ $dataCommentUnidades[1] = 'Abril'; }
					      else if ($dataCommentUnidades[1]=='05'){ $dataCommentUnidades[1] = 'Maio'; }
					      else if ($dataCommentUnidades[1]=='06'){ $dataCommentUnidades[1] = 'Junho'; }
					      else if ($dataCommentUnidades[1]=='07'){ $dataCommentUnidades[1] = 'Julho'; }
					      else if ($dataCommentUnidades[1]=='08'){ $dataCommentUnidades[1] = 'Agosto'; }
					      else if ($dataCommentUnidades[1]=='09'){ $dataCommentUnidades[1] = 'Setembro'; }
					      else if ($dataCommentUnidades[1]=='10'){ $dataCommentUnidades[1] = 'Outubro'; }
					      else if ($dataCommentUnidades[1]=='11'){ $dataCommentUnidades[1] = 'Novembro'; }
					      else if ($dataCommentUnidades[1]=='12'){ $dataCommentUnidades[1] = 'Dezembro'; }
					      $dataComment          =   $dataCommentUnidades[2] . ' de ' . $dataCommentUnidades[1] . ' de ' . $dataCommentUnidades[0];

					      //PERFIL ===============
					      $sqlProfileComment = mysql_query("SELECT `nome` FROM DL_PROFILE WHERE id = '$perfilCommentId' limit 1");
					      while ($row=mysql_fetch_array($sqlProfileComment)) {
					          $perfilCommentNome       =   $row['nome'];
					      }
		            ?>
					<div id="comentario<?php echo $commentCount; ?>" class="comentario">
						<p class="header-comment">Por <a href="perfil.php?produtor=<?php echo $perfilCommentId; ?>"><?php echo $perfilCommentNome; ?></a> | <span class="duvida-header"><?php echo $dataComment; ?></span></p>
						<div class="contetComment"><?php echo $textoComment; ?></div><!-- .contetComment -->
					</div><!-- #comentario -->
					<?php $commentCount = $commentCount + 1; }//while ?>
					<?php } else { ?>
					<div id="comentario0" class="comentario">
						<div class="contetComment"><p>Ninguém comentou nessa dúvida. Seja o primeiro!</p></div><!-- .contetComment -->
					</div><!-- #comentario0-->
					<?php }//else ?>

				</section><!-- .l-duvida-exibicao -->

			</section><!-- .l-content -->

    	</div><!-- .l-container.cf -->

    </section><!-- .l-main -->

	<?php include 'template/footer.php'; ?>

	</div><!-- #site -->
	</div>
	</div>

	<?php include 'template/script.php'; ?>
  	<script src="assets/min/jquery.ui.min.js"></script>
  	<script src="assets/min/jquery.fancybox.min.js"></script>
  	<script>
  	$(".galeria-imagens").fancybox({
			'scrolling'		: 'no',
			'titleShow'		: false,
		});
  	</script>
</body>
</html>