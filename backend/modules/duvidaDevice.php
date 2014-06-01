            <?php

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
            <h4>Suas plantações:</h4>
            <!-- Suas Plantações -->
            <span class="plantacoes">
              <?php
              foreach ($deviceUserRow as $value) { 

                $plantationNameId = $value['plantacao'];

                $sqlPlantacaoNome = "SELECT `plantacao`, `imagem` FROM DL_ADMIN_plantationList WHERE id = '$plantationNameId' order by id desc limit 1";
                $resultPlantacaoNome = mysql_query($sqlPlantacaoNome);
                while ($row=mysql_fetch_array($resultPlantacaoNome)) {
                  $plantacaoNome = $row['plantacao'];
                  $plantacaoImg = $row['imagem'];

                  if($plantacaoImg == null){
                    $plantacaoImg = 'admin/assets/img/template/logo.gif'; 
                  } else {

                    $plantacaoImgContainer = explode('-', $plantacaoImg);

                    $sqlImagemPlantationTag = "SELECT * FROM DL_IMAGES WHERE id = '$plantacaoImgContainer[0]' order by id desc";
                    $resultImagemPlantationTag = mysql_query($sqlImagemPlantationTag);

                    while ($rowImagem=mysql_fetch_array($resultImagemPlantationTag)) {
                      $plantacaoImg = $rowImagem['caminho'] . $rowImagem['nome_imagem'];
                    }
                  }

              ?>
                <label for="plantacao-<?php echo $value['plantacao']; ?>"><img src="<?php echo $plantacaoImg; ?>" alt="<?php echo $plantacaoNome; ?>" /><?php echo $plantacaoNome; ?> (dispositivo)</label>
                <input type="radio" name="platacaoDevice" class="devicePlantacao" value="<?php echo $value['plantacao']; ?>" id="plantacao-<?php echo $value['plantacao']; ?>">
              <?php
                }//while
              }//foreach
              ?>
                <label for="plantacao-null"><img src="admin/assets/img/template/logo.gif" width="50" height="50" alt="Outra" />Outra</label>
                <input type="radio" name="platacaoDevice" class="devicePlantacao" value="outra" id="plantacao-null">
            </span><!-- .plantacoes -->
            <!-- Suas Plantações -->
            <div class="deviceData">
                <p>Quando você notou o problema referente a sua dúvida?</p>
                <input type="text" name="data_inicio" id="datepicker" placeholder="Data">
                <input type="hidden" name="perfil" id="perfil" value="<?php echo $profile_id; ?>">
            </div><!-- .deviceData -->
            <button class="sendDevice" type="submit" disabled>Buscar</button><!-- aqui deve direcionar para a duvida-resultado.php, que serão as dúvidas filtradas -->