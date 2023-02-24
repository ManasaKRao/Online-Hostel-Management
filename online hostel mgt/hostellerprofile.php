<?php
include("header.php");
if(isset($_POST['submit']))
{
		//Update statement starts here
		 $sql ="UPDATE hosteller SET hostellertype='$_POST[hostellertype]',name='$_POST[name]',emailid='$_POST[emailid]',dob='$_POST[dob]',father_name='$_POST[father_name]',mother_name='$_POST[mother_name]',address='$_POST[address]',contact_no='$_POST[contact_no]' WHERE hostellerid='" . $_SESSION['hostellerid'] . "'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('Hosteller Profile updated successfully..');</SCRIPT>";
			echo "<script>viewmessagebox('Hosteller Profile updated successfully..','hostellerprofile.php')</script>";
		}
		//Update statement ends here		
}
if(isset($_SESSION['hostellerid']))
{
	$sqledit = "SELECT * FROM  hosteller WHERE hostellerid='" . $_SESSION['hostellerid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
			echo mysqli_error($con);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	
	

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Hosteller Profile</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12 ">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" name="frmform" id="frmform" class="register-wthree" onsubmit="return validateform()">
	
	
	<div class="row">
		<div class="col-lg-6">
			<label>
				Hosteller type
			</label><span class="errclass" id="idhostellertype"></span>
			<select name="hostellertype" id="hostellertype" class="form-control">
				<?php
				$arr = array("Employee","Student","Others");
				foreach($arr as $val)
				{
					
					if($val == $rsedit['hostellertype'])
					{
					echo "<option value='$val' selected>$val</option>";
					}
				}
				?>
			</select>
		</div>
		<div class="col-lg-6">
			<label>
				Name
			</label><span class="errclass" id="idname"></span>
			<input class="form-control"  type="text" name="name" id="name"  value="<?php echo $rsedit['name'];?>">
		</div>
	</div>


	<div class="row">
		<div class="col-lg-6">
		<br>
		<label>
			Email ID
		</label><span class="errclass" id="idemail"></span>
		<input class="form-control" type="email" placeholder="Email ID" name="emailid" id="emailid" value="<?php echo $rsedit['emailid'];?>">
		</div>
		<div class="col-lg-6">
		<br>
			<label>Date of Birth</label><span class="errclass" id="iddob"></span>
			<input class="form-control" type="date" placeholder="DOB" name="dob" id="dob" value="<?php echo $rsedit['dob'];?>"  max="<?php echo date("Y-m-d",strtotime("-15 year")); ?>">
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-lg-6">
		<br>
			<label>
				Father Name
			</label><span class="errclass" id="idfather_name"></span>
			<input class="form-control"  type="text" name="father_name" id="father_name" value="<?php echo $rsedit['father_name'];?>">
		</div>
		<div class="col-lg-6">
		<br>
			<label>
			Mother Name
			</label><span class="errclass" id="idmother_name"></span>
			<input class="form-control"  type="text" name="mother_name" id="mother_name" value="<?php echo $rsedit['mother_name'];?>">
		</div>
	</div>
	

	<div class="form-group">
		<br>
		<label>
			Address
		</label><span class="errclass" id="idaddress"></span>
		<textarea name="address" id="address" class="form-control"><?php echo $rsedit['address'];?></textarea>
	</div>
	<div class="form-group">
		<br>
		<label>
			Mobile No
		</label><span class="errclass" id="idcontact_no"></span>
		<input class="form-control"  type="text" name="contact_no" id="contact_no" value="<?php echo $rsedit['contact_no'];?>">
	</div>
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Click here to Update Profile</button>
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
	var mobnoExp = /^([0|\+[0-9]{1,5})?([6-9][0-9]{9})$/;
//		 emailid dob father_name mother_name address contact_no
	$(".errclass").html('');
	var errstatus = "true";
	if(!document.frmform.name.value.match(alphaSpaceExp))
	{
		document.getElementById("idname").innerHTML = "Entered Name is not valid...";
		errstatus = "false";
	}
	if(document.frmform.name.value == "")
	{
		document.getElementById("idname").innerHTML = "Name should not be empty...";
		errstatus = "false";
	}
	if(!document.frmform.emailid.value.match(emailExp))
	{
		document.getElementById("idemail").innerHTML = "Entered Email ID is not valid...";
		errstatus = "false";
	}
	if(document.frmform.emailid.value == "")
	{
		document.getElementById("idemail").innerHTML = "Email ID should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.dob.value == "")
	{
		document.getElementById("iddob").innerHTML = "Date of Birth should not be empty...";
		errstatus = "false";
	}
	if(!document.frmform.father_name.value.match(alphaSpaceExp))
	{
		document.getElementById("idfather_name").innerHTML = "Entered name is not valid...";
		errstatus = "false";
	}
	if(document.frmform.father_name.value == "")
	{
		document.getElementById("idfather_name").innerHTML = "Father name should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.address.value == "")
	{
		document.getElementById("idaddress").innerHTML = "Address should not be empty...";
		errstatus = "false";
	}
	if(!document.frmform.contact_no.value.match(numericExpression))
	{
		document.getElementById("idcontact_no").innerHTML = "Mobile number should contain digits..";
		errstatus = "false";
	}
	if(!document.frmform.contact_no.value.match(mobnoExp))
	{
		document.getElementById("idcontact_no").innerHTML = "Entered Mobile Number is not valid..";
		errstatus = "false";
	}
	if(document.frmform.contact_no.value.length != 10)
	{
		document.getElementById("idcontact_no").innerHTML = "Mobile number should contain 10 digits..";
		errstatus = "false";
	}
	if(document.frmform.contact_no.value == "")
	{
		document.getElementById("idcontact_no").innerHTML = "Mobile number should not be empty...";
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