<?php
require "help-head.php";
?>

<div align="center">
<img src="../imgb/title-8.jpg" hspace="10" vspace="10" border="1"> 
</div>
                                                                             
<div class="c4">
System of astrometrical databases of Pulkovo observatory.
</div>

<div class="c4">
User's reference
</div>

<hr width="90%">
<div align="center">
        <a href="help12r.php">
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
On the first page you can choose an object, using ADS or WDS number
<br><br>
On the second page you can choose:
<ul>
        <li>preferred detector
        <li>required data fields
</ul>

<hr width="50%">
Abbreviations:

<ul style="list-style-type:none">

    <li style="font-weight:normal"><b>Epoch
    </b> - epoch of observations

    <li style="font-weight:normal"><b>JD
    </b> - Julian day of observations

    <li style="font-weight:normal"><b>S
    </b> - separation

    <li style="font-weight:normal"><b>P
    </b> - position angle (epoch of observation date)

    <li style="font-weight:normal"><b>e(S)
    </b> - root mean square error of separation

    <li style="font-weight:normal"><b>e(P)
    </b> - root mean square error of position angle

    <li style="font-weight:normal"><b>e1(S)
    </b> - root mean square error of separation for 1 plate

    <li style="font-weight:normal"><b>e1(P)
    </b> - root mean square error of position angle for 1 plate

    <li style="font-weight:normal"><b>N(S)
    </b> - number of plates used for calculating separation

    <li style="font-weight:normal"><b>N(P)
    </b> - number of plates used for calculating position angle

    <li style="font-weight:normal"><b>N
    </b> - total number of plates

    <li style="font-weight:normal"><b>Orient.
    </b> - method of plate orientation

    <li style="font-weight:normal"><b>Meas.code
    </b> - measurers's code

    <li style="font-weight:normal"><b>Detector
    </b> - used detector

</ul>








<!--********************************************************************
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

    <li style="font-weight:normal"><b>X
    </b> - <font face="Symbol">Da</font>cos<font face="Symbol">d</font>

    <li style="font-weight:normal"><b>Y
    </b> - <font face="Symbol">Dd</font>

    <li style="font-weight:normal"><b>(O-C)X
    </b> - (O-C)<sub><font face="Symbol">Da</font>cos<font face="Symbol">d</font></sub>

    <li style="font-weight:normal"><b>(O-C)Y
    </b> - (O-C)<sub><font face="Symbol">Dd</font></sub>

    <li style="font-weight:normal"><b>Epoch
    </b> - epoch of equator and equinox

    <li style="font-weight:normal"><b>Catalog
    </b> - reference catalog

    <li style="font-weight:normal"><b>g/t
    </b> - geocenric/topocentric

    <li style="font-weight:normal"><b>Instr.
    </b> - instrument

    <li style="font-weight:normal"><b>Detector
    </b> - used detector

    <li style="font-weight:normal"><b>Rel.
    </b> - relative to which satellite

</ul>

Note: If both (O-C) values in result table are zero, that means (O-C) have not
been calculated.

********************************************************************-->
</body>
</html>
