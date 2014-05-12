
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_setTextOfTextfield(objName,x,newText) { //v3.0
  var obj = MM_findObj(objName); if (obj) obj.value = newText;
}
//-->
</script>

<table width="760" border="0" cellpadding="0" cellspacing="0">
  <!--DWLayoutTable-->
  <tr class="wrap"> 
      <td height="1"></td>
      <td></td>
      <td></td>
      <td></td>
      <td width="126"></td>
      <td width="59"></td>
      <td></td>
  </tr>
  <tr> 
  	<td width="10" rowspan="6" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td colspan="5" align="center" valign="top" class="wrap">
	<strong><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">
	    Look for the rooms and times you, or someone else is scheduled to teach </font></strong>
	</td>	
	<td width="10" rowspan="6" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td> 
  
</tr>	
<tr>
	<td colspan="5" align="left" valign="top" >
		 <form name="form1" method="GET" action="Index.php">
                      <p>&nbsp;&nbsp;<strong>Last:&nbsp;&nbsp;
                      <input name="first" type="text" id="first">
                      </strong> <strong>First:&nbsp;&nbsp;
                      <input name="last" type="text" id="last">
                      </strong> 
                        <input name="Submit" type="submit" class="buttons" value="Display your schedule">
                        <br>
                        <em>only use your first name if you have the same last name as another instructor </em>
	                                   </p>
					<input name="faculty" type="hidden" id="Step" value="6">
		 </form>
	</td>
</tr>
<tr>	
   
	<td height="19" colspan="5" align="center" valign="top" nowrap class="wrap"> 
      <strong><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"> 
      Looking for a room with particular equipment in it? Search Classroom by selecting your criteria</font></strong></td>
  </tr>
  <form name="search" action="Index.php">
    <tr> 
   
      <td height="51" colspan="5" valign="top" class="results"><p><strong> <br>
          &nbsp;&nbsp; 
          <select name="building" id="building">
            <option value="dummy" selected>---Select Building---</option>
            <option value="Allen Art Building">Allen Art Building</option>
            <option value="Bibbins">Bibbins</option>
            <option value="Hallock Auditorium">Hallock Auditorium</option>
            <option value="King">King</option>
            <option value="Mudd">Mudd</option>
            <option value="Peters">Peters</option>
            <option value="Severance">Severance</option>
            <option value="Science Center">Science Center</option>
          </select>
		  <input type="hidden" value="1" name="Step" id="Step">
          <input name="room" type="text" id="room" onFocus="MM_setTextOfTextfield('room','','')" value="Room #" size="8">
          <input name="cap" type="text" id="cap" onFocus="MM_setTextOfTextfield('cap','','')" value="Capacity" size="8">
          &nbsp;Containing the following equipment:<br>
          </strong><strong><br>
          </strong></p></td>
     
    </tr>
    <tr> 
      <td width="185" height="78" valign="top" class="results"><p><strong> 
          <input type="checkbox" name="e1" value="DVD">
          </strong>DVD Player<br>
          <strong> 
          <input type="checkbox" name="e2" value="Surround Sound">
          </strong>Surround Sound <br>
          <strong> 
          <input type="checkbox" name="e3" value="Laserdisc">
          </strong>Laserdisc<br>
          <strong> 
          <input type="checkbox" name="e4" value="Multistandard VCR">
          </strong>Multistandard VCR<br>
          <strong> 
          <input type="checkbox" name="e5" value="Code Free DVD">
          </strong>Code Free DVD Player </p></td>
      <td width="185" valign="top" class="results"> <strong> 
        <input type="checkbox" name="e6" value="Document Camera">
        </strong>Document Camera<br> <strong> 
        <input type="checkbox" name="e7" value="16mm Film Projector">
        </strong>16mm Film Projector<br> <strong> 
        <input type="checkbox" name="e8" value="Lantern Slide Projector">
        </strong>Lantern Slide Projectors<br> <strong> 
        <input type="checkbox" name="e9" value="Articulated Arm">
        </strong>Articulated Arm Camera<br> <strong> 
        <input type="checkbox" name="e10" value="Portable">
        </strong>Portable Doc. Camera</td>
      <td width="185" valign="top" class="results"> <p><strong> 
          <input type="checkbox" name="e11" value="Slide Projector">
          </strong>Slide Projector<br>
          <strong> 
          <input type="checkbox" name="e12" value="Screen">
          </strong>Screen<br>
          <strong> 
          <input type="checkbox" name="e13" value="Jack">
          </strong>Wall Jack<br>
          <strong> 
          <input type="checkbox" name="e14" value="Printer">
          </strong>Printer<br>
          <strong> 
          <input type="checkbox" name="e15" value="Scanner">
          </strong>Scanner<strong></strong></p></td>
      <td colspan="2" valign="top" class="results"><strong> 
        <input type="checkbox" name="e16" value="G4">
        </strong>G4s<br> <strong> 
        <input type="checkbox" name="e17" value="iMac">
        </strong>iMacs<br> <strong> 
        <input type="checkbox" name="e18" value="iBook">
        </strong>iBooks<br> <strong> 
        <input type="checkbox" name="e19" value="Gateway">
        </strong>Gateways<br> <strong> 
        <input type="checkbox" name="e20" value="Dell">
        </strong>Dells</td>
    </tr>
    <tr> 
      <td height="29" colspan="5" valign="top" class="results"> <p><strong> <br>
          <input type="hidden" name="searched" value="1">
          Note: You do not need to fill out every field.<br>
          To display all classrooms hit the search button with no search options 
          selected. &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; 
          &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
          <input name="Submit" type="submit" class="buttons" value="Search">
          </strong><br>
          &nbsp; </p></td>
    </tr>
    
  </form>
</table>

