<html>
<head>
   <title>Dados do Sensor</title>
</head>
<body>
<h1>Dados do Sensor</h1>
<form action="add.php" method="get">
<!--<TABLE>
<tr>
   <td>ID</td>
   <td><input type="text" name="id" size="20" maxlength="30"></td>
</tr>
<tr>
   <td>Device</td>
   <td><input type="text" name="device" size="20" maxlength="30"></td>
</tr>
<tr>
   <td>Data</td>
   <td><input type="text" name="data" size="20" maxlength="30"></td>
</tr>
<tr>
   <td>Temperatura</td>
   <td><input type="text" name="temp" size="20" maxlength="30"></td>
</tr>
<tr>
   <td>Umidade</td>
   <td><input type="text" name="umi" size="20" maxlength="30"></td>
</tr>
<tr>
   <td>Umidade Solo</td>
   <td><input type="text" name="umisolo" size="20" maxlength="30"></td>
</tr>
<tr>
   <td>Chuva</td>
   <td><input type="text" name="chuva" size="20" maxlength="30"></td>
</tr>
</TABLE>
<input type="submit" name="accion" value="Grabar">-->
</FORM>
<hr>
<?php
   include("conec.php");
   $link=Conection();
   $result=mysql_query("select * from DL_DEVICE_1001 order by id desc",$link);
?>
<table border="1" cellspacing="1" cellpadding="1">
      <tr>
         <td>&nbsp;ID&nbsp;</td>
         <td>&nbsp;Device&nbsp;</td>
         <td>&nbsp;Data&nbsp;</td>
		 <td>&nbsp;Temperatura&nbsp;</td>
		 <td>&nbsp;Umidade&nbsp;</td>
		 <td>&nbsp;Umidade Solo&nbsp;</td>
		 <td>&nbsp;Chuva&nbsp;</td>
		 
       </tr>
<?php      
   while($row = mysql_fetch_array($result)) {
printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", $row["id"], $row["dispositivo"], $row["data"], $row["temperatura"], $row["umidade"], $row["umidade_do_solo"], $row["chuva"]);
   }
   mysql_free_result($result);
?>
</table>
</body>
</html>
