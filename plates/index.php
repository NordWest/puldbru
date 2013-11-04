<?php
// error_reporting(E_ALL);
error_reporting(E_ALL & ~E_WARNINGS);
include "main.php";
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style>
td.c1{background-color:#ffffcc}
td.c2{background-color:#ffcc99}
td.c3{background-color:#ccffcc; font-weight:bold}
hr{color:#999999}
a:hover{color:#009900; font-family:'courier new',mono; font-weight:bold}
a{color:#000099; font-family:'courier new',mono; font-weight:bold}
.c4{ color:#000075; font-family: arial, sans-serif; font-weight:bold;
     text-align:center; font-size:large}
ol{ list-style-position: }
body{ font-family:'courier new',mono; font-weight:bold;  background-color:#ffffcc}
input{ font-family:'courier new',mono; font-weight:bold }
textarea{ font-family:'courier new',mono; font-weight:bold }
p{ font-family:'courier new',mono; font-weight:bold }

td.img { font-size: smaller; text-align: center;
         border: thin, solid, #999999;
         background-color: #ffffcc;
         vertical-align: center}

td { font-weight:bold; font-family:'courier new',mono;}
div.ind { text-indent: 5% }
</style>
<title>Pulkovo Astrometrical Plate Database</title>
</head>

<!--//********** body ************************************************-->
<body background="../gray.jpg" text="#000000" bgcolor="#ffffff" style="font-family:'courier new',mono; font-weight:bold">

<?php
if (!$page)          include "form.php";
if ($page=='hidden') include "hidden.php";
if ($page=='edit')   include "edit.php";
if ($page=='view')   include "view.php";
if ($page=='search') include "search.php";
if ($page=='add')  { include "add.php"; include "hidden.php"; }
if ($page=='dump') { echo dump(); include "hidden.php"; }
?>

</body></html>
