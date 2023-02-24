<?php
include("header.php");
if(isset($_POST['submit']))
{
		//Update statement starts here
		$sql ="UPDATE employee SET emp_name='$_POST[emp_name]',login_id='$_POST[login_id]',designation='$_POST[designation]' WHERE  emp_id='$_SESSION[emp_id]'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('employee profile updated successfully..');</SCRIPT>";
			echo "<script>window.location='employeeprofile.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
}
if(isset($_SESSION['emp_id']))
{
	$sqledit = "SELECT * FROM employee WHERE emp_id='$_SESSION[emp_id]'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
	
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Admin</h3>
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
			Employee Name
		</label>
		<input class="form-control"  type="text" name="emp_name"value="<?php echo $rsedit['emp_name'];?>">
	</div>
	<div class="form-group">
		<label>
			Login ID
		</label>
		<input class="form-control" type="text" name="login_id" value="<?php echo $rsedit['login_id'];?>">
	</div>
	<div class="form-group">
		<label>
			Designation
		</label>
		<input class="form-control" type="text" name="designation"value="<?php echo $rsedit['designation'];?>">
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
	