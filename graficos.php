<?php
  require_once ("backend/seguranca.php");
  protegePagina();

  require_once("backend/conecta.php");
  require_once("backend/executa.php");

  // VARIAVEIS GLOBAIS ==================================
  $usuarioLogadoID = $_SESSION['usuarioUserID'];
  $usuarioLogadoEmail = $_SESSION['usuarioUserNome'];

  // VALIDA PERFIL ======================================
  $perfilCriado = mysql_query("SELECT * FROM DL_PROFILE WHERE usuario = '$usuarioLogadoID'");
  $nome;
  $cpf;
  $foto;
  $idProfile;
  $latitude;
  $longitude;

  if(mysql_num_rows($perfilCriado) > 0) {

    while ($row=mysql_fetch_array($perfilCriado)) {
      $nome=$row['nome'];
      $cpf=$row['cpf'];
      $foto=$row['foto'];
      $idProfile=$row['id'];
      $latitude=$row['latitude'];
      $longitude=$row['longitude'];

      if($foto == null){ 
        $foto = 'admin/assets/img/template/logo.gif'; 
      } else { 

        $fotoId = explode('-', $foto);

        $sqlPlantacaoimg = "SELECT * FROM DL_IMAGES WHERE id = '$fotoId[0]' order by id desc";
        $resultPlantacaoimg = mysql_query($sqlPlantacaoimg);

        while ($row=mysql_fetch_array($resultPlantacaoimg)) {
          $foto = $row['caminho'] . $row['nome_imagem'];
        }
      }
    }

  } else {
    header("Location: cadastroperfil.php");
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

      <div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

        <div class="l-row">
          <header>
            <h2>Dados da Plantação</h2>
          </header>
          <p>Selecione abaixo a aba correspondente ao cultivo que deseja visualizar.</p>

          <ul id="plantacoes">
            <?php 

            foreach ($deviceUserRow as $value) { 

              $plantationNameId = $value['plantacao'];
              $imagem=$row['imagem'];

              $sqlPlantacaoNome = "SELECT * FROM DL_ADMIN_plantationList WHERE id = '$plantationNameId' order by id desc limit 1";
              $resultPlantacaoNome = mysql_query($sqlPlantacaoNome);
              while ($row=mysql_fetch_array($resultPlantacaoNome)) {

                $imagem=$row['imagem'];
                $plantationName=$row['plantacao'];

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
            <li class="plantacao" target="<?php echo $value['plantacao']; ?>"><img src="<?php echo $imagem ?>" alt="<?php echo $plantationName; ?>" /></li>
            <?php 

              }//while

            }//foreach

            ?>
          </ul><!-- #plantacoes -->

          <hr />

          <?php

          foreach ($deviceUserRow as $value) {

          ?>

          <div id="plantacao-<?php echo $value['plantacao']; ?>" class="target" data-plantacao="<?php echo $value['plantacao']; ?>">
            <h3>Chuva</h3>
            <div id="chuva-<?php echo $value['plantacao']; ?>" style="width: 735px; height: 300px;"></div>
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade</h3>
            <div id="umidade-<?php echo $value['plantacao']; ?>" style="width: 735px; height: 300px;"></div>
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade do Solo</h3>
            <div id="umidade_do_solo-<?php echo $value['plantacao']; ?>" style="width: 735px; height: 300px;"></div>
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Temperatura</h3>
            <div id="temperatura-<?php echo $value['plantacao']; ?>" style="width: 735px; height: 300px;"></div>
            <a href="interna1" class="bt-vermais">Ver mais </a>

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
              $sqlDispositivoBeta = "SELECT * FROM DL_DEVICE WHERE data BETWEEN '$data_inicio' and '$data_fim' AND dispositivo = '$deviceNumberName' order by id asc";
              $resultDispositivoBeta = mysql_query($sqlDispositivoBeta);
              while ($row=mysql_fetch_array($resultDispositivoBeta)) {
          ?>
            <div class="value-<?php echo $value['plantacao']; ?>" data-plantacao="<?php echo $value['plantacao']; ?>" data-id="<?php echo $row['id']; ?>" data-device="<?php echo $row['dispositivo']; ?>" data-umidade="<?php echo $row['umidade']; ?>" data-umidadedosolo="<?php echo $row['umidade_do_solo']; ?>" data-temperatura="<?php echo $row['temperatura']; ?>" data-chuva="<?php echo $row['chuva']; ?>" data-date="<?php echo $row['data']; ?>"></div>
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
                <p>Monitore sua plantação 24h por dia, tenha acesso a gráficos e comece um banco de dados de informações para saber como resolver seus problemas em qualquer situação.</p>
                <img src="" width="735" height="300" />
              </div><!-- #sem-sensor  -->
              <!-- ================= SEM SENSOR ================== -->

          <?php }//Não existe device ?> 
          
        </div><!-- .l-row -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-graficos -->

    <!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

  <?php include 'template/footer.php'; ?>

  </div><!-- #site -->

  <?php include 'template/script.php'; ?>
  <!-- mapa google-->
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      //https://developers.google.com/chart/?hl=pt-br
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        jQuery(".target").each(function(e){

          var valueChuva = [['Horário', 'Mililitros']];
          var valueUmidade = [['Horário', 'Mililitros']];
          var valueUmidadeSolo = [['Horário', 'Mililitros']];
          var valueTemperatura = [['Horário', 'Celsius']];

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

      jQuery(function(){
         
        jQuery('.plantacao').click(function(){
              jQuery('.target').hide();
              jQuery('#plantacao-'+$(this).attr('target')).show();
        });

      });
    </script>
</body>
</html>