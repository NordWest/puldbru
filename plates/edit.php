<?
if ($error_msg)
   {
   $t = $_POST;
   $t['num_bak'] = $_POST['num'];
   echo "<font color='#ff0000'><ul>$error_msg</ul></font><hr>";
   }
else
   {
   $q = "select * from plates_$table where num_bak regexp '^[^0-9]?0*$num\$' ";
   $r = sql($q);
   $t = mysql_fetch_array($r);
   }

foreach ($t as $k => $v)
   $t[$k] = htmlspecialchars(stripslashes($v), ENT_QUOTES);


?>
EDIT DATA: Record number <? echo $t['id']    ?>
<form action='index.php' method='post'>
<input type='hidden' name='page' value='add'>
<input type='hidden' name='id' value='<? echo $t['id']    ?>'>
<input type='hidden' name='table' value='<? echo $_POST['table']    ?>'>
<pre><hr>     Instrument: <input type='text' size='20' name='instr'      value='<? echo $t['instr']  ?>'>      

   Plate number: <input type='text' size='20' name='num'      value='<? echo $t['num_bak']    ?>'>

         Object: <input type='text' size='80' name='obj'      value='<? echo $t['obj'] ?>'>

           Date: <input type='text' size='20' name='obs_date'      value='<? echo $t['obs_date'] ?>'>
<hr>             RA: <input type='text' size='20' name='ra1'      value='<? echo $t['ra1'] ?>'>

     RA (J2000): <input type='text' size='20' name='ra2'      value='<? echo $t['ra2'] ?>'>

            DEC: <input type='text' size='20' name='dec1'      value='<? echo $t['dec1'] ?>'>

    DEC (J2000): <input type='text' size='20' name='dec2'      value='<? echo $t['dec2'] ?>'>
<hr>           Time: <textarea rows='5' cols='20' name='obs_time'><? echo $t['obs_time'] ?></textarea>

              u: <input type='text' size='20' name='u'      value='<? echo $t['u'] ?>'>

 Number of exp.: <input type='text' size='20' name='n_exp'      value='<? echo $t['n_exp'] ?>'>

           Exp.: <input type='text' size='80' name='exp'      value='<? echo $t['exp'] ?>'>
<hr>           Size: <input type='text' size='20' name='size'      value='<? echo $t['size'] ?>'>

       Emulsion: <input type='text' size='80' name='emu'      value='<? echo $t['emu'] ?>'>

         Filter: <input type='text' size='80' name='filter'      value='<? echo $t['filter'] ?>'>

    Phot.system: <input type='text' size='20' name='ph'      value='<? echo $t['ph'] ?>'>
<hr>              T: <input type='text' size='20' name='t'      value='<? echo $t['t'] ?>'>

              B: <input type='text' size='20' name='b'      value='<? echo $t['b'] ?>'>

          Focus: <input type='text' size='20' name='f'      value='<? echo $t['f'] ?>'>
<hr>        Comment: <textarea rows='5' cols='20' name='c0'><? echo $t['c0'] ?></textarea>

       Observer: <input type='text' size='20' name='observer'      value='<? echo $t['observer'] ?>'>

      Condition: <input type='text' size='20' name='cond'      value='<? echo $t['cond'] ?>'>

       Location: <input type='text' size='20' name='loc'      value='<? echo $t['loc'] ?>'>

       Measured: <input type='text' size='80' name='meas'      value='<? echo $t['meas'] ?>'>
<hr>
   <font color='#ff0000'>DELETE THIS RECORD <input type='CHECKBOX' name='del'></font>
<hr>
      User name: <input type='text' size='20' name='login'      value='<? echo $login ?>'>
       Password: <input type='password' size='20' name='pwd'      value='<? echo $pwd ?>'>
                 <input type='submit' value=' SAVE ' style='background-color:#ffff00'>   <input type='reset' value=' Reset form '>

<hr>
</form >
</pre>








