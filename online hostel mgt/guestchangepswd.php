<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "UPDATE guest SET password='$_POST[npassword]' WHERE guestid='$_SESSION[guestid]' AND password='$_POST[opassword]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		echo "<SCRIPT>alert('Password updated successfully..');</SCRIPT>";
	
	}
	else
	{
		echo "<SCRIPT>alert('Failed to update password....');</SCRIPT>";
	}
}
?>
	</div>
	

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
<form action="" method="post" class="register-wthree"  name="frmform" onsubmit="return validateform()">
	<div class="form-group">
		<label>
			Old password
		</label>
		<input class="form-control" type="password" name="opassword" value="<?php echo $rsedit['password'];?>" required="required">
	</div>
	<div class="form-group">
		<label>
			New password
		</label><span class="errclass" id="idpassword"></span>
		<input class="form-control" type="password" name="npassword" value="<?php echo $rsedit['password'];?>" required="required" >
	</div>
	<div class="form-group">
		<label>
			Confirm password
		</label><span class="errclass" id="idcpassword"></span>
		<input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" value="<?php echo $rsedit['password'];?>" required="required">
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
	  <script>
function validateform()
{
	
	$(".errclass").html('');
	
	var errstatus = "true";
    
    
    
    
    	
	if(document.frmform.npassword.value.length<6)
	{
		document.getElementById("idpassword").innerHTML = "Password should contain more than 6 characters.....";
		errstatus = "false";
	}
	if(document.frmform.npassword.value == "")
	{
		document.getElementById("idpassword").innerHTML = "Password should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.cpassword.value == "")
	{
		document.getElementById("idcpassword").innerHTML = "Confirm password should not be empty...";    
		errstatus = "false";
	}
	if(document.frmform.npassword.value != document.frmform.cpassword.value)
	{
		document.getElementById("idcpassword").innerHTML = "Password and Confirm password not matching...";
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