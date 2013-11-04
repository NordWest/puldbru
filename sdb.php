<?php

require "common.php";
$req = "";

       
//*****************     obj_list    ******************************
$obj_list[10]="Mercury";
$obj_list[20]="Venus";
$obj_list[30]="Mars";
$obj_list[31]="M1 Phobos";
$obj_list[32]="M2 Deimos";
$obj_list[40]="Jupiter";
$obj_list[41]="J1 Io";
$obj_list[42]="J2 Europa";
$obj_list[43]="J3 Ganymedes";
$obj_list[44]="J4 Callisto";
$obj_list[50]="Saturn";
$obj_list[51]="S1 Mimas";
$obj_list[52]="S2 Enceladus";
$obj_list[53]="S3 Tethys";
$obj_list[54]="S4 Dione";
$obj_list[55]="S5 Rhea";
$obj_list[56]="S6 Titan";
$obj_list[57]="S7 Hyperion";
$obj_list[58]="S8 Iapetus";
$obj_list[60]="Uranus";
$obj_list[61]="U1 Ariel";
$obj_list[62]="U2 Umbriel";
$obj_list[63]="U3 Titania";
$obj_list[64]="U4 Oberon";
$obj_list[70]="Neptune";
$obj_list[71]="N1 Triton";
$obj_list[80]="Pluto";






//************    form1     **********************************************
function sdb_form1()
{
global $obj,$year1,$year2,$method,$obj_list,$type_list;
//********************* proverka parametrov ***********************
if ($obj=="") sdb_err("object is not selected");
if ($year2 && $year1 && ($year2 < $year1)) sdb_err("end year value must be greater than or equal to the start year value");

//********************* database **********************************
if (!$conn = mysql_connect(ADDR,NAME,PWD)) sdb_err("mysql_connect FAIL<br>");
if (!mysql_select_db(DBN,$conn)) sdb_err("mysql_select_db FAIL<br>");

//********************* sostavlenie zaprosa ************************
$req="SELECT * FROM sdb WHERE b2=".$obj." AND b1=".$method;
if ($year1 && $year2) {$req.=" AND f1>=".$year1." AND f1<=".$year2;};
if ($year1 && ($year2==0)) {$req.=" AND f1>=".$year1;};
if ($year2 && ($year1==0)) {$req.=" AND f1<=".$year2;};

if (!$res = mysql_query($req,$conn)) sdb_err("no data were found on your request");

//*************************** html ************************************
?>
<form method="post" action="sdb.php">
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
                <a href="<?php echo SDB1; ?>">Info</a><br>
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
<input type="hidden" name="method" value="<?php echo $method; ?>">
<input type="hidden" name="obj" value="<?php echo $obj; ?>">
<input type="hidden" name="year1" value="<?php echo $year1; ?>">
<input type="hidden" name="year2" value="<?php echo $year2; ?>">
<hr>
</form>
</body></html>
<?php
mysql_close($conn);
exit;
};




















//**********************************************************
function sdb_err($str)
{
?>
<h3 align="center"><font color="#ff0000">
<?php
echo " ",$str
?>
</font><br><a href='sdb.php'>click here for a new request</a></h3>
</body></html>
<?php
exit;
}





















