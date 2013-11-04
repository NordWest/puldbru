<?php

//********************* CONSTANTS ********************************
define("DBG","");               //debug
define("DBN","puldbru_db");     //name of database
define("ADDR","localhost");     //mysql server
define("NAME","puldbru_db");    //login
define("PWD","pul123");         //pwd
define("MAINPAGE", (@$_COOKIE["lang"]=="en") ? "help1.php" : "/index.php");

define("MDB1","help.php?n=mdb");
define("MDB2","help.php?n=mdb");
define("MDB3","help.php?n=mdb");
define("MDB11","");
define("MDB21","");
define("MDB31","");

define("SDB1","help.php?n=sdb");
define("SDB2","help.php?n=sdb");
define("SDB3","help.php?n=sdb");
define("SDB11","");
define("SDB21","");
define("SDB31","");

define("INSTR","1");       //<select>instrum
define("INSTR0","0");   //vivod instr u kot. ph+ccd=0

foreach ($_POST as $k => $v) $$k = (int)mysql_escape_string(htmlentities($v));
foreach ($_GET  as $k => $v) $$k = (int)mysql_escape_string(htmlentities($v));

if ($obj1) $obj=$obj1;
if ($obj2) $obj=$obj2;
if ($obj3) $obj=$obj3;
if ($obj4) $obj=$obj4;
if ($obj5) $obj=$obj5;

$format=array(1=>"  %4.0f  ",
2=>"  %2.0f  ",
3=>"  %9.6f  ",
4=>"  %12.8f  ",
5=>"  %12.8f  ",
6=>"  %7.3f    ",
7=>"  %7.3f    ",
8=>"  %6.1f  ",
9=>"  %13.5f  ",
13=>"  %01.0f  ",
15=>"  %01.0f  ",
16=>"  %01.0f  ",
17=>"  %01.0f  ",
18=>"  %01.0f  ");
$format[34]="  %8.2  ";
$format[35]="  %8.2  ";

//***************** header **************************************
$header[1]="  Year  ";
$header[2]=" Month";
$header[3]="    Day      ";
$header[4]="       R.A.     ";
$header[5]="       Dec      ";
$header[24]="     R.A.       ";
$header[25]="     Dec        ";
$header[34]="       X    ";
$header[35]="       Y    ";
$header[6]="  (O-C)R.A.  ";
$header[7]="  (O-C)Dec   ";
$header[36]="  (O-C)X  ";
$header[37]="  (O-C)Y  ";
$header[8]="  Epoch   ";
$header[9]="        JD       ";
$header[10]="     ";
$header[11]="     ";
$header[12]="     ";
$header[13]="   Cat   ";
$header[14]=" Rel.";
$header[15]=" g/t ";
$header[16]=" Instr. "; 
$header[17]=" Det.";
$header[18]=" Ref.";
$header[19]="     ";
$header[20]="     ";

//***************** header1 **************************************
$header1[1]="        ";
$header1[2]="      ";
$header1[3]="             ";
$header1[4]="       deg      ";
$header1[5]="       deg      ";
$header1[24]="    h m s       ";
$header1[25]="    d m s       ";
$header1[34]="    arcsec  ";
$header1[35]="    arcsec  ";
$header1[6]="   arcsec    ";
$header1[7]="   arcsec    ";
$header1[36]="  arcsec  ";
$header1[37]="  arcsec  ";
$header1[8]="          ";
$header1[9]="                 ";
$header1[10]="     ";
$header1[11]="     ";
$header1[12]="     ";
$header1[13]="         ";
$header1[14]="     ";
$header1[15]="     ";
$header1[16]="        "; 
$header1[17]="     ";
$header1[18]="     ";
$header1[19]="     ";
$header1[20]="     ";

//***************** header2 **************************************
$header2[1]="--------";
$header2[2]="------";
$header2[3]="-------------";
$header2[4]="----------------";
$header2[5]="----------------";
$header2[24]="----------------";
$header2[25]="----------------";
$header2[34]="------------";
$header2[35]="------------";
$header2[6]="-------------";
$header2[7]="-------------";
$header2[36]="----------";
$header2[37]="----------";
$header2[8]="----------";
$header2[9]="-----------------";
$header2[10]="     ";
$header2[11]="     ";
$header2[12]="     ";
$header2[13]="---------";
$header2[14]="-----";
$header2[15]="-----";
$header2[16]="--------"; 
$header2[17]="-----";
$header2[18]="-----";
$header2[19]="     ";
$header2[20]="     ";
       
//*********************   type_list      ***************************
$type_list[1]="with reference stars";
$type_list[2]="satellite relative to planet";
$type_list[3]="satellite relative to another satellite";

//*******************************************************************
$cat_list[0]= "       ";
$cat_list[2]= " AGK3  ";
$cat_list[3]= " Yale  ";
$cat_list[4]= "  FK5  ";
$cat_list[5]= "  PPM  ";
$cat_list[6]= "Tycho2 ";
$cat_list[8]= " UCAC2 ";
$cat_list[9]= "FOCAT-S";
$cat_list[10]="USNO-A2";
$cat_list[11]=" Tycho ";
$cat_list[12]="Potter ";
$cat_list[13]="  ACT  ";

//********************************************************************
$rfc_list[0]="   ";
$rfc_list[1]=" g ";
$rfc_list[2]=" t ";

//********************************************************************
$instr_list[0]= "      ";
$instr_list[1]= "  PNA ";
$instr_list[2]= "  P26 ";
$instr_list[3]= " Z160 ";
$instr_list[4]= "  EA  ";
$instr_list[5]= "  FAS ";
$instr_list[6]= "  ZDA ";
$instr_list[7]= " BSch ";
$instr_list[8]= "  AKD ";
$instr_list[9]= " Z400 ";
$instr_list[10]="  LPT ";
$instr_list[11]="AZT-11";

//********************************************************************
$instr_des[0]="All instruments";
$instr_des[1]="Normal Astrograph at Pulkovo";
$instr_des[2]="26-inch refractor at Pulkovo";
$instr_des[3]="160-mm Zeiss telescope";
$instr_des[4]="Expeditional Astrograph";
$instr_des[5]="FAS-3A";
$instr_des[6]="Zeiss Double Astrograph";
$instr_des[7]="Schmidt telescope at Baldone";
$instr_des[8]="Short-focus Double Astrograph";
$instr_des[9]="400-mm Zeiss telescope";
$instr_des[10]="Lunar-Planet telescope";
$instr_des[11]="1250-mm LOMO reflector";

//********************************************************************
$rec_list[0]="   ";
$rec_list[1]=" ph";
$rec_list[2]="CCD";

?>
