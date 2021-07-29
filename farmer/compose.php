<?php include('header.php');
include('../process/composeFarmer.php');
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
		<h1 class="card-header lead text-white bg-success text-center">Compose Your Problem</h1>
		<div class="card col-md-12">
			<div class="form-group mt-3">
				<form action="" method="POST" enctype="multipart/form-data">
					<div>
						<?php if (count($errors) > 0) : ?>
							<div class="alert alert-danger">
								<?php foreach ($errors as $error) : ?>
									<?php echo $error; ?>
								<?php endforeach ?>
							</div>
						<?php endif ?>
					</div>
					<div>
						<?php if (count($successes) > 0) : ?>
							<div class="alert alert-success">
								<?php foreach ($successes as $success) : ?>
									<?php echo $success; ?>
								<?php endforeach ?>
							</div>
						<?php endif ?>
					</div>
					<label for="" class="form-control-label">Compose here</label>
					<textarea name="problem" id="" class="form-control mb-2" placeholder="Compose here..." required></textarea>
					<label for="" class="form-control-label mb-2">Attachment</label>
					<input type="file" name="attachment" class="form-control">
					<div class="row mt-3">
						<div class="col-md-9"></div>
						<div class="col-md-3">
							<input type="submit" value="Compose Now" name="ask" class="form-control btn btn-outline-success">
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>