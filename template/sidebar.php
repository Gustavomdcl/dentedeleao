		<!-- sidebar 
		======================================================== -->
		<section class="l-sidebar" role="banner">

			<div class="l-sidebar-top">
				<div class="round-img foto-perfil">
					<img src="<?php echo $foto ?>" alt="icone" border="0" />
				</div><!-- .round-img.foto-perfil -->
				<div class="content-perfil">
					<p><span class="nome-perfil"><?php echo $nome ?> <a href="editar-perfil.php"><img src="assets/img/template/editar-perfil.gif" alt="editar perfil" title="Editar Perfil" /></a></span><br>
					<div id="all-weather">
		                <div id="browser_geo" data-cidade="<?php echo $cidade ?>" data-latitude="<?php echo $latitude ?>" data-longitude="<?php echo $longitude ?>"></div><!-- Localizar -->
		                <span class="fazenda-perfil"><?php echo $fazenda; ?></span>
		                <div id="location"></div>
		                <div class="t" id="degreesCelsius">
		                    <span class="number"></span><span class="cel"></span>
		                </div><!-- .degreesCelsius -->
		            </div><!-- #all-weather -->
		        </div><!-- .content-perfil -->
			</div><!-- .l-sidebar-top -->

			<div class="l-sidebar-center">
				<h3>Painel</h3>
				<ul>
					<li><a href="perfil.php" title="Perfil Pessoal"><img src="assets/img/template/perfil-menu.png" />Perfil Pessoal</a></li>
					<li><a href="notificacoes.php" title="Notificações"><img src="assets/img/template/notificacoes-menu.png" />Notificações</a></li>
					<li><a href="graficos.php" title="Gráficos"><img src="assets/img/template/dados-menu.png" />Gráficos</a></li>
					<li><a href="duvidas.php" title="Dúvidas"><img src="assets/img/template/duvidas-menu.png" />Dúvidas</a></li>
					<li><a href="produtores.php" title="Produtores"><img src="assets/img/template/produtores-menu.png" />Produtores</a></li>
					<li><a href="artigos.php" title="Artigos e Noticias"><img src="assets/img/template/artigos-menu.png" />Artigos e Noticias</a></li>
				</ul>
			</div><!-- .l-sidebar-center -->

			<div class="l-sidebar-bottom">
				<h3>Eventos</h3>
				<ul>
					<li><a href="eventos-anteriores.php" title="Eventos Anteriores"><img src="assets/img/template/eventos-anteriores-menu.png" />Eventos Anteriores</a></li>
					<li><a href="evento-proximo.php" title="Participar do Próximo"><img src="assets/img/template/evento-participar-menu.png" />Participar do Próximo</a></li>
					<li><a href="evento-sediar.php" title="Sediar Evento"><img src="assets/img/template/evento-sediar-menu.png" />Sediar Evento</a></li>
				</ul>
				<a href="sair.php" Title="Sair" class="logout"><img src="assets/img/template/logout.png" />Sair</a>
			</div><!-- .l-sidebar-bottom -->

		</section><!-- .l-sidebar -->