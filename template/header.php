		<!-- header 
		======================================================== -->
		<header class="l-header" role="banner">

			<style>
				.clima-01d {
					background-color: #FFFAEA;
				}
				.clima-01n {
					background-color: #F3E0FF;
				}
				.clima-02d {
					background-color: #DDFAFF;
				}
				.clima-02n {
					background-color: #EAE9EE;
				}
				.clima-03d {
					background-color: #DBDBDB;
				}
				.clima-03n {
					background-color: #DBDBDB;
				}
				.clima-04d {
					background-color: #CFCFCF;
				}
				.clima-04n {
					background-color: #CFCFCF;
				}
				.clima-09d {
					background-color: #757588;
				}
				.clima-09n {
					background-color: #757588;
				}
				.clima-10d {
					background-color: #CACACA;
				}
				.clima-10n {
					background-color: #D3CDD8;
				}
				.clima-11d {
					background-color: #CFBABA;
				}
				.clima-11n {
					background-color: #DACAD0;
				}
				.clima-13d {
					background-color: #fff;
				}
				.clima-13n {
					background-color: #fff;
				}
				.clima-13d {
					background-color: #DBDBDB;
				}
				.clima-13n {
					background-color: #DBDBDB;
				}
			</style>

			<div class="l-header-top">
				<div class="l-container cf">
					<h1><img src="assets/img/template/dente-de-leao-logo.png" border="0" width="200" height="123" /></h1>
					<h2>Cultive Ideias. Colha conhecimento.</h2>
					<hr />
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
			</div><!-- .l-header-top -->

			<div class="l-header-center">
				<div class="l-container cf">
					<h3>Painel</h3>
					<li><img src="" width="20" height="20" /> <a href="perfil.php" title="Perfil Pessoal">Perfil Pessoal</a></li>
					<li><img src="" width="20" height="20" /> <a href="notificacoes.php" title="Notificações">Notificações</a></li>
					<li><img src="" width="20" height="20" /> <a href="graficos.php" title="Gráficos">Gráficos</a></li>
					<li><img src="" width="20" height="20" /> <a href="duvidas.php" title="Dúvidas">Dúvidas</a></li>
					<li><img src="" width="20" height="20" /> <a href="produtores.php" title="Produtores">Produtores</a></li>
				</div><!-- .l-container.cf -->
			</div><!-- .l-header-center -->

			<div class="l-header-bottom">
				<div class="l-container cf">
					<h3>Eventos</h3>
					<li><img src="" width="20" height="20" /> <a href=".php" title="Eventos Anteriores">Eventos Anteriores</a></li>
					<li><img src="" width="20" height="20" /> <a href=".php" title="Participar do Próximo">Participar do Próximo</a></li>
					<li><img src="" width="20" height="20" /> <a href=".php" title="Sediar Evento">Sediar Evento</a></li>
					<hr />
					<a href="sair.php" Title="Sair" class="logout">Sair</a>
				</div><!-- .l-container.cf -->
			</div><!-- .l-header-bottom -->

		</header><!-- .l-header -->