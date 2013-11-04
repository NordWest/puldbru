<center>
<font size="+1" color="#000075">Several objects were found on your request</font>
<hr>
<pre>
<?php
for ($i=0; $i<count($obj_found); $i++) {
printf("<a href='ds.php?q=%d'>%5s %10s %5s (%s)</a>\n\n", $obj_found[$i], $obj_list[$obj_found[$i]]['ads'], $obj_list[$obj_found[$i]]['wds'], $obj_list[$obj_found[$i]]['comp'], $obj_list[$obj_found[$i]]['meas']);
};
?>

</pre>
</center>

</body></html>
<?php
exit;
?>

