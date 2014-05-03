<?php
   include("conec.php");
   $link=Conection();
   $Sql="insert into DL_DEVICE (dispositivo,umidade,umidade_do_solo,temperatura,chuva,data)  values ('".$_GET["dispositivo"]."','".$_GET["umidade"]."','".$_GET["umidade_do_solo"]."','".$_GET["temperatura"]."','".$_GET["chuva"]."', NOW())";   
   mysql_query($Sql,$link); 

   $dispositivo = $_GET["dispositivo"];
   $deviceCadastrado = mysql_query("SELECT * FROM DL_DEVICE_code WHERE codigo = '$dispositivo'");
   if(mysql_num_rows($deviceCadastrado) > 0) {
   } else {
	   $SqlDispositivo="insert into DL_DEVICE_code (codigo)  values ('".$_GET["dispositivo"]."')";   
	   mysql_query($SqlDispositivo,$link);
   }

   header("Location: insertareg.php");
?>
