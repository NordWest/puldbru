<?
#   header("Content-Type: text/plain");
#   header("Content-Disposition: inline; filename='$table.dump'")
#   header("Content-Disposition: inline")
   error_reporting(E_ALL);

include "main.php";
$f = fopen("$table.dump", "w");

$q = "select * from plates_$table ";
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

if ($error)
   {
   echo "$error <br>\n";
   }
else
   {
   echo "<a href='$table.dump'>click here</a>";
   }
?>

