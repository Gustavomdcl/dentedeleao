                    <h3 class="title">Resultado</h3>

                    <?php

                      $dataTotal      = explode("/", $data_inicio);
                      $data_inicio    = $dataTotal[2].'-'.$dataTotal[1].'-'.$dataTotal[0];//String AAAA-MM-DD

                      $data_fim     = date('o\-m\-d') . " 23:59:59";

                      // DADOS ============

                      $data_inicio_final;
                      $data_fim_final;
                      $dispositivo_final;

                      $sqlDispositivoUsuario = "SELECT * FROM DL_ADMIN_deviceuser WHERE data_fim > '$data_inicio' OR data_fim = '' AND usuario = '$perfil' AND plantacao = '$devicePlantacao' order by id desc limit 1";
                      $resultDispositivoUsuario = mysql_query($sqlDispositivoUsuario);
                      while ($row=mysql_fetch_array($resultDispositivoUsuario)) {
                        $idDispositivoUsuario = $row['id'];
                        $dispositivo      = $row['dispositivo'];
                        $data_inicio_alpha    = $row['data_inicio'];
                        $data_fim_alpha     = $row['data_fim'];

                        //Data Inicio

                        if(strtotime($data_inicio_alpha) > strtotime($data_inicio)){
                          $data_inicio_final = $data_inicio_alpha;
                        } else if (strtotime($data_inicio_alpha) < strtotime($data_inicio)) {
                          $data_inicio_final = $data_inicio;
                        } else if (strtotime($data_inicio_alpha) == strtotime($data_inicio)) {
                          $data_inicio_final = $data_inicio_alpha;
                        }

                        //Data Fim

                        if($data_fim_alpha!=''){
                          $data_fim_final = $data_fim_alpha;
                        } else {
                          $data_fim_final = $data_fim;
                        }

                        //Dispositivo

                        $dispositivo_final = $dispositivo;

                        //Calculo Final
                        $dadosFinal = 0;
                        $sqlDispositivoBeta = "SELECT * FROM DL_DEVICE WHERE data BETWEEN '$data_inicio_final' and '$data_fim_final' AND dispositivo = '$dispositivo_final' order by id asc";
                        $resultDispositivoBeta = mysql_query($sqlDispositivoBeta);

                        while ($row=mysql_fetch_array($resultDispositivoBeta)) {

                          $umidade = $umidade + $row['umidade'];
                          $umidade_do_solo = $umidade_do_solo + $row['umidade_do_solo'];
                          $temperatura = $temperatura + $row['temperatura'];
                          $chuva = $chuva + $row['chuva'];

                          $dadosFinal = $dadosFinal + 1;

                        }

                        $umidade = intval($umidade/$dadosFinal);//String 00
                        $umidade_do_solo = intval($umidade_do_solo/$dadosFinal);//String 00
                        $temperatura = intval($temperatura/$dadosFinal);//String 00
                        $chuva = intval($chuva/$dadosFinal);//String 00
                      }

                      $umidadeSintaxe = "umidade LIKE '%" . $umidade . "%' OR umidade BETWEEN '" . ($umidade - 3) . "' and '" . ($umidade + 3)  . "'";
                      $umidade_do_soloSintaxe = "umidade_do_solo LIKE '%" . $umidade_do_solo . "%' OR umidade_do_solo BETWEEN '" . ($umidade_do_solo - 60) . "' and '" . ($umidade_do_solo + 60)  . "'";
                      $temperaturaSintaxe = "temperatura LIKE '%" . $temperatura . "%' OR temperatura BETWEEN '" . ($temperatura - 2) . "' and '" . ($temperatura + 2)  . "'";
                      $chuvaSintaxe = "chuva LIKE '%" . $chuva . "%' OR chuva BETWEEN '" . ($chuva - 3) . "' and '" . ($chuva + 3)  . "'";

                      // BUSCA

                      $DuvidasPesquisaLista;
                      $DuvidasPesquisaListaId;

                      // BUSCA PLANTA + DADOS ============

                      $sqlDuvidaPosts = "SELECT * FROM DL_FORUM WHERE plantacao_dispositivo = $devicePlantacao AND ($umidadeSintaxe OR $umidade_do_soloSintaxe OR $temperaturaSintaxe OR $chuvaSintaxe) order by id desc";
                      $resultDuvidaPosts = mysql_query($sqlDuvidaPosts);

                      while ($row=mysql_fetch_array($resultDuvidaPosts)) {
                        if(in_array($row['id'], (array) $DuvidasPesquisaListaId)){//Se a dúvida já existe
                        } else {
                          $DuvidasPesquisaLista[] = array(
                            'id'              => $row['id'],
                            'titulo'          => $row['titulo'],
                            'texto'           => $row['texto'],
                            'plantacao'       => $row['plantacao'],
                            'imagem'          => $row['imagem'],
                          );
                          $DuvidasPesquisaListaId[] = $row['id'];
                        }
                      }

                      // BUSCA DADOS ============

                      $sqlDuvidaPosts = "SELECT * FROM DL_FORUM WHERE $umidadeSintaxe OR $umidade_do_soloSintaxe OR $temperaturaSintaxe OR $chuvaSintaxe order by id desc";
                      $resultDuvidaPosts = mysql_query($sqlDuvidaPosts);

                      while ($row=mysql_fetch_array($resultDuvidaPosts)) {
                        if(in_array($row['id'], (array) $DuvidasPesquisaListaId)){//Se a dúvida já existe
                        } else {
                          $DuvidasPesquisaLista[] = array(
                            'id'              => $row['id'],
                            'titulo'          => $row['titulo'],
                            'texto'           => $row['texto'],
                            'plantacao'       => $row['plantacao'],
                            'imagem'          => $row['imagem'],
                          );
                          $DuvidasPesquisaListaId[] = $row['id'];
                        }
                      }

                      // BUSCA PLANTA DISPOSITIVO OU PLANTA ============

                      $sqlDuvidaPosts = "SELECT * FROM DL_FORUM WHERE plantacao_dispositivo = $devicePlantacao OR plantacao LIKE '%$devicePlantacao%' order by id desc";
                      $resultDuvidaPosts = mysql_query($sqlDuvidaPosts);

                      while ($row=mysql_fetch_array($resultDuvidaPosts)) {
                        if(in_array($row['id'], (array) $DuvidasPesquisaListaId)){//Se a dúvida já existe
                        } else {
                          $DuvidasPesquisaLista[] = array(
                            'id'              => $row['id'],
                            'titulo'          => $row['titulo'],
                            'texto'           => $row['texto'],
                            'plantacao'       => $row['plantacao'],
                            'imagem'          => $row['imagem'],
                          );
                          $DuvidasPesquisaListaId[] = $row['id'];
                        }
                      }

                    if (!empty($DuvidasPesquisaLista)) {

                    ?>

                    <p class="subtitle">Foram encontradas algumas dúvidas relacionadas a sua busca<?php if($buscaPalavra!=null){ echo ' por "' . $buscaPalavra . '"'; } ?>,<br>
                    clique em saiba mais para visualizar ou inicie uma nova dúvida.</p>
                    
                    <ul id="duvidas-recentes" class="l-row">
                        <?php
                        foreach($DuvidasPesquisaLista as $value) {
                          $plantacaoDuvida = $value['plantacao'];
                          $plantacaoDuvidaId = $plantacaoDuvida;
                          $imagem_duvida = $value['imagem'];
                          $id_duvida = $value['id'];
                          $titulo = $value['titulo'];
                          $textoDuvida = $value['texto'];

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
                            <img src="<?php echo $imagem_duvida[0]; ?>" alt="nome do post" width="200" height="150" />
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
                          <a href="duvida.php?numero=<?php echo $id_duvida; ?>" title="Saiba mais" class="bt-saibamais ver-duvida button">Saiba mais</a>
                        </li>
                        <?php }//foreach ?>
                        
                    </ul><!-- .conteudoDuvidasResultado -->

                    <!--div id="paginacao">
                        <ul>
                            <li>1</li>
                            <li>| <a href="#">2</a> |</li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div><!-- #paginacao -->

                    <?php } else { ?>

                    <p class="subtitle">Não foram encontradas dúvidas relacionadas a sua busca, inicie uma nova dúvida.</p>

                    <?php }//else ?>
