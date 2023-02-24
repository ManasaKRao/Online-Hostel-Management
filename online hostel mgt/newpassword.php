<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "UPDATE hosteller SET password='$_POST[password]' WHERE hostellerid='$_SESSION[custnewpasswordid]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		echo "<SCRIPT>alert('Password updated successfully..');</SCRIPT>";
		echo "<script>window.location='index.php';</script>";
		echo mysqli_error($con);
	}
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item">
				<a href="index.php">Home</a>
			</li>
		</ol>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Change password</h3>
				<div class="arrw">
					<i class="fa fa-glass" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree">

	<div class="form-group">
		<label>
			New password
		</label>
		<input class="form-control" type="password" name="password" >
	</div>
	<div class="form-group">
		<label>
			Confirm password
		</label>
		<input class="form-control" type="password" name="cpassword" >
	</div>
	

	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Change password</button>
	</div>
</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //contact -->

	<?php
	include("footer.php");
	?>