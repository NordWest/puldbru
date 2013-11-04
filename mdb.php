<?php

require "common.php";
require "mdb_arr.php";
$method=1;
$req = "";

//**********************************************************
function mdb_err($str)
{
?>
<h3 align="center"><font color="#ff0000">
<?php
echo " ",$str
?>
</font><br><a href='mdb.php'>click here for a new request</a></h3>
</body></html>
<?php
exit;
}


//**********************************************************
function mdb_form()
{
?>
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
<div align="center"><font color="#000075">Select object and time interval</font><div>
<hr>
<table cellspacing="10" cellpadding="10" width="100%">
<tr>
        <td rowspan="2" align="left" class="c1" valign="top" width="30%">
        <b>
        <input type="radio" name="obj" value="1">&nbsp;1&nbsp;Ceres<br>
        <input type="radio" name="obj" value="2">&nbsp;2&nbsp;Pallas<br>
        <input type="radio" name="obj" value="3">&nbsp;3&nbsp;Juno<br>
        <input type="radio" name="obj" value="4">&nbsp;4&nbsp;Vesta<br>
        <input type="radio" name="obj" value="6">&nbsp;6&nbsp;Hebe<br>
        <input type="radio" name="obj" value="7">&nbsp;7&nbsp;Iris<br>
        <input type="radio" name="obj" value="11">&nbsp;11&nbsp;Parthenope<br>
        <input type="radio" name="obj" value="18">&nbsp;18&nbsp;Melpomene<br>
        <input type="radio" name="obj" value="25">&nbsp;25&nbsp;Phocaea<br>
        <input type="radio" name="obj" value="39">&nbsp;39&nbsp;Laetitia<br>
        <input type="radio" name="obj" value="40">&nbsp;40&nbsp;Harmonia<br>
        </b>
        </td>
        <td rowspan="2" align="left" class="c1" valign="top" width="30%">
        <b>
        <input type="radio" name="obj" value="389">&nbsp;389&nbsp;Industria<br>
        <input type="radio" name="obj" value="532">&nbsp;532&nbsp;Herculina<br>
        <input type="radio" name="obj" value="704">&nbsp;704&nbsp;Interamnia<br>
        </b>
        <input type="radio" name="obj" value="29">&nbsp;29&nbsp;Amphitrite<br>
        <input type="radio" name="obj" value="45">&nbsp;45&nbsp;Eugenia<br>
        <input type="radio" name="obj" value="65">&nbsp;65&nbsp;Cybele<br>
        <input type="radio" name="obj" value="121">&nbsp;121&nbsp;Hermione<br>
        <input type="radio" name="obj" value="129">&nbsp;129&nbsp;Antigone<br>
        <input type="radio" name="obj" value="130">&nbsp;130&nbsp;Elektra<br>
        <input type="radio" name="obj" value="283">&nbsp;283&nbsp;Emma<br>
        <input type="radio" name="obj" value="617">&nbsp;617&nbsp;Patroclus<br>
        </td>
        <td align="left" class="c1" valign="top" width="30%">
        <input type="radio" name="obj" value="762">&nbsp;762&nbsp;Pulkova<br>
        <input type="radio" name="obj" value="1062">&nbsp;1062&nbsp;Ljuba<br>
        <hr>
        <b>
        <input type="radio" name="obj" value="30001">&nbsp;Halley comet<br>        
        <input type="radio" name="obj" value="30002">&nbsp;Hale-Bopp comet<br>        
        <input type="radio" name="obj" value="30003">&nbsp;Machholtz comet<br>
        </b>
        </td>
</tr>
<tr height="30">
        <td align="left" class="c1" height="30">
                <input type="text" name="year1" size="5" >&nbsp;beginning&nbsp;year<br>
                <br>
                <input type="text" name="year2" size="5" >&nbsp;end&nbsp;year<?php require "note.php"; ?><br>
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
};



