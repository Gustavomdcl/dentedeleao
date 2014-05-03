<?php
   include("conec.php");
   $link=Conection();
$Sql="insert into DL_DEVICE_1001 (dispositivo,umidade,umidade_do_solo,temperatura,chuva,data)  values ('".$_GET["dispositivo"]."','".$_GET["umidade"]."','".$_GET["umidade_do_solo"]."','".$_GET["temperatura"]."','".$_GET["chuva"]."', NOW())";      
   mysql_query($Sql,$link); 
   header("Location: insertareg.php");
?>
