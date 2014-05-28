            <?php
            $myPlantations;
            if($plantacoesLista!=null){ ?>
            <h4>Suas plantações:</h4>
            <!-- Suas Plantações -->
            <span class="plantacoes">
              <?php foreach ($plantacoesLista as $value) {  ?>
                <label for="plantacao-<?php echo $value['id']; ?>"><img src="<?php echo $value['imagem']; ?>" alt="<?php echo $value['plantacao']; ?>" /><?php echo $value['plantacao']; ?> (dispositivo)</label>
                <input type="radio" name="platacaoDevice" class="devicePlantacao" value="<?php echo $value['id']; ?>" id="plantacao-<?php echo $value['id']; ?>">
              <?php }//foreach ?>
                <label for="plantacao-null"><img src="admin/assets/img/template/logo.gif" width="50" height="50" alt="Outra" />Outra</label>
                <input type="radio" name="platacaoDevice" class="devicePlantacao" value="outra" id="plantacao-null">
            </span><!-- .plantacoes -->
            <!-- Suas Plantações -->
            <?php }// if ?>
            </span><!-- .plantacoes -->
            <!-- Suas Plantações -->
            <div class="deviceData">
                <p>Quando você notou o problema referente a sua dúvida?</p>
                <input type="text" id="datepicker" placeholder="Data">
            </div><!-- .deviceData -->
            <button class="sendDevice" type="submit" disabled>Buscar</button><!-- aqui deve direcionar para a duvida-resultado.php, que serão as dúvidas filtradas -->