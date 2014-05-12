#!/usr/local/bin/php
<html>
<head>
<title>Admin Section</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="<?php include("vars.php"); echo $url_css;?>styles.css" rel="stylesheet" type="text/css">
</head>

<body leftmargin="0" topmargin="0">

<table width="760" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td height="19" colspan="3" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr class="text"> 
    <td width="15" rowspan="2" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
    <td width="730" height="218" valign="top" class="results"><blockquote>
        <p>&nbsp;</p>
        <?php 
		if($pass != "edtech") echo '<p>Please enter your password:</p> </p>
        <form name="form1" method="post" action="">
        <p>
          <input name="pass" type="password" id="pass">
        </p>
        <p>
          <input type="submit" name="Submit" value="Submit">
        </p>
      </form>';
	  else if ($pass=="edtech" && isset($id) && $action=="updateprep") {
	 	include("connectionObj.php");
	  	$row = mysql_fetch_array(mysql_query("SELECT * FROM rooms WHERE RoomID=$id"));
		echo '<form name="form1" method="post" action="admin.php">
  <p>Room Number: 
    <input name="number" type="text" value="'.$row[RoomNumber].'" id="number">
</p>
  <p>Room Building: 
    <input name="building" type="text" value="'.$row[RoomBuilding].'" id="building">
</p>
  <p>Capacity: 
    <input name="cap" type="text" value="'.$row[RoomCap].'" id="cap">
  </p>
  <p>Equipment: <br>
    <textarea name="equip" cols="50" rows="5" id="equip" >'.$row[RoomEquipment].'</textarea>
  </p>
  <p>Notes: <br>
    <textarea name="notes" cols="50" rows="3" id="notes">'.$row[RoomNotes].'</textarea>
  </p>
  <p><input name="action" type="hidden" id="action" value="update"><input name="pass" type="hidden" id="pass" value="edtech"><input name="id" type="hidden" id="id" value="'.$id.'">
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>';
	  }
	  else if ($pass=="edtech" && $action=="addprep") {
	 	include("connectionObj.php");
	  	echo '<form name="form1" method="post" action="admin.php">
  <p>Room Number: 
    <input name="number" type="text" value="" id="number">
</p>
  <p>Room Building: 
  	<select name="building">
  	<option value="AJLC">AJLC</option>
  	<option value="Allen Art Building">Allen Art Building</option>
  	<option value="Bibbins">Bibbins</option>
  	<option value="King">King</option>
  	<option value="Mudd">Mudd</option>
  	<option value="Peters">Peters</option>
  	<option value="Science Center">Science Center</option>
  	<option value="Severance">Severance</option>
  	<option value="Stevenson">Stevenson</option>
	</select>
</p>
  <p>Capacity: 
    <input name="cap" type="text" value="" id="cap">
  </p>
  <p>Equipment: <br>
    <textarea name="equip" cols="50" rows="5" id="equip" ></textarea>
  </p>
  <p>Notes: <br>
    <textarea name="notes" cols="50" rows="3" id="notes"></textarea>
  </p>
  <p><input name="action" type="hidden" id="action" value="add">
  	<input name="pass" type="hidden" id="pass" value="edtech">
    <input type="submit" name="Submit" value="Submit">
  </p>
</form>';
	  }
	  else if ($pass=="edtech" && $action=="update") {
	  	//Update
		include("connectionObj.php");
		mysql_query("UPDATE rooms SET RoomCap= $cap, RoomNumber='$number', RoomBuilding='$building', RoomEquipment='$equip', RoomNotes='$notes' WHERE RoomID=$id");
		echo 'Room info updated.<br><a href="admin.php?pass=edtech">Back to the list of rooms</a>';
	  }
	 else if ($pass=="edtech" && $action=="add") {
	  	//Update
		include("connectionObj.php");
		//add insert query
		mysql_query("INSERT INTO rooms (RoomNumber, RoomBuilding, RoomCap, RoomEquipment,RoomNotes) VALUES ('$number', '$building', '$cap', '$equip', '$notes')");
		echo 'Room added. <br><a href="admin.php?pass=edtech">Back to the list of rooms</a>';
	  }
	  else {
	  	include("connectionObj.php");
		$result = mysql_query("SELECT * FROM rooms");
		echo '<b>Select a room to edit</b><br>';
		while($row = mysql_fetch_array($result)) {
			echo "<a href=\"admin.php?pass=edtech&id=$row[RoomID]&action=updateprep\">$row[RoomBuilding] $row[RoomNumber]</a><br>";
		}
		echo "<br><a href=\"admin.php?pass=edtech&action=addprep\">Add a room</a>";
		echo "<br><a href=\"Index.php\">Log out</a> | To parse bannfer file located in OCTET/files/classrooms/banner.txt <a href=\"process.php\">click here</a>";
	  }
	  ?>
	  </blockquote>
      <p class="text">&nbsp;</p>
      </td>
    <td width="15" rowspan="2" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  <tr> 
    <td height="19" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
</table>
</body>
</html>
