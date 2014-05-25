<?php
	require_once ("seguranca.php");
  protegePagina();

  require_once("conecta.php");
  require_once("executa.php");

  // VARIAVEIS GLOBAIS ==================================
  $usuarioLogadoID = $_SESSION['usuarioUserID'];
  $usuarioLogadoEmail = $_SESSION['usuarioUserNome'];

  // VALIDA PERFIL ======================================
  $perfilCriado = mysql_query("SELECT * FROM DL_PROFILE WHERE usuario = '$usuarioLogadoID'");
  $profile_id;
  $nome;
  $foto;
  $idProfile;
  $cpf;
  $email;
  $telefone;
  $celular;
  $fazenda;
  $cnpj;
  $endereco;
  $latitude;
  $longitude;
  $cep;
  $estado;
  $uf;
  $cidade;
  $plantacoes;
  $plantacoesLista;
  $sobre;

  if(mysql_num_rows($perfilCriado) > 0) {

    while ($row=mysql_fetch_array($perfilCriado)) {
      $profile_id=$row['id'];
      $nome=$row['nome'];
      $foto=$row['foto'];
      $idProfile=$row['id'];
      $cpf=$row['cpf'];
      $email=$row['email'];
  	  $telefone=$row['telefone'];
  	  $celular=$row['celular'];
  	  $fazenda=$row['fazenda'];
  	  $cnpj=$row['cnpj'];
  	  $endereco=$row['endereco'];
  	  $latitude=$row['latitude'];
  	  $longitude=$row['longitude'];
  	  $cep=$row['cep'];
  	  $estado=$row['estado'];
  	  $cidade=$row['cidade'];
  	  $plantacoes=$row['plantacoes'];
  	  $sobre=$row['sobre'];

      if($foto == null){
        $foto = 'admin/assets/img/template/logo.gif'; 
      } else {

        $fotoId = explode('-', $foto);

        $sqlFotoProfile = "SELECT * FROM DL_IMAGES WHERE id = '$fotoId[0]' order by id desc";
        $resultFotoProfile = mysql_query($sqlFotoProfile);

        while ($row=mysql_fetch_array($resultFotoProfile)) {
          $foto = $row['caminho'] . $row['nome_imagem'];
        }
      }

      if($sobre == null){
      	$sobre = 'Não há nenhuma descrição cadastrada';
      }

      $sqlState = "SELECT * FROM DL_STATE WHERE id = '$estado' order by id asc";
  	  $resultState = mysql_query($sqlState);
     	while ($row=mysql_fetch_array($resultState)) {
  		  $uf=$row['uf'];
  	  }

  	  $sqlCity = "SELECT * FROM DL_CITY WHERE id = '$cidade' order by id asc";
  	  $resultCity = mysql_query($sqlCity);
     	  while ($row=mysql_fetch_array($resultCity)) {
  		  $cidade=$row['cidade'];
  	  }

      $plantacoes = substr($plantacoes, 1);
      $plantacoes = explode('/', $plantacoes);


      foreach ($plantacoes as $value) {

        $sqlPlantation = "SELECT * FROM DL_ADMIN_plantationList WHERE id = '$value' AND valido = '1' order by id asc";
        $resultPlantation = mysql_query($sqlPlantation);
        while ($row=mysql_fetch_array($resultPlantation)) {

          $imagemPlantation = $row['imagem'];

          if($foto == null){
            $foto = 'admin/assets/img/template/logo.gif'; 
          } else {

            $imagemPlantation = explode('-', $imagemPlantation);

            $sqlImagemPlantation = "SELECT * FROM DL_IMAGES WHERE id = '$imagemPlantation[0]' order by id desc";
            $resultImagemPlantation = mysql_query($sqlImagemPlantation);

            while ($rowImagem=mysql_fetch_array($resultImagemPlantation)) {
              $imagemPlantation[0] = $rowImagem['caminho'] . $rowImagem['nome_imagem'];
            }
          }

          $plantacoesLista[] = array(
            'id'              => $row['id'],
            'plantacao'       => $row['plantacao'],
            'imagem'          => $imagemPlantation[0],
          );
        }

      }

    }

  } else {
  	header("Location: cadastroperfil.php");
  }
?>