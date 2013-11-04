<?php

define ('DEBUG', '0');

#########################################################

function dms2radians($str)
   {
   if (DEBUG) echo "<pre>str=\"$str\" \n</pre>";
   $str = trim(str_replace(" .", " 0.", " $str 0 0 0 "));
   $str = ereg_replace ('[^0-9\.\-]', ' ', $str);
   $str = ereg_replace ('\- +', '-', $str);
   $str = ereg_replace (' +', ' ', $str);
   $t = explode(" ", trim($str));

   $d = $t[0];
   $m = $t[1];
   $s = $t[2];

   if (strpos(" $str ", "-"))
      {
      $m *= -1;
      $s *= -1;
      }
   if (DEBUG) echo "<pre>str=\"$str\"    d=$d    m=$m    s=$s \n</pre>";
   return ($d + $m/60.0 + $s/3600.0)*pi()/180.0;
   }

function check_distance($ra, $dec, $ra0, $sin_dec0, $cos_dec0, $cos_range)
   {
   if($cos_range < $sin_dec0*sin($dec) + $cos_dec0*cos($dec)*cos($ra - $ra0)) return 1;
   return 0;
   }

#########################################################

function sql($q)
   {
   global $error, $aff_rows;
   if (DEBUG) echo "\n <br> $q \n <br> ";
   mysql_connect('localhost', 'puldbru_db', 'pul123');
   mysql_select_db('puldbru_db');
   $res = mysql_query($q);
   $error = mysql_error();
   $aff_rows = mysql_affected_rows();
   mysql_close();
   return $res;
   }

function sql1($q)
   {
   return mysql_result(sql($q), 0, 0);
   }

function check_pwd()
   {
   global $pwd, $login;
   return (int)sql1("select count(*) from users where login='$login' and pwd=md5('$pwd')");
   }

function dump()
   {
   global $instr, $pwd, $login;
   if (!check_pwd()) return "Wrong password or user name <br> \n";
   echo "Please wait... <br> \n";
   $f = fopen("$instr.dump", "w");
   
   $q = "select * from plates_$instr ";
   $r = sql($q);
   
   $s = '';
   while ($t = mysql_fetch_row($r))
      {
      foreach ($t as $k => $v)
         {
         $v = str_replace("\r", "\\r", $v);
         $v = str_replace("\n", "\\n", $v);
         $v = str_replace("\t", "\\t", $v);
         $s .= "$v\t";
         }
      $s .= "\n";
      }
   
   fwrite($f, $s);
   fclose($f);
   
   echo "Backup copy was created. <a href='$instr.dump' target='_blank'>Click here</a> to download. <br> \n";
   }



##################### post and get ########################

foreach ($_POST as $k => $v) $$k = mysql_escape_string($v);
foreach ($_GET  as $k => $v) $$k = mysql_escape_string($v);

$ok = 0;
if ($instr === 'na') $ok = 1;
if ($instr === '26') $ok = 1;
if (!$ok) $instr = 'na';

$ok = 0;
if ($table === 'na') $ok = 1;
if ($table === '26') $ok = 1;
if (!$ok) $table = 'na';

$max = (int)$max;
$id  = (int)$id;

$n1 = (int)$n1;
$n2 = (int)$n2;

$y1 = (int)$y1;
$y2 = (int)$y2;

###################### const ###########################
define("EM", "");
define("MP", "&nbsp;&nbsp;&nbsp;<a href='help1.php'>Main Page</a>");
define("HB", "&nbsp;&nbsp;&nbsp;<a href='javascript:history.back();'>Previous page</a>");
define("TAB1","<table border='0' width='100%' cellpadding='10' cellspacing='5' ><tr>");
define("TAB2","</tr></table>");


?>
