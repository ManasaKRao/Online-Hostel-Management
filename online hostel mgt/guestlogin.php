<?php
include("header.php");
if(isset($_SESSION['guestid']))
{
	echo "<script>window.location='guestaccount.php';</script>";
}
if(isset($_POST['submit']))
{
	$sql ="SELECT * FROM guest WHERE emailid='$_POST[login_id]' AND password='$_POST[password]' AND status='Active'";
	$qsql=mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_num_rows($qsql)==1)
	{
		$rs= mysqli_fetch_array($qsql);
		$_SESSION['guestid'] = $rs['guestid'];
		$_SESSION['guesttype'] = $rs['guestid'];
		echo "<script>window.location='guestaccount.php';</script>";
	}
	else
	{
			echo "<script>viewmessagebox('You have entered invalid login credentials..','guestlogin.php')</script>";
	}
}
?>
</div>
	<!-- //banner -->
	<!-- page details -->

	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Guest Login Portal</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
	<div class="form-group">
		<label>
			Email Id <span id="idlogin_id" class="errclass" ></span> 
		</label>
		<input class="form-control"  type="text" name="login_id">
		</div>
	<div class="form-group">
		<label>
			Password <span id="idpassword" class="errclass" ></span> 
		</label>
		<input class="form-control"  type="password" name="password" maxlength="8">
	</div>
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Click here to Login</button>
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
<script>
function validateform()
{
	$(".errclass").html('');
	var errstatus = "true";
	if(document.frmform.login_id.value == "")
	{
		document.getElementById("idlogin_id").innerHTML = " Login ID should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.password.value == "")
	{
		document.getElementById("idpassword").innerHTML = " Password should not be empty...";
		errstatus = "false";
	}
	if(errstatus == "true")
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>