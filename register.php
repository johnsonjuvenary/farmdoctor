<?php include('process/registerFarmer.php');
include('header.php');
?>
<!-- Page Content -->
<?php if (count($successes) > 0) : ?>
  <div class="container text-white col-md-5 my-5 py-5 form-background">
    <div class="alert alert-success">
      <?php foreach ($successes as $success) : ?>
        <?php echo $success; ?>
      <?php endforeach ?>
      <a href="login.php"> Login</a>
    </div>
  </div>
<?php else : ?>
  <div class="container text-white col-md-5 my-2 py-2 form-background">
    <div class="container col-md-5">
      <h1 class="lead mb-4">Farmer Registration</h1>
    </div>
    <form action="register.php" method="post" class="form-group" autocomplete="off">
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
        <label for="" class="col-sm-3 col-form-label">Username</label>
        <div class="col-sm-7">
          <input type="text" name="uname" class="form-control form-control-sm" value="<?php echo $uname; ?>" placeholder="Farmer Username..." required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">Gender</label>
        <div class="col-sm-7">
          <select name="gender" class="form-control form-control-sm" id="" required>
            <option value="#">Select Your Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">Region</label>
        <div class="col-sm-7">
          <select name="region" id="select1" onchange="populate('select1','select2')" class="form-control form-control-sm" required>
            <option value="">Select Region</option>
            <option value="ARUSHA">ARUSHA</option>
            <option value="DAR ES SALAAM">DAR-ES-SALAAM</option>
            <option value="DODOMA">DODOMA</option>
            <option value="GEITA">GEITA</option>
            <option value="IRINGA">IRINGA</option>
            <option value="KAGERA">KAGERA</option>
            <option value="KATAVI">KATAVI</option>
            <option value="KIGOMA">KIGOMA</option>
            <option value="KILIMANJARO">KILIMANJARO</option>
            <option value="LINDI">LINDI</option>
            <option value="MANYARA">MANYARA</option>
            <option value="MARA">MARA</option>
            <option value="MBEYA">MBEYA</option>
            <option value="MOROGORO">MOROGORO</option>
            <option value="MTWARA">MTWARA</option>
            <option value="MWANZA">MWANZA</option>
            <option value="NJOMBE">NJOMBE</option>
            <option value="PEMBA KUSINI">PEMBA-KUSINI</option>
            <option value="PEMBA KASKAZINI">PEMBA-KASKAZINI</option>
            <option value="PWANI">PWANI</option>
            <option value="RUKWA">RUKWA</option>
            <option value="RUVUMA">RUVUMA</option>
            <option value="SHINYANGA">SHINYANGA</option>
            <option value="SIMIYU">SIMIYU</option>
            <option value="SINGIDA">SINGIDA</option>
            <option value="SONGWE">SONGWE</option>
            <option value="TABORA">TABORA</option>
            <option value="TANGA">TANGA</option>
            <option value="UNGUJA MJINI">UNGUJA-MJINI</option>
            <option value="UNGUJA KUSINI">UNGUJA-KUSINI</option>
            <option value="UNGUJA KASKAZINI">UNGUJA-KASKAZINI</option>
          </select>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">District</label>
        <div class="col-sm-7">
          <select name="district" id="select2" class="form-control form-control-sm" required>
            <option value="#">Select District</option>
          </select>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">Email</label>
        <div class="col-sm-7">
          <input type="email" name="email" class="form-control form-control-sm" value="<?php echo $email; ?>" placeholder="farmer Email Address..." required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">Phone Number</label>
        <div class="col-sm-7">
          <input type="text" name="phone" class="form-control form-control-sm" value="<?php echo $phone; ?>" placeholder="farmer Phone Number..." required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">Password</label>
        <div class="col-sm-7">
          <input type="password" name="password" class="form-control form-control-sm" placeholder="****************" required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-3 col-form-label">Confirm Password</label>
        <div class="col-sm-7">
          <input type="password" name="confirmPassword" class="form-control form-control-sm" placeholder="****************" required>
        </div>
      </div>
      <div class="row mb-2">
        <label for="" class="col-sm-4"></label>

        <input type="submit" value="Register" name="farmer_register" class="form-control btn btn-success col-sm-6">
      </div>
    </form>
    <div class="small mb-2">
      <span>Already have account? <a href="login.php" class="text-warning">click here</a></span>
    </div>
  <?php endif; ?>
  </div>
  <!-- Footer -->
  <?php include('footer.php'); ?>