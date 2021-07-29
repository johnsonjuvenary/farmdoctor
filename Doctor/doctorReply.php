<?php
include('header.php');
include('../process/connection.php');
if (isset($_GET['fmail'])) {
  $farmer_email = $_GET['fmail'];
  $update = mysqli_query($connection, "UPDATE farmerproblem SET seenByDoctor ='Yes' WHERE farmer='$farmer_email'");
}
?>
<!-- Page Content -->
<div class="row col-md-10 my-4 mr-2 ml-5">
  <div class="col-md-3">
    <?php
    $doctor_profile = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM farmdoctor WHERE id = '$_SESSION[doctor]' LIMIT 1"));
    ?>
    <h1 class="card-header lead text-white bg-success text-center"><?php echo $doctor_profile['name']; ?></h1>
    <div class="card col-md-12">
      <div class="card-header">
        <img src="profile_pics/<?php echo $doctor_profile['profile_pic']; ?>" alt="doctor profile pic" class="rounded mx-auto d-block img-fluid" style="width:100%;">
        <p class="text-center">Farm Doctor</p>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <?php $farmer = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM farmerz WHERE email = '$farmer_email' LIMIT 1")); ?>
    <h1 class="card-header lead text-white bg-success text-center"> To: <?php echo $farmer['uname']; ?></h1>
    <div class="card col-md-12">
      <div class="card-body">
        <?php $farmer_message = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM farmerproblem WHERE farmer = '$farmer_email' LIMIT 1")); ?>
        <div class="card small mb-3 bg-dark text-white">
          <div class="card-header ">From <span class="font-weight-bold"><?php echo $farmer['uname']; ?></span> <span class="text-warning">&#9733; &#9733; &#9733;</span></div>
          <div class="card-body">
            <div class="row">
              <div class="col-md-2">
                <img src="../farmer/profile_pics/<?php echo $farmer['profile_pic']; ?>" alt="farmer profile pic" class="rounded mx-auto d-block img-fluid" style="width:100%;">
              </div>
              <div class="col-md-10 text-muted">
                <?php echo $farmer_message['message']; ?> <br>
                <?php $farmer_attachment = $farmer_message['attachment']; ?>
                <?php echo "<a href='../farmer/attachments/$farmer_attachment' target='_blank'> ~ Attachment ~</a>"; ?>
              </div>
            </div>
          </div>
          <footer class="blockquote-footer text-white">farmer</footer>
        </div>
        <?php
        $docReply = mysqli_query($connection, "SELECT * FROM doctorreply WHERE farmer = '$farmer_email'");
        if (mysqli_num_rows($docReply) == 0) : ?>
          <form action="" method="POST" class="form-group mb-3 mt-3">
            <label for="" class="form-control-label">~ Reply</label>
            <textarea name="rep" class="form-control" placeholder="Reply..." required></textarea>
            <input type="submit" value="Reply" class="btn btn-success mt-3" name="reply">
          </form>
          <?php
          if (isset($_POST['reply'])) {
            $reply = htmlentities(mysqli_escape_string($connection, $_POST['rep']));
            $send = mysqli_query($connection, "INSERT INTO doctorreply(message,farmer,doctor) VALUES('$reply','$farmer_email','$_SESSION[doctor]')");
            // saving logs
            $doc_name = $doctor_profile['name'];
            $log_name = 'Replied';
            $insert_log = mysqli_query($connection, "INSERT INTO log(log_name,user) VALUES('$log_name','$doc_name')");
            if ($send) {
              echo "
            <script>
            alert('Replied')
            window.open('reply.php','_self')
            </script>
            ";
            }
          }
          ?>
      </div>
    </div>
  </div>
</div>
<?php include('footer.php'); ?>
<?php else : ?>
  <div class="card small bg-success text-white">
    <div class="card-header text-right font-weight-bold"><?php echo $doctor_profile['name']; ?></div>
    <div class="card-body">
      <?php $docResult = mysqli_fetch_array($docReply); ?>
      <div class="row">
        <div class="col-md-9">
          <?php echo $docResult['message']; ?>
        </div>
        <div class="col-md-2">
          <img src="profile_pics/<?php echo $doctor_profile['profile_pic']; ?>" alt="doctor pic" class="rounded mx-auto d-block img-fluid" style="width:100%;">
        </div>
      </div>

    </div>
    <footer class="blockquote-footer text-white">reply</footer>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Footer -->
  <?php include('footer.php'); ?>
<?php endif; ?>