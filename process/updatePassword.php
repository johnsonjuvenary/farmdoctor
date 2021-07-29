<?php
$errors = [];
$successes = [];
include('connection.php');

if (isset($_POST['passwordReset']) && isset($_POST['key']) && isset($_POST['reset'])) {
  $email = html_entity_decode(mysqli_escape_string($conn, $_POST['email']));
  $password = htmlentities(mysqli_escape_string($connection, $_POST['password']));
  $passwordConfirm = htmlentities(mysqli_escape_string($connection, $_POST['passwordConfirm']));

  if ($passwordConfirm !== $password) {
    $errors['notmatch'] = 'Password Do not Match';
  } else {
    //email check
    $email_check = mysqli_query($connection, "SELECT email FROM farmerz WHERE email = '$email' LIMIT 1");
    if (mysqli_num_rows($email_check) == 0) {
      $errors['failed'] = 'Failed Try again later';
    } else {
      //hashing new password
      $hashing_new_password = password_hash($password, PASSWORD_DEFAULT);
      //updating password
      $update = mysqli_query($connection, "UPDATE farmerz SET password = '$hashing_new_password' WHERE email = '$email'");
      if (!$update) {
        $errors['failed'] = 'Failed Try again later';
      } else {
        $successes['reset'] = 'Password Recovered Successful';
      }
    }
  }
}
