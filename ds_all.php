<table cellspacing="0" cellpadding="10" width="100%" onclick="alert('Programming by S.Kalinin');">
<tr>
        <td class="c2">
        <font size="+3" color="#000075" face="Tahoma, Arial, sans-serif">
                <b>
                <div align="center" style="color:#000075">
                Pulkovo Database of&nbsp;Observations of&nbsp;Visual Double&nbsp;Stars
                </div>
                </b>
        </font>
        </td>
        <td class="c2"><img src="logo.jpg"></td>
</tr>
</table>
<hr>
<input type="hidden" name="page" value="1">
<div align="center"><font color="#000075">Select an object</font><div>
<hr>



<center>
<pre>
<?php
  echo " ADS       WDS       comp note     meas     CCD   mag.and sp.class   \n";
  echo "---------------------------------------------------------------------\n";


$cnt = count($obj_list);
$t = array();
for ($i=1; $i<=$cnt; $i++) 
   {
   $k = $obj_list[$i]['wds'].$obj_list[$i]['comp'].$obj_list[$i]['meas'].sprintf("%09d", $i);
   $t[$k] = $i;
   }

ksort($t);
foreach ($t as $k => $i)  
   {
   printf("<a href='ds.php?q=%d'>%5s   %10s %5s  %2s  %12s  %3s  %-20s</a>\n\n", $i, $obj_list[$i]['ads'], $obj_list[$i]['wds'], trim($obj_list[$i]['comp']), $obj_list[$i]['note'], $obj_list[$i]['meas'], $obj_list[$i]['ccd'], $obj_list[$i]['mag']);
   }

?>
</pre>
</center>

<hr><br>
<!--<div align="right" class="copy"><i>&copy;Programming by S.Kalinin</i></div>-->
</body></html>
<?php
exit;
?>
