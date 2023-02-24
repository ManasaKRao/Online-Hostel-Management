<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE employee SET emp_name='$_POST[emp_name]',login_id='$_POST[login_id]',password='$_POST[password]',emp_type='$_POST[emp_type]',gender='$_POST[gender]',designation='$_POST[designation]',status='$_POST[status]'WHERE  emp_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			//echo "<script>window.location='viewemployee.php';</script>";
				echo "<script>viewmessagebox('Employee  record updated successfully  ....','viewemployee.php')</script>";
		}
		//Update statement ends here		
	
	}
	else
	{
		$sql = "INSERT INTO employee(emp_name,login_id,password,emp_type,gender,designation,status)VALUES('$_POST[emp_name]','$_POST[login_id]','$_POST[password]','$_POST[emp_type]','$_POST[gender]','$_POST[designation]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('record inserted successfully..');</SCRIPT>";
			//echo "<script>window.location='employee.php';</script>";
				echo "<script>viewmessagebox('Employee record inserted successfully....','employee.php')</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM employee WHERE emp_id='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Employee</h3>
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
			Employee Name
		</label><span class="errclass" id="idemp_name"></span>
		<input class="form-control"  type="text" name="emp_name"  value="<?php echo $rsedit['emp_name'];?>">
	</div>
	
	<div class="form-group">
		<label>
			Login ID
		</label><span class="errclass" id="idlogin_id"></span>
		<input class="form-control"  type="text" name="login_id"  value="<?php echo $rsedit['login_id'];?>">
	</div>
	<div class="form-group">
		<label>
			Password	
		</label><span class="errclass" id="idpassword"></span>
		<input class="form-control" type="password" placeholder="Password" name="password" value="<?php echo $rsedit['password'];?>">
	</div>
	
	<div class="form-group">
		<label>
			Confirm Password	
		</label><span class="errclass" id="idcpassword"></span>
		<input class="form-control" type="password" placeholder="Password" name="cpassword" value="<?php echo $rsedit['password'];?>">
	</div>
	
	<div class="form-group">
		<label>
			Employee type
		</label><span class="errclass" id="idemp_type"></span>
		<select name="emp_type" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Admin","Warden","Accountant");
			foreach($arr as $val)
			{
				
				if($val == $rsedit['emp_type'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val'>$val</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>
			Gender
		</label><span class="errclass" id="idgender"></span>
		<select name="gender" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Male","Female");
			foreach($arr as $val)
			{
				
				if($val == $rsedit['gender'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val'>$val</option>";
				}
			}
			?>
		</select>
	</div>
	<div class="form-group">
		<label>
			Designation
		</label><span class="errclass" id="iddesignation"></span>
		<input class="form-control"  type="text" name="designation"value="<?php echo $rsedit['designation'];?>">
	</div>
	
	<div class="form-group">
		<label>
			Status
		</label><span class="errclass" id="idstatus"></span>
		<select name="status" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				
				if($val == $rsedit['status'])
				{
				echo "<option value='$val' selected>$val</option>";
				}
				else
				{
				echo "<option value='$val'>$val</option>";
				}
			}
			
			?>
		</select>
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