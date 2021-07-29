<?php
$errors = [];
include('connection.php');
$gettig_id = mysqli_fetch_array(mysqli_query($connection, "SELECT id FROM farmerz WHERE email = '$_SESSION[farmer]' LIMIT 1"));
$ID = $gettig_id['id'];
if (isset($_POST['update'])) {
	$uname = htmlentities(mysqli_escape_string($connection, $_POST['uname']));
	$region = htmlentities(mysqli_escape_string($connection, $_POST['region']));
	$district = htmlentities(mysqli_escape_string($connection, $_POST['district']));
	$phone = htmlentities(mysqli_escape_string($connection, $_POST['phone']));
	$email = htmlentities(mysqli_escape_string($connection, $_POST['email']));
	//VALIDATING DATA
	if (strlen($phone) !== 10) {
		$errors['!phone'] = 'Invalid Phone Number';
	} elseif (!is_numeric($phone)) {
		$errors['!phone'] = 'Invalid Phone Number';
	} elseif (!is_string($uname)) {
		$errors['Invalidname'] = 'Invalid Username';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$error['!EMAIL'] = 'Invalid Email Address';
	} else {
		//checking file
		$profile_pic = $_FILES['profile_pic']['name'];
		$profile_pic_path = $_FILES['profile_pic']['tmp_name'];
		$profile_pic_size = $_FILES['profile_pic']['size'];
		$profile_pic_error = $_FILES['profile_pic']['error'];
		$profile_pic_type = $_FILES['profile_pic']['type'];
		//file extension
		$profile_pic_ext = explode('.', $profile_pic);
		$profile_pic_extension = strtolower(end($profile_pic_ext));
		//file type allowed
		$allowed_ext = array('jpg', 'jpeg', 'png');
		if (!in_array($profile_pic_extension, $allowed_ext)) {
			$errors['!profile_pic'] = 'Picture Failed To upload, file must either be jpeg,jpg or png';
		} elseif (!$profile_pic_error === 0) {
			$errors['!profilr'] = 'Picture Failed To upload';
		} else {
			//renaming profile picture as it may contain special characters or so that similar profile names to not get replaced
			$new_profile_pic_name = uniqid("", true) . "." . $profile_pic_extension;
			//move to profile pic directory
			$profile_pic_directory = 'profile_pics/' . $new_profile_pic_name;
			if (!move_uploaded_file($profile_pic_path, $profile_pic_directory)) {
				$errors['!failed'] = 'Failed to upload Picture try again';
			} else {
				//updating profile
				//converting  names before updating
				$converted_uname = ucfirst($uname);
				$converted_region = ucwords($region);
				$converted_district = ucwords($district);
				$converted_email = strtolower($email);
				//update
				$update_farmer =  mysqli_query($connection, "UPDATE farmerz SET uname = '$converted_uname', region ='$converted_region', district = '$converted_district', phone = '$phone', email = '$converted_email', profile_pic = '$new_profile_pic_name' WHERE id = '$ID'");
				// saving logs
				$log_name = 'updated profile';
				$insert_log = mysqli_query($connection, "INSERT INTO log(log_name,user) VALUES('$log_name','$email')");
				if (!$update_farmer && !$insert_log) {
					$errors['!update'] = 'Failed to Update profile, please try again later';
				} else {
					//storing session
					$_SESSION['farmer'] = $email;
					echo '
							<script>window.open("profile.php","_self")</script>
							';
				}
			}
		}
	}
}
