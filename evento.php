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
				<section class="l-evento-exibicao">

					<h3 class="title">Evento Raízes</h3>
					
					<h4 class="title post">Evento #01 - Práticas de cultivo e gestão</h4>

					<div class="content-topo">

						<p class="evento-header"><span>25 de Maio de 2014</span></p>
						<div class="conteudo">
							<p>A primeira edição do evento, que ocorreu na sede da AAO no Parque da Água Branca, trouxe workshops/palestras relacionadas ao ensino financeiro e estratégico para os produtores orgânicos.</p>
							<p>Contou com aproximadamente 35 produtores de todo o pais.</p>
							<p>Tivemos destaque com a palestra "Perguntas e respostas básicas de Finanças", na qual contamos com a presença de Hugo Azevedo, operador de mercado que destilou de seu profundo conhecimento acadêmico e prático o cuidado de organizar cada pacote de perguntas seguindo uma ordem lógica e agrupando-as de maneira a permitir um aprendizado financeiro.</p>
							<p>Outro destaque foi a palestra da Dra. Ana Primavesi, primeira associada da AAO que recebeu o prêmio americano "One World Award" pela dedicação de uma vida inteira a favor da agricultura orgânica:</p>
							<p><em>"A Ecologia se refere ao sistema natural de cada local, envolvendo o solo, o clima, os seres vivos, bem como as inter-relações entre esses três componentes."</em></p>
						</div><!-- .conteudo -->

					</div><!-- .content-topo -->

					<div class="evento-imagens">
						<h4 class="title post">Imagens:</h4>
						<a class="galeria-imagens" rel="imagenspost" href="assets/img/template/evento-thumb.jpg"><img src="assets/img/template/evento-thumb.jpg" width="130" height="130"/></a>
						<a class="galeria-imagens" rel="imagenspost" href="assets/img/template/evento01.jpg"><img src="assets/img/template/evento01.jpg" width="130" height="130"/></a>
						<a class="galeria-imagens" rel="imagenspost" href="assets/img/template/evento02.jpg"><img src="assets/img/template/evento02.jpg" width="130" height="130"/></a>
					</div><!-- .evento-imagens -->

					<div class="cadastrar-comentario">
						<h4 class="title post">Comentar Publicação</h4>
						<form id="enviarComentarioDuvida" method="post" action="">
							<textarea id="ckeditor" rows="4" cols="50" name="comment" > </textarea>
							<input type="hidden" name="duvida" value="<?php echo $profile_id; ?>"><!-- $duvidaPost; -->
							<input type="hidden" name="perfil" value="<?php echo $profile_id; ?>">
							<input type="hidden" name="dono" value="<?php echo $profile_id; ?>"><!-- $idPerfilDuvida; -->
							<button type="submit" class="enviar-comentario">Enviar</button>
						</form>
					</div><!-- .cadastrar-comentario -->
					
					<div id="comentario0" class="comentario">
						<p class="header-comment">Por <a href="perfil.php?produtor=1">Gustavo Lima</a> | <span class="evento-header">26 de Maio de 2014</span></p>
						<div class="contetComment">Importantíssimas orientações recebidas, ótimo evento! Obrigado pela sua qualidade. Sucesso!</div><!-- .contetComment -->
					</div><!-- #comentario -->

					<div id="comentario1" class="comentario">
						<p class="header-comment">Por <a href="perfil.php?produtor=2">Beatriz Victorio</a> | <span class="evento-header">28 de Maio de 2014</span></p>
						<div class="contetComment">Adorei a palestra com o Hugo, agora posso melhorar meus processos financeiros.</div><!-- .contetComment -->
					</div><!-- #comentario -->

				</section><!-- .l-evento-exibicao -->

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