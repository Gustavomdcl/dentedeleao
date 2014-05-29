		<!-- sidebar 
		======================================================== -->
		<section class="l-sidebar" role="banner">

			<div class="l-sidebar-top">
				<div class="l-container cf">
					<p><img src="<?php echo $foto ?>" alt="icone" width="38" height="38" border="0" /> <?php echo $nome ?> <a href="editar-perfil.php"><img src="" alt="editar perfil" width="20" height="20" /></a><br>
					<div id="all-weather">
		                <div id="browser_geo" data-cidade="<?php echo $cidade ?>" data-latitude="<?php echo $latitude ?>" data-longitude="<?php echo $longitude ?>"></div><!-- Localizar -->
		                <div id="location"></div>
		                <div class="t" id="degreesCelsius">
		                    <span class="number"></span>
		                    <span class="cel"></span>
		                </div><!-- .degreesCelsius -->
		            </div>
				</div><!-- .l-container.cf -->
			</div><!-- .l-sidebar-top -->

			<div class="l-sidebar-center">
				<div class="l-container cf">
					<h3>Painel</h3>
					<li><img src="" width="20" height="20" /> <a href="perfil.php" title="Perfil Pessoal">Perfil Pessoal</a></li>
					<li><img src="" width="20" height="20" /> <a href="notificacoes.php" title="Notificações">Notificações</a></li>
					<li><img src="" width="20" height="20" /> <a href="graficos.php" title="Gráficos">Gráficos</a></li>
					<li><img src="" width="20" height="20" /> <a href="duvidas.php" title="Dúvidas">Dúvidas</a></li>
					<li><img src="" width="20" height="20" /> <a href="produtores.php" title="Produtores">Produtores</a></li>
				</div><!-- .l-container.cf -->
			</div><!-- .l-sidebar-center -->

			<div class="l-sidebar-bottom">
				<div class="l-container cf">
					<h3>Eventos</h3>
					<li><img src="" width="20" height="20" /> <a href=".php" title="Eventos Anteriores">Eventos Anteriores</a></li>
					<li><img src="" width="20" height="20" /> <a href=".php" title="Participar do Próximo">Participar do Próximo</a></li>
					<li><img src="" width="20" height="20" /> <a href=".php" title="Sediar Evento">Sediar Evento</a></li>
					<hr />
					<a href="sair.php" Title="Sair" class="logout">Sair</a>
				</div><!-- .l-container.cf -->
			</div><!-- .l-sidebar-bottom -->

		</section><!-- .l-sidebar -->