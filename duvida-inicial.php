<?php
	require_once ("backend/header.php");

	// RESULTADO BUSCAS ======================================
    $outrasPlantacoes 		=	$_POST['platacaoDevice'];
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

		<!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-resultado para .l-duvida-resultado ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
		======================================================== -->
		<section class="l-duvida-resultado">

			<div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

				<div class="l-row">
					<header>
						<h2>Dúvidas</h2>
					</header>
					<h3>Tenho uma dúvida sobre</h3>
					<p>Notou algum problema em sua plantação ou está com dúvida sobre alguma cultura? Selecione uma opção abaixo e, caso a dúvida não esteja relacionada a nenhuma opção, selecione outra.</p>
					<form id="duvidaSendSearch" method="post" action="duvida-resultado.php">
						<?php
						$sqlDispositivo = "SELECT * FROM DL_ADMIN_deviceuser WHERE usuario = '$idProfile' order by id desc";

						$resultDispositivo = mysql_query($sqlDispositivo);
						$deviceUserRow;
						$devicePlantations;

						if (mysql_num_rows($resultDispositivo) > 0 && $outrasPlantacoes == null) {
							require_once ("backend/modules/duvidaDevice.php");
						} else {
							require_once ("backend/modules/duvidaNoDevice.php");
						}
						?>
					</form>
				</div><!-- .l-row -->

			</div><!-- .l-container.cf -->

		</section><!-- .l-duvida-resultado -->

		<!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

	<?php include 'template/footer.php'; ?>	

	</div><!-- #site -->
	
	<?php include 'template/script.php'; ?>
  	<script src="assets/min/jquery.ui.min.js"></script>
  	<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  	<!-- Enviar Interactions Cookies -->
  	<script>
  	createCookie('duvidaSituation', '',0);
  	$('#duvidaSendSearch').submit(function(e){
		if ($(".devicePlantacao").length > 0){
			$(".devicePlantacao").each(function(){
				if($(this).is(':checked') && $(this).val() != "outra") {
					var duvidaSituation = $(this).val() + '|' + $('#datepicker').val();
					createCookie('duvidaSituation', duvidaSituation,100);
				}
			});
		} else if ($(".nodevicePlantacao").length > 0){
			var duvidaSituation;
			var plantationCount = 0;
			$(".nodevicePlantacao").each(function(e){
				if($(this).is(':checked')) {
					if(plantationCount==0){
						duvidaSituation = $(this).val();
					} else {
						duvidaSituation = duvidaSituation + '-' + $(this).val();
					}
					plantationCount ++;
				}
			});
			duvidaSituation = duvidaSituation + '|';
			createCookie('duvidaSituation', duvidaSituation,100);
		}
		//e.preventDefault();
  	});
  	</script>
  	<!-- Device Interactions -->
  	<script>
  	var primaryAction = $('#duvidaSendSearch').attr('action');
  	$('.deviceData').hide();
  	$('.devicePlantacao').change(function(){
		if($(this).val()=="outra"){
			$('#duvidaSendSearch').attr('action', 'duvida-inicial.php');
			$('.deviceData').hide();
			$('.deviceData').children('input').val('');
			$('.sendDevice').removeAttr('disabled');
		} else {
			$('#duvidaSendSearch').attr('action', primaryAction);
			$('.deviceData').show();
			$('.sendDevice').attr('disabled', 'disabled');
		}
	});
	$('#datepicker').change(function(){
		if($(this).val()==""){
			$('.sendDevice').attr('disabled', 'disabled');
		} else {
			$('.sendDevice').removeAttr('disabled');
		}
	});
  	</script>
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