<?php
  require_once ("backend/header.php");
  // RESULTADO GRAFICO ======================================
  $graficoDetalhado     = $_POST['grafico'];
  if($graficoDetalhado==null){
    header("Location: graficos.php");
  } else {}
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

      <?php

      $sqlDispositivo = "SELECT * FROM DL_ADMIN_deviceuser WHERE id = '$graficoDetalhado' order by id desc limit 1";

      $resultDispositivo = mysql_query($sqlDispositivo);

      while ($row=mysql_fetch_array($resultDispositivo)) {
            $idDeviceUser    = $row['id'];
            $dispositivo     = $row['dispositivo'];
            $plantacao       = $row['plantacao'];
            $data_inicio     = $row['data_inicio'];
            $data_fim        = $row['data_fim'];

      ?>

    <!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
    ======================================================== -->
    <section class="l-graficos">

      <div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

        <div class="l-row">
          <header>
            <h2>Dados da Plantação</h2>
          </header>
          <p>Selecione abaixo a aba correspondente ao cultivo que deseja visualizar.</p>

          <ul id="plantacoes">
            <?php 

              $plantacaoId = $plantacao;
              $imagem;

              $sqlPlantacaoNome = "SELECT * FROM DL_ADMIN_plantationList WHERE id = '$plantacaoId' order by id desc limit 1";
              $resultPlantacaoNome = mysql_query($sqlPlantacaoNome);
              while ($row=mysql_fetch_array($resultPlantacaoNome)) {

                $imagem=$row['imagem'];
                $plantacao=$row['plantacao'];

                if($imagem == null){ 
                      $imagem = 'admin/assets/img/template/logo.gif'; 
                    } else {

                      $imagemId = explode('-', $imagem);

                      $sqlPlantacaoimg = "SELECT * FROM DL_IMAGES WHERE id = '$imagemId[0]' order by id desc limit 1";
                      $resultPlantacaoimg = mysql_query($sqlPlantacaoimg);

                      while ($row=mysql_fetch_array($resultPlantacaoimg)) {
                        $imagem = $row['caminho'] . $row['nome_imagem'];
                      }
                    }

            ?>
            <li class="plantacao"><img src="<?php echo $imagem; ?>" alt="<?php echo $plantacao; ?>" /><?php echo $plantacao; ?></li>
            <?php }//while ?>
          </ul><!-- #plantacoes -->

          <hr />

          <div id="plantacao-<?php echo $plantacaoId; ?>" class="target" data-plantacao="<?php echo $plantacaoId; ?>">
            <h3>Chuva</h3>
            <div id="chuva-<?php echo $plantacaoId; ?>">
              <div id="chart-chuva" style='width: 735px; height: 300px;'></div>
              <div id="control-chuva" style='width: 735px; height: 50px;'></div>
            </div>

          <hr style="clear:both" />
            <h3>Umidade</h3>
            <div id="umidade-<?php echo $plantacaoId; ?>" style="width: 735px; height: 350px;">
              <div id="chart-umidade" style='width: 735px; height: 300px;'></div>
              <div id="control-umidade" style='width: 735px; height: 50px;'></div>
            </div>

          <hr style="clear:both" />
            <h3>Umidade do Solo</h3>
            <div id="umidade_do_solo-<?php echo $plantacaoId; ?>" style="width: 735px; height: 350px;">
              <div id="chart-umidade_do_solo" style='width: 735px; height: 300px;'></div>
              <div id="control-umidade_do_solo" style='width: 735px; height: 50px;'></div>
            </div>

          <hr style="clear:both" />
            <h3>Temperatura</h3>
            <div id="temperatura-<?php echo $plantacaoId; ?>" style="width: 735px; height: 350px;">
              <div id="chart-temperatura" style='width: 735px; height: 300px;'></div>
              <div id="control-temperatura" style='width: 735px; height: 50px;'></div>
            </div>

          <div class="values-container">

          <?php

              $deviceDataFim;
              
              if($data_fim!=null){
                $deviceDataFim = $data_fim;
              } else {
                $deviceDataFim = date('o\-m\-d');
              }
              $data_fim = $deviceDataFim . "23:59:59";
              $sqlDispositivoBeta = "SELECT * FROM DL_DEVICE WHERE data BETWEEN '$data_inicio' and '$data_fim' AND dispositivo = '$dispositivo' order by id asc";
              $resultDispositivoBeta = mysql_query($sqlDispositivoBeta);
              while ($row=mysql_fetch_array($resultDispositivoBeta)) {
          ?>
            <div class="value-<?php echo $plantacaoId; ?>" data-plantacao="<?php echo $plantacaoId; ?>" data-id="<?php echo $row['id']; ?>" data-device="<?php echo $row['dispositivo']; ?>" data-umidade="<?php echo $row['umidade']; ?>" data-umidadedosolo="<?php echo $row['umidade_do_solo']; ?>" data-temperatura="<?php echo $row['temperatura']; ?>" data-chuva="<?php echo $row['chuva']; ?>" data-date="<?php echo $row['data']; ?>"></div>
          <?php 
              }//while
          ?>
            </div><!-- .values-container -->
          </div><!-- #plantacao -->
          <?php
            }//while
          ?>
          
        </div><!-- .l-row -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-graficos -->

    <!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

  <?php include 'template/footer.php'; ?>

  </div><!-- #site -->

  <?php include 'template/script.php'; ?>
  <!-- mapa google-->
  <script type="text/javascript" src="//www.google.com/jsapi"></script>
    <script type="text/javascript">
      //https://developers.google.com/chart/?hl=pt-br
      google.load("visualization", "1.1", {packages:["corechart", "controls"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        jQuery(".target").each(function(e){

          var dateFormatter = new google.visualization.DateFormat({pattern: "dd/MM/yyyy 'às' HH:mm"});
          var anoFinal = []; var mesFinal = []; var diaFinal = []; var horaFinal = []; var minutoFinal = []; var segundoFinal = [];

          var chartChuva = new google.visualization.Dashboard(document.getElementById('chuva-' + jQuery(this).data('plantacao')));
          var chartUmidade = new google.visualization.Dashboard(document.getElementById('umidade-' + jQuery(this).data('plantacao')));
          var chartUmidadeDoSolo = new google.visualization.Dashboard(document.getElementById('umidade_do_solo-' + jQuery(this).data('plantacao')));
          var chartTemperatura = new google.visualization.Dashboard(document.getElementById('temperatura-' + jQuery(this).data('plantacao')));

          var valueChuva = new google.visualization.DataTable();
          var valueUmidade = new google.visualization.DataTable();
          var valueUmidadeDoSolo = new google.visualization.DataTable();
          var valueTemperatura = new google.visualization.DataTable();

          valueChuva.addColumn('datetime', 'Data');
          valueChuva.addColumn('number', 'Mililitros');
          valueUmidade.addColumn('datetime', 'Data');
          valueUmidade.addColumn('number', 'Mililitros');
          valueUmidadeDoSolo.addColumn('datetime', 'Data');
          valueUmidadeDoSolo.addColumn('number', 'Mililitros');
          valueTemperatura.addColumn('datetime', 'Data');
          valueTemperatura.addColumn('number', 'Celsius');

          jQuery(".value-" + jQuery(this).data('plantacao')).each(function(f){

            var valueDate = jQuery(this).data('date').split(" "); var valueFirst = valueDate[0].split("-"); var valueSecond = valueDate[1].split(":");
            var ano = valueFirst[0];
            var mes = valueFirst[1]-1;
            var dia = valueFirst[2];
            var hora = valueSecond[0];
            var minuto = valueSecond[1];
            var segundos = valueSecond[2];

            anoFinal.push(ano); mesFinal.push(mes); diaFinal.push(dia); horaFinal.push(hora); minutoFinal.push(minuto); segundoFinal.push(segundos);
            var dateUnidade = new Date(ano, mes, dia, hora, minuto, segundos);

            valueChuva.addRow([dateUnidade,  Number(jQuery(this).data('chuva'))]);
            valueUmidade.addRow([dateUnidade,  Number(jQuery(this).data('umidade'))]);
            valueUmidadeDoSolo.addRow([dateUnidade,  Number(jQuery(this).data('umidadedosolo'))]);
            valueTemperatura.addRow([dateUnidade,  Number(jQuery(this).data('temperatura'))]);
          });

          dateFormatter.format(valueChuva, 0);
          dateFormatter.format(valueUmidade, 0);
          dateFormatter.format(valueUmidadeDoSolo, 0);
          dateFormatter.format(valueTemperatura, 0);

          var control_chuva = new google.visualization.ControlWrapper({
           'controlType': 'ChartRangeFilter',//DateRangeFilter
           'containerId': 'control-chuva',
           'options': {
             // Filter by the date axis.
             'filterColumnIndex': 0,
             'ui': {
               'chartType': 'LineChart',
               'chartOptions': {
                 'chartArea': {'width': '95%'},
                 'hAxis': {'baselineColor': 'none'},
               },
               // Display a single series that shows the closing value of the stock.
               // Thus, this view has two columns: the date (axis) and the stock value (line series).
               'chartView': {
                 'columns': [0, 1],
               }
               // 1 day in milliseconds = 24 * 60 * 60 * 1000 = 86,400,000
               //'minRangeSize': 86400000
             }
           },
           // Initial range: 2012-02-09 to 2012-03-20.
           'state': {'range': {'start': new Date(anoFinal[0], mesFinal[0], diaFinal[0], horaFinal[0], minutoFinal[0], segundoFinal[0]), 'end': new Date(anoFinal[anoFinal.length-1], mesFinal[mesFinal.length-1], diaFinal[diaFinal.length-1], horaFinal[horaFinal.length-1], minutoFinal[minutoFinal.length-1], segundoFinal[segundoFinal.length-1])}}
         });

        var control_umidade = new google.visualization.ControlWrapper({
           'controlType': 'ChartRangeFilter',//DateRangeFilter
           'containerId': 'control-umidade',
           'options': {
             // Filter by the date axis.
             'filterColumnIndex': 0,
             'ui': {
               'chartType': 'LineChart',
               'chartOptions': {
                 'chartArea': {'width': '95%'},
                 'hAxis': {'baselineColor': 'none'}
               },
               // Display a single series that shows the closing value of the stock.
               // Thus, this view has two columns: the date (axis) and the stock value (line series).
               'chartView': {
                 'columns': [0, 1],
               }
               // 1 day in milliseconds = 24 * 60 * 60 * 1000 = 86,400,000
               //'minRangeSize': 86400000
             }
           },
           // Initial range: 2012-02-09 to 2012-03-20.
           'state': {'range': {'start': new Date(anoFinal[0], mesFinal[0], diaFinal[0], horaFinal[0], minutoFinal[0], segundoFinal[0]), 'end': new Date(anoFinal[anoFinal.length-1], mesFinal[mesFinal.length-1], diaFinal[diaFinal.length-1], horaFinal[horaFinal.length-1], minutoFinal[minutoFinal.length-1], segundoFinal[segundoFinal.length-1])}}
         });

        var control_umidade_do_solo = new google.visualization.ControlWrapper({
           'controlType': 'ChartRangeFilter',//DateRangeFilter
           'containerId': 'control-umidade_do_solo',
           'options': {
             // Filter by the date axis.
             'filterColumnIndex': 0,
             'ui': {
               'chartType': 'LineChart',
               'chartOptions': {
                 'chartArea': {'width': '95%'},
                 'hAxis': {'baselineColor': 'none'}
               },
               // Display a single series that shows the closing value of the stock.
               // Thus, this view has two columns: the date (axis) and the stock value (line series).
               'chartView': {
                 'columns': [0, 1],
               }
               // 1 day in milliseconds = 24 * 60 * 60 * 1000 = 86,400,000
               //'minRangeSize': 86400000
             }
           },
           // Initial range: 2012-02-09 to 2012-03-20.
           'state': {'range': {'start': new Date(anoFinal[0], mesFinal[0], diaFinal[0], horaFinal[0], minutoFinal[0], segundoFinal[0]), 'end': new Date(anoFinal[anoFinal.length-1], mesFinal[mesFinal.length-1], diaFinal[diaFinal.length-1], horaFinal[horaFinal.length-1], minutoFinal[minutoFinal.length-1], segundoFinal[segundoFinal.length-1])}}
         });

        var control_temperatura = new google.visualization.ControlWrapper({
           'controlType': 'ChartRangeFilter',//DateRangeFilter
           'containerId': 'control-temperatura',
           'options': {
             // Filter by the date axis.
             'filterColumnIndex': 0,
             'ui': {
               'chartType': 'LineChart',
               'chartOptions': {
                 'chartArea': {'width': '95%'},
                 'hAxis': {'baselineColor': 'none'}
               },
               // Display a single series that shows the closing value of the stock.
               // Thus, this view has two columns: the date (axis) and the stock value (line series).
               'chartView': {
                 'columns': [0, 1],
               }
               // 1 day in milliseconds = 24 * 60 * 60 * 1000 = 86,400,000
               //'minRangeSize': 86400000
             }
           },
           // Initial range: 2012-02-09 to 2012-03-20.
           'state': {'range': {'start': new Date(anoFinal[0], mesFinal[0], diaFinal[0], horaFinal[0], minutoFinal[0], segundoFinal[0]), 'end': new Date(anoFinal[anoFinal.length-1], mesFinal[mesFinal.length-1], diaFinal[diaFinal.length-1], horaFinal[horaFinal.length-1], minutoFinal[minutoFinal.length-1], segundoFinal[segundoFinal.length-1])}}
         });
      
         var chart_chuva = new google.visualization.ChartWrapper({
           'chartType': 'LineChart',
           'containerId': 'chart-chuva',
           'options': {
             // Use the same chart area width as the control for axis alignment.
             'chartArea': {'height': '80%', 'width': '90%'},
             'hAxis': {'slantedText': false},
             'legend': {'position': 'none'}
           },
           // Convert the first column from 'date' to 'string'.
           'view': {
             'columns': [
               {
                 'calc': function(dataTable, rowIndex) {
                   return dataTable.getFormattedValue(rowIndex, 0);
                 },
                 'type': 'string'
               }, 1]
           }
         });

         var chart_umidade = new google.visualization.ChartWrapper({
           'chartType': 'LineChart',
           'containerId': 'chart-umidade',
           'options': {
             // Use the same chart area width as the control for axis alignment.
             'chartArea': {'height': '80%', 'width': '90%'},
             'hAxis': {'slantedText': false},
             'legend': {'position': 'none'}
           },
           // Convert the first column from 'date' to 'string'.
           'view': {
             'columns': [
               {
                 'calc': function(dataTable, rowIndex) {
                   return dataTable.getFormattedValue(rowIndex, 0);
                 },
                 'type': 'string'
               }, 1]
           }
         });

         var chart_umidade_do_solo = new google.visualization.ChartWrapper({
           'chartType': 'LineChart',
           'containerId': 'chart-umidade_do_solo',
           'options': {
             // Use the same chart area width as the control for axis alignment.
             'chartArea': {'height': '80%', 'width': '90%'},
             'hAxis': {'slantedText': false},
             'legend': {'position': 'none'}
           },
           // Convert the first column from 'date' to 'string'.
           'view': {
             'columns': [
               {
                 'calc': function(dataTable, rowIndex) {
                   return dataTable.getFormattedValue(rowIndex, 0);
                 },
                 'type': 'string'
               }, 1]
           }
         });

         var chart_temperatura = new google.visualization.ChartWrapper({
           'chartType': 'LineChart',
           'containerId': 'chart-temperatura',
           'options': {
             // Use the same chart area width as the control for axis alignment.
             'chartArea': {'height': '80%', 'width': '90%'},
             'hAxis': {'slantedText': false},
             'legend': {'position': 'none'}
           },
           // Convert the first column from 'date' to 'string'.
           'view': {
             'columns': [
               {
                 'calc': function(dataTable, rowIndex) {
                   return dataTable.getFormattedValue(rowIndex, 0);
                 },
                 'type': 'string'
               }, 1]
           }
         });

          var options = {
            title: jQuery(this).data('nome')
          };

          chartChuva.bind(control_chuva, chart_chuva);
          chartUmidade.bind(control_umidade, chart_umidade);
          chartUmidadeDoSolo.bind(control_umidade_do_solo, chart_umidade_do_solo);
          chartTemperatura.bind(control_temperatura, chart_temperatura);

          chartChuva.draw(valueChuva, options);
          chartUmidade.draw(valueUmidade, options);
          chartUmidadeDoSolo.draw(valueUmidadeDoSolo, options);
          chartTemperatura.draw(valueTemperatura, options);

        });
      }
    </script>
</body>
</html>