<?php
   include("conec.php");
   $link=Conection();
$Sql="insert into DL_DEVICE (device,umi,umisolo,temp,chuva,data)  values ('".$_GET[“device”].”’, '".$_GET["umi"]."', '".$_GET["umisolo"]."', '".$_GET["temp"]."', '".$_GET["chuva"]."', NOW())";      
   mysql_query($Sql,$link); 
   header("Location: insertareg.php");
?>