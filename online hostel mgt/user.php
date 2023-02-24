<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE user SET usertype='$_POST[usertype]',name='$_POST[name]',emailid='$_POST[emailid]',password='$_POST[password]',dob='$_POST[dob]',father_name='$_POST[father_name]',mother_name='$_POST[mother_name]',address='$_POST[address]',contact_no='$_POST[contact_no]',parent_no='$_POST[parent_no]',status='$_POST[status]' WHERE  userid='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			echo "<script>window.location='viewuser.php';</script>";
		}
		//Update statement ends here		
	}
	else
	{
		//Insert statement starts here
		$sql = "INSERT INTO user(usertype,name,emailid,password,dob,father_name,mother_name,address,contact_no,parent_no,status) VALUES('$_POST[usertype]','$_POST[name]','$_POST[emailid]','$_POST[password]','$_POST[dob]','$_POST[father_name]','$_POST[mother_name]','$_POST[address]','$_POST[contact_no]','$_POST[parent_no]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('record inserted successfully..');</SCRIPT>";
			echo "<script>window.location='user.php';</script>";
		}
		//Insert statement ends here
	}
}
//Steps to update record
//Step 1: Linking statement from view page
//Step 2: Selecting record from database
//Step 3: Displaying record in form elements(Input : value="")
//Step 4: Update statement 
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM user WHERE userid='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
			echo mysqli_error($con);
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">User</h3>
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
			User type
		</label>
		<select name="usertype" class="form-control">
			<option value="">Select</option>
		</select>
	</div>
	
	<div class="form-group">
		<label>
			Name
		</label>
		<input class="form-control"  type="text" name="name" value="<?php echo $rsedit['name']; ?>">
	</div>
	<div class="form-group">
		<label>
			Email ID
		</label>
		<input class="form-control" type="email" placeholder="Email ID" name="emailid" value="<?php echo $rsedit['emailid']; ?>" >
	</div>
	<div class="form-group">
		<label>
			Password	
		</label>
		<input class="form-control" type="password" placeholder="Password" name="password" value="<?php echo $rsedit['emailid']; ?>" >
	</div>
	<div class="form-group">
		<label>
			DOB
		</label>
		<input class="form-control" type="date" placeholder="DOB" name="dob"  value="<?php echo $rsedit['dob']; ?>">
	</div>
	<div class="form-group">
		<label>
			Father Name
		</label>
		<input class="form-control"  type="text" name="father_name" value="<?php echo $rsedit['father_name']; ?>">
	</div>
	<div class="form-group">
		<label>
			Mother Name
		</label>
		<input class="form-control"  type="text" name="mother_name" value="<?php echo $rsedit['mother_name']; ?>">
	</div>
	<div class="form-group">
		<label>
			Address
		</label>
		<textarea name="address" class="form-control"><?php echo $rsedit['address']; ?></textarea>
	</div>
	<div class="form-group">
		<label>
			Contact Number
		</label>
		<input class="form-control"  type="text" name="contact_no" value="<?php echo $rsedit['contact_no']; ?>">
	</div>
	
	<div class="form-group">
		<label>
			Parent No
		</label>
		<input class="form-control"  type="text" name="parent_no" value="<?php echo $rsedit['parent_no']; ?>">
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
	