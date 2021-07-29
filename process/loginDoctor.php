<?php
session_start();
$name = '';
$errors = [];
include('connection.php');
if (isset($_POST['doctor_login'])) {
	$name = htmlentities(mysqli_escape_string($connection, $_POST['name']));
	$password = htmlentities(mysqli_escape_string($connection, $_POST['password']));
	if (!is_string($name)) {
		$errors['invalid'] = 'Invalid name or password';
	} else {
		$login = mysqli_query($connection, "SELECT * FROM farmdoctor WHERE name = '$name' AND password = '$password' LIMIT 1");
		if (mysqli_num_rows($login) == 0) {
			$errors['invalid'] = 'Invalid name or password';
		} else {
			//storing session
			$id = mysqli_fetch_array($login);
			$id_doctor = $id['id'];
			$doc_name = $id['name'];
			$_SESSION['doctor'] = $id_doctor;
			// saving logs
			$log_name = 'logged in';
			$insert_log = mysqli_query($connection, "INSERT INTO log(log_name,user) VALUES('$log_name','$doc_name')");
			header("Location: doctor");
		}
	}
}
