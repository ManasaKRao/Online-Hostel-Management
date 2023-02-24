<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO leave_application(hostellerid,application_dt,from_dt,to_dt,leave_reason,person_visiting,guardian,warden_remark,cheif_warden_remark,leave_status)VALUES('" . $_SESSION['hostellerid'] . "','$dt','" . $_POST['from_dt'] . "','" . $_POST['to_dt'] . "','" .  $_POST['leave_reason'] . "','" .  $_POST['person_visiting'] . "','" .  $_POST['guardian'] . "','','','Pending')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		echo "<script>viewmessagebox('Leave Application sent successfully...','viewleaveapplication.php')</script>";
	}
}
?>
	</div>
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">New Leave Application</h3>
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
			Leave From
		</label><span class="errclass" id="idfrom_dt"></span>
		<input class="form-control"  type="date" name="from_dt" id="from_dt"  value="<?php echo $rsedit['from_dt'];?>" min="<?php echo date("Y-m-d"); ?>" >
	</div>
	
	<div class="form-group">
		<label>
			Leave till
		</label><span class="errclass" id="idto_dt"></span>
		<input class="form-control"  type="date" name="to_dt" id="to_dt"  value="<?php echo $rsedit['to_dt'];?>" min="<?php echo date("Y-m-d"); ?>" >
	</div>
	<div class="form-group">
		<label>
			Reason for taking leave
		</label><span class="errclass" id="idleave_reason"></span>
		<textarea class="form-control" name="leave_reason" placeholder="Leave reason" id="leave_reason" ><?php echo $rsedit['leave_reason'];?></textarea>
	</div>
	<div class="form-group">
		<label>
			Visiting Person
		</label><span class="errclass" id="idperson_visiting"></span>
		<input class="form-control" type="person_visiting" name="person_visiting" value="<?php echo $rsedit['person_visiting'];?>">
	</div>
	<div class="form-group">
		<label>
			Guardian Detail
		</label><span class="errclass" id="idguardian"></span>
		<input class="form-control" type="text" placeholder="guardian" name="guardian" value="<?php echo $rsedit['guardian'];?>">
	</div>
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Apply for Leave</button>
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
	
	if(!document.frmform.emp_name.value.match(alphaSpaceExp))
	{
		document.getElementById("idemp_name").innerHTML = "Entered name is not valid...";
		errstatus = "false";
	}
	if(document.frmform.emp_name.value == "")
	{
		document.getElementById("idemp_name").innerHTML = "Employee name should not empty...";
		errstatus = "false";
	}
	
	if(document.frmform.login_id.value == "")
	{
		document.getElementById("idlogin_id").innerHTML = "Login ID should not be empty...";
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
	if(document.frmform.password.value != document.frmform.cpassword.value)
	{
		document.getElementById("idcpassword").innerHTML = "Password and Confirm password not matching...";
		errstatus = "false";
	}
	if(document.frmform.cpassword.value == "")
	{
		document.getElementById("idcpassword").innerHTML = "Confirm Password should not be empty...";
		errstatus = "false";
	}

	if(document.frmform.emp_type.value == "")
	{
		document.getElementById("idemp_type").innerHTML = "Kindly select employee type...";
		errstatus = "false";
	}
	if(document.frmform.gender.value == "")
	{
		document.getElementById("idgender").innerHTML = " Kindly select Gender ...";
		errstatus = "false";
	}
	
	if(document.frmform.designation.value == "")
	{
		document.getElementById("iddesignation").innerHTML = "Designation should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.status.value == "")
	{
		document.getElementById("idstatus").innerHTML = "Kindly select status...";
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