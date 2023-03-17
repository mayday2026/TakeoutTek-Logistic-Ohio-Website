<?php

$servername = "127.0.0.1:3306";
$dBUsername = "u698638504_zhiweixie";
$dBPassword = "Woaidatabase0.0";
$dBName = "u698638504_loginsystem";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) { // if connection failed
	die("Connection failed: ".mysqli_connect_error());
}
