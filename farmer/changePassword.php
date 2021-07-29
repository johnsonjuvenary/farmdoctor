<?php include('header.php');
include('../process/changePasswordFarmer.php');
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
		<h1 class="card-header lead text-white bg-success text-center">Change Password</h1>
		<div class="card col-md-12">
			<form action="" method="POST" class="form-group my-3 pt-3 mb-5">
				<div class="row">
					<label for="" class="col-sm-3"></label>
					<div class="col-sm-7">
						<?php if (count($successes) > 0) : ?>
							<div class="alert alert-success">
								<?php foreach ($successes as $success) : ?>
									<?php echo $success; ?>
								<?php endforeach ?>
							</div>
						<?php endif ?>
					</div>
				</div>
				<div class="row">
					<label for="" class="col-sm-3"></label>
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
				<div class="form-row">
					<label for="" class="form-control-label col-md-3 mb-2">Current Password</label>
					<input type="password" name="oldpwd" class="form-control form-control-sm col-md-5 mb-2" placeholder="************************" required>
				</div>
				<div class="row">
					<label for="" class="form-control-label col-md-3 mb-2">New Password</label>
					<input type="password" name="newpwd" class="form-control form-control-sm col-md-5 mb-2" placeholder="************************" required>
				</div>
				<div class="row">
					<label for="" class="form-control-label col-md-3 mb-2">Confirm Password</label>
					<input type="password" name="cpwd" class="form-control form-control-sm col-md-5 mb-2" placeholder="************************" required>
				</div>
				<label for="" class="col-md-3"></label>
				<input type="submit" value="Change Password" name="change" class="form-control btn btn-outline-success col-sm-4 mt-2">
			</form>
		</div>
	</div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>