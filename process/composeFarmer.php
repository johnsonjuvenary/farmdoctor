<?php
$errors = [];
$successes = [];
include('connection.php');
if (isset($_POST['ask'])) {
  $problem = htmlentities(mysqli_escape_string($connection, $_POST['problem']));
  //checking file
  $attachment = $_FILES['attachment']['name'];
  $attachment_path = $_FILES['attachment']['tmp_name'];
  $attachment_size = $_FILES['attachment']['size'];
  $attachment_error = $_FILES['attachment']['error'];
  $attachment_type = $_FILES['attachment']['type'];
  //file extension
  $attachment_ext = explode('.', $attachment);
  $attachment_extension = strtolower(end($attachment_ext));
  //file type allowed
  $allowed_ext = array('jpg', 'jpeg', 'png', 'pdf');
  if (!in_array($attachment_extension, $allowed_ext)) {
    $errors['!attachment'] = 'Attachment Failed To upload, file must either be jpeg,jpg,pdf or png';
  } elseif (!$attachment_error === 0) {
    $errors['!attachment'] = 'Attachment Failed To upload';
  } else {
    //renaming profile picture as it may contain special characters or so that similar profile names to not get replaced
    $new_attachment_name = uniqid("", true) . "." . $attachment_extension;
    //move to profile pic directory
    $attachment_directory = 'attachments/' . $new_attachment_name;
    if (!move_uploaded_file($attachment_path, $attachment_directory)) {
      $errors['!failed'] = 'Attachment to upload Picture try again';
    } else {
      //inserting qn
      $insert_problem = mysqli_query($connection, "INSERT INTO farmerproblem (message,attachment,farmer) VALUES('$problem','$new_attachment_name','$_SESSION[farmer]')");
      // saving logs
      $log_name = 'composed problem';
      $insert_log = mysqli_query($connection, "INSERT INTO log(log_name,user) VALUES('$log_name','$_SESSION[farmer]')");
      if (!$insert_problem && !$insert_log) {
        $errors['failed'] = 'Failed, Try again';
      } else {
        $successes['success'] = 'Thanks for asking we will get back to you shortly';
      }
    }
  }
}
