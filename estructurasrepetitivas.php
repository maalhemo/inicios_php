<!DOCTYPE html>
<html>
<head>
	<title>estructuras repetitivas</title>
</head>
<body>
<?php
echo "tabla del 2 con for";
echo "<br>";
for ($i=2; $i<=20 ; $i=$i+2) { 
	echo $i;
	echo "-";
}
echo "<br>";
echo "tabla del dos con while";
echo "<br>";
$f=2;
while ($f <= 20) {
	echo $f;
	echo "-";
	$f=$f+2;
}
echo "<br>";
echo "tabla del dos con do/while";
echo "<br>";
$h=2;
do {
	echo $h;
echo "-";
$h=$h+2;
} while ($h <= 20);


?>
</body>
</html>