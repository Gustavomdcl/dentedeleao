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
	<div id="site">

		<?php include 'template/header.php'; ?>

		<!-- ADRIAN: ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-duvida-exibicao">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Minha Dúvida</h2>
					</header>
					
					<h3><?php echo $tituloDuvida; ?></h3>
					<p>Por <a href="perfil.php?produtor=<?php echo $idPerfilDuvida; ?>" title="<?php echo $perfilDuvida; ?>"><?php echo $perfilDuvida; ?></a> | <span><?php echo $dataDuvida; ?></span><?php if($plantacaoDuvida==''){} else { ?> | <?php foreach ($plantacaoDuvida as $plantacaoPart){ echo $plantacaoPart; } } ?></p>
					<div class="conteudo">
						<p><?php echo $textoDuvida; ?></p>
					</div><!-- .conteudo -->
					<?php if($tagDuvida==''){} else { ?>
					<p>Já <?php if(count($tagDuvida)>1) { ?>ouviram<?php } else { ?>ouviu<?php } ?> algo sobre, 
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
						?>?</p>
					<?php }//else ?>

					<?php if($imagemDuvida==''){} else { ?>
					<hr />
					<?php foreach ($imagemDuvida as $imagemPart){ ?>
						<a class="galeria-imagens" rel="imagenspost" href="<?php echo $imagemPart; ?>"><img src="<?php echo $imagemPart; ?>" width="130" height="130"/></a>
					<?php }//foreach ?>
					<?php }//else ?>
					<?php if($videoDuvida==''){} else { ?>
					<hr />
					<video width="480" height="360" controls>
						Exibir video
					  <source src="<?php echo $videoDuvida; ?>" type="video/<?php echo $videoParts[1]; ?>">
					
					</video>
					<?php }//else ?>
					<hr />
					<h3>Comentários</h3>
					<form>
						<textarea id="ckeditor" rows="4" cols="50" name="comment" > </textarea>
						<button type="submit">Enviar Comentário</button>
					</form>
					<div id="comentario1" class="comentario">
						<p class="titulo"><b>Nome da pessoa</b> | data | horário </p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla auctor malesuada nunc viverra faucibus. Nulla viverra commodo quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam posuere lorem ipsum, at varius eros condimentum ac. Aenean eget elit vitae lacus tempus pretium. Integer vitae libero magna. Aenean sit amet ligula at dui tristique mattis. Suspendisse cursus rhoncus sem, eget fermentum ante hendrerit vel.</p>
					</div><!-- #comentario1-->
					<div id="comentario2" class="comentario">
						<p class="titulo"><b>Nome da pessoa</b> | data | horário </p>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla auctor malesuada nunc viverra faucibus. Nulla viverra commodo quam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nullam posuere lorem ipsum, at varius eros condimentum ac. </p>
					</div><!-- #comentario2-->
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-duvida-exibicao -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

	<?php include 'template/footer.php'; ?>

	</div><!-- #site -->

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