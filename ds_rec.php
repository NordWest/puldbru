<?php
$res = mysql_query($req, $conn);
$num_all = mysql_num_rows($res);
$res = mysql_query($req." AND b2=0", $conn);
$num_ccd = mysql_num_rows($res);
$num_ph = $num_all - $num_ccd;
echo '<input type="radio" name="recep" value="0" checked>&nbsp;All   '."({$num_all})<br>";
echo '<input type="radio" name="recep" value="1"        >&nbsp;Photo '."({$num_ph})<br>";
echo '<input type="radio" name="recep" value="2"        >&nbsp;CCD   '."({$num_ccd})<br>";
?>
