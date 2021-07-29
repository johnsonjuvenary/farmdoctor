<?php
session_start();
$email = '';
$errors = [];
$successes = [];
include('connection.php');
if (isset($_POST['farmer_login'])) {
	//assigning variables and escaping sql injection
	$email = htmlentities(mysqli_escape_string($connection, $_POST['email']));
	$password = htmlentities(mysqli_escape_string($connection, $_POST['password']));
	//checking email if exists
	$email_check = mysqli_query($connection, "CALL check_farmer_email('$email');");
	if (mysqli_num_rows($email_check) == 0) {
		$errors['invalid'] = 'Invalid Email or Password';
	} else {
		//checking password
		$pwd = "CALL check_farmer_pwd('$email');";
		$password_check = mysqli_query($connection,$pwd);
		if (mysqli_num_rows($password_check) == 0) {
			$errors['invalid'] = 'Invalid Email or Password';
		} else {
			$password_check2 = mysqli_fetch_array($password_check);
			if (!password_verify($password, $password_check2["password"])) {
				$errors['invalid-pass'] = 'Invalid Email or Password';
			} else {
				//storing session
				$_SESSION['farmer'] = $email;
				// saving logs
				$log_name = 'logged in';
				$insert_log = mysqli_query($connection, "INSERT INTO log(log_name,user) VALUES('$log_name','$_SESSION[farmer]')");
				//redirediring farmer
				header("Location: farmer");
			}
		}
	}
}
