<?php
//include connection
include('connection.php');
$errors = [];
$successes = [];
if ($_GET['email']) {
  $email = $_GET['email'];
}
?>
<?php
if (isset($_POST['password_reset'])) {
  $newpwd = htmlentities(mysqli_escape_string($connection, $_POST['newpwd']));
  $confirmpwd = htmlentities(mysqli_escape_string($connection, $_POST['confirmpwd']));
  //VALIDATINF DATA
  if (empty($newpwd) || empty($confirmpwd)) {
    $errors['empty'] = 'Password cannot be empty';
  } elseif ($newpwd !== $confirmpwd) {
    $errors['notmatch'] = 'Passwords must match';
  } else {
    //checking if user exists
    $email_check = mysqli_query($connection, "SELECT * FROM farmerz WHERE email = '$email' LIMIT 1");
    if (mysqli_num_rows($email_check) == 0) {
      $errors['invalidemail'] = 'Invalid User';
    } else {
      //hashing password before inserting it in the database
      $hashing_password = password_hash($newpwd, PASSWORD_DEFAULT);
      //updating password
      $update = mysqli_query($connection, "UPDATE farmerz SET password = '$hashing_password' WHERE email ='$email'");
      if (!$update) {
        $errors['failed'] = 'Failed please try again later';
      } else {
        $successes['succes'] = 'Password Recovered Sucessful, Please click ';
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Farm Doctor | Reset Password</title>
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom style -->
  <link href="../css/custom.css" rel="stylesheet">
  <!-- fontawesome icon -->
  <link rel="stylesheet" type="text/css" href="../css/fontawesome/css/all.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="../images/tree-2.png">
</head>

<body class="bg-img">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
    <div class="container">
      <a href="#" class="navbar-brand"><img src="../images/tree-2.png" alt="logo" style="height: 40px; width: 60px"></a>
      <a class="navbar-brand text-white font-weight-bold" href="#">Farm Doctor</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item active">
            <a class="nav-link text-white" href="../index.php"> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="../doctor.php"> Doctor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="../about.php"> About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Page Content -->
  <?php if (count($successes) > 0) : ?>
    <div class="container text-white col-md-5 my-5 py-5 form-background">
      <div class="alert alert-success">
        <?php foreach ($successes as $success) : ?>
          <?php echo $success; ?>
        <?php endforeach ?>
        <a href="../login.php">Here</a> to login.
      </div>
    </div>
  <?php else : ?>
    <div class="container text-white col-md-4 my-5 py-5 mt-4 form-background">
      <div class="container col-md-7">
        <h1 class="lead mb-4">Password Recovery</h1>
      </div>
      <form action="" method="post" class="form-group" autocomplete="off">
        <div class="row mb-2">
          <label for="" class="col-sm-3 col-form-label"></label>
          <div class="col-sm-7">
            <?php if (count($errors) > 0) : ?>
              <div class="alert alert-danger">
                <?php foreach ($errors as $error) : ?>
                  <?php echo $error; ?>
                <?php endforeach ?>
              </div>
            <?php endif ?>
          </div>
        </div>
        <div class="container col-sm-9">
          <label for="">New Password</label>
          <input type="password" name="newpwd" class="form-control form-control-sm" placeholder="************" required>
          <label for="">Confirm Password</label>
          <input type="password" name="confirmpwd" class="form-control form-control-sm" placeholder="************" required>

        </div>
        <div class="row mt-3">
          <label for="" class="col-sm-4 col-form-label"></label>
          <input type="submit" value="Password Reset" name="password_reset" class="form-control btn btn-success col-sm-5">
        </div>
      </form>
    <?php endif; ?>
    </div>
    <!-- Footer -->
    <?php include('../footer.php'); ?>