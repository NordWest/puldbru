<?php

require "ds2.php";
require "ds1.php";
$req = "";

//**********************************************************
function ds_err($str)
{
?>
<h3 align="center"><font color="#ff0000">
<?php
echo " ",$str
?>
</font><br><a href='ds.php'>click here for a new request</a></h3>
</body></html>
<?php
exit;
}


//**********************************************************
function ds_form()
{
?>
<form method="post" action="ds.php">
<table cellspacing="0" cellpadding="10" width="100%" onclick="alert('Programming by S.Kalinin');">
<tr>
        <td class="c2">
        <font size="+3" color="#000075" face="Tahoma, Arial, sans-serif">
                <b>
                <div align="center" style="color:#000075">
                Pulkovo Database of&nbsp;Observations of&nbsp;Visual&nbsp;Double&nbsp;Stars
                </div>
                </b>
        </font>
        </td>
        <td class="c2"><img src="logo.jpg"></td>
</tr>
</table>
<input type="hidden" name="page" value="1">

<hr>
<div style="font-weight:bold; text-align:justify">
<b>This database is compiled from these sources:</b>

<br><br>
                <b>1.</b> Catalog of relative positions of visual double stars, based on
                photographic observations
                performed since 1960 in Pulkovo on the 26-inch refractor
                (A.A.Kiselev, O.A.Kalinichenko, O.V.Kiyaeva, N.A.Shakht,
                L.G.Romanenko, I.S.Izmailov, O.P.Bykov, K.L.Maslennikov,
                E.A.Grosheva, D.L.Gorshanov), 2010
<br><br>
                <b>2.</b> Catalog of relative positions of visual double stars, based on
                CCD observations
                performed since 1995 on Pulkovo 26-inch refractor
                (I.S.Izmailov), 2006, the first edition
</div>
        <hr>
</tr>
<table cellspacing="10" cellpadding="10" width="100%" align="center">
<tr>
        <td align="center" colspan="2" class="c1">
        Enter either ADS or WDS number.<br>
        <a href="ds.php?all=1">Click here</a> to display full list of visual double stars
        observed at Pulkovo.
        </td>
</tr>
<tr>
        <td align="center" class="c1">
        <b>
        ADS&nbsp;<input type="text" name="ads" size="10">
        </b>
        </td>
        <td align="center" class="c1">
        <b>
        WDS&nbsp;<input type="text" name="wds" size="10">
        </b>
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
                <?php echo DS1_1; ?>
        </td>
        <td align="center" class="c2" valign="top" width="20%">
                <?php echo DS1_2; ?>
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
function ds_form1()
{
global $obj,$year1,$year2,$method,$obj_list,$type_list;
//********************* proverka parametrov ***********************
if ($year2 && $year1 && ($year2 < $year1)) ds_err("end year value must be greater than or equal to the start year value");

//********************* database **********************************
if (!$conn = mysql_connect(ADDR,NAME,PWD)) ds_err("mysql_connect FAIL<br>");
if (!mysql_select_db(DBN,$conn)) ds_err("mysql_select_db FAIL<br>");

//********************* sostavlenie zaprosa ************************
$req="SELECT * FROM ds WHERE b1=".$obj;
if ($year1 && $year2) {$req.=" AND f1>=".$year1." AND f1<=".$year2;};
if ($year1 && ($year2==0)) {$req.=" AND f1>=".$year1;};
if ($year2 && ($year1==0)) {$req.=" AND f1<=".$year2;};

$res = mysql_query($req,$conn);

//*************************** html ************************************
?>
<form method="post" action="ds.php">
<div align="center"><font color="#000075" size="+1"><b>Additional settings</b></font></div>
<hr>
<table cellspacing="0" cellpadding="5" border="0" width="100%">
        <tr>
        <td align="right" class="c3" width="50%">
        Number of observations found:
        </td>
        <td align="left" class="c3" width="50%">
        <?php echo mysql_num_rows($res); ?>
        </td>
        </tr>
        <tr><td align="right" class="c3" width="50%">ADS number:</td>
        <td align="left" class="c3" width="50%">
        <?php
                echo $obj_list[$obj]['ads'];
        ?></td></tr>
        <tr><td align="right" class="c3" width="50%">WDS number:</td>
        <td align="left" class="c3" width="50%">
        <?php
                echo $obj_list[$obj]['wds'];
        ?></td></tr>
        <tr><td align="right" class="c3" width="50%">Components:</td>
        <td align="left" class="c3" width="50%">
        <?php
                echo $obj_list[$obj]['comp'];
        ?></td></tr>
</table>

<hr>
<table cellspacing="10" width="100%">
        <tr>
        <td align="left" class="c1" valign="top" width="20%">
                <?php require "ds_rec.php"; ?>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="t1" value="1" checked>&nbsp;Epoch<br>
        <input type="checkbox" name="t2" value="1" checked>&nbsp;JD<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="x1" value="1" checked>&nbsp;Separation<br>
        <input type="checkbox" name="x2" value="1" checked>&nbsp;e(S)<br>
        <input type="checkbox" name="x3" value="1" checked>&nbsp;N(S)<br>
        <input type="checkbox" name="x4" value="1" checked>&nbsp;e1(S)<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="y1" value="1" checked>&nbsp;Pos.angle<br>
        <input type="checkbox" name="y2" value="1" checked>&nbsp;e(P)<br>
        <input type="checkbox" name="y3" value="1" checked>&nbsp;N(P)<br>
        <input type="checkbox" name="y4" value="1" checked>&nbsp;e1(P)<br>
        </td>
        <td align="left" class="c1" valign="top" width="20%">
        <input type="checkbox" name="a1" value="1" checked>&nbsp;N<br>
        <input type="checkbox" name="a2" value="1" checked>&nbsp;Orient.<br>
        <input type="checkbox" name="a3" value="1" checked>&nbsp;Meas.code<br>
        <input type="checkbox" name="a4" value="1" checked>&nbsp;Detector<br>
        </td>
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
                <?php echo DS2_1; ?>
        </td>
        <td align="center" class="c2" valign="top" width="20%">
                <?php echo DS2_2; ?>
        </td>
        <td align="center" class="c2" valign="top" width="20%">
                <a href="<?php echo MAINPAGE; ?>">Main Page</a><br>
        </td>
        </tr>
</table>
</font>
<input type="hidden" name="page" value="2">
<input type="hidden" name="obj" value="<?php echo $obj; ?>">
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
pre a{text-decoration:none}
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
<title>Pulkovo Database of Observations of Visual Double Stars</title>
</head>

<!--//********** body ************************************************-->
<body background="gray.jpg" text="#000000" bgcolor="#ffffff" style="font-family:'courier new',mono; font-weight:bold">





<?php
if (@$HTTP_GET_VARS['all']) require "ds_all.php";
if (!@$HTTP_GET_VARS['all'] && !$page && !$q) ds_form();

if ($q && $q>0 && $q<=count($obj_list)) {$obj=(int)$q; ds_form1();};
for ($i=1; $i<=count($obj_list); $i++) if ($ads && (integer)$obj_list[$i]['ads']==(integer)$ads) $obj_found[]=$i;
for ($i=1; $i<=count($obj_list); $i++) if ($obj_list[$i]['wds']===$wds) $obj_found[]=$i;
if ( $page==1 ) switch (count($obj_found)) {
        case 0: ds_err("Sorry, there is no object matching your query."); break;
        case 1: $obj=$obj_found[0]; ds_form1(); break;
        default:
        require "ds_many.php"; };


//********************* database **********************************
if (!$conn = mysql_connect(ADDR,NAME,PWD)) ds_err("mysql_connect FAIL<br>");
if (!mysql_select_db(DBN,$conn)) ds_err("mysql_select_db FAIL<br>");

//********************* sostavlenie zaprosa ************************
$req="SELECT * FROM ds WHERE b1=".$obj;
if ($year1 && $year2) {$req.=" AND f1>=".$year1." AND f1<=".$year2;};
if ($year1 && ($year2==0)) {$req.=" AND f1>=".$year1;};
if ($year2 && ($year1==0)) {$req.=" AND f1<=".$year2;};
if ($instrum) $req.=" AND b6=".$instrum." ";

switch ($recep) {
case 1: $req.=" AND NOT b2=0 "; break;
case 2: $req.=" AND b2=0 "; break;
};
$req.=" ORDER BY f1 ";

if (DBG) echo $req."<br>";

if (!$res = mysql_query($req,$conn)) ds_err("no data were found on your request");

//*********************** format ***********************************
if ($t2) $index[]=9;
if ($t1) $index[]=1;

if ($x1) $index[]=2;
if ($x2) $index[]=3;

if ($y1) $index[]=4;
if ($y2) $index[]=5;

if ($a1) $index[]=13;
if ($x3) $index[]=14;
if ($y3) $index[]=15;

if ($x4) $index[]=6;
if ($y4) $index[]=7;

if ($a2) $index[]=16;
if ($a3) $index[]=17;
if ($a4) $index[]=12;

$tmp=count($index);
if (DBG) {
        for ($i=0; $i<$tmp; $i++) echo $index[$i]." ";
        echo "<br>";
        }
//********************************** print data ************************
?>
<font size="+1">
 <?php echo DS3_1; ?>   
 <?php echo DS3_2; ?>  
<a href="ds.php">New query</a>
<a href="<?php echo MAINPAGE; ?>">Main page</a>
</font>
<br><hr>
<?php
echo "<pre>";
echo "ADS number:       {$obj_list[$obj]['ads']}\n";
echo "WDS number:       {$obj_list[$obj]['wds']}\n";
echo "Components:       {$obj_list[$obj]['comp']}\n";
echo "Measured with:    {$obj_list[$obj]['meas']}\n";
echo "Mag.and sp.class: {$obj_list[$obj]['mag']}\n";
echo "Number of observations found on your query: ".mysql_num_rows($res)."\n\n";
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

                        case 12:
                                echo ($k[12]) ? "  ph" : " CCD";
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


