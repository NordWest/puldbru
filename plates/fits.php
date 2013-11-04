<pre>
<?
#   header("Content-Type: text/plain");
#   header('Content-Disposition: attachment; filename="downloaded.pdf"')
#   header('Content-Disposition: inline')
include "main.php";
$q = "select * from plates_$instr where num_bak regexp '^[^0-9]?0*$num\$' ";
if ($id) $q = "select * from plates_$instr where id='$id'+0 ";

$r = sql($q);
$t = mysql_fetch_array($r);

#   $t['obs_time'] = str_replace("\n", "\n                 ", $t['obs_time']);
#   $t['c0'      ] = str_replace("\n", "\n                 ", $t['c0']);

$a = array(
           'TELESCOP=' => $t['instr'],
           'PLATE-N =' => $t['num_bak'],
           'OBJECT  =' => $t['obj'],
           'DATE-OBS=' => $t['obs_date'],
           'TIME-OBS=' => $t['obs_time'],
           'U       =' => $t['u'],
           'N-EXP   =' => $t['n_exp'],
           'EXPOSURE=' => $t['exp'],
           'RA      =' => $t['ra1'],
           'DEC     =' => $t['dec1'],
           'RA2000  =' => $t['ra2'],
           'DEC2000 =' => $t['dec2'],
           'SIZE    =' => $t['size'],
           'EMULSION=' => $t['emu'],
           'FILTER  =' => $t['filter'],
           'TEMPERAT=' => $t['t'],
           'PRESSURE=' => $t['b'],
           'OBSERVER=' => $t['observer'],
           'COMMENT  ' => $t['c0'] );
foreach ($a as $k => $v)
   {
   $a1 = split("\r?\n", $v);
   foreach ($a1 as $k1 => $v1)
      {
      $v1 = substr($v1, 0, 64);
      printf("%-80s\n", sprintf("%s '%8s'", $k, $v1));
      }
   }
?>
</pre>

