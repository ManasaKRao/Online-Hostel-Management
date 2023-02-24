<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('$_POST[admission_id]','$_POST[charge_type]','$_POST[date]','$_POST[mess_bill]','$_POST[note]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) ==1 )
	{
		/*//echo "<SCRIPT>alert('record inserted successfully..');</SCRIPT>";
		//echo "<script>window.location='mess.php';</script>";*/
		echo "<script>viewmessagebox('record updated successfully  ....','mess.php')</script>";
	}
	else
	{
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Mess</h3>
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
		Admission ID
		</label>
		<select name="admission_id" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
	<div class="form-group">
		<label>
		Charge Type
		</label>
		<select name="charge_type" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
	<div class="form-group">
		<label>
			 Date
		</label>
		<input class="form-control" type="date" placeholder="date" name="date" >
	</div>
	<div class="form-group">
		<label>
				Mess Bill
		</label>
		<input class="form-control"  type="text" name="mess_bill">
	</div>
	<div class="form-group">
		<label>
				Note
		</label>
		<input class="form-control"  type="text" name="note">
	</div>
	
	<div class="form-group">
		<label>
			Status
		</label>
		<select name="status" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				echo "<option value='$val'>$val</option>";
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