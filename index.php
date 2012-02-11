<?php

$f = file("a.txt");
$u1 = $_SERVER['SERVER_NAME'];
$u2 = trim($_SERVER['REQUEST_URI'],"/");
$u = $u1."/".$u2;

foreach ($f as $l) {
	$l = explode("->",$l);
	$a = explode(",",$l[0]);
	$b = trim($l[1]);
	
	foreach ($a as $c) {
		$c = trim($c);
		if ($c == $u) {
			header("Location: http://$b");
		}
		elseif ($c == $u1) {
			header("Location: http://$b/$u2");
		}
	}
}

require('404.php');

?>