//************    form1     **********************************************
function mdb_form1()
{
global $obj,$year1,$year2,$method,$obj_list,$type_list;
//********************* proverka parametrov ***********************
if ($obj=="") mdb_err("object is not selected");
if ($year2 && $year1 && ($year2 < $year1)) mdb_err("end year value must be greater than or equal to the start year value");

//********************* database **********************************
if (!$conn = mysql_connect(ADDR,NAME,PWD)) mdb_err("mysql_connect FAIL<br>");
if (!mysql_select_db(DBN,$conn)) mdb_err("mysql_select_db FAIL<br>");

//********************* sostavlenie zaprosa ************************
$req="SELECT * FROM mdb WHERE b2=".$obj;
if ($year1 && $year2) {$req.=" AND f1>=".$year1." AND f1<=".$year2;};
if ($year1 && ($year2==0)) {$req.=" AND f1>=".$year1;};
if ($year2 && ($year1==0)) {$req.=" AND f1<=".$year2;};

if (!$res = mysql_query($req,$conn)) mdb_err("no data were found on your request");

//*************************** html ************************************
?>
<form method="post" action="mdb.php">
<div align="center"><font color="#000075" size="+1"><b>Select additional settings</b></font></div>
<hr>
<table cellspacing="0" cellpadding="5" border="0" width="100%">
        <tr>
        <td align="right" class="c3" width="50%">
        Number of observations found on your query:
        </td>
        <td align="left" class="c3" width="50%">
        <?php echo mysql_num_rows($res); ?>
        </td>
        </tr>
        <tr>
        <td align="right" class="c3" width="50%">
        Object:
        </td>
        <td align="left" class="c3" width="50%">
        <?php echo $obj_list[$obj]; ?>
        </td>
        </tr>
        <tr>
        <td align="right" class="c3" width="50%">
        Beginning year:
        </td>
        <td align="left" class="c3" width="50%">
        <?php echo ($year1)?$year1:"from the first observation"; ?>
        </td>
        </tr>
        <tr>
        <td align="right" class="c3" width="50%">
        End year:
        </td>
        <td align="left" class="c3" width="50%">
        <?php echo ($year2)?$year2:"until the last observation"; ?>
        </td>
        </tr>
        <tr>
        <td align="right" class="c3" width="50%">
        Type of observations:
        </td>
        <td align="left" class="c3" width="50%">
        <?php echo $type_list[$method]; ?>
        </td>
        </tr>
</table>

<hr>
<table cellspacing="10" width="100%">
        <tr>
        <?php
        if (INSTR) require "mdb_istr.php";
        if (!INSTR){ ?>
                                        <td colspan="3" align="left" class="c1" valign="top" width="60%">
                                        <input type="radio" name="instrum" value="0" checked>&nbsp;All<br>
                                        <input type="radio" name="instrum" value="1">&nbsp;Normal astrograph at Pulkovo<br>
                                        <input type="radio" name="instrum" value="2">&nbsp;26-inch refractor at Pulkovo<br>
                                        </td>
        <?php }; ?>
        <td colspan="2" align="left" class="c1" valign="top" width="40%">
        <input type="radio" name="recep" value="0" checked>&nbsp;Both photo and CCD<br>
        <input type="radio" name="recep" value="1">&nbsp;Photo<br>
        <input type="radio" name="recep" value="2">&nbsp;CCD<br>
        </td>
        </tr>
        <tr>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="t1" value="1" checked>&nbsp;Y,M,D<br>
        <input type="checkbox" name="t2" value="1" checked>&nbsp;JD<br>
        </td>
<?php
if($method==1){
?>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="x1" value="1" checked>&nbsp;R.A.<br>
        <input type="radio" name="x2" value="0" checked>&nbsp;in h,m,s<br>
        <input type="radio" name="x2" value="1">&nbsp;in degrees<br>
        <input type="checkbox" name="x3" value="1" checked>&nbsp;(O-C)R.A.<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="y1" value="1" checked>&nbsp;DEC<br>
        <input type="radio" name="y2" value="0" checked>&nbsp;in d,m,s<br>
        <input type="radio" name="y2" value="1">&nbsp;in degrees<br>
        <input type="checkbox" name="y3" value="1" checked>&nbsp;(O-C)DEC<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="a2" value="1" checked>&nbsp;Catalog<br>
        <input type="checkbox" name="a1" value="1" checked>&nbsp;Epoch<br>
<!--    <input type="checkbox" name="a6" value="1" checked>&nbsp;Reference<br>-->
<!--
        <input type="checkbox" name="a" value="1" checked>&nbsp;<br>
-->
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="a4" value="1" checked>&nbsp;Instrument<br>
        <input type="checkbox" name="a5" value="1" checked>&nbsp;Det.type<br>
        <input type="checkbox" name="a3" value="1" checked>&nbsp;g/t<br>
        </td>
<?php
} else {
?>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="x1" value="1" checked>&nbsp;X<br>
        <input type="checkbox" name="x3" value="1" checked>&nbsp;(O-C)X<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="y1" value="1" checked>&nbsp;Y<br>
        <input type="checkbox" name="y3" value="1" checked>&nbsp;(O-C)Y<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="a1" value="1" checked>&nbsp;Epoch<br>
        <input type="checkbox" name="a6" value="1" checked>&nbsp;Reference<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="a4" value="1" checked>&nbsp;Instrument<br>
        <input type="checkbox" name="a5" value="1" checked>&nbsp;Det.type<br>
        </td>
<?php
};
?>
        </tr>
</table>
<hr>
<font size="+1">
<table cellspacing="0" width="100%" cellpadding="10"><tr>
        <td align="center" class="c2" valign="top" width="20%">
                <input type="submit" value="Show results">
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
<input type="hidden" name="page" value="2">
<input type="hidden" name="obj" value="<?php echo $obj; ?>">
<input type="hidden" name="year1" value="<?php echo $year1; ?>">
<input type="hidden" name="year2" value="<?php echo $year2; ?>">
<hr>
</form>
<!--<div align="right" class="copy"><i>&copy;Programming by S.Kalinin</i></div>-->
</body></html>
<?php
mysql_close($conn);
exit;
};
?>


























