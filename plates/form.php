
<table cellspacing="0" cellpadding="10" width="100%" onclick="alert('Programming by S.Kalinin');">
<tr>
<!--
        <td class="c2"><img src="logo.jpg"></td>
-->
        <td class="c2">
        <font size="+3" color="#000075" face="Tahoma, Arial, sans-serif">
                <b>
                <div align="center" style="color:#000075">
                Pulkovo&nbsp;Photographic Plate&nbsp;Database
                </div>
                </b>
        </font>
        </td>
</tr>
</table>

<!--------------------------------------------------------------------->

<hr>
<table cellspacing="10" cellpadding="10" border="0" width="100%">
  <tr>
     <td align="left" class="c3" width="100%">
<pre>To find a certain plate, type its number, choose instrument and click button FIND
<form action='index.php' method='post' target='_blank'><input type='hidden' name='page' value='view'>Instrument: <select name='instr'><option value='na'>Normal Astrograph</option><option value='26'>26-inch refractor</option></select>   Plate number: <input type='text' size='10' name='num'>   <input type='submit' value=' FIND '></form ></pre></td>
  </tr>
</table>
<hr>

<!--------------------------------------------------------------------->

<form action='index.php' method='post'>
<input type='hidden' name='page' value='search'>

<table cellspacing="10" cellpadding="10" width="100%">
<tr>
<td align="left" class="c2" width="100%" colspan='4'>

<pre>To find plates with a certain sky area: choose instrument,
type coordinates (R.A. and Dec.) of the center of this area, 
type radius of this area, type (optionally) names of required objects, 
and click button FIND   </pre>

</td>
</tr>

<tr>
<td align="left" class="c2" width="100%" colspan='4'>

<pre>
                     Instrument: <select name='instr'><option value='na'>Normal Astrograph</option><option value='26'>26-inch refractor</option></select>
                           R.A.: <input type='text' size='10' name='ra'> (h m s),   Dec.: <input type='text' size='10' name='dec'> (d m s)
                  Search radius: <input type='text' size='10' name='range'> (d m s)
                         Object: <input type='text' size='10' name='t4'>  or <input type='text' size='10' name='t5'>  or <input type='text' size='10' name='t6'>
Maximum number of lines to show: <input type='text' size='10' name='max' value='100'>
                                 <input type='submit' value=' FIND '>   <input type='reset' value=' Reset form '></pre>

</td>
</tr>
</table></form >
<hr>

<!--------------------------------------------------------------------->

<form action='index.php' method='post'>
<input type='hidden' name='page' value='search'>

<table cellspacing="10" cellpadding="10" width="100%">
<tr>
<td align="left" class="c1" width="100%" colspan='4'>

<pre>To find plates with a certain object, fill one or more of fields below,
choose instrument and click button FIND   </pre>

</td>
</tr>

<tr>
<td align="left" class="c1" width="100%" colspan='4'>

<pre>
                     Instrument: <select name='instr'><option value='na'>Normal Astrograph</option><option value='26'>26-inch refractor</option></select>
           Plate numbers between <input type='text' size='10' name='n1'> and <input type='text' size='10' name='n2'>
                    Year between <input type='text' size='10' name='y1'> and <input type='text' size='10' name='y2'>
                         Object: <input type='text' size='10' name='t1'> and <input type='text' size='10' name='t2'> and <input type='text' size='10' name='t3'>
                         Object: <input type='text' size='10' name='t4'>  or <input type='text' size='10' name='t5'>  or <input type='text' size='10' name='t6'>
 Plates with minor planet number <input type='text' size='10' name='mp'>
Maximum number of lines to show: <input type='text' size='10' name='max' value='100'>
                                 <input type='submit' value=' FIND '>   <input type='reset' value=' Reset form '></pre>

</td>
</tr>
</table></form >

<!--------------------------------------------------------------------->

<hr>

<font size="+1">
<table cellspacing="0" width="100%" cellpadding="10">
<tr>
  <td align="center" class="c2" valign="top" width="50%">
    <a href="./descr/index.htm">Description</a><br>
  </td>
  <td align="center" class="c2" valign="top" width="50%">
    <a href="/index.php">Main Page</a><br>
  </td>
</tr>

</table>
</font>