//**********************************************************
function sdb_form()
{
?>
<form method="post" action="sdb.php">
<table cellspacing="0" cellpadding="10" width="100%" onclick="alert('Programming by S.Kalinin');">
<tr>
        <td class="c2">
        <font size="+3" color="#000075" face="Tahoma, Arial, sans-serif">
                <b>
                <div align="center" style="color:#000075">
                Pulkovo Database of&nbsp;Observations of&nbsp;Planets and&nbsp;Their&nbsp;Satellites
                </div>
                </b>
        </font>
        </td>
</tr>
</table>
<hr>
<input type="hidden" name="page" value="1">
<div align="center"><font color="#000075">Select object, time interval and type of observations</font><div>
<hr>
<table cellspacing="10" cellpadding="10" width="100%"><tr>
        <td align="left" class="c1" valign="top" width="30%">
        <input type="radio" name="obj" value="10">&nbsp;<b>Mercury</b><br>
        <input type="radio" name="obj" value="20">&nbsp;<b>Venus</b><br>
        <input type="radio" name="obj" value="30">&nbsp;<b>Mars</b><br>
        <input type="radio" name="obj" value="31">&nbsp;M1&nbsp;Phobos<br>
        <input type="radio" name="obj" value="32">&nbsp;M2&nbsp;Deimos<br>
        <input type="radio" name="obj" value="40">&nbsp;<b>Jupiter</b><br>
        <input type="radio" name="obj" value="41">&nbsp;J1&nbsp;Io<br>
        <input type="radio" name="obj" value="42">&nbsp;J2&nbsp;Europa<br>
        <input type="radio" name="obj" value="43">&nbsp;J3&nbsp;Ganymedes<br>
        <input type="radio" name="obj" value="44">&nbsp;J4&nbsp;Callisto<br>
        </td>
        <td align="left" class="c1" valign="top" width="30%">
        <input type="radio" name="obj" value="50">&nbsp;<b>Saturn</b><br>
        <input type="radio" name="obj" value="51">&nbsp;S1&nbsp;Mimas<br>
        <input type="radio" name="obj" value="52">&nbsp;S2&nbsp;Enceladus<br>
        <input type="radio" name="obj" value="53">&nbsp;S3&nbsp;Tethys<br>
        <input type="radio" name="obj" value="54">&nbsp;S4&nbsp;Dione<br>
        <input type="radio" name="obj" value="55">&nbsp;S5&nbsp;Rhea<br>
        <input type="radio" name="obj" value="56">&nbsp;S6&nbsp;Titan<br>
        <input type="radio" name="obj" value="57">&nbsp;S7&nbsp;Hyperion<br>
        <input type="radio" name="obj" value="58">&nbsp;S8&nbsp;Iapetus<br>
        </td>
        <td align="left" class="c1" valign="top" width="30%">
        <input type="radio" name="obj" value="60">&nbsp;<b>Uranus</b><br>
        <input type="radio" name="obj" value="61">&nbsp;U1&nbsp;Ariel<br>
        <input type="radio" name="obj" value="62">&nbsp;U2&nbsp;Umbriel<br>
        <input type="radio" name="obj" value="63">&nbsp;U3&nbsp;Titania<br>
        <input type="radio" name="obj" value="64">&nbsp;U4&nbsp;Oberon<br>
        <input type="radio" name="obj" value="70">&nbsp;<b>Neptune</b><br>
        <input type="radio" name="obj" value="71">&nbsp;N1&nbsp;Triton<br>
        <input type="radio" name="obj" value="80">&nbsp;<b>Pluto</b><br>
        </td>
</tr>
<tr>
        <td align="left" class="c1" width="30%">
                <input type="text" name="year1" size="5" >&nbsp;First&nbsp;year (optional)<br>
                <br>
                <input type="text" name="year2" size="5" >&nbsp;Last&nbsp;year  (optional)<br>
        </td>
        <td align="left" colspan="2" class="c1">
                <input type="radio" name="method" value="1" checked>&nbsp;equatorial coordinates<br>
                <input type="radio" name="method" value="2">&nbsp;satellite relative to planet<br>
                <input type="radio" name="method" value="3">&nbsp;satellite relative to another satellite<br>
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
                <a href="<?php echo SDB1; ?>">Info</a><br>
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
</body></html>
<?php
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
.c4{color:#000075; font-family:'courier new',mono; font-weight:bold; font-size:large}
hr{color:#999999}
a:hover{color:#009900; font-family:'courier new',mono; font-weight:bold}
a{color:#000099; font-family:'courier new',mono; font-weight:bold}
.copy{font-weight:normal; font-size:smallest}
</style>
<title>Pulkovo Database of Observations of Planets and Their Satellites</title>
</head>

<!--//********** body ************************************************-->
<body background="gray.jpg" text="#000000" bgcolor="#ffffff" style="font-family:'courier new',mono; font-weight:bold">

<?php
if ($obj==10) { require "mercury.php"; exit; };
if ($obj && $obj % 10 == 0) $method=1;
if (!$page) sdb_form();
if ($page==1) sdb_form1();


$req="SELECT * FROM sdb WHERE b2=".$obj." AND b1=".$method;
if ($year1 && $year2) {$req.=" AND f1>=".$year1." AND f1<=".$year2;};
if ($year1 && ($year2==0)) {$req.=" AND f1>=".$year1;};
if ($year2 && ($year1==0)) {$req.=" AND f1<=".$year2;};
if ($recep) $req.=" AND b7=".$recep." ";
if ($instrum) $req.=" AND b6=".$instrum." ";
$req .= " ORDER BY f9 ";
if (DBG) echo $req."<br>";

//********************* database **********************************
if (!$conn = mysql_connect(ADDR,NAME,PWD)) sdb_err("mysql_connect FAIL<br>");
if (!mysql_select_db(DBN,$conn)) sdb_err("mysql_select_db FAIL<br>");
if (!$res = mysql_query($req,$conn)) sdb_err("no data were found on your request");

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
<a href="<?php echo SDB1; ?>">Info</a>
<a href="sdb.php">New query</a>
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
                        case 8:
                                if($k[8]) printf(DBG.$format[8], $k[8]); else printf(DBG."   date   ");
                                break;
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
                                $signdec = ($tmp>0) ? 1 : -1; 
                                $tmp = abs($tmp);

                                $degdec = sprintf(DBG." %+3.0f ", floor($tmp));
                                if ($signdec<0) $degdec = str_replace('+', '-', $degdec);
                                $degdec = str_replace('+', ' ', $degdec);
                                echo $degdec;
                                
                                $tmp -= floor($tmp);
                                $tmp *= 60;
                                printf("%2.0f ", floor($tmp));
                                
                                $tmp -= floor($tmp);
                                $tmp *= 60;
                                printf("%5.2f   ", $tmp);
                                break;
                        case 34:
                                printf(DBG."  %8.2f  ", $k[4]);
                                break;
                        case 35:
                                printf(DBG."  %8.2f  ", $k[5]);
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
                                printf(DBG." %2.0f  ", $k[14]%10);
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
