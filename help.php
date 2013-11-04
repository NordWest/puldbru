<html>
<head>
<style>
td.c1{background-color:#ffffcc}
td.c2{background-color:#ffcc99}
td.c3{background-color:#eeffee; font-weight:bold}
.c4{color:#000075; font-family:'courier new',mono; font-weight:bold; font-size:large}
hr{color:#999999}
a:hover{color:#009900; font-family:'courier new',mono; font-weight:bold}
a{color:#000099; font-family:'courier new',mono; font-weight:bold}
.copy{font-weight:normal; font-size:smallest}
</style>
<title>Pulkovo Database of Observations of Solar System Bodies: Help</title>
</head>

<!--//********** body ************************************************-->
<body background="gray.jpg" text="#000000" bgcolor="#ffffff" style="font-family:'courier new',mono; font-weight:bold">
        <div class="c4">
        Information for database users
        </div>
        <hr>
                <a href="javascript:history.back();">Go to previous page</a>
        <hr>

        <?php
//************************************************************************
if ($_COOKIE["lang"]=="en") {
        $h1m ="<a href='help2m.php'>Description and abbreviations</a><br>\n";
        $h1s ="<a href='help2s.php'>Description and abbreviations</a><br>\n";
        $h1  ="<a href='help2m.php'>Description and abbreviations (minor planets)</a><br><a href='help2s.php'>Description and abbreviations (planets and satellites)</a><br>\n";
        $h2  ="<a href='help4.php'>Information about observations</a><br>\n";
        $h3  ="<a href='help10.php'>List of publications</a><br>\n";
        $h4  ="<!--cookie is set to Russian-->";
}
else {
        $h1m ="<a href='http://www.puldb.ru/pulcat/descrip_mp.html'>Description and abbreviations</a><br>\n";
        $h1s ="<a href='http://www.puldb.ru/pulcat/descrip_big.html'>Description and abbreviations</a><br>\n";
        $h1  ="<a href='http://www.puldb.ru/pulcat/descrip_mp.html'>Description and abbreviations (minor planets)</a><br><a href='http://www.puldb.ru/pulcat/descrip_big.html'>Description and abbreviations (planets and satellites)</a><br>\n";
        $h2  ="<a href='http://www.puldb.ru/pulcat/accuracy.html'>Information about observations</a><br>\n";
        $h3  ="<a href='http://www.puldb.ru/pulcat/sun_public.html'>List of publications</a><br>\n";
        $h4  ="<!--cookie is set to English-->";
};

//************************************************************************
        switch(@$HTTP_GET_VARS['n']){
        case 'mdb': echo $h1m.$h2.$h3.$h4; break;
        case 'sdb': echo $h1s.$h2.$h3.$h4; break;
        default: echo $h1.$h2.$h3.$h4; break;
        }

//************************************************************************
?>

</body></html>
