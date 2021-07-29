<?php
include('connection.php');
$errors = [];
$successes = [];
$uname = '';
$phone = '';
$email = '';
if (isset($_POST['farmer_register'])) {
	//assigning variable and escaping injection
	$uname = htmlentities(mysqli_escape_string($connection, $_POST['uname']));
	$gender = htmlentities(mysqli_escape_string($connection, $_POST['gender']));
	$email = htmlentities(mysqli_escape_string($connection, $_POST['email']));
	$district = htmlentities(mysqli_escape_string($connection, $_POST['district']));
	$region = htmlentities(mysqli_escape_string($connection, $_POST['region']));
	$phone = htmlentities(mysqli_escape_string($connection, $_POST['phone']));
	$password = htmlentities(mysqli_escape_string($connection, $_POST['password']));
	$confirmPassword = htmlentities(mysqli_escape_string($connection, $_POST['confirmPassword']));
	//VALIDATING DATA
	//checking if is empty
	if (empty($uname) || empty($gender) || empty($email) || empty($phone) || empty($password) || empty($confirmPassword)) {
		$errors['empty-field'] = 'Fill all fields';
		//checking if password matches
	} elseif ($password !== $confirmPassword) {
		$errors['password-not-match'] = 'Password do not match';
		//checking if phone number has 10 digits
	} elseif (strlen($phone) !== 10) {
		$errors['Invalid-phone'] = 'Invalid Phone Number';
		//checking if phone number is number
	} elseif (!is_numeric($phone)) {
		$errors['Invalid-phone'] = 'Invalid Phone Number';
		//checking if is a string
	} elseif (!is_string($uname) || !is_string($gender) || !is_string($district) || !is_string($region)) {
		$errors['Invalid-characters'] = 'Invalid Characters';
		//checking if is valid email
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$errors['invalid-email'] = 'Invalid Email Address';
	} else {
		//checking if email if found in the database
		$farmer_email_check = mysqli_num_rows(mysqli_query($connection, "SELECT email FROM farmerz WHERE email = '$email' LIMIT 1"));
		if ($farmer_email_check == 1) {
			$errors['email_exist'] = 'Email already exists';
		} else {
			//checking if phone if found in the database
			$farmer_phone_check = mysqli_num_rows(mysqli_query($connection, "SELECT phone FROM farmerz WHERE phone = '$phone' LIMIT 1"));
			if ($farmer_phone_check == 1) {
				$errors['phone_exist'] = 'Phone Number already exists';
			} else {
				//hashing password
				$hashed_password = password_hash($password, PASSWORD_DEFAULT);
				//converting data before entering in the database
				$converted_uname = ucwords($uname);
				$converted_gender = ucwords($gender);
				$converted_region = ucwords($region);
				$converted_district = ucwords($district);
				$converted_email = strtolower($email);
				//inserting farmer into a database
				$inserting_farmer = mysqli_query($connection, "INSERT INTO farmerz(uname,gender,region,district,email,phone,password) VALUES ('$converted_uname','$converted_gender','$converted_region','$converted_district','$converted_email','$phone','$hashed_password')");
				if (!$inserting_farmer) {
					$errors['failed'] = 'Error in registering please try again later';
				} else {
					$name = ucwords($uname);
					$successes['success'] = "Dear $name Your successful registered please login to continue";
				}
			}
		}
	}
}
