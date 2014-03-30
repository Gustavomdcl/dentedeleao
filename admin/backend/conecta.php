<?php
	$dbname="dentedelea1"; //Nome do Banco de dados
	$usuario="dentedelea1";
	$password="dentedeleao2014"; 
	if(!($id = mysql_connect("dbmy0062.whservidor.com",$usuario,$password)))
	{
	   echo "Não foi possível estabelecer com o Mysql - Erro 1";
	   exit;
	} 
	if(!($con=mysql_select_db($dbname,$id))) { 
	   echo "Não foi possível estabelecer com Mysql - Erro 2";
	   exit; 
	} 
	//Erro 1 - Usuario não existi
	//Erro 2 - Base de dados nao existi
?>