                    <h3 class="title">Dúvidas relacionadas a <?php echo $simplesPlantacaoNome; ?></h3>

                    <?php

                      $sqlDuvidaPosts = "SELECT * FROM DL_FORUM WHERE plantacao LIKE '%$simplesPlantacao%' order by id desc";
                      $resultDuvidaPosts = mysql_query($sqlDuvidaPosts);

                      if (mysql_num_rows($resultDuvidaPosts) > 0) {
                        $id_duvida;
                        $titulo;
                        $plantacao;
                        $imagem_duvida;

                    ?>

                    <p class="subtitle">Foram encontradas algumas dúvidas relacionadas a <?php echo $simplesPlantacaoNome; ?>,<br>
                    clique em saiba mais para visualizar ou inicie uma nova dúvida.</p>
                    
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
                                  $sqlPlantacoesCategorias = mysql_query("SELECT `plantacao` FROM DL_ADMIN_plantationList WHERE id = '$plantacaoDuvida[$plantacaoCount]'");
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
                        
                    </ul><!-- #duvidas-recentes.l-row -->

                    <!--div id="paginacao">
                        <ul>
                            <li>1</li>
                            <li>| <a href="#">2</a> |</li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- #paginacao -->

                    <?php } else { ?>

                    <p class="subtitle">Não foram encontradas dúvidas relacionadas a <?php echo $simplesPlantacaoNome; ?>, inicie uma nova dúvida.</p>

                    <?php }//else ?>