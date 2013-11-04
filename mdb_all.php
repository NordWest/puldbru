<? function select($name, $s) { ?>
<select name="<? echo $name; ?>">
<option selected value=''>- - - - - -  select an object  - - - - - -</option>                
<?
global $obj_list, $obj_type;
$cnt=32000;
for($i=1; $i<$cnt; $i++) if($obj_list[$i] && ereg($s, $obj_type[$i])) printf("<option value='%d'>%s</option>\n",$i,$obj_list[$i]);
?>
</select>
<? }; ?>

<form method="post" action="mdb.php">
<table cellspacing="0" cellpadding="10" width="100%" onclick="alert('Programming by S.Kalinin');">
<tr>
        <td class="c2">
        <font size="+3" color="#000075" face="Tahoma, Arial, sans-serif">
                <b>
                <div align="center" style="color:#000075">
                Pulkovo Database of&nbsp;Observations of&nbsp;Minor&nbsp;Planets and&nbsp;Comets
                </div>
                </b>
        </font>
        </td>
        <td class="c2"><img src="logo.jpg"></td>
</tr>
</table>
<hr>
<input type="hidden" name="page" value="1">
<div align="center"><font color="#000075">Select an object and the time interval</font><div>
<hr>
        <table cellspacing="10" cellpadding="10" width="100%">
        <tr>
                <td valign="center" align="right" class="c1" >
                <nobr>
                Minor planets with long-term observations
                <? select("obj","h"); ?>
                </nobr><br><br>
                <nobr>
                Double and probably double minor planets
                <? select("obj1","d"); ?>
                </nobr><br><br>
                <nobr>
                Other observation programs
                <? select("obj2","s"); ?>
                </nobr><br><br>
                <nobr>
                Comets
                <? select("obj3","c"); ?>
                </nobr><br>
                </td>
                <td valign="top" align="left" class="c1">
                        <input type="text" name="year1" size="5" >&nbsp;beginning&nbsp;year&nbsp;<br>
                        <br>
                        <input type="text" name="year2" size="5" >&nbsp;end&nbsp;year&nbsp;<br>
                </td>
        </tr>
        </table>
<hr>
<font size="+1">
<table cellspacing="0" width="100%" cellpadding="10"><tr>
        <td align="center" class="c2" valign="top" width="20%">
                <input type="submit" value="Send request">
        </td>
        <td align="center" class="c2" valign="top" width="20%">
                <input type="reset" value="Reset form">
        </td>
        <td align="center" class="c2" valign="top" width="20%">
                <a href="<?php echo MDB1; ?>">Info</a><br>
        </td>
        <td align="center" class="c2" valign="top" width="20%">
                <a href="index.php">Select database</a><br>
        </td>
        <td align="center" class="c2" valign="top" width="20%">
                <a href="<?php echo MAINPAGE; ?>">Main Page</a><br>
        </td>
        </tr>
</table>
</font>
<hr>
</form>
<!--<div align="right" class="copy"><i>&copy;Programming by S.Kalinin</i></div>-->
</body></html>
<?php
exit;
?>
