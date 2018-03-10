<html> 
 <head> 
  <meta name="spm" content="Hosital Management System"> 
  <title>Recover Doctor</title> 
 </head> 
<body> 
<table align=center width=750 cellspacing=0 cellpadding=5> 
<tr bgcolor=blue><td align=center><font SIZE=6 color=white>HOSPITAL 
MANAGEMENT SYSTEM</font></td></tr> 
<tr><td><table align=center width=750 cellspacing=0 cellpadding=5> 
<tr><td align=center><a href=dlist.php>Doctors</td><td align=center><a 
href=plist.php>Patients</td><td align=center><a 
href=app.php>Appointments</td> 
</table></td></tr> 
<tr bgcolor=red><td ><font size=4 color=white>Recover 
Doctor</font></td></tr> 
<?php 
$rno=$_GET["rno"]; 
 if(!mysql_connect("localhost","root","")) 
 { 
  echo "<tr><td><font color=red size=4>Connection 
Error</font></td></tr>"; 
  die(); 
 } 
 mysql_select_db("hospital"); 
 mysql_query("update doct set dshow='Y' where dno='$rno'"); 
 echo "<tr><td align=center><font size=4 color=green>Successfully Records Recovered</font></td></tr>"; 
echo "<tr><td align=center><a 
href=dlist.php>Continue...</a></td></tr>"; 
echo "</table>"; 
echo "</body></html>";