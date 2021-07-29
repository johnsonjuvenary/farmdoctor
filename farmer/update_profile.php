<?php include('header.php');
include('../process/update_profileFarmer.php');
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
		<h1 class="card-header lead text-white bg-success text-center">Edit Information</h1>
		<div class="card col-md-12">
			<form action="" method="POST" class="form-group my-3 pt-3" enctype="multipart/form-data">
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
					<label for="" class="form-control-label col-md-3 font-weight-bold mb-2">Username</label>
					<input type="text" name="uname" class="form-control form-control-sm col-md-5 mb-2" value="<?php echo $farmer_profile['uname']; ?>" required>
				</div>
				<div class="row">
					<label for="" class="form-control-label col-md-3 font-weight-bold mb-2">Gender</label>
					<input type="text" class="form-control form-control-sm col-md-5 mb-2" value="<?php echo $farmer_profile['gender']; ?>" readonly>
				</div>
				<div class="row">
					<label for="" class="form-control-label col-md-3 font-weight-bold mb-2">Region</label>
					<select name="region" id="select1" onchange="populate('select1','select2')" class="form-control form-control-sm col-sm-5 mb-2" required>
						<option value=""><?php echo $farmer_profile['region']; ?></option>
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
				<div class="row">
					<label for="" class="form-control-label col-md-3 font-weight-bold mb-2">District</label>
					<select name="district" id="select2" class="form-control form-control-sm col-md-5 mb-2" required>
						<option value="#"><?php echo $farmer_profile['district'] ?></option>
					</select>
				</div>
				<div class="row">
					<label for="" class="form-control-label col-md-3 font-weight-bold mb-2">Phone Number</label>
					<input type="text" name="phone" class="form-control form-control-sm col-md-5 mb-2" value="<?php echo $farmer_profile['phone']; ?>" required>
				</div>
				<div class="row">
					<label for="" class="form-control-label col-md-3 font-weight-bold mb-2">Email Address</label>
					<input type="text" name="email" class="form-control form-control-sm col-md-5 mb-2" value="<?php echo $farmer_profile['email']; ?>" required>
				</div>
				<div class="row">
					<label for="" class="form-control-label col-md-3 font-weight-bold mb-2">Your Picture</label>
					<input type="file" name="profile_pic" id="" class="form-control form-control-sm mb-2 col-md-5" required>
				</div>
				<label for="" class="col-md-3"></label>
				<input type="submit" value="Update Profile" name="update" class="form-control btn btn-outline-success col-sm-4 mt-2">
			</form>
			<div>
			</div>
		</div>
	</div>
</div>
<!-- Footer -->
<?php include('footer.php'); ?>