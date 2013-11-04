<? 
$q = "select num_bak, id, obj, obs_date, ra1, ra2, dec1, dec2 
      from plates_$instr where instr!='+' ";
if ($n1) $q.=" and num>='$n1'+0 ";
if ($n2) $q.=" and num<='$n2'+0 ";

if ($y1) $q.=" and left(obs_date, 4)>='$y1'+0 ";
if ($y2) $q.=" and left(obs_date, 4)<='$y2'+0 ";

if ($t1) $q.=" and obj like '%$t1%' ";
if ($t2) $q.=" and obj like '%$t2%' ";
if ($t3) $q.=" and obj like '%$t3%' ";

if($t4 or $t5 or $t6)
   {
   $q .= " and ( 0=1 ";
   if ($t4) $q.=" or obj like '%$t4%' ";
   if ($t5) $q.=" or obj like '%$t5%' ";
   if ($t6) $q.=" or obj like '%$t6%' ";
   $q .= " ) ";
   }


if ($mp) $q.=" and obj like '%[__{$mp}]%' ";
$q.=" order by num ";

$max = (int)$max;
if ($max < 1) $max = 1000000;

$r = sql($q);
if (DEBUG) echo "Number of rows: ".mysql_num_rows($r);

$ra     = dms2radians($ra) * 15;
$dec    = dms2radians($dec);
$range  = dms2radians($range);
 
$sin_dec   = sin($dec);
$cos_dec   = cos($dec); 
$cos_range = cos($range);

$found = 0;
$cnt = 0;
$ok = array();

if ($range) while ($t = mysql_fetch_array($r)) 
   {
   $ra1    = dms2radians($t['ra1']) * 15;
   $ra2    = dms2radians($t['ra2']) * 15;
   $dec1   = dms2radians($t['dec1']);
   $dec2   = dms2radians($t['dec2']);

   $ok[$cnt] = 0;
   if (check_distance($ra1, $dec1, $ra, $sin_dec, $cos_dec, $cos_range) or
       check_distance($ra2, $dec2, $ra, $sin_dec, $cos_dec, $cos_range))
      {
      $ok[$cnt] = 1;
      $found++;
      };
  $cnt++;
  }

mysql_data_seek ($r, 0);

?><pre><?

if (DEBUG) echo "Query: $q \n";
if (!$range) $found = mysql_num_rows($r);
$shown = min($found, $max);
echo "Number of plates found: $found \n";
echo "Number of plates shown: $shown \n<hr>";

$cnt = 0;
$shown = 0;
while ($t = mysql_fetch_array($r)) 
      {
      if (!$range or $ok[$cnt]) 
         {
         printf("<a target='_blank' href='index.php?page=view&instr=$instr&id=%s'>%5s</a>   %10s   %s\n", $t['id'], $t['num_bak'], $t['obs_date'], $t['obj']);
         $shown ++;
         }
      $cnt++;
      if ($shown >= $max) break;
      }
?>
<hr>
<a href='javascript:history.back()'>BACK</a>
</pre>
