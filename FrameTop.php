<!--#!/usr/local/bin/php -->
<style type="text/css">
<!--
.style1 {font-size: xx-small}
-->
</style>
<style type="text/css">
<!--
.style2 {font-size: smaller}
-->
</style>
<table width="600" border="0" cellpadding="5" cellspacing="0" bordercolor="#990000">
  <!--DWLayoutTable-->
  <tr class="wrap"> 
      <td height="1"></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td width="144"></td>
      <td width="0"></td>
      <td></td>
  </tr>
  <tr> 
  	<td width="1" rowspan="6" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td>
	<td colspan="6" align="center" valign="top" class="wrap">
	<strong><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif">
	    Looking for what rooms someone is scheduled to teach in? </font></strong>	</td>	
	<td width="1" rowspan="6" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td> 
</tr>	
<tr>
	<!-- Searches for information about a particular faculty member's schedule.
	$first and $last refers to the first and last part of the search string not first name and last name. This is 
	necessary because the instructor field contains names in a last name first name format e.g. Albert Borroni is 
	stored as Borroni Albert. The search string created searches for %borroni%alb% -->

	<td colspan="6" align="left" valign="top" >
		 <form name="form1" method="GET" action="Index.php">
                      <p>&nbsp;&nbsp;<strong>Last:&nbsp;&nbsp;
                      <input name="first" type="text" id="first">
                      </strong> <strong>First:&nbsp;&nbsp;
                      <input name="last" type="text" id="last">
                      </strong> 
                        <input name="Submit" type="submit" class="buttons" value="Display your schedule">
                        <br>
                        <em>only use your first name if you have the same last name as another instructor </em>           </p>
					<input name="Step" type="hidden" id="Step" value="6">
		 </form>	</td>
</tr>
<tr>	
   <!-- Searches for information based on the equipment that is in a particular room -->
	<td height="19" colspan="6" align="center" valign="top" nowrap class="wrap"> 
      <strong><font color="#FFFFFF" face="Verdana, Arial, Helvetica, sans-serif"> 
      Looking for a room with particular equipment in it? Search Classroom by selecting your criteria</font></strong></td>
  </tr>
  <form name="search" action="Index.php">
    <tr> 
   
      <td height="51" colspan="6" valign="top" class="results"><p><strong> <br>
          &nbsp;&nbsp; 
		  
		  <input type="hidden" value="1" name="Step" id="Step">
          <select name="building" id="building">
            <option value="dummy" selected>---Select Building---</option>
            <option value="Allen">Allen Art Building</option>
            <option value="Bibbins">Bibbins</option>
            <option value="AJLC">AJLC - Environmental Studies Building</option>
            <option value="Carnegie">Carnegie</option>
            <option value="King">King</option>
            <option value="Mudd">Mudd</option>
            <option value="Peters">Peters</option>
			<option value="Rice">Rice</option>
            <option value="Sev">Severance</option>
            <option value="SCenter">Science Center</option>
            <option value="Warner">Warner</option>
            <option value="Hall">Hall Auditorium</option>
            <option value="Hales">Hales</option>
          </select>
		  <input type="hidden" value="1" name"search">
          <input name="room" type="text" id="room" onFocus="MM_setTextOfTextfield('room','','')" value="Room #" size="8">
          <input name="cap" type="text" id="cap" onFocus="MM_setTextOfTextfield('cap','','')" value="Capacity" size="8">
          &nbsp;Containing the following equipment:<br>
          </strong><strong><br>
          </strong></p></td>
    </tr>
    
    <tr> 
      <td width="265" height="78" valign="top" class="results"><p><strong> 
          </strong>Type of room </p>
        <p><strong>
          <input type="checkbox" name="e1" value="Lecture">
          </strong>Lecture Hall <strong>
  <br>
  <input type="checkbox" name="e2" value="Fixed">
          </strong>Fixed Tables/Desks <br>
          <strong> 
          <input type="checkbox" name="e3" value="Movable">
          </strong>Moveble Tables/Desks  <br>
          <strong>
          <input type="checkbox" name="e4" value="Seminar">
          </strong>Seminar Room <br>
          <strong>
          <input type="checkbox" name="e5" value="Computer Lab">
          </strong>Computer Lab  <strong>
          <br>
          <input type="checkbox" name="e16" value="Science Lab">
      </strong>Science Lab </p></td>
      <td width="1" valign="top" bgcolor="#999999" class="results"><p>|<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |<br />
      |</p>
        <p>&nbsp;</p></td>
      <td width="294" valign="top" class="results"> <p>Equipment</p>
        <p><strong>
          <input type="checkbox" name="e6" value="Data Projector">
          </strong>Data Projector <br>
          <strong>
  <input type="checkbox" name="e7" value="LCD">
          </strong>Flat Screen <br>
          <strong>
          <input type="checkbox" name="e8" value="Surround" />
          </strong>Surround Sound setup <br> 
          <strong> 
          <input type="checkbox" name="e9" value="Document">
          </strong>Document Camera <br> 
          <strong> 
          <input type="checkbox" name="e10" value="Articulated Arm">
          </strong>Articulated Arm Camera<br />
          <strong>
          <input type="checkbox" name="e17" value="Computer Lab" />
                      </strong><br>
        </p></td>
      <td width="315" valign="top" class="results"> 
        <p>&nbsp; </p>
          <p><strong>
		  <input type="checkbox" name="e18" value="Slide Projector">
          </strong>Slide Projector <br>
          <input type="checkbox" name="e12" value="VHS ">
          </strong>VHS Player<br>
          <strong> 
          <input type="checkbox" name="e13" value="DVD">
          </strong>DVD Player <br>
          <strong> 
          <input type="checkbox" name="e14" value="Bluray">
          </strong>BluRay Player<br>
          <strong>
          <input type="checkbox" name="e15" value="Multistandard" />
          </strong>Multistandard VHS player <br>
            <strong>
          <input type="checkbox" name="e19" value="Code-free">
            </strong>Codefree DVD player <br />
            <strong>
        <input type="checkbox" name="e11" value="Printer" />
            </strong>Printer/Scanner</p>      </td>
      <td colspan="2" valign="top" class="results"><p><strong> 
        </strong>        </p>
        <p><br> 
        <strong>            </strong></p></td>
    </tr>
    <tr> 
      <td height="29" colspan="6" valign="top" class="results"> 
          <p>If the equipment you're looking to use is not listed or is not part of the room you are assigned to, please contact A/V (58757). </p>
          <p>
            <input type="hidden" name="searched" value="1">
            <input name="Submit" type="submit" class="buttons" value="Search">
            <br/>
            <span class="style2"><strong>Note:</strong> <em>You do not need to fill out every field.
              To display all classrooms hit the search button with no search options 
              selected.  </em></span><br>
          </p></td>
    </tr>
  </form>
<tr><td  colspan="8" valign="top" class="wrap"><!--DWLayoutEmptyCell-->&nbsp;</td></tr>
</table>

<p>List of <a href="http://spreadsheets.google.com/a/oberlin.edu/ccc?key=0AtS2pmir63NwdE93RW5HS25uczA2T3A4Y2F1bGFTOHc&amp;hl=en" target="CompList">ALL computer labs</a> and software w/version information <span class="style2"><em>(you will need to have an ObieID to see this info) </em></span></p>
