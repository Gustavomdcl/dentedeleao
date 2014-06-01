<?php
    // NUMERO DÚVIDA ======================================
    $sqlDuvida = mysql_query("SELECT * FROM DL_FORUM WHERE id = '$duvidaPost' limit 1");
    $titulo; $texto; $perfil; $data; $plantacao; $imagem; $video; $tag;
    while ($row=mysql_fetch_array($sqlDuvida)) {
        $tituloDuvida           =   $row['titulo'];//DONE
        $textoDuvida            =   $row['texto'];//DONE
        $idPerfilDuvida         =   $row['perfil'];//DONE
        $dataDuvida             =   $row['data'];//DONE
        $plantacaoDuvida        =   $row['plantacao'];//DONE
        $plantacaoDuvidaId      =   $plantacaoDuvida;//DONE
        $imagemDuvida           =   $row['imagem'];//DONE
        $videoDuvida            =   $row['video'];//DONE
        $tagDuvida              =   $row['tag'];

        //PERFIL ===============
        $sqlProfile = mysql_query("SELECT `nome` FROM DL_PROFILE WHERE id = '$idPerfilDuvida' limit 1");
        while ($row=mysql_fetch_array($sqlProfile)) {
            $perfilDuvida       =   $row['nome'];
        }

        //DATA ===============
        $dataPartes          =   explode(" ", $dataDuvida);
        $dataUnidades        =   explode("-", $dataPartes[0]);
        if ($dataUnidades[1]=='01'){ $dataUnidades[1] = 'Janeiro'; }
        else if ($dataUnidades[1]=='02'){ $dataUnidades[1] = 'Fevereiro'; }
        else if ($dataUnidades[1]=='03'){ $dataUnidades[1] = 'Março'; }
        else if ($dataUnidades[1]=='04'){ $dataUnidades[1] = 'Abril'; }
        else if ($dataUnidades[1]=='05'){ $dataUnidades[1] = 'Maio'; }
        else if ($dataUnidades[1]=='06'){ $dataUnidades[1] = 'Junho'; }
        else if ($dataUnidades[1]=='07'){ $dataUnidades[1] = 'Julho'; }
        else if ($dataUnidades[1]=='08'){ $dataUnidades[1] = 'Agosto'; }
        else if ($dataUnidades[1]=='09'){ $dataUnidades[1] = 'Setembro'; }
        else if ($dataUnidades[1]=='10'){ $dataUnidades[1] = 'Outubro'; }
        else if ($dataUnidades[1]=='11'){ $dataUnidades[1] = 'Novembro'; }
        else if ($dataUnidades[1]=='12'){ $dataUnidades[1] = 'Dezembro'; }
        $dataDuvida          =   $dataUnidades[2] . ' de ' . $dataUnidades[1] . ' de ' . $dataUnidades[0];

        //PLANTAÇÃO ===============
        if($plantacaoDuvida==''){} else {
            $plantacaoDuvida     =   explode("/", $plantacaoDuvida);
            $plantacaoCount      =   0;
            foreach ($plantacaoDuvida as $plantacaoUnidade) {
                $sqlPlantacoesCategorias = mysql_query("SELECT `plantacao` FROM DL_ADMIN_plantationList WHERE id = '$plantacaoDuvida[$plantacaoCount]' limit 1");
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

        //TAGS ===============
        if($tagDuvida==''){} else {
            $tagDuvida     =   explode("|", $tagDuvida);
            $tagDuvidaId   =   $tagDuvida;
            $tagCount      =   0;
            foreach ($tagDuvida as $tagUnidade) {
                $sqlPessoasMarcadas = mysql_query("SELECT `nome` FROM DL_PROFILE WHERE id = '$tagDuvida[$tagCount]' limit 1");
                while ($row=mysql_fetch_array($sqlPessoasMarcadas)) {
                    $tagNome       =   $row['nome'];
                    $tagDuvida[$tagCount] = $tagDuvidaId[$tagCount] . '|' . $tagNome;
                }
                $tagCount  =   $tagCount + 1;
            }
        }

        //IMAGEM ===============
        if($imagemDuvida==''){} else {
            $imagemDuvida     =   explode("-", $imagemDuvida);
            $imagemCount      =   0;
            foreach ($imagemDuvida as $imagemUnidade) {
                $sqlImagensPost = mysql_query("SELECT `caminho`, `nome_imagem` FROM DL_IMAGES WHERE id = '$imagemDuvida[$imagemCount]' limit 1");
                while ($row=mysql_fetch_array($sqlImagensPost)) {
                    $imagemCaminho    =   $row['caminho'];
                    $imagemNome       =   $row['nome_imagem'];
                    $imagemDuvida[$imagemCount] = $imagemCaminho . $imagemNome;
                }
                $imagemCount  =   $imagemCount + 1;
            }
        }

        //VIDEO ===============
        if($videoDuvida==''){} else {
            $videoParts;
            $sqlVideoPost = mysql_query("SELECT `caminho`, `nome_video` FROM DL_VIDEOS WHERE id = '$videoDuvida' limit 1");
            while ($row=mysql_fetch_array($sqlVideoPost)) {
                $videoCaminho    =   $row['caminho'];
                $videoNome       =   $row['nome_video'];
                $videoDuvida     =   $videoCaminho . $videoNome;
                $videoParts      =   explode(".", $videoDuvida);
            }
        }
    }
    if(mysql_num_rows($sqlDuvida) <= 0) {
        header("Location: duvidas.php");
    }
