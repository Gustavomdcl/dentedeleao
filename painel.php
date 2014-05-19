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

?>
<!DOCTYPE html>
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

    <!-- login ADRIAN: Essa section é um exemplo de como você vai colocando as áreas do site. você pode alterar o nome da class .l-duvida-exibicao para .l-duvida-exibicao ou algo assim, dependendo do que for fazer. Preciso que cada sessão (nesse caso sessão tem o valor de corte, área. Um exemplo considere o wireframe do painel. Cada área dele, sendo a parte dos gráficos, a parte das notificações e dúvidas são sessões diferentes) do site seja feita pela tag <section>, pois isso agora é importante.
    ======================================================== -->
    <section class="l-painel">

      <div class="l-container cf"><!-- ADRIAN: Essa div com class l-container centraliza em 960px e centraliza, no sass você pode observar isso. a class cf desconsidera os floats, sabe? as vezes quando você da um float left dentro de uma div o seu height não considera esses elementos. a class cf acaba considerando. -->

        <div class="l-row">
          <header>
            <h2>Meu Painel</h2>
          </header>
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
            <h3>Dados recentes da plantação</h3>
            <p>Selecione abaixo a aba correspondente ao cultivo que deseja visualizar</p>
            
            <ul id="abas">
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
                  $deviceDataFim = $value['data_fim'];
                  $MysqlDataSintaxe = "AND data LIKE '%$deviceDataFim%'";
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

          <hr />
          <h3>Notificações</h3>
          <p>Alguém te marcou</p>

          <ul id="notificacoes">
            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
              <b>Nome da pessoa</b>
              <p>Nome da postagem</p>
              <a href="link" >Saiba mais</a>
            </li>

            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
              <b>Nome da pessoa</b>
              <p>Nome da postagem</p>
              <a href="link" >Saiba mais</a>
            </li>

            <li><img src="" alt="Pessoa" width="100" height="100" align="left" border="0" />
              <b>Nome da pessoa</b>
              <p>Nome da postagem</p>
              <a href="link" >Saiba mais</a>
            </li>
          </ul><!-- #notificacoes -->
          <hr style="clear:both;" />
          <h3>Dúvidas postadas recentemente</h3>
          <p>Confira as últimas dúvidas e contribua</p>
          <ul id="duvidas-recentes">
            <li>
              <img src="" alt="nome do post" width="200" height="150" />
              <p class="postnome">Nome da Postagem</p>
              <a href="tag" title="Tag">Tag</a>
              <a href="linkdapostagem.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
            </li>

            <li>
              <img src="" alt="nome do post" width="200" height="150" />
              <p class="postnome">Nome da Postagem</p>
              <a href="tag" title="Tag">Tag</a>
              <a href="linkdapostagem.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
            </li>

            <li>
              <img src="" alt="nome do post" width="200" height="150" />
              <p class="postnome">Nome da Postagem</p>
              <a href="tag" title="Tag">Tag</a>
              <a href="linkdapostagem.php" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
            </li>
          </ul> <!-- #duvidas-recentes -->

        </div><!-- .l-row -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-duvida-exibicao -->

    <!-- ADRIAN: FINAL DA ÁREA PARA COLOCAR SEU CÓDIGO, QUE VAI MUDAR EM CADA PÁGINA -->

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
