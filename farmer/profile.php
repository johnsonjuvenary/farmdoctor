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
		<h1 class="card-header lead text-white bg-success text-center">Farmer Information</h1>
		<div class="card col-md-12">
			<table class="table embed-responsive table-borderless card-body">
				<tbody>
					<tr>
						<td class="font-weight-bold">Username </td>
						<td><?php echo $farmer_profile['uname']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Gender </td>
						<td><?php echo $farmer_profile['gender']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">District </td>
						<td><?php echo $farmer_profile['district']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Region </td>
						<td><?php echo $farmer_profile['region']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Phone Number </td>
						<td><?php echo $farmer_profile['phone']; ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Email Address </td>
						<td class="font-italic text-primary"><?php echo $farmer_profile['email']; ?></td>
					</tr>
				</tbody>
			</table>
			<div>
				<button class="btn btn-outline-success mr-3 my-3" onclick="window.location.href='update_profile.php';">Edit Profile</button>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>