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

          <section class="l-eventos-anteriores block">

            <h3 class="title">Evento Raízes</h3>

            <p class="subtitle">Confira o que aconteceu nos eventos anteriores</p>

            <ul id="eventos" class="l-row">

              <li id="evento-1" class="l-col12">
                <div class="squared-img">
                  <img src="assets/img/template/evento-thumb.jpg" alt="Evento" border="0" />
                  <a class="the_tag">01</a>
                </div><!-- .squared-img -->
                <p class="postnome">Evento #01 - Práticas de cultivo e gestão</p>
                <p class="posttexto">A primeira edição do evento, que ocorreu na sede da AAO no Parque da Água Branca, trouxe workshops/palestras relacionadas ao ensino financeiro e estratégico...</p>
                <a href="evento.php?numero=1" class="saiba-mais button">Saiba Mais</a>
              </li><!-- #evento-?php?.l-col12 -->

            </ul><!-- #eventos.l-row -->

          </section><!-- .l-eventos-anteriores -->

        </section><!-- .l-content -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-main -->

  <?php include 'template/footer.php'; ?>

  </div><!-- #site -->
  </div>
  </div>

  <?php include 'template/script.php'; ?>
</body>
</html>
