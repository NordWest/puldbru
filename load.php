<?php
function sat_err($str)
{echo $str
?>
</body></html>
<?php
exit;
}

function mdb_load()
{
global $addr;
global $login;
global $pwd;

if ($conn = mysql_connect($addr,$login,$pwd)) echo "mysql connect OK<br>";
else echo "mysql connect FAIL<br>";
if ($res = mysql_query("DROP DATABASE puldbru_dbase",$conn)) echo "drop database OK<br>";
else echo "drop database FAIL<br>";
if ($res = mysql_query("CREATE DATABASE puldbru_dbase",$conn)) echo "create database OK<br>";
else echo "create database FAIL<br>";
if ($res = mysql_query("DROP TABLE mdb",$conn)) echo "drop table OK<br>";
else echo "drop table FAIL<br>";
if (mysql_select_db("puldbru_dbase",$conn)) echo "mysql_select_db OK<br>";
else echo "select dbase FAIL<br>";
$req="CREATE TABLE mdb (id INT NOT NULL AUTO_INCREMENT, PRIMARY KEY (id), ";
$req.="f1 DOUBLE, ";
$req.="f2 DOUBLE, ";
$req.="f3 DOUBLE, ";
$req.="f4 DOUBLE, ";
$req.="f5 DOUBLE, ";
$req.="f6 DOUBLE, ";
$req.="f7 DOUBLE, ";
$req.="f8 DOUBLE, ";
$req.="f9 DOUBLE, ";
$req.="f10 DOUBLE, ";
$req.="b1 INT, ";
$req.="b2 INT, ";
$req.="b3 INT, ";
$req.="b4 INT, ";
$req.="b5 INT, ";
$req.="b6 INT, ";
$req.="b7 INT, ";
$req.="b8 INT, ";
$req.="b9 INT, ";
$req.="b10 INT";
$req.=")";
if ($res = mysql_query($req,$conn)) echo "create table OK<br>";
else echo "create table FAIL<br>";
$f=fopen("mdb.csv","r");
$n=0;
while ($arr=fgetcsv($f, 5000, ","))
        {$n++;                
        $str="INSERT INTO mdb (f1, f2, f3, f4, f5, f6, f7, f8, f9, f10, b1, b2, b3, b4, b5, b6, b7, b8, b9, b10) VALUES (";
        $str.=(double)$arr[0].", ";
        $str.=(double)$arr[1].", ";
        $str.=(double)$arr[2].", ";
        $str.=(double)$arr[3].", ";
        $str.=(double)$arr[4].", ";
        $str.=(double)$arr[5].", ";
        $str.=(double)$arr[6].", ";
        $str.=(double)$arr[7].", ";
        $str.=(double)$arr[8].", ";
        $str.=(double)$arr[9].", ";
        $str.=(int)$arr[10].", ";
        $str.=(int)$arr[11].", ";
        $str.=(int)$arr[12].", ";
        $str.=(int)$arr[13].", ";
        $str.=(int)$arr[14].", ";
        $str.=(int)$arr[15].", ";
        $str.=(int)$arr[16].", ";
        $str.=(int)$arr[17].", ";
        $str.=(int)$arr[18].", ";
        $str.=(int)$arr[19].")";
        echo $str."<br>";
        if (!mysql_query($str,$conn)) echo "FAIL<br>";
        }
fclose($f);
echo $n." records written";
mysql_close($conn);
}




























function mdb_form()
{
?>
<table cellspacing="10" cellpadding="10" width="100%">
        <tr>
        <td class="c2" align="center"><h1>Pulkovo Satellite Database Administrating&nbsp;Program</h1></td>
        </tr>
</table>
<br><hr>
<form method="get" action="load.php">
        <table cellspacing="10" cellpadding="10" width="100%">
        <tr>
        <td class="c1">&nbsp;ADDRESS&nbsp;<input type="text" size="10" value="127.0.0.1" name="addr"></td>
        <td class="c1">&nbsp;LOGIN&nbsp;<input type="text" size="10" value="root" name="login"></td>
        <td class="c1">&nbsp;PASSWORD&nbsp;<input type="text" size="10" name="pwd"></td>
        <td class="c1"><input type="submit" name="mdb" value="LOAD"></td>
        </tr>
        </table>
<input type="hidden" name="param" value="load">
</form>
<hr>
<?php
};
?>

<html>
<head>
<style>
td.c1{background-color:#ffffcc}
td.c2{background-color:#ffcc99}
hr{color:#999999}
</style>
</head>

<body text="#000000" bgcolor="#ffffff" style="font-family:'courier new',mono; font-weight:bold">

<?
switch ($param){
case "create": mdb_create(); break;
case "load":   mdb_load();   break;
default:       mdb_form(); };

//********************* proverka parametrov ***********************


//*****************************************************************
?>
</body>
</html>
