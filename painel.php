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

    <!-- .l-device-sumary
    ======================================================== -->
    <section class="l-device-sumary">

      <div class="l-container cf">

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

        <!-- ================= COM SENSOR ================== -->

        <div id="com-sensor">
          <p>Meus Cultivos:</p>
          
          <ul id="abas" class="nav">
            <?php 

            foreach ($deviceUserRow as $value) { 

              $plantationNameId = $value['plantacao'];

              $sqlPlantacaoNome = "SELECT plantacao FROM DL_ADMIN_plantationList WHERE id = '$plantationNameId' order by id desc limit 1";
              $resultPlantacaoNome = mysql_query($sqlPlantacaoNome);
              while ($row=mysql_fetch_array($resultPlantacaoNome)) {

            ?>

            <li><a href="plantacao-<?php echo $value['plantacao']; ?>"><?php echo $row['plantacao']; ?></a></li> 

            <?php 

              }//while

            }//foreach

            ?>

          </ul> <!-- #abas -->
          <div id="resultados">
            <?php 

            foreach ($deviceUserRow as $value) { 

              $deviceCode = $value['dispositivo'];
              $deviceDataFim;
              $MysqlDataSintaxe;
              
              if($value['data_fim']!=null){
                $deviceDataFim = $value['data_fim'] . "23:59:59";
                $MysqlDataSintaxe = "AND data <= '$deviceDataFim'";//LIKE '%$deviceDataFim%'
              }

              $sqlDeviceValue = "SELECT * FROM DL_DEVICE WHERE dispositivo = '$deviceCode' $MysqlDataSintaxe order by id desc limit 1";
              $resultDeviceValue = mysql_query($sqlDeviceValue);
              while ($row=mysql_fetch_array($resultDeviceValue)) {

            ?>

            <div id="plantacao-<?php echo $value['plantacao']; ?>" class="aba-device-plantacao">
              <ul>
                <li>Dados da chuva: <?php echo $row['chuva']; ?></li>
                <li>Umidade do Solo: <?php echo $row['umidade_do_solo']; ?></li>
                <li>Umidade: <?php echo $row['umidade']; ?></li>
                <li>Temperatura: <?php echo $row['temperatura']; ?></li>
              </ul>
              <a href="#" title="Veja mais">Veja mais</a>
            </div>

            <?php 

              }//while

            }//foreach

            ?>
          </div> <!-- #resultados -->
        </div><!-- #com-sensor -->
        <!-- ================= COM SENSOR ================== -->

        <?php } else { ?>

        <!-- ================= SEM SENSOR ================== -->
        <div id="sem-sensor">
          <h3>Ainda não conhece o dispositivo?</h3>
          <p>Monitore sua plantação 24h por dia, tenha acesso a gráficos e comece um banco de dados de informações para saber como resolver seus problemas em qualquer situação.</p>
          <img src="" width="735" height="300" />
        </div><!-- #sem-sensor  -->
        <!-- ================= SEM SENSOR ================== -->

        <?php }//Não existe device ?>

      </div><!-- .l-container.cf -->

    </section><!-- .l-device-sumary -->

    <!-- .l-main
    ======================================================== -->
    <section class="l-main">

      <div class="l-container cf">

        <?php include 'template/sidebar.php'; ?>

        <!-- .l-content
        =================================================== -->
        <section class="l-content">

          <section class="l-duvidas block">

            <h3 class="title">Dúvidas Recentes</h3>
            <?php

            $sqlDuvidaPosts = "SELECT * FROM DL_FORUM order by id desc limit 3";
            $resultDuvidaPosts = mysql_query($sqlDuvidaPosts);

            if (mysql_num_rows($resultDuvidaPosts) > 0) {
              $id_duvida;
              $titulo;
              $plantacao;
              $imagem_duvida;

            ?>

            <p class="subtitle">Sabe algo a respeito destas últimas dúvidas postadas? Contribua!</p>

            <ul id="duvidas-recentes" class="l-row">

              <?php
              while ($row=mysql_fetch_array($resultDuvidaPosts)) {
                $id_duvida = $row['id'];
                $titulo = $row['titulo'];
                $textoDuvida = $row['texto'];
                $plantacaoDuvida = $row['plantacao'];
                $plantacaoDuvidaId = $plantacaoDuvida;
                $imagem_duvida = $row['imagem'];

                //TITULO
                $titulo = explode(" ", $titulo);

                //TEXTO
                $the_tag = array('<p>', '</p>', '<br>', '<br/>', '<br />');
                $textoDuvida = str_replace($the_tag, '', $textoDuvida);
                $textoDuvida = explode(" ", $textoDuvida);

                //PLANTAÇÃO ===============
                if($plantacaoDuvida==''){} else {
                    $plantacaoDuvida     =   explode("/", $plantacaoDuvida);
                    $plantacaoCount      =   0;
                    foreach ($plantacaoDuvida as $plantacaoUnidade) {
                        $sqlPlantacoesCategorias = mysql_query("SELECT `plantacao` FROM DL_ADMIN_plantationList WHERE id = '$plantacaoDuvida[$plantacaoCount]' limit 1");
                        while ($row=mysql_fetch_array($sqlPlantacoesCategorias)) {
                            $plantacaoNome       =   $row['plantacao'];
                            if($plantacaoCount==0){
                                $plantacaoDuvida[$plantacaoCount] = $plantacaoNome;
                            } else {
                                if($plantacaoCount+1==count($plantacaoDuvida)){
                                    $plantacaoDuvida[$plantacaoCount] = ' e ' . $plantacaoNome;
                                } else {
                                    $plantacaoDuvida[$plantacaoCount] = ', ' . $plantacaoNome;
                                }
                            }
                        }
                        $plantacaoCount  =   $plantacaoCount + 1;
                    }
                }
                //Prestador Foto
                if($imagem_duvida == '' || $imagem_duvida == null) {
                  $imagem_duvida[0] = 'admin/assets/img/template/logo.gif';
                } else {
                  $imagem_duvida     =   $imagem_duvida . '-';
                  $imagem_duvida     =   explode("-", $imagem_duvida);
                  $sqlDuvidaFoto = "SELECT `caminho`, `nome_imagem` FROM DL_IMAGES WHERE id = '$imagem_duvida[0]' order by id desc limit 1";
                  $resultDuvidaFoto = mysql_query($sqlDuvidaFoto);
                  while ($row=mysql_fetch_array($resultDuvidaFoto)) {
                    $imagem_duvida[0] = $row['caminho'] . $row['nome_imagem'];
                  }
                } 
              ?>

              <li class="l-col4">
                <div class="squared-img">
                  <img src="<?php echo $imagem_duvida[0]; ?>" alt="nome do post" />
                  <?php 
                  if($plantacaoDuvida==''){} else {
                    echo '<a class="the_tag" href="duvida-resultado.php?plantacao=';
                    echo $plantacaoDuvidaId;
                    echo '" title="Tag">';
                    foreach ($plantacaoDuvida as $plantacaoPart){
                      echo $plantacaoPart; 
                    } 
                    echo '</a>';
                  } 
                  ?>
                </div><!-- .squared-img -->
                <p class="postnome">
                  <?php
                  for($i=0;$i<=5;$i++){
                    if($i==5){
                      echo '...';
                    } else if($i==4) {
                      echo $titulo[$i];
                    } else {
                      echo $titulo[$i] . ' ';
                    }
                  }
                  ?>
                </p>
                <p class="posttexto">
                  <?php
                  for($i=0;$i<=5;$i++){
                    if($i==5){
                      echo '...';
                    } else if($i==4) {
                      echo $textoDuvida[$i];
                    } else {
                      echo $textoDuvida[$i] . ' ';
                    }
                  }
                  ?>
                </p>
                <a href="duvida.php?numero=<?php echo $id_duvida; ?>" title="Ver Dúvida" class="bt-saibamais ver-duvida button">Ver Dúvida</a>
              </li><!-- .l-col4 -->

              <?php }//while ?>

            </ul> <!-- #duvidas-recentes.l-row -->

            <?php } else { ?>

            <p class="subtitle">Ainda não há dúvidas cadastradas</p>

            <?php }//else ?>

          </section><!-- .l-duvidas -->

          <section class="l-notificacoes block">

            <h3 class="title">Notificações</h3>
            <?php

            $sqlNotificacaoNome = "SELECT * FROM DL_NOTIFICATION WHERE tomador = '$profile_id' order by id desc limit 3";
            $resultNotificacaoNome = mysql_query($sqlNotificacaoNome);

            if (mysql_num_rows($resultNotificacaoNome) > 0) {
              $id_notificacao;
              $prestador;
              $prestador_foto;
              $forum;
              $forum_nome;
              $tipo;

            ?>
            <p class="subtitle">Você foi marcado nas seguintes publicações de dúvidas:</p>

            <ul id="notificacoes" class="l-row">

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
                $sqlForumNome = "SELECT `titulo`, `texto` FROM DL_FORUM WHERE id = '$forum' order by id desc limit 1";
                $resultForumNome = mysql_query($sqlForumNome);
                while ($row=mysql_fetch_array($resultForumNome)) {
                  $forum_nome = $row['titulo'];
                  $forum_texto = $row['texto'];
                }
                //TITULO
                $forum_nome = explode(" ", $forum_nome);
                //TEXTO
                $the_tag = array('<p>', '</p>', '<br>', '<br/>', '<br />');
                $forum_texto = str_replace($the_tag, '', $forum_texto);
                $forum_texto = explode(" ", $forum_texto);
                //Marcação
                if ($tipo == '1') {
                  $tipo = ' marcou você em ';
                } else if ($tipo == '0') {
                  $tipo = ' comentou na sua dúvida ';
                }
              ?>
              <li id="notification-<?php echo $id_notificacao; ?>" class="l-col12">
                <div class="round-img">
                  <img src="<?php echo $prestador_foto; ?>" alt="Pessoa" border="0" />
                </div><!-- .round-img -->
                <p class="postnome">
                  <?php
                  echo $prestador;
                  echo $tipo;
                  for($i=0;$i<=8;$i++){
                    if($i==8){
                      echo '..."';
                    } else if($i==7) {
                      echo $forum_nome[$i];
                    } else if($i==0) {
                      echo '"' . $forum_nome[$i] . ' ';
                    } else {
                      echo $forum_nome[$i] . ' ';
                    }
                  }
                  ?>
                </p>
                <p class="posttexto">
                  <?php
                  for($i=0;$i<=20;$i++){
                    if($i==20){
                      echo '...';
                    } else if($i==19) {
                      echo $forum_texto[$i];
                    } else {
                      echo $forum_texto[$i] . ' ';
                    }
                  }
                  ?>
                </p>
                <a href="duvida.php?numero=<?php echo $forum; ?>" class="ler-publicacao button">Ler Publicação</a>
              </li><!-- #notification-?php?.l-col12 -->

              <?php }//while ?>

            </ul><!-- #notificacoes.l-row -->

            <?php } else { ?>

            <p>Ainda não há notificações</p>

            <?php }//else ?>

          </section><!-- .l-notificacoes -->

          <section class="l-artigos-noticias block">

            <h3 class="title">Artigos e Notícias</h3>

            <p class="subtitle">Confira as notícias e artigos recentes sobre o cultivo orgânico.</p>

            <div class="article-content">
              <div class="retangle-img">
                <img src="assets/img/upload/artigo-noticia.jpg" alt="Pessoa" border="0" />
              </div><!-- .retangle-img -->
              <p class="postnome">Agricultura Orgânica cresce 30% ao ano NO BRASIL</p>
              <p class="posttexto">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor 
invidunt ut labore et dolore magna aliquyam erat...</p>
              <a href="#" class="saiba-mais button">Saiba Mais</a>
            </div><!-- .article-content -->

          </section><!-- .l-artigos-noticias -->

        </section><!-- .l-content -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-main -->

  <?php include 'template/footer.php'; ?>

  </div><!-- #site -->

  <?php include 'template/script.php'; ?>
    <script>
      // Optional code to hide all divs
    $(".aba-device-plantacao").each(function(e){
      if(e==0){
        $(this).show();
      } else {
        $(this).hide();
      }
    });
    $("#abas li a").each(function(e){
      if(e==0) {
         $(this).addClass("active");
      }
    });
    // Selector
    //var divs = $("#tomate, #morango, #batata, #amora");
    // Show chosen div, and hide all others
    $("#abas li a").click(function (e) {
      e.preventDefault();
      $("#" + $(this).attr("href")).show().siblings('.aba-device-plantacao').hide();
      $(".active").removeClass("active");
      $(this).addClass("active");
    });
    </script>
</body>
</html>
