<?php include('header.php');
include('../process/connection.php');
?>
<!-- Page Content -->
<div class="row col-md-10 my-4 mr-2 ml-5">
	<div class="col-md-3">
		<?php
		$farmer_profile = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM farmerz WHERE email = '$_SESSION[farmer]' LIMIT 1"));
		?>
		<h1 class="card-header lead text-white bg-success text-center"><?php echo $farmer_profile['uname']; ?></h1>
		<div class="card col-md-12">
			<div class="card-header">
				<img src="profile_pics/<?php echo $farmer_profile['profile_pic']; ?>" alt="farmer profile pic" class="rounded mx-auto d-block img-fluid" style="width:100%;">
				<p class="text-center">Farmer</p>
			</div>
		</div>
	</div>
	<div class="col-md-8">
		<h1 class="card-header lead text-white bg-success text-center">Welcome</h1>
		<div class="card col-md-12 mb-3">
			<div class="card-body">
				<h1 class="lead font-weight-bold"> WE TRANSFORM TRADITIONAL AGRICULTURE SYSTEM TO MODERN AND ADVANCE AGRICULTURE SYSTEM AROUND THE WORLD </h1>
				<p> We are here to serve you, dear farmer with whatever problem or challenge that you are facing in your daily Agriculture System Practices so whatever you are facing go to compose link and compose your problem and challenge that your are facing and professional will provide you with different kind of solution to you. And also futhermore we provide advice on how to overcome those problem </p>

				<p>We here to connect you to the world new farming practices around different places around the world and keep you on the scale of framing practice production and advance of the farming tool technologies and the right type of manure and fertilizer to use in your farming practices</p>

				<p> We are here to serve you and bring you close to your dreams of becoming one of the most influence people in Agriculture System in the country</p>


			</div>
		</div>
	</div>
</div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>