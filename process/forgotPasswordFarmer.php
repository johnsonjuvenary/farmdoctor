<?php
$email = '';
$errors = [];
$successes = [];
include('connection.php');
// Import PHPMailer classes into the global namespace

if (isset($_POST['farmer_password_reset'])) {
	//assigning variable and escaping character
	$email = htmlentities(mysqli_escape_string($connection, $_POST['email']));
	// VALIDATING DATA
	//checking if is empty
	if (empty($email)) {
		$errors['empty'] = 'Empty Email Address';
		//check if is a string
	} elseif (!is_string($email)) {
		$errors['notstring'] = 'Invalid Email Address';
		//check if email is valid
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['invalid'] = 'Invalid Email Address';
	} else {
		//checking if email is in database
		$email_check = mysqli_query($connection, "SELECT * FROM farmerz WHERE email = '$email' LIMIT 1");
		$email_result = mysqli_fetch_array($email_check);
		$email_row = $email_result['email'];
		if (mysqli_num_rows($email_check) == 0) {
			$errors['notfound'] = 'Invalid Email Address';
		} else{
			$successes['reset'] = "Please Reset Your Password, By Clicking";
		}
	}
}

