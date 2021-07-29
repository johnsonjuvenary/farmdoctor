<?php
include('connection.php');
$errors = [];
$successes = [];
if (isset($_POST['change'])) {
	$oldpwd = htmlentities(mysqli_escape_string($connection, $_POST['oldpwd']));
	$newpwd = htmlentities(mysqli_escape_string($connection, $_POST['newpwd']));
	$cpwd = htmlentities(mysqli_escape_string($connection, $_POST['cpwd']));
	if (empty($oldpwd) || empty($newpwd) || empty($cpwd)) {
		$errors['empty'] = 'Password Can not be empy';
	} elseif ($newpwd !== $cpwd) {
		$errors['!match'] = 'New Passwords Do not match';
	} else {
		//checking if current password is correct
		$password_check = mysqli_fetch_array(mysqli_query($connection, "SELECT password FROM farmerz WHERE email = '$_SESSION[farmer]' LIMIT 1"));
		if (!password_verify($oldpwd, $password_check['password'])) {
			$errors['!oldpwd'] = 'Invalid Current Password';
		} else {
			//hashing password
			$pwdhash = password_hash($newpwd, PASSWORD_DEFAULT);
			//updating password
			$update_pwd = mysqli_query($connection, "UPDATE farmerz SET password = '$pwdhash' WHERE email = '$_SESSION[farmer]'");
			// saving logs
			$log_name = 'changed password';
			$insert_log = mysqli_query($connection, "INSERT INTO log(log_name,user) VALUES('$log_name','$_SESSION[farmer]')");
			if (!$update_pwd && !$insert_log) {
				$errors['failed'] = 'Failed, Try again later';
			} else {
				$successes['sucesss'] = 'Password changed successfully';
			}
		}
	}
}
