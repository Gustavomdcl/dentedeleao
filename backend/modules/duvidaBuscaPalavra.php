                    <h3>Resultado<?php if($buscaPalavra!=null){ echo ' por "' . $buscaPalavra . '"'; } ?></h3>

                    <?php

                      $buscaPalavraArray = explode(" ", $buscaPalavra);
                      $sqlSintaxeDuvida = '';

                      foreach ($buscaPalavraArray as $key=>$value) {
                        if($key==0) {
                            $sqlSintaxeDuvida = "WHERE titulo LIKE '%" . $value . "%' OR texto LIKE '%" . $value . "%'";
                        } else {
                            $sqlSintaxeDuvida = $sqlSintaxeDuvida . " OR titulo LIKE '%" . $value . "%' OR texto LIKE '%" . $value . "%'";
                        }
                      }

                      $sqlDuvidaPosts = "SELECT * FROM DL_FORUM $sqlSintaxeDuvida order by id desc";
                      $resultDuvidaPosts = mysql_query($sqlDuvidaPosts);

                      if (mysql_num_rows($resultDuvidaPosts) > 0) {
                        $id_duvida;
                        $titulo;
                        $plantacao;
                        $imagem_duvida;

                    ?>

                    <p>Foram encontradas algumas dúvidas relacionadas a sua busca<?php if($buscaPalavra!=null){ echo ' por "' . $buscaPalavra . '"'; } ?>, clique em saiba mais para visualizar ou inicie uma nova dúvida.</p>
                    <ul class="conteudoDuvidasResultado" >
                        <?php
                        while ($row=mysql_fetch_array($resultDuvidaPosts)) {
                          $id_duvida = $row['id'];
                          $titulo = $row['titulo'];
                          $plantacaoDuvida = $row['plantacao'];
                          $imagem_duvida = $row['imagem'];

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
                        <li>
                          <img src="<?php echo $imagem_duvida[0]; ?>" alt="nome do post" width="200" height="150" />
                          <p class="postnome"><?php echo $titulo; ?></p>
                          <?php 
                          if($plantacaoDuvida==''){} else {
                            echo '<a title="Tag">';
                            foreach ($plantacaoDuvida as $plantacaoPart){ 
                              echo $plantacaoPart; 
                            } 
                            echo '</a>';
                          } 
                          ?>
                          <a href="duvida.php?numero=<?php echo $id_duvida; ?>" title="Saiba mais" class="bt-saibamais">Saiba mais</a>
                        </li>
                        <?php }//while ?>
                        
                    </ul><!-- .conteudoDuvidasResultado -->

                    <!--div id="paginacao">
                        <ul>
                            <li>1</li>
                            <li>| <a href="#">2</a> |</li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- #paginacao -->

                    <?php } else { ?>

                    <p>Não foram encontradas dúvidas relacionadas a sua busca<?php if($buscaPalavra!=null){ echo ' por "' . $buscaPalavra . '"'; } ?>, inicie uma nova dúvida.</p>

                    <?php }//else ?>