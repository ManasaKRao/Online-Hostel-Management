<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE guest SET name='$_POST[name]',visitreason='$_POST[visitreason]',emailid='$_POST[emailid]',password='$_POST[password]',contactno='$_POST[contactno]',comment='$_POST[comment]',fromdate='$_POST[fromdate]',todate='$_POST[todate]',status='$_POST[status]'WHERE  guestid='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('record updated successfully..');
			//echo "<script>window.location='viewguest.php';
			echo "<script>viewmessagebox('guest record updated successfully  ....','viewguest.php')</script>";
		}
		//Update statement ends here		
	}
	else
	{
	$sql = "INSERT INTO guest(name,visitreason,emailid,password,contactno,comment,fromdate,todate,status)VALUES('$_POST[name]','$_POST[visitreason]','$_POST[emailid]','$_POST[password]','$_POST[contactno]','$_POST[comment]','$_POST[fromdate]','$_POST[todate]','Active')";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		//echo "<SCRIPT>alert('Guest Registration Completed successfully..');</
		//echo "<script>window.location='guestlogin.php';
		echo "<script>viewmessagebox('Guest Registration Completed successfully....','guestlogin.php')</script>";
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM guest WHERE guestid='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->

	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Guest Registration</h3>
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
			Name
		</label><span class="errclass" id="idname"></span>
		<input class="form-control"  type="text" name="name" placeholder="Enter Name" value="<?php echo $rsedit['name'];?>">
	</div>
	<div class="form-group">
		<label>
			Email ID
		</label><span class="errclass" id="idemailid"></span>
		<input class="form-control" type="email" placeholder="Email ID" name="emailid" value="<?php echo $rsedit['emailid'];?>">
	</div>
	<div class="form-group">
		<label>
			Password	
		</label><span class="errclass" id="idpassword"></span>
		<input class="form-control" type="password" placeholder="Password" name="password" maxlength="8" value="<?php echo $rsedit['password'];?>">
	</div>
	<div class="form-group">
		<label>
			Confirm Password	
		</label><span class="errclass" id="idcpassword"></span>
		<input class="form-control" type="password" placeholder="Confirm Password" name="cpassword" maxlength="8" value="<?php echo $rsedit['password'];?>">
	</div>
	<div class="form-group">
		<label>
			Contact Number
		</label><span class="errclass" id="idcontactno"></span>
		<input class="form-control" type="text" name="contactno" maxlength="10" value="<?php echo $rsedit['contactno'];?>" placeholder="Enter Contact Number">
	</div>

	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit"  class="btn btn-w3layouts w-100">Register as Guest</button>
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
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaSpaceExp = /^[a-zA-Z\s]+$/;
	var alphanumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;

	$(".errclass").html('');
	
	var errstatus = "true";
	if(!document.frmform.name.value.match(alphaSpaceExp))
	{
		document.getElementById("idname").innerHTML = "Entered name is not valid...";
		errstatus = "false";
	}
	if(document.frmform.name.value == "")
	{
		document.getElementById("idname").innerHTML = "Name should not be empty...";
		errstatus = "false";
	}
	
	if(!document.frmform.emailid.value.match(emailExp))
	{
		document.getElementById("idemailid").innerHTML = "Entered Email ID is not valid...";
		errstatus = "false";
	}
	
	if(document.frmform.emailid.value == "")
	{
		document.getElementById("idemailid").innerHTML = "Email ID should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.password.value.length<6)
	{
		document.getElementById("idpassword").innerHTML = "Password should contain more than 6 characters.....";
		errstatus = "false";
	}
		if(document.frmform.password.value == "")
	{
		document.getElementById("idpassword").innerHTML = "Password should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.cpassword.value == "")
	{
		document.getElementById("idcpassword").innerHTML = "Password should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.password.value != document.frmform.cpassword.value)
	{
		document.getElementById("idcpassword").innerHTML = "Password and Confirm password not matching...";
		errstatus = "false";
	}
	
	if(!document.frmform.contactno.value.match(numericExpression))
	{
		document.getElementById("idcontactno").innerHTML = "Contact number should contain digits..";
		errstatus = "false";
	}
	if(document.frmform.contactno.value.length != 10)
	{
		document.getElementById("idcontactno").innerHTML = "Contact number should contain 10 digits..";
		errstatus = "false";
	}
	if(document.frmform.contactno.value == "")
	{
		document.getElementById("idcontactno").innerHTML = "Contact number should not be empty...";
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