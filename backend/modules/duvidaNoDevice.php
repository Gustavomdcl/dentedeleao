<?php
            $myPlantations;
            if($plantacoesLista!=null){ ?>
            <h4 class="title post">Suas plantações:</h4>
            <!-- Suas Plantações -->
            <span class="plantacoes">
              <?php foreach ($plantacoesLista as $value) {  ?>
                <label for="plantacao-<?php echo $value['id']; ?>" class="plantacao-content">
                    <img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['plantacao']; ?>" />
                    <p class="plantation-name"><?php echo $value['plantacao']; ?></p>
                    <input type="radio" name="platacao[]" class="nodevicePlantacao" value="<?php echo $value['id']; ?>" id="plantacao-<?php echo $value['id']; ?>">
                </label>
              <?php
                  $myPlantations[] = $value['id'];
                }//foreach
              ?>
            </span><!-- .plantacoes -->
            <!-- Suas Plantações -->
            <?php }// if ?>

            <?php

            $sqlPlantacaoList = "SELECT * FROM DL_ADMIN_plantationList WHERE valido = '1' order by id desc";

            $resultPlantacaoList = mysql_query($sqlPlantacaoList);

            if (mysql_num_rows($resultPlantacaoList) > 0) {

            ?>

            <h4 class="title post">Outras plantações:</h4>
            <!-- Suas Plantações -->
            <span class="plantacoes">

            <?php 

              while ($row=mysql_fetch_array($resultPlantacaoList)) {
                $id=$row['id'];
                $plantacao=$row['plantacao'];
                $imagem=$row['imagem'];
                if(in_array($id, (array) $myPlantations)){//Se a plantação já existe
                        } else {

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

            <label for="plantacao-<?php echo $id ?>" class="plantacao-content">
                <img src="<?php echo $imagem ?>" alt="<?php echo $plantacao ?>" />
                <p class="plantation-name"><?php echo $plantacao ?></p>
                <input type="radio" name="platacao[]" class="nodevicePlantacao" value="<?php echo $id ?>" id="plantacao-<?php echo $id ?>">
            </label>

            <?php 
                }//else myPlantations
              }//While 
            ?>

            </span><!-- .plantacoes -->
            <!-- Suas Plantações -->

            <?php }//If ?>
            
            <button class="sendDevice" type="submit">Buscar</button><!-- aqui deve direcionar para a duvida-resultado.php, que serão as dúvidas filtradas -->