<table width="600" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr> 
    <td height="18" colspan="3" align="center" valign="top" nowrap class="wrap"> 
      <strong><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"> 
      Search Results</font></strong></td>
  </tr>
  <tr> 
     <td width="10" height="46" valign="top" class="wrap">&nbsp;</td>
<!--This commented section was designed to show the schedule for ALL the rooms that are being shown as the results of a given search.
  Can't get it to work.-->
   <td width="600" valign="top" class="results" align="center"><p><br>
     <!--    <strong>&nbsp;&nbsp;<a name="results"></a>Click on a room number to display 
        its schedule or display the schedule of <a href="Index.php?Step=3&roomid=5%" > listed 
        rooms</a>.</strong> 	<br/>-->
	
      <?php global $results;
	  if ($results==""){
		include("vars.php");
		$results = "&nbsp;&nbsp;&nbsp;<img src=\"".$url_images."no.gif\" alt=\"\" width=\"32\" height=\"32\" align=\"middle\">&nbsp; There are no rooms that match your request.  Please redefine the search options and try again.";
	}
	  echo $results; 
	  ?>
      <a name="sch"></a>  <br>
        <br>
      </p></td>
    <td width="10" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
  </tr>
  
</table>
 

