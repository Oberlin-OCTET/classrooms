#!/usr/local/bin/php
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>Classroom Utility - OCTET - As Easy As 1-2-3!</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_reloadPage(init) {  //reloads the window if Nav4 resized
  if (init==true) with (navigator) {if ((appName=="Netscape")&&(parseInt(appVersion)==4)) {
    document.MM_pgW=innerWidth; document.MM_pgH=innerHeight; onresize=MM_reloadPage; }}
  else if (innerWidth!=document.MM_pgW || innerHeight!=document.MM_pgH) location.reload();
}
MM_reloadPage(true);
//-->
</script>

</head>
<?php 
global $step2, $step3, $step4;
require ("connectionObj.php");
include("FrameTop.php");
//if ($Step == 1) { //doesn't seem to have any affect FrameTop.php always appears
	//$Search = true;
	//include("FrameHeader.php");
//	include("FrameTop.php");
//}
if ($Step == 1) {
	//Create $results
	global $results;
	//Done.  Now include the frames to display the results
	$sql_str = "SELECT * FROM rooms WHERE ";
	if ($building != "dummy") { 
		$sql_str .= " AND RoomBuilding = '$building'"; }
	if ($room != "Room #" && $room != "") { 
		$sql_str .= " AND RoomNumber LIKE '%$room%'"; }//changed EQUAL to LIKE & added % around $room
	if ($cap != "Capacity" && $cap != "") { 
		$sql_str .= " AND RoomCap > $cap"; }
	if ($e1 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e1%'"; }
	if ($e2 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e2%'"; }
	if ($e3 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e3%'"; }
	if ($e4 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e4%'"; }
	if ($e5 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e5%'"; }
	if ($e6 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e6%'"; }
	if ($e7 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e7%'"; }
	if ($e8 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e8%'"; }
	if ($e9 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e9%'"; }
	if ($e10 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e10%'"; }
	if ($e11 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e11%'"; }
	if ($e12 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e12%'"; }
	if ($e13 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e13%'"; }
	if ($e14 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e14%'"; }
	if ($e15 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e15%'"; }
	if ($e16 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e16%'"; }
	if ($e17 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e17%'"; }
	if ($e18 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e18%'"; }
	if ($e19 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e19%'"; }
	if ($e20 == true) { 
		$sql_str .= " AND RoomEquipment LIKE '%$e20%'"; }
	
	$sql_str .= " ORDER BY RoomBuilding, RoomNumber";	

	//Connect to SQL database and run query.
	
	if($result = mysql_query($sql_str)) {
		$results = "";
		while($row = mysql_fetch_array($result)) {
			//==================Prepare table header for output==============================================
			if ($results == "") {
				$results = "<table width=\"740\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"results\">
				<tr><td width=\"150\" height=\"20\" valign=\"top\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Building Rm#</font></strong></td>    <td width=\"40\" valign=\"middle\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Capacity</font></strong></td>    <td width=\"300\" valign=\"middle\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Equipment</font></strong></td>    <td width=\"300\" valign=\"middle\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Notes</font></strong></td>   <td width=\"10\">&nbsp;</td>  </tr>";
			}
			$results .= "  <tr><td valign=\"top\" class=\"table\"> $row[RoomBuilding]&nbsp;<a href=\"Index.php?step3=1&roomid=$row[RoomID]#sch\">$row[RoomNumber]</a>
   							"; if  ($row[Image] == '1') { $results .= "<br>&nbsp;&nbsp;<a href=http://www.oberlin.edu/OCTET/SmartClassroom/images/pictures/big/$row[BuildingCode]$row[RoomNumber].jpg target=_blank><img src=http://www.oberlin.edu/OCTET/SmartClassroom/images/pictures/thumb/$row[BuildingCode]$row[RoomNumber].jpg border=0></a>" ;}
			$results .=     "</td><td valign=\"top\" class=\"table\" > $row[RoomCap]&nbsp;</td>
   							<td valign=\"top\" class=\"table\"> $row[RoomEquipment]&nbsp;</td>
   							<td valign=\"top\" class=\"table\"> $row[RoomNotes]&nbsp;</td>
  							<td>&nbsp;</td></tr>";
		}//end while
	}//end if mysql_query
	if ($results==""){
		include("vars.php");
		$results = "&nbsp;&nbsp;&nbsp;<img src=\"".$url_images."no.gif\" alt=\"\" width=\"32\" height=\"32\" align=\"middle\">&nbsp; There are no rooms that match your request.  Please redefine the search options and try again.";
	}
	else { //Finish table
		$results .=" <tr>     <td height=\"12\" colspan=\"6\" valign=\"top\" class=\"results\"><font color=\"#FFFFCC\" size=\"-7\">.</font></td>  </tr>  <tr>     <td height=\"0\"></td>    <td></td> <td></td>    <td></td>    <td></td>    <td></td>    <td></td  </tr>  <tr>     <td height=\"1\"></td>    <td><img src=\"spacer.gif\" alt=\"\" width=\"192\" height=\"1\"></td>    <td></td>    <td></td>    <td></td>    <td></td>    <td></td>  </tr></table>";
	}
	//include("FrameHeader.php");
	//displays the list of rooms
	include("FrameResults.php");

  //Step 3 is the identification the schedule for an individual room
  if ($step3 == 1) {$sql_str= "SELECT * FROM rooms WHERE RoomID LIKE '$roomid'"  ;}

  //Step 4 is the display of all the requested rooms that are in the search results
  if ($step4 == 1) { //display schedule
    global $sql_str, $room;
	//Connect to SQL database and run query.
	$sql_str = str_replace("\\", "", $sql_str);
	}	
	
	
	if($result = mysql_query($sql_str)) {
		$results = "";
		while($row = mysql_fetch_array($result)) {
			//==================Prepare table header for output==============================================
			if ($results == "") {
			$results = "<table width=\"740\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"results\">
				<tr><td width=\"150\" height=\"20\" valign=\"top\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Building Rm#</font></strong></td>    <td width=\"40\" valign=\"middle\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Capacity</font></strong></td>    <td width=\"300\" valign=\"middle\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Equipment</font></strong></td>    <td width=\"300\" valign=\"middle\" class=\"wrap\"><strong><font color=\"#FFFFFF\">Notes</font></strong></td>   <td width=\"10\">&nbsp;</td>  </tr>";
			}
			$results .= "  <tr> <td valign=\"top\" class=\"table\"> $row[RoomBuilding]&nbsp;<a href=\"Index.php?step3=1&roomid=$row[RoomID]#sch\">$row[RoomNumber]</a>
   							"; if  ($row[Image] == '1') { $results .= "<br>&nbsp;&nbsp;<a href=http://www.oberlin.edu/OCTET/SmartClassroom/images/pictures/big/$row[BuildingCode]$row[RoomNumber].jpg target=_blank><img src=http://www.oberlin.edu/OCTET/SmartClassroom/images/pictures/thumb/$row[BuildingCode]$row[RoomNumber].jpg border=0></a>" ;}
			$results .=     "</td><td valign=\"top\" class=\"table\" > $row[RoomCap]&nbsp;</td>
   							<td valign=\"top\" class=\"table\"> $row[RoomEquipment]&nbsp;</td>
   							<td valign=\"top\" class=\"table\"> $row[RoomNotes]&nbsp;</td>
  							<td>&nbsp;</td></tr>";
			}//end while
	}//end if mysql_query
	if ($results==""){
		include("vars.php");
		$results = "&nbsp;&nbsp;&nbsp;<img src=\"".$url_images."no.gif\" alt=\"\" width=\"32\" height=\"32\" align=\"middle\">&nbsp; There are no rooms that match your request.  Please redefine the search options and try again.";
	}
	else { //Finish table
		$results .=" <tr>     <td height=\"12\" colspan=\"6\" valign=\"top\" class=\"results\"><font color=\"#FFFFCC\" size=\"-7\">.</font></td>  </tr>  <tr>     <td height=\"0\"></td>    <td></td> <td></td>    <td></td>    <td></td>    <td></td>    <td></td  </tr>  <tr>     <td height=\"1\"></td>    <td><img src=\"spacer.gif\" alt=\"\" width=\"192\" height=\"1\"></td>    <td></td>    <td></td>    <td></td>    <td></td>    <td></td>  </tr></table>";
	}
	//include("FrameHeader.php");
	
	include("FrameSchedule.php");
	include("FrameResults.php");
}	

	if ($Step='6') {
	include ("Faculty.php");
	}


include ("FrameFooter.php"); 
?>
<body leftmargin="0" topmargin="0">
<div id="Image" style="position:absolute; left:211px; top:144px; width:364px; height:296px; z-index:1; visibility: hidden;">
  <p>This layer is where we would like the larger image of the room to be displayed. This layer has been turned off for now because there is no code to display the image here!</p>
  <p>Image display with in the page is for future development. After fixing the sql injection problem! </p>
</div>
</body>
</html>
