<?php

$file = file("a.txt");
$server_host = $_SERVER['SERVER_NAME'];
$server_request = trim($_SERVER['REQUEST_URI'], "/");
$full_url = $server_host."/".$server_request;

foreach ($file as $line) {
  $line = explode("->", $line);
	$locations = explode(",", $line[0]);
	$destination = trim($line[1]);
	
	foreach ($locations as $location) {
		$location = trim($location);
		if ($location == $full_url) {
			header("Location: http://$destination");
		}
		elseif ($location == $server_host) {
			header("Location: http://$destination/$server_request");
		}
	}
}

require('404.php');

?>
