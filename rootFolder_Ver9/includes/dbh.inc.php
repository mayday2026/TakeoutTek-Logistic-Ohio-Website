<?php

$servername = "localhost";
$dBUsername = "id20316089_takeouttek";
$dBPassword = "HyvQ5tAgZyTZetZiy^%N";
$dBName = "id20316089_userinfo";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) { // if connection failed
	die("Connection failed: ".mysqli_connect_error());
}
