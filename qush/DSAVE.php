<html> 
 <head> 
  <meta name="spm" content="Hosital Management System"> 
  <title>Save Doctor</title> 
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
<tr bgcolor=red><td ><font size=4 color=white>Save 
Doctor</font></td></tr> 
<?php 
$name=trim($_POST["name"]); 
$spec=trim($_POST["spec"]); 
$error=0; 
if ($name=="") { $error=1; echo "<tr><td><font color=red size=4>Name 
can't empty</font></td></tr>"; } 
if ($spec=="") { $error=1; echo "<tr><td><font color=red 
size=4>Specilization can't empty</font></td></tr>"; } 
if ($error==0) { 
 if(!mysql_connect("localhost","root","")) 
 { 
  echo "<tr><td><font color=red size=4>Connection 
Error</font></td></tr>";
  die(); 
 } 
 mysql_select_db("hospital"); 
 mysql_query("insert into doct(dname,dspec,dshow) 
values('".$name."','".$spec."','Y')"); 
 echo "<tr><td align=center><font size=4 color=green>Successfully 
Records Inserted</font></td></tr>"; 
} 
else { 
 echo "<form name=fdadd method=post action=dsave.php>"; 
 echo "<tr><td><table width=750 cellspacing=0 cellpadding=5>"; 
 echo "<tr><td>Doctor Name</td><td><input type=text name=name 
size=30 maxlength=30 value='".$name."'></td></tr>"; 
 echo "<tr><td>Specilization</td><td><input type=text name=spec 
size=30 maxlength=30 value='".$spec."'></td></tr>"; 
 echo "</table></td></tr>"; 
 echo "<tr><td align=center><input type=submit 
value=Submit></td></tr>"; 
 echo "</form>"; 
} 
echo "<tr><td align=center><a 
href=dlist.php>Continue...</a></td></tr>"; 
echo "</table>"; 
echo "</body></html>";
