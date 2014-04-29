<?php
function Conection(){
   if (!($link=mysql_connect("187.17.103.150","dentedelea1","dentedeleao2014")))  {
      exit();
   }
   if (!mysql_select_db("dentedelea1",$link)){
      exit();
   }
   return $link;
} 
?>