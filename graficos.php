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

            <?php

            $sqlDispositivo = "SELECT * FROM DL_ADMIN_deviceuser WHERE usuario = '$idProfile' order by id desc";

            $resultDispositivo = mysql_query($sqlDispositivo);
            $deviceUserRow;
            $devicePlantations;

            if (mysql_num_rows($resultDispositivo) > 0) {

              while ($row=mysql_fetch_array($resultDispositivo)) {
                if(in_array($row['plantacao'], (array) $devicePlantations)){//Se a plantação já existe
                } else {
                  $deviceUserRow[] = array(
                    'id'              => $row['id'],
                    'dispositivo'     => $row['dispositivo'],
                    'plantacao'       => $row['plantacao'],
                    'data_inicio'     => $row['data_inicio'],
                    'data_fim'        => $row['data_fim'],
                  );
                  $devicePlantations[] = $row['plantacao'];
                }
              }

              ?>

          <!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
          ======================================================== -->
          <section class="l-graficos">

                <header>
                  <h2>Dados da Plantação</h2>
                </header>
                <p class="subtitle">Selecione abaixo a aba correspondente ao cultivo que deseja visualizar.</p>
                <div id="abas">
                <h3 class="title">Meus Cultivos:</h3>
                <ul id="plantacoes">
                  <?php 

                  foreach ($deviceUserRow as $value) { 

                    $plantationNameId = $value['plantacao'];
                    //$imagem=$row['imagem'];

                    $sqlPlantacaoNome = "SELECT `plantacao`, `imagem` FROM DL_ADMIN_plantationList WHERE id = '$plantationNameId' order by id desc limit 1";
                    $resultPlantacaoNome = mysql_query($sqlPlantacaoNome);
                    while ($row=mysql_fetch_array($resultPlantacaoNome)) {
                      $plantationName=$row['plantacao'];
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
                  <li><a class="plantacao" target="<?php echo $value['plantacao']; ?>" style="background-image: url(<?php echo $imagem ?>);"><?php echo $plantationName; ?></a></li>
                  <!--<li class="plantacao" target="<?php echo $value['plantacao']; ?>"><img src="<?php echo $imagem ?>" alt="<?php echo $plantationName; ?>" /></li>-->
                  <?php 

                    }//while

                  }//foreach

                  ?>
                </ul><!-- #plantacoes -->

               </div><!-- #abas-->

                <?php

                foreach ($deviceUserRow as $value) {

                ?>
                
                  <div id="plantacao-<?php echo $value['plantacao']; ?>" class="target" data-plantacao="<?php echo $value['plantacao']; ?>">
                  <div class="bg-graficos">  
                    <h4 class="left"><img src="assets/img/template/tlt-chuva.png" alt="Chuva"/></h4>
                    <div id="chuva-<?php echo $value['plantacao']; ?>" style="width: 500px; height: 300px; float:right;"></div>
                      <!--<div id="chart" style='width: 500px; height: 300px;'></div>
                      <div id="control" style='width: 500px; height: 50px;'></div>
                    </div>-->
                    <!--a href="interna1" class="bt-vermais">Ver mais </a-->
                    <img src="assets/img/template/divisoria-graficos.png" alt="divisoria gráficos" class="divisoria" />
                  
                    <h4 class="right"><img src="assets/img/template/tlt-umidade.png" alt="Umidade"/></h4>
                    <div id="umidade-<?php echo $value['plantacao']; ?>" style="width: 500px; height: 300px; float:left;"></div>
                    <!--a href="interna1" class="bt-vermais">Ver mais </a-->

                    <img src="assets/img/template/divisoria-graficos.png" alt="divisoria gráficos" class="divisoria" />
                  
                    <h4 class="left"><img src="assets/img/template/tlt-umidade-solo.png" alt="Umidade do Solo"/></h4>
                    <div id="umidade_do_solo-<?php echo $value['plantacao']; ?>" style="width: 500px; height: 300px; float:right;"></div>
                    <!--a href="interna1" class="bt-vermais">Ver mais </a-->

                    <img src="assets/img/template/divisoria-graficos.png" alt="divisoria gráficos" class="divisoria" />
                  
                    <h4 class="right"><img src="assets/img/template/tlt-temperatura.png" alt="Temperatura"/></h4>
                    <div id="temperatura-<?php echo $value['plantacao']; ?>" style="width: 500px; height: 300px; float:left;"></div>
                  </div>  
                    <form id="verGrafico" method="post" action="grafico-detalhes.php">
                      <input type="hidden" value="<?php echo $value['id']; ?>" name="grafico">
                      <button type="submit" href="grafico-detalhes.php?dados=" class="bt-vermais">Ver mais</button>
                    </form>
                  
                
                <div class="values-container">

                <?php

                    $deviceCode = $value['dispositivo'];
                    $deviceDataFim;
                    $MysqlDataSintaxe;
                    
                    if($value['data_fim']!=null){
                      $deviceDataFim = $value['data_fim'];
                    } else {
                      $deviceDataFim = date('o\-m\-d');
                    }
                    $deviceNumberName = $value['dispositivo'];
                    $data_inicio = $value['data_inicio'];//00:00:00
                    $data_fim = $deviceDataFim . "23:59:59";
                    $sqlDispositivoBeta = "SELECT * FROM DL_DEVICE WHERE data BETWEEN '$data_inicio' and '$data_fim' AND dispositivo = '$deviceNumberName' order by id asc limit 2002";
                    $resultDispositivoBeta = mysql_query($sqlDispositivoBeta);
                    while ($row=mysql_fetch_array($resultDispositivoBeta)) {
                ?>
                  <div class="value-<?php echo $value['plantacao']; ?>" data-plantacao="<?php echo $value['plantacao']; ?>" data-id="<?php echo $row['id']; ?>" data-device="<?php echo $row['dispositivo']; ?>" data-umidade="<?php echo $row['umidade']; ?>" data-umidadedosolo="<?php echo (int)((100*($row['umidade_do_solo']-512))/368); ?>" data-temperatura="<?php echo $row['temperatura']; ?>" data-chuva="<?php echo (int)((100*(1024-$row['chuva']))/368); ?>" data-date="<?php echo $row['data']; ?>"></div>
                <?php 
                    }//while
                ?>
                  </div><!-- .values-container -->
                </div><!-- #plantacao -->
                <?php
                  }//foreach
                ?>

                <?php } else { ?>

                <!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
                ======================================================== -->
                <section class="l-graficos">

                  <div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

                    <div class="l-row">

                    <!-- ================= SEM SENSOR ================== -->
                    <header>
                      <h2>Dados da Plantação</h2>
                    </header>
                    <div id="sem-sensor">
                      <h3>Ainda não conhece o dispositivo?</h3>
                      <p class="subtitle">Monitore sua plantação 24h por dia, tenha acesso a gráficos e comece um banco de dados de informações para saber como resolver seus problemas em qualquer situação.</p>
                      <img src="" width="735" height="300" />
                    </div><!-- #sem-sensor  -->
                    <!-- ================= SEM SENSOR ================== -->

                <?php }//Não existe device ?> 

          </section><!-- .l-graficos -->

        </section><!-- .l-content -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-main -->

    <!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

  <?php include 'template/footer.php'; ?>

  </div><!-- #site -->
  </div>
  </div>

  <?php include 'template/script.php'; ?>
  <!-- mapa google-->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      //https://developers.google.com/chart/?hl=pt-br
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        jQuery(".target").each(function(e){

          var valueChuva = [['Horário', '%']];
          var valueUmidade = [['Horário', '%']];
          var valueUmidadeSolo = [['Horário', '%']];
          var valueTemperatura = [['Horário', '°C ']];

          jQuery(".value-" + jQuery(this).data('plantacao')).each(function(f){

            var valueDate = jQuery(this).data('date').split(" "); var valueFirst = valueDate[0].split("-"); var valueSecond = valueDate[1].split(":");
            var ano = valueFirst[0];
            var mes = valueFirst[1];
            var dia = valueFirst[2];
            var hora = valueSecond[0];
            var minuto = valueSecond[1];
            var segundos = valueSecond[2];

            valueChuva.push([dia + ' ' + hora + 'h',  jQuery(this).data('chuva')]);
            valueUmidade.push([dia + ' ' + hora + 'h',  jQuery(this).data('umidade')]);
            valueUmidadeSolo.push([dia + ' ' + hora + 'h',  jQuery(this).data('umidadedosolo')]);
            valueUmidadeSolo.push([dia + ' ' + hora + 'h',  jQuery(this).data('umidadedosolo')]);
            valueTemperatura.push([dia + ' ' + hora + 'h',  jQuery(this).data('temperatura')]);            
          });
          var dataChuva = google.visualization.arrayToDataTable(valueChuva);
          var dataUmidade = google.visualization.arrayToDataTable(valueUmidade);
          var dataUmidadeSolo = google.visualization.arrayToDataTable(valueUmidadeSolo);
          var dataTemperatura = google.visualization.arrayToDataTable(valueTemperatura);
          var options = {
            title: jQuery(this).data('nome')
          };
          var chartChuva = new google.visualization.LineChart(document.getElementById('chuva-' + jQuery(this).data('plantacao')));
          var chartUmidade = new google.visualization.LineChart(document.getElementById('umidade-' + jQuery(this).data('plantacao')));
          var chartUmidadeSolo = new google.visualization.LineChart(document.getElementById('umidade_do_solo-' + jQuery(this).data('plantacao')));
          var chartTemperatura = new google.visualization.LineChart(document.getElementById('temperatura-' + jQuery(this).data('plantacao')));
          chartChuva.draw(dataChuva, options);
          chartUmidade.draw(dataUmidade, options);
          chartUmidadeSolo.draw(dataUmidadeSolo, options);
          chartTemperatura.draw(dataTemperatura, options);

        });
        escondeTudo();
      }
    
    // Selecionar plantação

      function escondeTudo(){
        jQuery(".target").each(function(e){
          if(e==0){
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      }

      jQuery('.plantacao').each(function(){
          jQuery('#plantacao-'+$(this).attr('target')).attr('data-nome', jQuery(this).children('img').attr('alt'));
      });

      $("#abas li a").each(function(e){
        if(e==0) {
           $(this).addClass("active");
        }
      });

      jQuery(function(){
         
        jQuery('.plantacao').click(function(){
          jQuery('.target').hide();
          jQuery('#plantacao-'+$(this).attr('target')).show();
          $(".active").removeClass("active");
          $(this).addClass("active");
        });

      });
    </script>
</body>
</html>