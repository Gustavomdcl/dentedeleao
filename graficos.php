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

  if(mysql_num_rows($perfilCriado) > 0) {

    while ($row=mysql_fetch_array($perfilCriado)) {
      $nome=$row['nome'];
      $cpf=$row['cpf'];
      $foto=$row['foto'];
      $idProfile=$row['id'];

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

    <table width="800">
      <tr>
        <td>nome</td>
        <td>id</td>
        <td>dispositivo</td>
        <td>umidade</td>
        <td>umidade_do_solo</td>
        <td>temperatura</td>
        <td>chuva</td>
        <td>data</td>
      </tr>
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

        foreach ($deviceUserRow as $value) { 

          $deviceCode = $value['dispositivo'];
          $deviceDataFim;
          $MysqlDataSintaxe;
          
          if($value['data_fim']!=null){
            $deviceDataFim = $value['data_fim'];
          } else {
            $deviceDataFim = date('o\-m\-d');
          }

          $data_inicio = $value['data_inicio'];//00:00:00
          $data_fim = $deviceDataFim . "23:59:59";
          $sqlDispositivoBeta = "SELECT * FROM DL_DEVICE WHERE data BETWEEN '$data_inicio' and '$data_fim' AND dispositivo = '1001' order by id desc";
          $resultDispositivoBeta = mysql_query($sqlDispositivoBeta);
          while ($row=mysql_fetch_array($resultDispositivoBeta)) {
      ?>
      <tr>
        <td><?php echo $value['plantacao']; ?></td>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['dispositivo']; ?></td>
        <td><?php echo $row['umidade']; ?></td>
        <td><?php echo $row['umidade_do_solo']; ?></td>
        <td><?php echo $row['temperatura']; ?></td>
        <td><?php echo $row['chuva']; ?></td>
        <td><?php echo $row['data']; ?></td>
      </tr>
      <?php 
          }//while
        }//foreach
      ?>
    </table>

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
            <li class="plantacao" target="1"><img src="assets/img/upload/abobora.png" alt="produto" /></li>
            <li class="plantacao" target="2"><img src="assets/img/upload/brocolis.png" alt="produto" /></li>
            <li class="plantacao" target="3"><img src="assets/img/upload/cogumelo.png" alt="produto" /></li>
          </ul><!-- #plantacoes -->

          <hr />
          <div id="plantacao-1" class="target">
            <h3>Chuva</h3>
            <div id="chuva-1" style="width: 735px; height: 300px;"></div>
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade do Solo</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Temperatura</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          </div><!-- #plantacao1 -->

          <div id="plantacao-2" class="target" style="background-color:pink; display:none;">
            <h3>Chuva</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade do Solo</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Temperatura</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          </div><!-- #plantacao2 -->

          <div id="plantacao-3" class="target" style="background-color:green; display:none;">
            <h3>Chuva</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Umidade do Solo</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          <hr style="clear:both" />
            <h3>Temperatura</h3>
            <img src="" width="735" height="300" />
            <a href="interna1" class="bt-vermais">Ver mais </a>

          </div><!-- #plantacao2 -->

          <?php } else { ?>

          <!-- ================= SEM SENSOR ================== -->
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
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Horário', 'Mililitros'],
          ['00h',  20],
          ['04h',  30],
          ['08h',  12],
          ['12h',  18],
          ['16h',  22],
          ['20h',  17]
        ]);

        var options = {
          title: ' '
        };

        var chart = new google.visualization.LineChart(document.getElementById('chuva-1'));
        chart.draw(data, options);
      }
    
    // Selecionar plantação 

          jQuery(function(){
         
        jQuery('.plantacao').click(function(){
              jQuery('.target').hide();
              jQuery('#plantacao-'+$(this).attr('target')).show();
        });
});
    </script>
</body>
</html>