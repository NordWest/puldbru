<?php

//********************* CONSTANTS ********************************
define("DBG","");               //debug
define("DBN","puldbru_db");     //name of database
define("ADDR","localhost");     //mysql server
define("NAME","puldbru_db");    //login
define("PWD","pul123");         //pwd
define("MAINPAGE", (@$_COOKIE["lang"]=="en") ? "help1.php" : "/index.php");


define("DS1_1","<a href='javascript:history.back();'>Back</a>");
define("DS2_1","<a href='javascript:history.back();'>Back</a>");
define("DS3_1","<a href='javascript:history.back();'>Back</a>");

define("DS1_2", (@$_COOKIE["lang"]=="en") ? "<a href='help12.php'>Abbreviations</a>" : "<a href='help12r.php'>Abbreviations</a>");
define("DS2_2", DS1_2);
define("DS3_2", DS1_2);

define("INSTR","1");       //<select>instrum
define("INSTR0","0");   //vivod instr u kot. ph+ccd=0

foreach ($_POST as $k => $v) $$k = (int)mysql_escape_string(htmlentities($v));
foreach ($_GET  as $k => $v) $$k = (int)mysql_escape_string(htmlentities($v));

$format=array(
1=>"  %8.3f  ",
2=>"  %8.3f  ",
3=>"  %5.3f  ",
4=>"  %8.3f  ",
5=>"  %5.3f  ",
6=>"  %5.3f  ",
7=>"  %5.3f  ",
8=>"  %5.1f  ",
9=>"  %8.0f  ",
13=>"  %2.0f  ",
14=>"  %2.0f  ",
15=>"  %2.0f  ",
16=>"  %2.0f  ",
17=>"  %2.0f  ",
18=>"  %2.0f  ");

//***************** header **************************************
$header[1]="    Epoch   ";
$header[2]="      S     ";
$header[4]="      P     ";
$header[3]="   e(S)  ";
$header[5]="   e(P)  ";
$header[6]="   e1(S) ";
$header[7]="   e1(P) ";
$header[9]="     JD     ";

$header[12]=" Det. ";

$header[13]="   N  ";
$header[14]=" N(S) ";
$header[15]=" N(P) ";
$header[16]=" Ori. "; 
$header[17]=" Meas.";

//***************** header 1**************************************
$header1[1]="            ";
$header1[2]="    arcsec  ";
$header1[4]="     deg    ";
$header1[3]="  arcsec ";
$header1[5]="   deg   ";
$header1[6]="  arcsec ";
$header1[7]="   deg   ";
$header1[9]="            ";

$header1[12]="      ";
$header1[13]="      ";
$header1[14]="      ";
$header1[15]="      ";
$header1[16]="      "; 
$header1[17]="      ";

//***************** header 2**************************************
$header2[1]="------------";
$header2[2]="------------";
$header2[3]="---------";
$header2[4]="------------";
$header2[5]="---------";
$header2[6]="---------";
$header2[7]="---------";
$header2[9]="------------";

$header2[12]="------";
$header2[13]="------";
$header2[14]="------";
$header2[15]="------";
$header2[16]="------"; 
$header2[17]="------";

?>
