<?php include('header.php');
include('../process/connection.php');
?>
<!-- Page Content -->
<div class="row col-md-10 mb-2 my-4 mr-2 ml-5">
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
		<h1 class="card-header lead text-white bg-success text-center">Feedback</h1>
		<div class="card col-md-12">
			<div class="row small">
				<div class="mt-3 col-md-12">
					<div class="card bg-dark text-white">
						<?php $doc = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM farmdoctor"));
						$farmerProblem = mysqli_query($connection, "SELECT * FROM farmerproblem WHERE farmer = '$_SESSION[farmer]'");
						if (mysqli_num_rows($farmerProblem) == 0) : ?>
							<div class="card-header text-left font-weight-bold"><?php echo $farmer_profile['uname']; ?></div>
							<div class="card-body">
								<span>None..</span>
								<footer class="blockquote-footer text-white">farmer</footer>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php else : ?>
	<div class="card-header font-weight-bold"><?php echo $farmer_profile['uname']; ?></div>
	<div class="row">
		<div class="col-md-2">
			<img src="profile_pics/<?php echo $farmer_profile['profile_pic']; ?>" alt="farmer pic" class="rounded mx-auto d-block img-fluid" style="width:100%;">
		</div>
		<div class="col-md-10">
			<div class="card-body bg-dark text-muted mb-2">
				<?php
							//farmer message
							$problem = mysqli_fetch_array($farmerProblem);
							echo $problem['message'];
				?>
			</div>
		</div>
	</div>
	<?php
							$doctor = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM doctorreply,farmdoctor WHERE doctorreply.doctor = farmdoctor.id"));
	?>
	<div class="card-header font-weight-bold text-right"><?php echo $doctor['name']; ?></div>
	<div class="row mb-2">
		<div class="col-md-10">
			<div class="card-body">
			<?php $reply = mysqli_fetch_array(mysqli_query($connection, "SELECT * FROM doctorreply WHERE farmer = '$_SESSION[farmer]'"));
							echo $reply['message'];
						endif;
			?>
			</div>
		</div>
		<div class="col-md-2 mt-2">
			<img src="../doctor/profile_pics/<?php echo $doctor['profile_pic']; ?>" alt="doctor pic" class="rounded mx-auto d-block img-fluid" style="width:100%;">
		</div>
	</div>
	<footer class="blockquote-footer text-white">reply</footer>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include('footer.php'); ?>