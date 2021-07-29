<?php
include('process/loginDoctor.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Farm Doctor | Welcome</title>
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap/bootstrap.min.css" rel="stylesheet">
  <!-- Custom style -->
  <link href="css/custom.css" rel="stylesheet">
  <!-- fontawesome icon -->
  <link rel="stylesheet" type="text/css" href="css/fontawesome/css/all.min.css">
  <!-- favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/tree-2.png">
</head>

<body class="bg-doc">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light bg-success fixed-top">
    <div class="container">
      <a href="#" class="navbar-brand"><img src="images/tree-2.png" alt="logo" style="height: 40px; width: 60px"></a>
      <a class="navbar-brand text-white font-weight-bold" href="#">Farm Doctor</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto ">
          <li class="nav-item active">
            <a class="nav-link text-white" href="index.php"> Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="doctor.php"> Doctor</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="about.php"> About</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
<!-- Page Content -->
<div class="container text-white col-md-4 my-5 py-5 mt-4 form-background">
  <div class="container col-md-7">
    <h1 class="lead mb-4">Farm Doctor | Login</h1>
  </div>
  <form action="" method="post" class="form-group">
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
    <div class="row mb-2">
      <label for="" class="col-sm-3 col-form-label">Name</label>
      <div class="col-sm-7">
        <input type="text" name="name" class="form-control form-control-sm" value="<?php echo $name; ?>" placeholder="Farm Doctor Name..." required>
      </div>
    </div>
    <div class="row mb-2">
      <label for="" class="col-sm-3 col-form-label">Password</label>
      <div class="col-sm-7">
        <input type="password" name="password" class="form-control form-control-sm" placeholder="****************" required>
      </div>
    </div>
    <div class="row mb-3">
      <label for="" class="col-sm-4 col-form-label"></label>
      <input type="submit" value="login" name="doctor_login" class="form-control btn btn-success col-sm-5">
    </div>
  </form>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>