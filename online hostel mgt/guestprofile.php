<?php
include("header.php");
if(isset($_POST['submit']))
{
		//Update statement starts here
		$sql ="UPDATE guest SET name='$_POST[name]',emailid='$_POST[emailid]',contactno='$_POST[contactno]' WHERE  guestid='$_SESSION[guestid]'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('Guest profile updated successfully..');</SCRIPT>";
			echo "<script>window.location='guestprofile.php';</script>";
		}
		//Update statement ends here		
}
if(isset($_SESSION[guestid] ))
{
	$sqledit = "SELECT * FROM guest WHERE guestid='$_SESSION[guestid]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>


	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Guest</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree">
	
	<div class="form-group">
		<label>
			Name
		</label>
		<input class="form-control"  type="text" name="name"value="<?php echo $rsedit['name'];?>">
	</div>
	<div class="form-group">
		<label>
			Email ID
		</label>
		<input class="form-control" type="email" placeholder="Email ID" name="emailid" value="<?php echo $rsedit['emailid'];?>">
	</div>
	<div class="form-group">
		<label>
			Contact Number
		</label>
		<input class="form-control" type="text" name="contactno"value="<?php echo $rsedit['contactno'];?>">
	</div>

	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Submit</button>
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
	