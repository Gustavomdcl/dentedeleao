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
  <!-- picker CSS -->
  <link rel="stylesheet" href="assets/css/jquery-ui-datepicker.css">

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

          <section class="l-evento-sediar block">

            <h3 class="title">Evento Raízes</h3>

            <p class="subtitle">Sedie o próximo evento na sua fazenda!</p>

            <section class="l-evento-sediar-cadastro block">

              <p class="subtitle">Selecione uma data disponível e preencha os dados abaixo:</p>

              <form>

                <input type="text" name="data" id="datepicker" placeholder="Data"><br>

                <input type="text" name="capacidade" placeholder="Capacidade do local..."><br>

                <input type="text" name="sugestoes" placeholder="Sugestões e observações para o evento..."><br>

                <button type="submit" class="enviar">Sediar</button>

              </form>

            </section><!-- .l-evento-sediar-cadastro -->

          </section><!-- .l-evento-sediar -->

        </section><!-- .l-content -->

      </div><!-- .l-container.cf -->

    </section><!-- .l-main -->

  <?php include 'template/footer.php'; ?>

  </div><!-- #site -->
  </div>
  </div>

  <?php include 'template/script.php'; ?>
    <script src="assets/min/jquery.ui.min.js"></script>
    <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <!-- datepieker -->
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
