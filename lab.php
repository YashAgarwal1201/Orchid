<?php

$var1 = 50;
$var2 = 100;
echo "Odd Numbers b/w 50 & 100 are, </br></br>";
for ($i = $var1; $i <= $var2 ; $i++) 
{ 
	if ($i % 2 != 0) 
	{
		echo $i . " ";
	}
}

?>