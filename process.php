#!/usr/local/bin/php
<?php
global $problems;
$problems = 0;
require("connectionObj.php");
//Delete data from table records
if(!mysql_query("DELETE FROM records WHERE days LIKE '%|%'")) echo "ERROR removing old entries! Contact Vladi and yell at him!  But too hard.<br>&nbsp;<br>&nbsp;<br>";
//Open file and updated database
global $file_path, $title_o, $inst_o;
include("vars.php");
$file = fopen($file_path, "r");
while (!feof ($file)) {
    $buffer = fgets($file, 4096);
	parse($buffer);
}

cleanup();
echo "Database updated.<br>There were $problems problems.";

//==================================================\\
//=====================FUNCTION======================))
//==================================================//
function parse($string) {
	global $problems;
	//See if sting is valid
	if(trim(substr($string, 61, 7)) != "DAYS" && trim(substr($string, 61, 7)) != "DULE FO" && trim(substr($string, 61, 7)) != "") $valid = true;
	else $valid = false;
	
	if($valid) {
		//vars to get: '$title', '$days', '$time', '$building', '$room', '$instructor'
		global $inst_o, $title_o;
		$title = trim(substr($string, 30, 30));
		if($title == "") $title = $title_o;
		else $title_o = $title;
		$days = parseDays(trim(substr($string, 61, 7)));
		$time = trim(substr($string, 69, 11));
		if(substr($time, 5, 2) == '12') $time = 'am'.substr($time, 0, 9);
		else $time = substr($time, 9, 2).substr($time, 0, 9);
		$building = parseBuilding(trim(substr($string, 82, 4)));
		$room = trim(substr($string, 89, 5));
		$instructor = trim(substr($string, 100, 18));
		if($instructor == "") $instructor = $inst_o;
		else $inst_o = $instructor;
		
		echo "Title: |$title|";
		echo "<br>Days: |$days|";
		echo "<br>Time: |$time|";
		echo "<br>Building: |$building|";
		echo "<br>Room: |$room|";
		echo "<br>Instructor: |$instructor|";
		
		//Once parsed please put in databas
		if($valid) {
			$sql_str = "INSERT INTO records (recordID, title, days, times, building, room, instructor) VALUES (NULL, \"$title\", '$days', '$time', '$building', '$room', \"$instructor\")";
			if (mysql_query($sql_str)) {
				echo "<br><b>Success</b>";
			}
			else {
				echo "<br><font color=\"red\"><b>ERROR!</b></font>";
				$problems++;
			}
		}
		echo "<br>====================================<br>";
	}
	else return void;

}
//==================================================\\
//=====================FUNCTION======================))
//==================================================//
function parseDays($day) { //parses to day from a string into an array
	$result[0] = "0";
	$result[1] = false;
	$result[2] = false;
	$result[3] = false;
	$result[4] = false;
	$result[5] = false;
	$result[6] = false;
	$result[7] = false;
	
	$day = trim($day); //trim string from whitespaces and such
	$length = strlen($day);
	$begin = 0;
	
	//begin while loop
	while($begin < strlen($day)) {
	if(substr($day, $begin, 1) == "M") {
		$result[1] = true;
	}
	else if(substr($day, $begin, 1) == "T") {
		$result[2] = true;
	}
	else if(substr($day, $begin, 1) == "W") {
		$result[3] = true;
	}
	else if(substr($day, $begin, 1) == "R") {
		$result[4] = true;
	}
	else if(substr($day, $begin, 1) == "F") {
		$result[5] = true;
	}
	else if(substr($day, $begin, 1) == "S") {
		$result[6] = true;
	}
	else if(substr($day, $begin, 1) == "N") {
		$result[7] = true;
	}
	$begin += 1; 
	}//end while loop
	return implode("|", $result);	
}//end of function parseDay()

function parseBuilding($building) {
	if($building == "KING") return "King";
	else if($building == "MUDD") return "Mudd";
	else if($building == "RICE") return "Rice";
	else if($building == "ART2") return "Allen Art Building";
	else if($building == "SEVE") return "Severance";
	else if($building == "SCTR") return "Science Center";
	else if($building == "PETE") return "Peters";
	else if($building == "CBIB") return "Bibbins";
	else if($building == "PETE") return "Peters";
	else if($building == "CARN") return "Carnegie";
	else if($building == "WILD") return "Wilder";
	else if($building == "WARN") return "Warner";
	else if($building == "HALL") return "Hall";
	else if($building == "HALE") return "Hales";
	else return $building;
}
fclose($file);
function cleanup() {
	$result = mysql_query("SELECT * FROM records");
	while($row = mysql_fetch_array($result)) {
		//Delete duplicates
		$result2 = mysql_query("SELECT * FROM records WHERE title=\"$row[title]\" AND days=\"$row[days]\" and times=\"$row[times]\" and building=\"$row[building]\" and room=\"$row[room]\" and instructor=\"$row[instructor]\" and recordID <> $row[recordID]");
		if($row2 = mysql_fetch_array($result2)) {
			mysql_query("DELETE FROM records WHERE title=\"$row[title]\" AND days=\"$row[days]\" and times=\"$row[times]\" and building=\"$row[building]\" and room=\"$row[room]\" and instructor=\"$row[instructor]\" and recordID <> $row[recordID]");
			//Mask the duplicate so that it does not get removed
			$arr = explode('|', $row[days]);
			$arr[0] = 1;
			$row[days] = implode('|', $arr);
			mysql_query("UPDATE records SET days= \"$row[days]\" WHERE recordID=$row[recordID]");
		}
		
		//Unite tought by same instructors
		$result3 = mysql_query("SELECT * FROM records WHERE title=\"$row[title]\" AND days=\"$row[days]\" and times=\"$row[times]\" and building=\"$row[building]\" and room=\"$row[room]\" and instructor <> \"$row[instructor]\" and recordID <> $row[recordID]");
		if($row3 = mysql_fetch_array($result3)) {
			mysql_query("DELETE FROM records WHERE title=\"$row[title]\" AND days=\"$row[days]\" and times=\"$row[times]\" and building=\"$row[building]\" and room=\"$row[room]\" and instructor <> \"$row[instructor]\" and recordID <> $row[recordID]");
			mysql_query("UPDATE records SET instructor= \"$row[instructor] and $row3[instructor]\" WHERE recordID=$row[recordID]");
			//Mask the duplicate so that it does not get removed
			$arr = explode('|', $row[days]);
			$arr[0] = 1;
			$row[days] = implode('|', $arr);
			mysql_query("UPDATE records SET days= \"$row[days]\" WHERE recordID=$row[recordID]");
		}
		
	}
	
}
closeit();
?>