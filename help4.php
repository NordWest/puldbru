<?php
require "help-head.php";
?>

<div align="center">
<img src="../imgb/title-8.jpg" hspace="10" vspace="10" border="1"> 
</div>
                                                                             
<div class="c4">
System of astrometrical databases of Pulkovo observatory.
</div>

<!--
<div class="c4">
User's reference
</div>
-->

<hr width="90%">
<div align="center">
        <a href="http://www.puldb.ru/pulcat/accuracy.html">
        Russian version of this page
        </a>
        <?php echo HB; echo EM; ?>
</div>
<hr width="90%">

<!--********************************************************************-->
<div class="c4">
Information about observations
</div>
<br>
<!--********************************************************************-->

Description of the table presented on this page:
<ol type="1" style="list-style-position:outside">
<li>Object:
<font style="font-weight:normal">
numbers of minor planets are given according to catalog of minor planets.
PHEMU - photometrical and astrometrical observations of mutual phenomena
in system of Galilean satellites of Jupiter.
</font>

<li>Instrument
<font style="font-weight:normal"> which was used for observations (all sizes are given in millimeters).</font>
<pre>
PNA   normal astrograph at Pulkovo(D=300,F=3400)                           
P26   26-inch refractor at Pulkovo(D=650,F=10413)                          
AKD   short-focus double astrograph at Pulkovo(F=100,D=700)                
LPT   lunar-planetary telescope in Ordubad expedition(F=700,D=10000)       
BSch  Schmidt telescope at Baldone (Latvia) (F=1200,D=2400)                
ZDA   Zeiss double astrograph(D=400,F=3000)                         
FAS   FAS-3A camera in Ordubad expedition (Azerbaijan) (F=250,D=480)
EA    expeditional astrograph in Bolivia(F=200,D=2260)              
Z160  Zeiss camera in Cuba(F=160,D=700)                             
Z400  Zeiss telescope at Zelenchuk(F=400,D=2000)                    
</pre>
       
<li>Period  of observations
<font style="font-weight:normal"></font>

<li>Type   of observations:
<font style="font-weight:normal">
photographical or CCD
</font>

<li>Type of coordinates
<font style="font-weight:normal">
equatorial (RA,DEC) or relative to some other object (X,Y).
</font>

<li>Reference catalog: 
<font style="font-weight:normal">
for observations on 26-inch refractor and LPT reference catalogs have not been
used (according to 'scale-trail' technique).
</font>

<li>Epoch       
<font style="font-weight:normal">
of equator and equinox. 'date' means that this epoch is the same that epoch
of an observation.
</font>
    
<li>Ref.frame:
<font style="font-weight:normal">
topocentric or geocentric
</font>

<li>Mean accuracy of 1 obs.       
<font style="font-weight:normal"></font>

<li>Ephem.:
<font style="font-weight:normal">source of ephemeris which has been
compared with observations to estimate accuracy of the observatons.
</font>
<pre>
ITA, AE, Amer.Ephem. - ephemeris calculated in ITA, or published in AE USSR,
                       or in Astronomical Ephemeris.
               EPOS  - ephemeris calculated by means of EPOS program, which
                       is developed for calculation of various ephemeres of
                       Solar system objects.
                       1999 - EPOS, user's manual, GAO RAN, Lvov V.N. et al.
        DE200, DE405 - JPL ephemeres.
             Clemens - United States Naval Observatory Circular, #90, 1960.
                  G5 - Arlot J.E., 1982,  Astron.& Astrophys., v. 107, p.305. 
             Sampson - Sampson's ephemeris of Galilean satellites of Jupiter.
       VSOP82, IMCCE - Institute of celestial mechanics, Paris (Bureau des longitudes)
              GUST86 - J.Laskar, R.A.Jacobson, 1987, Astron. & Astrophys., #1, v.188, p.212.
                 New - new ephemeris of Pluto, which was obtained by improving Pluto's
                       orbital elements with the regard for 211 observations
                       obtained in Pulkovo.
</pre>

<li>Publication:
<font style="font-weight:normal">number of article (in the list of articles
for the selected object) in which observations were published.
</font>
</ol>

<!--********************************************************************-->
<hr>
<DIV align="center">
<pre>
<a href="#mercury">Mercury</a>                   <a href="#uranus">Uranus</a>
<a href="#venus">Venus</a>                    <a href="#neptune">Neptune</a>
<a href="#mars">Mars</a>                       <a href="#pluto">Pluto</a>
<a href="#jupiter">Jupiter</a>            <a href="#mp">minor planets</a>
<a href="#saturn">Saturn</a>                    <a href="#comet">comets</a>
</pre>
</div>
<!--********************************************************************-->

<?php require "tablisa.php"; ?>

<!--********************************************************************-->
</body>
</html>
