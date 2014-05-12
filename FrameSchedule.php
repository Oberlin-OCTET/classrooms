<?php if ($Step == '2' or $Step =='3') {?>
<table width="600" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td height="18" colspan="3" align="center" valign="top" nowrap class="wrap"> 
      <strong><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"> 
      Room Schedule</font></strong></td>
  </tr>
  <tr> 
    <td width="10" height="46" valign="top" class="wrap">&nbsp;</td>
    <td width="600" valign="top" class="results"><p>
       <?php
//	require("connectionObj.php");
	require("displayFun.php");
	//$sql = "SELECT * From rooms WHERE RoomID LIKE"; an attempt to fix the sql injection problem. since this variable is everywhere and 
	//in multiple files, it is rather difficult to not mess it up elsewhere. May require a rewrite
	//$sql_str = str_replace("\\", "", $sql);
	$sql_str3;//= urlencode($sql_str);
	$result = mysql_query($sql_str3);
	echo "<font color=\"red\"><b>IMPORTANT:</b></font><b> This schedule is for recurring events only. To schedule an one-time event refer to the contact person for this room.</b><br>&nbsp;<br>";
	if ($roomid == ""){echo "<center>This particular room is not in our database</center>"; }
	while($row=mysql_fetch_array($result)) {
		echo display($row[RoomNumber], $row[RoomBuilding], $row[BuildingCode]);
		echo "<br>========================================================================<br>";	
	}
	
?>
 <?php 
//		global $roomid, $roomnumber, $roombuilding;
//		echo "<font color=\"red\"><b>IMPORTANT:</b></font><b> This schedule is for recurring events only. To schedule an one-time event reffer to the contact person for this room.</b><br>&nbsp;<br>";
//		require("displayFun.php");
//		echo display($roomnumber, $roombuilding);
	  ?>
        <br>
        <br>
 <!--       <a href="#results">:: back to search results ::</a></p>
 -->
 </td>
    <td width="10" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>
<?php } ?>

