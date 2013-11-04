<?php
require "help-head.php";
?>

<div align="center">
<img src="../imgb/title-8.jpg" hspace="10" vspace="10" border="1"> 
</div>
                                                                             
<div class="c4">
System of astrometrical databases of Pulkovo observatory.
</div>


<hr width="90%">
<div align="center">
        <a href="http://www.puldb.ru/pulcat/descrip_big.html">
        Russian version of this page
        </a>
        <?php echo HB; echo EM; ?>
</div>
<hr width="90%">

<!--********************************************************************-->
<div class="c4">
Description and abbreviations
</div>
<br>
On the first page you can select required object
and (optionally) time interval. If no time interval is set, all observations will
be given.<br><br>
On the second page you can choose:
<ul>
        <li>preferred instrument, or all instruments
        <li>preferred detector
        <li>required data fields
</ul>

<hr width="50%">
Abbreviations:

<ul style="list-style-type:none">
    <li style="font-weight:normal"><b>JD
    </b> - Julian day of observations

    <li style="font-weight:normal"><b>Y,M,D
    </b> - year, month and day of observations

    <li style="font-weight:normal"><b>R.A.
    </b> - right ascention

    <li style="font-weight:normal"><b>Dec
    </b> - declination

    <li style="font-weight:normal"><b>(O-C)R.A.
    </b> -  (O-C)<sub><font face="Symbol">a</font></sub>cos<font face="Symbol">d</font>

    <li style="font-weight:normal"><b>(O-C)Dec.
    </b> -  (O-C)<sub><font face="Symbol">d</font></sub>

    <li style="font-weight:normal"><b>Epoch
    </b> - epoch of equator and equinox

    <li style="font-weight:normal"><b>Catalog
    </b> - reference catalog

    <li style="font-weight:normal"><b>g/t
    </b> - geocenric/topocentric

    <li style="font-weight:normal"><b>Instr.
    </b> - instrument

    <li style="font-weight:normal"><b>Det.type
    </b> - detector type

</ul>

Note: If both (O-C) values in result table are zero, that means (O-C) have not
been calculated.

<!--********************************************************************-->
</body>
</html>
