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
  <div class="col-md-9">
    <h1 class="card-header lead text-white bg-success text-center"> Farmers</h1>
    <div class="card col-md-12">
      <div class="card-body">
        <?php $farmer = mysqli_query($connection, "SELECT * FROM farmerz");
        if (mysqli_num_rows($farmer) == 0) : ?>
          <div class="alert alert-warning">
            None...
          </div>
      </div>
    </div>
  </div>
</div>
<?php else : ?>
  <div class="table small">
    <table class="table-responsive table-active">
      <thead>
        <tr>
          <th>Picture</th>
          <th>Farmer Name</th>
          <th>Gender</th>
          <th>Region</th>
          <th>District</th>
          <th>Email</th>
          <th>Phone</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <?php
          while ($farmerz = mysqli_fetch_array($farmer)) : ?>
            <td><img src="../farmer/profile_pics/<?php echo $farmerz['profile_pic']; ?>" alt="farmer profile pic" class="rounded mx-auto d-block img-fluid" style="width:100%;"></td>
            <td><?php echo $farmerz['uname']; ?></td>
            <td><?php echo $farmerz['gender']; ?></td>
            <td><?php echo strtolower($farmerz['region']); ?></td>
            <td><?php echo strtolower($farmerz['district']); ?></td>
            <td><?php echo $farmerz['email']; ?></td>
            <td><?php echo $farmerz['phone']; ?></td>
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