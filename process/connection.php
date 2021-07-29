<?php
$servername = 'localhost';
$username = 'root';
$dbpassword  = 'mutalemwa';
$dbname = 'farmdoctor';
// establishing connection
$connection = mysqli_connect($servername, $username, $dbpassword, $dbname);
if (!$connection) {
	die("connection failed");
}
