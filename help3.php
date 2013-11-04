<?php
require "help-head.php";
?>

<style>
a.r:hover{color:#009900}
a.r{color:#ff3333}
</style>

<div align="center">
<img src="../imgb/title-8.jpg" hspace="10" vspace="10" border="1"> 
</div>
                                                                             
<div class="c4">
System of astrometric databases of Pulkovo observatory.
</div>


<hr width="90%">
<div align="center">
        <a href="index.php" class="r">
        To database request form
        </a>
        <?php echo HB; echo EM; echo MP; ?>
</div>
<hr width="90%">

<!--********************************************************************-->
<div class="c4">
Observations of Solar system bodies
</div>
<br>

<!--********************************************************************-->
<? echo TAB1 ?>
<td class='img'>
<img src="../imgb/comet_small.jpg" width="150" title="Machholz comet. Click to enlarge" onclick="window.open('../imgb/comet1.jpg','pulfields','height=450,width=470,alwaysRaised=yes,menubar=no,toolbar=no,directories=no,location=no,scrollbars=no,status=no,resizable=no,top=100,left=100');">
<br clear='left'>
Machholz comet, <br> CCD image taken on 12.01.2005
</td>

<!--********************************************************************-->

<td>
Observations of Solar system bodies at the Pulkovo observatory have been performed
since 1898. The purpose of these observations is the determination of precise
coordinates of Solar system bodies, which is necessary for development and
improvement of motion theories, and for studying the evolution of the Solar
system.
The main instruments are: Normal astrograph(D=330, F=3467 mm) and
26-inch refractor (D=650, F=10413 mm).
Some other instruments were also used, such as short-focus double astrograph (D=100, F=700 mm)
and lunar-planetary telescope (D=600  F=10000 mm).
The latter was used for observations of satellites of Mars and Jupiter in
Ordubad expedition of Pulkovo observatory in 1970s and 1980s.
Only photographical observations were performed on these instruments until 1995.
CCD observations with ST-6 camera started on 26-inch refractor in 1995.
In December of 2004 CCD observations started on Normal astrograph (camera S2C-017AP, 1040x1160pix, field 16'x18'). 
Machholtz comet was the first observed object.

<!--********************************************************************-->
</td>
<? echo TAB2 ?>
<br>

<!--********************************************************************-->
<?php require "tablisa1.php"; ?>
<!--********************************************************************-->

<!--********************************************************************-->
<? echo TAB1 ?>
<td class='img'>
<img src="../imgb/jup_sat.gif" title="Io and Europa, satellites of Jupiter">
<br clear='left'>
Io and Europa, satellites of Jupiter
</td>

<td>
The database requires both equtorial coordinates (obtained using
reference catalogs) and relative coordinates of satellites (relative
to a planet or another satellite). Yale university catalog, AGK3, PPM, FOCAT
were used as reference catalogs. In present time modern catalogs (HIPPARCOS,
Tycho-2, UCAC-2) are used for image processing.
Original technique of astrometric reduction of observations was developed
in our laboratory. It is described in some 
<a href='http://www.puldb.ru/pulcat/metod_pub.html'>
articles</a>.
</td>
<? echo TAB2 ?>
<br>

<!--********************************************************************-->
<? echo TAB1 ?>

<td valign='top'>
Accuracy of observations given in this database is evaluated in comparison with
motion theories ('O-C'). It requires both stochastic errors of observations and
errors of motion theories. Inner accuracy of observations is evaluated by
comparison of observations of one night, of one plate, or one CCD series.
Systematic errors of observations and motion theories have been studied, results
are given in
        <a href="help10.php">these articles</a>.
Accuracy of photographical observations is about 0.2-0.3 arcsec for equatorial
coordinates and 0.1-0.3 for relative coordinates of planetary satellites,
depending on object and observational conditions. Accuracy of CCD observations
is 1.5-2 times better (0.05-0.15 arcsec). General chracteristics of
observations of every object, including evaluation of accuracy of observations,
are given in <a href="help4.php">this table</a>.

<!--********************************************************************-->
</td>

<td class='img'>
<img src="../imgb/juliana.jpg" title="Juliana">
<br clear='left'>
Minor planet Juliana, mag=15.0

<br><br><br>
<img src="../imgb/hebe.jpg" title="Hebe">
<br clear='left'>
Minor planet Hebe, mag=10.1
</td>

<!--********************************************************************-->
<? echo TAB2 ?>
<br>

<!--********************************************************************-->
</body>
</html>
