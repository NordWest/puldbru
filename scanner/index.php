<html><head></head><body>
<pre>

<?php
$dir = ".";

if ($dh = opendir($dir)) 
   {
   while (($file = readdir($dh)) !== false) 
      {
      printf ("<a href='$file'>%10.3f   $file</a>\n", filesize($file)/1000);
      }
   closedir($dh);
   }

?> 

</pre>
</body></html>
