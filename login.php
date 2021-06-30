<?php
include('process/loginFarmer.php');
include('header.php');
?>
<!-- Page Content -->
<div class="container text-white col-md-4 my-5 py-5 mt-4 form-background">
  <div class="container col-md-7">
    <h1 class="lead mb-4">Welcome Back | Login</h1>
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
      <label for="" class="col-sm-3 col-form-label">Email</label>
      <div class="col-sm-7">
        <input type="email" name="email" class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder="Farmer Email Address..." required>
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
      <input type="submit" value="login" name="farmer_login" class="form-control btn btn-success col-sm-5">
    </div>
  </form>
  <div class="small mb-3">
    <span>Forgot Password? <a href="forgotPassword.php" class="text-warning">click here</a></span>
  </div>
  <div class="small">
    <span>Do not have account? <a href="register.php" class="text-warning">click here</a></span>
  </div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>