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

				<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-resultado para .l-duvida-resultado ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
				======================================================== -->
				<section class="l-notificacoes">

					<header>
						<h2>Notificações</h2>
					</header>

					<?php

			        $sqlNotificacaoNome = "SELECT * FROM DL_NOTIFICATION WHERE tomador = '$profile_id' order by id desc";
			        $resultNotificacaoNome = mysql_query($sqlNotificacaoNome);

			        if (mysql_num_rows($resultNotificacaoNome) > 0) {
			          $id_notificacao;
			          $prestador;
			          $prestador_foto;
			          $forum;
			          $forum_nome;
			          $tipo;

			        ?>
					
					<h3>Dúvidas em que você foi marcado</h3>
					
					<ul id="conteudoNotificacoes"><!-- class="scroll" pq essa class? -->
						
			            <?php
			            while ($row=mysql_fetch_array($resultNotificacaoNome)) {
			              $id_notificacao = $row['id'];
			              $prestador = $row['prestador'];
			              $forum = $row['forum'];
			              $tipo = $row['tipo'];

			              //Prestador Nome
			              $sqlPrestadorNome = "SELECT `nome`, `foto` FROM DL_PROFILE WHERE id = '$prestador' order by id desc limit 1";
			              $resultPrestadorNome = mysql_query($sqlPrestadorNome);
			              while ($row=mysql_fetch_array($resultPrestadorNome)) {
			                $prestador = $row['nome'];
			                $prestador_foto = substr($row['foto'], 0, -1);
			              }
			              //Prestador Foto
			              if($prestador_foto == '' || $prestador_foto == null) {
			                $prestador_foto = 'admin/assets/img/template/logo.gif';
			              } else {
			                $sqlPrestadorFoto = "SELECT `caminho`, `nome_imagem` FROM DL_IMAGES WHERE id = '$prestador_foto' order by id desc limit 1";
			                $resultPrestadorFoto = mysql_query($sqlPrestadorFoto);
			                while ($row=mysql_fetch_array($resultPrestadorFoto)) {
			                  $prestador_foto = $row['caminho'] . $row['nome_imagem'];
			                }
			              }
			              //Fórum Nome
			              $sqlForumNome = "SELECT `titulo` FROM DL_FORUM WHERE id = '$forum' order by id desc limit 1";
			              $resultForumNome = mysql_query($sqlForumNome);
			              while ($row=mysql_fetch_array($resultForumNome)) {
			                $forum_nome = $row['titulo'];
			              }
			              //Marcação
			              if ($tipo == '1') {
			                $tipo = ' marcou você na dúvida:';
			              } else if ($tipo == '0') {
			                $tipo = ' comentou na sua dúvida:';
			              }
			            ?>

			            <li id="notification-<?php echo $id_notificacao; ?>"><img src="<?php echo $prestador_foto; ?>" alt="Pessoa" width="100" height="100" align="left" border="0" />
			              <b><?php echo $prestador; echo $tipo; ?></b>
			              <p><?php echo $forum_nome; ?></p>
			              <a href="duvida.php?numero=<?php echo $forum; ?>" >Saiba mais</a>
			            </li>

			            <?php }//while ?>
				        
					</ul> <!-- #conteudoNotificacoes -->

					<?php } else { ?>

					<h3>Ainda não há notificações</h3>

					<?php }//else ?>

				</section><!-- .l-notificacoes -->

			</section><!-- .l-content -->

    	</div><!-- .l-container.cf -->

    </section><!-- .l-main -->

	<?php include 'template/footer.php'; ?>	

	</div><!-- #site -->
	
	<?php include 'template/script.php'; ?>
  	<script>
  		$('.scroll').jscroll();
  	</script>
</body>
</html>