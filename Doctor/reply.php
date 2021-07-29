<?php include('header.php');
include('../process/connection.php');
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
  <div class="col-md-9">
    <h1 class="card-header lead text-white bg-success text-center"> Doctor Reply</h1>
    <div class="card col-md-12 mb-2">
      <?php
      $farmer_messages = mysqli_query($connection, "SELECT * FROM farmerproblem");
      if (mysqli_num_rows($farmer_messages) == 0) : ?>
        <div class="card-header"></div>
        <div class="card-body">
          <div class="alert alert-warning">
            None...
          </div>
        </div>
    </div>
  </div>
</div>
<?php else : ?>
  <div class="table small mt-2">
    <table class="table-responsive table-active">
      <thead>
        <tr>
          <th>Message</th>
          <th>Attachment</th>
          <th>Farmer</th>
          <th>Time</th>
          <th>seen</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          while ($messages = mysqli_fetch_array($farmer_messages)) : ?>
            <td><?php echo $messages['message']; ?></td>
            <?php $attachment_farmer = $messages['attachment']; ?>
            <td><?php echo "<a href='../farmer/attachments/$attachment_farmer' target='_blank'>Farmer Attachment</a>"; ?></td>
            <td><?php echo $messages['farmer']; ?></td>
            <td><?php echo $messages['time']; ?></td>
            <?php if ($messages['seenByDoctor'] == 'No') : ?>
              <td class="text-danger"><?php echo $messages['seenByDoctor']; ?></td>
              <td><button class="btn btn-primary text-center" onclick="window.location.href='doctorReply.php?fmail=<?php echo $messages['farmer'] ?>';">Reply</button></td>
            <?php else : ?>
              <td class="text-success"><?php echo $messages['seenByDoctor']; ?><span class="text-warning">&#9733;</span></td>
              <td><button class="btn btn-success text-center" onclick="window.location.href='doctorReply.php?fmail=<?php echo $messages['farmer'] ?>';">Replied<span class="text-warning">&#9733;</span></button></td>
            <?php endif; ?>
        </tr>
      <?php endwhile; ?>
      </tbody>
    </table>
  <?php endif; ?>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  </div>
  <!-- Footer -->
  <footer class="py-3 bg-success">
    <div class="container">
      <p class="m-0 text-center text-white">&copy; 2020 Farm Doctor</p>
    </div>
  </footer>
  <!-- Bootstrap core JavaScript -->
  <script src="../js/jquery/jquery.min.js"></script>
  <script src="../js/js/bootstrap.bundle.min.js"></script>
  <script src="../js/custom.js"></script>
  </body>

  </html>