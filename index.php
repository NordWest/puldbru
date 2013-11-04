<?php
define("MAINPAGE", (@$_COOKIE["lang"]=="en") ? "help1.php" : "/index.php");
define("DESCR", (@$_COOKIE["lang"]=="en") ? "help3.php" : "/pulcat/page_sun.html");
?>


<html>
<head>
<style>
td.c1{background-color:#ffffcc}
td.c2{background-color:#ffcc99}
td.c3{background-color:#eeffee; font-weight:bold}
hr{color:#999999}
a:hover{color:#009900; font-family:'courier new',mono; font-weight:bold}
a{color:#000099; font-family:'courier new',mono; font-weight:bold}
.copy{font-weight:normal; font-size:smallest}
</style>
<title>Pulkovo Database of Observations of Solar System Bodies</title>
</head>

<!--//********** body ************************************************-->
<body background="gray.jpg" text="#000000" bgcolor="#ffffff" style="font-family:'courier new',mono; font-weight:bold">

<table cellspacing="0" cellpadding="10" width="100%" onclick="alert('Programming by S.Kalinin');">
<tr>
        <td class="c2">
        <font size="+3" color="#000075" face="Tahoma, Arial, sans-serif">
                <b>
                <div align="center" style="color:#000075">
                Pulkovo Database of&nbsp;Observations of&nbsp;Solar System Bodies
                </div>
                </b>
        </font>
        </td>
        <td class="c2"><img src="logo.jpg"></td>
</tr>
</table>
<hr>

<table cellspacing="10" cellpadding="10" width="100%">
<tr>
        <td class="c3" onclick="document.href='load.php'">
                Available databases:
        </td>
</tr>
<tr>
        <td class="c1">
                <a href="sdb.php">Observations of planets and their satellites</a>
        </td>
</tr>
<tr>
        <td class="c1">
                <a href="mdb.php">Observations of minor planets and comets</a>
        </td>
</tr>
</table>

<hr>

<font size="+1">
<table cellspacing="0" width="100%" cellpadding="10"><tr>
        <td align="center" class="c2" valign="top" width="33%">
<!--            <a href="javascript:history.back();">Back</a><br>   -->
                <a href="help.php">Info</a><br>  
        </td>
        <td align="center" class="c2" valign="top" width="33%">
                <a href="<? echo DESCR; ?>">General  description of this database</a><br>
        </td>
        <td align="center" class="c2" valign="top" width="33%">
                <a href="<? echo MAINPAGE; ?>">Main Page</a><br>
        </td>
        </tr>
</table>
</font>
<hr>
</form>
</body></html>



























