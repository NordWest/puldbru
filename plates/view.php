<? 
         $q = "select * from plates_$instr where num_bak regexp '^[^0-9]?0*$num\$' ";
if ($id) $q = "select * from plates_$instr where id='$id'+0 ";
$r = sql($q);
$t = mysql_fetch_array($r);
$t['obs_time'] = str_replace("\n", "\n                 ", $t['obs_time']);
$t['c0'      ] = str_replace("\n", "\n                 ", $t['c0']);
?>

VIEW DATA: Record number <? echo $t['id']    ?><br>
<hr>
<a href='fits.php?instr=<? echo $instr  ?>&id=<? echo $t['id'] ?>'>FITS</a>
&nbsp;
<a href='text.txt?instr=<? echo $instr  ?>&id=<? echo $t['id'] ?>'>Text</a>
&nbsp;
<a href='javascript:window.close()'>Close this window</a>

<hr><pre>     Instrument: <? echo $t['instr']  ?>

   Plate number: <? echo $t['num_bak']    ?>

         Object: <? echo $t['obj'] ?>    <!--   <? echo $t['obj_ru'] ?>   -->
           Date: <? echo $t['obs_date'] ?>
<hr>             RA: <? echo $t['ra1'] ?>

     RA (J2000): <? echo $t['ra2'] ?>

            DEC: <? echo $t['dec1'] ?>

    DEC (J2000): <? echo $t['dec2'] ?>
<hr>           Time: <? echo $t['obs_time'] ?>

              u: <? echo $t['u'] ?>

 Number of exp.: <? echo $t['n_exp'] ?>

           Exp.: <? echo $t['exp'] ?>
<hr>           Size: <? echo $t['size'] ?>

       Emulsion: <? echo $t['emu'] ?>

         Filter: <? echo $t['filter'] ?>

    Phot.system: <? echo $t['ph'] ?>
<hr>              T: <? echo $t['t'] ?>

              B: <? echo $t['b'] ?>

          Focus: <? echo $t['f'] ?>
<hr>        Comment: <? echo $t['c0'] ?>

       Observer: <? echo $t['observer'] ?>

      Condition: <? echo $t['cond'] ?>

       Location: <? echo $t['loc'] ?>

       Measured: <? echo $t['meas'] ?>

    Last edited: <? echo $t['ed'] ?>
<hr>
</pre>
