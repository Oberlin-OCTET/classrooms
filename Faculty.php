<?php 
	//Connect to SQL database and run query.
	//require ("connectionObj.php");
	
	//$first and $last refers to the first and last part of the search string not first name and last name. This is 
	//necessary because the instructor field contains names in a last name first name format e.g. Albert Borroni is 
	//stored as Borroni Albert. The search string created searches for %borroni%alb%

	include("vars.php");
		
	echo '<table width="760" border="0" cellpadding="0" cellspacing="0">
			  	<!--DWLayoutTable-->
				  <tr> 
				    <td height="18" colspan="3" align="center" valign="top" nowrap class="wrap"> 
				      <strong><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">Faculty Schedule for ';
					   echo $first ."  ".   $last ;
					   echo '</font></strong></td>
				  </tr>
				  <tr> 
				    <td width="10" height="46" valign="top" class="wrap">&nbsp;</td>
				    <td width="740" valign="top" class="results"><p><br>';
	
	
	echo displaypeople($first, $last); 
	/*echo ' <br><br>
    	    <a href="http://www.oberlin.edu/OCTET/SmartClassroom/">:: Back to search ::</a></p>*/ 
	echo '</td>
			 <td width="10" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td></tr></table></body></html>';
	
//	include ("FrameFooter.php");
	
function displaypeople($first, $last) {
	
	$sql_str = "SELECT * FROM records WHERE instructor LIKE '%".$first."%".$last."%' ORDER BY times";

	if(!$result = mysql_query($sql_str)) {
		echo "ERROR in display.php.";
	}
	$indent = '&nbsp;&nbsp;&nbsp;&nbsp;';
	$ans1 = "<b>Monday</b><br>";
	$ans2 = "<br><b>Tuesday</b><br>";
	$ans3 = "<br><b>Wednesday</b><br>";
	$ans4 = "<br><b>Thursday</b><br>";
	$ans5 = "<br><b>Friday</b><br>";
	$ans6 = "<br><b>Saturday</b><br>";
	$ans7 = "<br><b>Sunday</b><br>";
	
	//Create 2D array to hold time slots for all 7 days
	$week = array(1, 2, 3, 4, 5, 6, 7);
	for($i=0; $i<7; $i++) {$week[$i] = array();}
	
	$ans = "<b>Schedule for ".$first." ".$last.".  </b><br>&nbsp;<br><blockquote>";
	//Go through dataset
	while($row = mysql_fetch_array($result)) {

		if((substr($row[times], 0, 2) == 'am') && (substr($row[times], 7, 2) == '12')) $row[times] = substr($row[times], 2, 2).":".substr($row[times], 4, 2)."-".substr($row[times], 7, 2).":".substr($row[times], 9, 2)." ".'pm'." - ";
		else $row[times] = substr($row[times], 2, 2).":".substr($row[times], 4, 2)."-".substr($row[times], 7, 2).":".substr($row[times], 9, 2)." ".substr($row[times], 0, 2)." - ";
		$days = explode("|", $row[days]);
		//Push results into array to sort for 12:00 problem later (12:00pm appearing at the end of the times list)
		for($i=0; $i<7; $i++) {
			if($days[$i+1]) {
				 $sql_str_rooms = "SELECT * FROM rooms WHERE RoomBuilding LIKE '%".$row[building]."%' AND RoomNumber LIKE '".$row[room]."' ";
				$result_rooms = mysql_query($sql_str_rooms);
				$rooms = mysql_fetch_array($result_rooms);
	 
				array_push($week[$i], $row[times]." ".$row[title]." - <i><a href='http://www.oberlin.edu/cgi-bin/cgiwrap/OCTET/classrooms/Index.php?roomid=$rooms[RoomID]&Step=3' > $row[building] $row[room]</a></i><br>");
			}
		}
	}
	
	//Look for any 12:xx times at the end of the array and put these entries after the 11:xx entries
	for($i=0; $i<7; $i++) {
		$array_size = sizeof($week[$i]);
		
		if(substr($week[$i][$array_size-1], 0, 2) == "12") {
			$eleven_index = 0;
			//Look for 11
			for($k=0; $k < $array_size; $k++) {
				if(substr($week[$i][$k], 0, 2) == "11") {

					$eleven_index = $k;
					break;
				}
			}
			//Look for 10
			if($eleven_index == 0) {
			for($k=0; $k < $array_size; $k++) {
				if(substr($week[$i][$k], 0, 2) == "10") {
					$eleven_index = $k;
					break;
				}
			}	
			}
			//Look for 9
			if($eleven_index == 0) {
			for($k=0; $k < $array_size; $k++) {
				if(substr($week[$i][$k], 0, 2) == "09") {
					$eleven_index = $k;
					break;
				}
			}	
			}
			//Look for 8
			if($eleven_index == 0) {
			for($k=0; $k < $array_size; $k++) {
				if(substr($week[$i][$k], 0, 2) == "08") {
					$eleven_index = $k;
					break;
				}
			}	
			}
			//Place 12 after $eleven_index
			$eleven_index++;
			$value_12 = $week[$i][$array_size-1];
			for($n=$array_size-2; $n>$eleven_index; $n--) {
				$week[$i][$n+1]=$week[$i][$n];
			}
			$week[$i][$eleven_index] = $value_12;
		}
	}
	
	//Construct output
	$ans1 .= $indent.implode($indent, $week[0]);
	$ans2 .= $indent.implode($indent, $week[1]);
	$ans3 .= $indent.implode($indent, $week[2]);
	$ans4 .= $indent.implode($indent, $week[3]);
	$ans5 .= $indent.implode($indent, $week[4]);
	$ans6 .= $indent.implode($indent, $week[5]);
	$ans7 .= $indent.implode($indent, $week[6]);
	
	//For entries that have to classes scheduled enter None for clarity
	if($ans1=="<b>Monday</b><br>".$indent) $ans1 .= $indent."<i>None<br></i>";
	if($ans2=="<br><b>Tuesday</b><br>".$indent) $ans2 .= $indent."<i>None<br></i>";
	if($ans3=="<br><b>Wednesday</b><br>".$indent) $ans3 .= $indent."<i>None<br></i>";
	if($ans4=="<br><b>Thursday</b><br>".$indent) $ans4 .= $indent."<i>None<br></i>";
	if($ans5=="<br><b>Friday</b><br>".$indent) $ans5 .= $indent."<i>None<br></i>";
	if($ans6=="<br><b>Saturday</b><br>".$indent) $ans6 .= $indent."<i>None<br></i>";
	if($ans7=="<br><b>Sunday</b><br>".$indent) $ans7 .= $indent."<i>None<br></i>";
	return $ans1.$ans2.$ans3.$ans4.$ans5.$ans6.$ans7."</blockquote>"; 
	// took out $ans because the search string  can be found in header for this section. Defined  on line 17.
	
}
?>