<!--//********** head ************************************************-->
<html>
<head>
<style>
td.c1{background-color:#ffffcc}
td.c2{background-color:#ffcc99}
td.c3{background-color:#eeffee; font-weight:bold}
hr{color:#999999}
a:hover{color:#009900; font-family:'courier new',mono; font-weight:bold}
a{color:#000099; font-family:'courier new',mono; font-weight:bold}
select.c{font-family:'courier new',mono; font-weight:bold}
option.c{font-family:'courier new',mono; font-weight:bold}
.copy{font-weight:normal; font-size:smallest}
</style>
<title>Pulkovo Database of Observations of Minor Planets and Comets</title>
</head>

<!--//********** body ************************************************-->
<body background="gray.jpg" text="#000000" bgcolor="#ffffff" style="font-family:'courier new',mono; font-weight:bold">

<?php
if (!$page) require "mdb_all.php";
if ($page==1) mdb_form1();

$req="SELECT * FROM mdb WHERE b2=".$obj;
if ($year1 && $year2) {$req.=" AND f1>=".$year1." AND f1<=".$year2;};
if ($year1 && ($year2==0)) {$req.=" AND f1>=".$year1;};
if ($year2 && ($year1==0)) {$req.=" AND f1<=".$year2;};

if ($recep) $req.=" AND b7=".$recep." ";
if ($instrum) $req.=" AND b6=".$instrum." ";
$req .= " ORDER BY f9 ";
if (DBG) echo $req."<br>";

//********************* database **********************************
if (!$conn = mysql_connect(ADDR,NAME,PWD)) mdb_err("mysql_connect FAIL<br>");
if (!mysql_select_db(DBN,$conn)) mdb_err("mysql_select_db FAIL<br>");
if (!$res = mysql_query($req,$conn)) mdb_err("no data were found on your request");

//*********************** format ***********************************
if ($method==3) $index[]=14;
if ($t2) $index[]=9;
if ($t1) {
        $index[]=1;
        $index[]=2;
        $index[]=3;
        }
if ($x1){
        if ($x2 && $method==1) $index[]=4;
        if (!$x2 && $method==1) $index[]=24;
        if ($method!=1) $index[]=34;
        }
if ($y1){
        if ($y2 && $method==1) $index[]=5;
        if (!$y2 && $method==1) $index[]=25;
        if ($method!=1) $index[]=35;
        }
if ($x3){
        if ($method==1) $index[]=6;
        if ($method!=1) $index[]=36;
        }
if ($y3){
        if ($method==1) $index[]=7;
        if ($method!=1) $index[]=37;
        }
if ($a1) $index[]=8;
if ($a2) $index[]=13;
if ($a3) $index[]=15;
if ($a4) $index[]=16;
if ($a5) $index[]=17;
if ($a6) $index[]=18;

$tmp=count($index);
if (DBG) {
        for ($i=0; $i<$tmp; $i++) echo $index[$i]." ";
        echo "<br>";
        }
//********************************** print data ************************
?>
<font size="+1">
<a href="<?php echo MDB1; ?>">Info</a>
<a href="mdb.php">New query</a>
<a href="index.php">Select database</a>
<a href="<?php echo MAINPAGE; ?>">Main page</a>
</font>
<br><hr>
<?php
echo "<pre>";
echo "Object: ".$obj_list[$obj]."\n";
echo "Number of observations found on your query: ".mysql_num_rows($res)."\n";
        $cnt=count($index);
        for ($i=0; $i<$cnt; $i++) echo DBG.$header2[$index[$i]];
        echo "\n";
        $cnt=count($index);
        for ($i=0; $i<$cnt; $i++) echo DBG.$header[$index[$i]];
        echo "\n";
        $cnt=count($index);
        for ($i=0; $i<$cnt; $i++) echo DBG.$header1[$index[$i]];
        echo "\n";
        $cnt=count($index);
        for ($i=0; $i<$cnt; $i++) echo DBG.$header2[$index[$i]];
        echo "\n";
while($k = mysql_fetch_row($res))
        {$cnt=count($index);
        for ($i=0; $i<$cnt; $i++)
                {
                switch($index[$i])
                        {
                        case 24:
                                $tmp = $k[4] / 15;
                                printf(DBG."%2.0f ", floor($tmp));
                                $tmp -= floor($tmp);
                                $tmp *= 60;
                                printf("%2.0f ", floor($tmp));
                                $tmp -= floor($tmp);
                                $tmp *= 60;
                                printf("%6.3f    ", $tmp);
                                break;
                        case 25:
                                $tmp = $k[5];
                                ($tmp>0)?$signdec=1:$signdec=-1; $tmp=abs($tmp);
                                printf(DBG." %3.0f ", $signdec*floor($tmp));
                                $tmp -= floor($tmp);
                                $tmp *= 60;
                                printf("%2.0f ", floor($tmp));
                                $tmp -= floor($tmp);
                                $tmp *= 60;
                                printf("%5.2f   ", $tmp);
                                break;
                        case 34:
                                printf(DBG."  %6.2f  ", $k[4]);
                                break;
                        case 35:
                                printf(DBG."  %6.2f  ", $k[5]);
                                break;
                        case 36:
                                printf(DBG." %7.3f  ", $k[6]);
                                break;
                        case 37:
                                printf(DBG." %7.3f  ", $k[7]);
                                break;
                        case 13:
                                printf(DBG." %s ", $cat_list[$k[13]]);
                                break;
                        case 14:
                                printf(DBG."  %2.0f ", $k[14]);
                                break;
                        case 15:
                                printf(DBG." %s ", $rfc_list[$k[15]]);
                                break;
                        case 16:
                                printf(DBG." %s ", $instr_list[$k[16]]);
                                break;
                        case 17:
                                printf(DBG." %s ", $rec_list[$k[17]]);
                                break;
                        default: printf(DBG.$format[$index[$i]], $k[$index[$i]]); 
                        }
                }
                echo "\n";
        }
echo "</pre>";
mysql_close($conn);

//*****************************************************************

?>
</body>
</html>
