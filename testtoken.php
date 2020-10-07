<?php

$q="1+m+rahat+ullah+ansari";
		$token = strtok($q, "+");
 
		while ($token !== false)
		   {
		   echo $token . " ";
		   $token = strtok("+");
		   }
?>