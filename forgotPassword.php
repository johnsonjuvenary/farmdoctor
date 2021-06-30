<?php include('process/forgotPasswordFarmer.php');
include('header.php');
?>
<!-- Page Content -->
<?php if (count($successes) > 0) : ?>
  <div class="container text-white col-md-5 my-5 py-5 form-background">
    <div class="alert alert-success">
      <?php foreach ($successes as $success) : ?>
        <?php echo $success; ?>
      <?php endforeach ?>
      <a href="process/reset_password.php?email=<?php echo $email_row; ?>">Here</a>
    </div>
  </div>
<?php else : ?>
  <div class="container text-white col-md-4 my-5 py-5 mt-4 form-background">
    <div class="container col-md-7">
      <h1 class="lead mb-4">Password Reset</h1>
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
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-7">
          <input type="email" name="email" class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder="Farmer Email Address..." required>
        </div>
      </div>
      <div class="row mb-3">
        <label for="" class="col-sm-4 col-form-label"></label>
        <input type="submit" value="Password Reset" name="farmer_password_reset" class="form-control btn btn-success col-sm-5">
      </div>
    </form>
  <div class="small mb-3">
    <span>Got Password? <a href="login.php" class="text-warning">click here</a></span>
  </div>
  <?php endif; ?>
  </div>
  <!-- Footer -->
  <?php include('footer.php'); ?>