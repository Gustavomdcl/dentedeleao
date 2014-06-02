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

    <!-- .l-main
    ======================================================== -->
    <section class="l-main">

      <div class="l-container cf">

        <?php include 'template/sidebar.php'; ?>

        <!-- .l-content
        =================================================== -->
        <section class="l-content">

          <section class="l-evento-proximo block">

            <h3 class="title">Evento Raízes</h3>

            <p class="subtitle">Participe do próximo evento!</p>

            <p class="postnome">Evento #02 - Práticas de cultivo e serviço | 15 de Julho de 2014</p>

            <p class="posttexto">A segunda edição do Evento Raizes ocorrá na fazenda da <a href="perfil.php?produtor=2">Beatriz Victorio</a>, trará workshops e palestras relacionadas às boas práticas no cultivo orgânico e o ensino de inovação no atendimento e na prestação de serviços aos clientes.<br>
              Contará com no máximo 35 produtores.<br>
              As palestras serão:<br><br>
              1) "Inovação em Serviços, Como pensar de maneira sistêmica para impactar positivamente o cliente", na qual contaremos com a presença de Juliana Proserpio, Socia e Co-fundadora na empresa Design Echos, formada em Social Design, Social Innovation na instituição de ensino School of Visual Arts e na Hasso-Plattner-Institut em Berlim.<br>
              2) "1º curso prático de Agricultura Orgânica", palestra de Yoshio Tsuzuki, que, após uma profunda reflexão sobre o sistema convencional de agricultura baseado nos agroquímicos, resolveu mudar radicalmente seu enfoque, adotando desde então uma visão Holística  para o sistema, onde pragas e doenças nas plantas são encaradas como consequências e não causas dos problemas na Agricultura.<br>
              3) "Oficininha de Germinação e Panificação SEM GLUTÉN e Açúcar", realizado por Matheus Arantes, produtor alemão de pães orgânicos desde 1973.</p>

            <section class="l-evento-proximo-cadastro block">

              <h3 class="title">Participar do Evento</h3>

              <p class="subtitle">Para participar, preencha os campos abaixo.</p>

              <form>

                <input type="text" name="nome" placeholder="Nome" value="<?php echo $nome; ?>"><br>

                <input type="text" name="telefone" placeholder="Telefone" value="<?php echo $telefone; ?>"><br>

                <input type="text" name="email" placeholder="Email" value="<?php echo $email; ?>"><br>

                <button type="submit" class="enviar">Participar</button>

              </form>

            </section><!-- .l-evento-proximo-cadastro -->

            <p class="subtitle">Fique atento, restam 05 vagas!</p>

          </section><!-- .l-evento-proximo -->

        </section><!-- .l-content -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-main -->

  <?php include 'template/footer.php'; ?>

  </div><!-- #site -->

  <?php include 'template/script.php'; ?>
</body>
</html>
