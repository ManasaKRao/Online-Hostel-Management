<?php
include("header.php");
if(isset($_SESSION['hostellerid']))
{
	echo "<script>window.location='hostelleraccount.php';</script>";
}
if(isset($_POST['submit']))
{	
	$sql ="SELECT * FROM hosteller WHERE emailid='$_POST[login_id]' AND status='Active'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsql)==1)
	{
		$rslogin = mysqli_fetch_array($qsql);
		$_SESSION['custnewpasswordid'] = $rslogin['hostellerid'];
		echo "<SCRIPT>alert('We have sent password recovery mail to your Registered Mail ID..')</SCRIPT>";
		$currenturl = "http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/newpassword.php";
		$to = $rslogin['emailid'];
		$subject = "Password Recovery Mail from SRCH Hostel";
		$txt = "<b>Hello $rslogin[name],</b> <br><br> We recently received a request to recover the SRCH Hostel Account $rslogin[emailid]. If you sent request, please click on this <a href='$currenturl'><b>Reset Link</b></a> to Change password. This password reset link will expire in 24 hours.";
		// Always set content-type when sending HTML email
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		$headers .= "From: srch@technopulse.online";
		include("mail.php");
		echo "<script>window.location='index.php';</script>";
	}
	else
	{
		echo "<script>alert('You have entered invalid login credentials..');</script>";
	}
}
?>
</div>
	<!-- //banner -->

	<!-- contact -->
	<section class="contact-wthree" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Hosteller login Portal</h3>
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
			Email ID
		</label>
		<input class="form-control"  type="text" name="login_id">
	</div>
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Click here to Recover Password</button>
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