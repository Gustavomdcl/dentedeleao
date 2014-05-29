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
				<li><img src="" width="20" height="20" /> <a href="perfil.php" title="Perfil Pessoal">Perfil Pessoal</a></li>
				<li><img src="" width="20" height="20" /> <a href="notificacoes.php" title="Notificações">Notificações</a></li>
				<li><img src="" width="20" height="20" /> <a href="graficos.php" title="Gráficos">Gráficos</a></li>
				<li><img src="" width="20" height="20" /> <a href="duvidas.php" title="Dúvidas">Dúvidas</a></li>
				<li><img src="" width="20" height="20" /> <a href="produtores.php" title="Produtores">Produtores</a></li>
			</div><!-- .l-sidebar-center -->

			<div class="l-sidebar-bottom">
				<h3>Eventos</h3>
				<li><img src="" width="20" height="20" /> <a href=".php" title="Eventos Anteriores">Eventos Anteriores</a></li>
				<li><img src="" width="20" height="20" /> <a href=".php" title="Participar do Próximo">Participar do Próximo</a></li>
				<li><img src="" width="20" height="20" /> <a href=".php" title="Sediar Evento">Sediar Evento</a></li>
				<hr />
				<a href="sair.php" Title="Sair" class="logout">Sair</a>
			</div><!-- .l-sidebar-bottom -->

		</section><!-- .l-sidebar -->