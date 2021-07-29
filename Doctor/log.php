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
        <img src="profile_pics/<?php echo $doctor_profile['profile_pic']; ?>" alt="farmer profile pic" class="rounded mx-auto d-block img-fluid" style="width:100%;">
        <p class="text-center">Farm Doctor</p>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <h1 class="card-header lead text-white bg-success text-center"> System Logs</h1>
    <div class="card col-md-12">
      <?php
      $logs = mysqli_query($connection, "SELECT * FROM log");
      if (mysqli_num_rows($logs) == 0) : ?>
        <div class="alert alert-warning">
          no logs
        </div>
    </div>
  </div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>
<?php else : ?>
  <div>
    <table class="table table-info table-responsive">
      <thead>
        <tr>
          <th>Log ID</th>
          <th>Log Name</th>
          <th>User</th>
          <th>Time </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php while ($row = mysqli_fetch_array($logs)) : ?>
            <td><?php echo $row['log_id']; ?></td>
            <td><?php echo $row['log_name']; ?></td>
            <td><?php echo $row['user']; ?></td>
            <td><?php echo $row['time_happend']; ?></td>
        </tr>

      <?php endwhile ?>

      </tbody>
    </table>
  </div>
<?php endif; ?>
</div>
</div>
</div>
<!-- Footer -->
<footer class="py-3 bg-success ">
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