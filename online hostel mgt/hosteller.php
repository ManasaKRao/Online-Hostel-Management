<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE hosteller SET hostellertype='$_POST[hostellertype]',name='$_POST[name]',emailid='$_POST[emailid]',password='$_POST[password]',dob='$_POST[dob]',father_name='$_POST[father_name]',mother_name='$_POST[mother_name]',address='$_POST[address]',contact_no='$_POST[contact_no]',status='Active' WHERE hostellerid='" . $_GET['editid'] . "'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('Hosteller record updated successfully..');</SCRI
			//echo "<script>window.location='viewhosteller.php';</scri
			echo "<script>viewmessagebox('hosteller  record updated successfully  ....','viewhosteller.php')</script>";
		}
		//Update statement ends here		
	}
	else
	{
		
		$sql = "INSERT INTO hosteller(hostellertype,name,emailid,password,dob,father_name,mother_name,address,contact_no,status) VALUES('$_POST[hostellertype]','$_POST[name]','$_POST[emailid]','$_POST[password]','$_POST[dob]','$_POST[father_name]','$_POST[mother_name]','$_POST[address]','$_POST[contact_no]','Active')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<script>viewmessagebox('Hosteller Registration done successfully....','hostellerlogin.php')</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM  hosteller WHERE hostellerid='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
			echo mysqli_error($con);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
    <!-- page details -->
	

	<!-- contact -->
	<section class="contact-wthree" id="contact">
		<div class="container py-lg-3">
			<div class="title text-center">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Student Registration Panel</h3>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12 ">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
	
	
	<div class="row">
<div class="form-group col-lg-6">
			<label>
				Hosteller Type
			</label><span class="errclass" id="idh_type"></span>
			<input type="text" value="Student" name="h_type" class="form-control" readonly>
		</div>		<div class="col-lg-6">
			<label>
				Name
			</label><span class="errclass" id="idname"></span>
			<input class="form-control"  type="text" name="name" id="name" placeholder="Enter Name" value="<?php echo $rsedit['name'];?>">
		</div>
	</div>


		
	<div class="row">
		<div class="col-lg-6">
		<br>
		<label>
			Email ID
		</label><span class="errclass" id="idemailid"></span>
		<input class="form-control" type="email" placeholder="Email ID" name="emailid" id="email" value="<?php echo $rsedit['emailid'];?>">
		</div>
		<div class="col-lg-6">
		<br>
			<label>Date of Birth</label><span class="errclass" id="iddob"></span>
			<input class="form-control" type="date" placeholder="DOB" name="dob" id="dob" min="1980-01-01" max="2003-01-01" value="<?php echo $rsedit['dob'];?>">
		</div>
	</div>
		
	
	<div class="row">
		<div class="col-lg-6">
		<br>
			<label>
				Password	
			</label><span class="errclass" id="idpassword"></span>
			<input class="form-control" type="password" placeholder="Password" name="password" id="pswd" maxlength="8" value="<?php echo $rsedit['password'];?>" >
		</div>
		<div class="col-lg-6">
		<br>
			<label>
				Confirm Password	
			</label><span class="errclass" id="idcpassword"></span>
			<input class="form-control" type="password" placeholder="Confirm Password" name="cpassword"  id="cpswd" maxlength="8" value="<?php echo $rsedit['password'];?>" >
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-lg-6">
		<br>
			<label>
				Father Name
			</label><span class="errclass" id="idfather_name"></span>
			<input class="form-control"  type="text" name="father_name"id="fname" placeholder="Father Name" value="<?php echo $rsedit['father_name'];?>">
		</div>
		<div class="col-lg-6">
		<br>
			<label>
			Mother Name
			</label><span class="errclass" id="idmother_name"></span>
			<input class="form-control"  type="text" name="mother_name" placeholder="Mother Name" id="mname"value="<?php echo $rsedit['mother_name'];?>">
		</div>
	</div>
	

	<div class="form-group">
		<br>
		<label>
			Address
		</label><span class="errclass" id="idaddress"></span>
		<textarea name="address" class="form-control" placeholder="Enter your Address" id="add"><?php echo $rsedit['address'];?></textarea>
	</div>
	<div class="form-group">
		<br>
		<label>
			Mobile No
		</label><span class="errclass" id="idparent_no"></span>
		<input class="form-control"  type="text" name="contact_no" placeholder="Contact number" maxlength="10"id="no" value="<?php echo $rsedit['contact_no'];?>">
	</div>
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Click here to Register</button>
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
	var mobnoExp = /^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/;

	$(".errclass").html('');
	
	var errstatus = "true";
	
	if(!document.frmform.name.value.match(alphaSpaceExp))
	{
		document.getElementById("idname").innerHTML = "Entered name is not valid...";
		document.getElementById("name").focus();
		errstatus = "false";
	}
	if(document.frmform.name.value == "")
	{
		document.getElementById("idname").innerHTML = "Name should not be empty...";
		document.getElementById("name").focus();
		errstatus = "false";
	}
	if(!document.frmform.emailid.value.match(emailExp))
	{
		document.getElementById("idemailid").innerHTML = "Entered Email ID is not valid...";
		document.getElementById("email").focus();
		errstatus = "false";
	}
	if(document.frmform.emailid.value == "")
	{
		document.getElementById("idemailid").innerHTML = "Email ID should not be empty...";
		document.getElementById("email").focus();
		errstatus = "false";
	}
	if(document.frmform.dob.value == "")
	{
		document.getElementById("iddob").innerHTML = "Date of Birth should not be empty...";
		document.getElementById("dob").focus();
		errstatus = "false";
	}
	
	if(document.frmform.password.value.length<8)
	{
		document.getElementById("idpassword").innerHTML = "Password should contain 8 characters.....";
		document.getElementById("pswd").focus();
		errstatus = "false";
	}
	if(document.frmform.password.value == "")
	{
		document.getElementById("idpassword").innerHTML = "Password should not be empty...";
		document.getElementById("pswd").focus();
		errstatus = "false";
	}
	if(document.frmform.cpassword.value == "")
	{
		document.getElementById("idcpassword").innerHTML = "Confirm password should not be empty..."; 
		document.getElementById("cpswd").focus();   
		errstatus = "false";
	}
	if(document.frmform.password.value != document.frmform.cpassword.value)
	{
		document.getElementById("idcpassword").innerHTML = "Password and Confirm password not matching...";
		document.getElementById("cpswd").focus();
		errstatus = "false";
	}
	if(!document.frmform.father_name.value.match(alphaSpaceExp))
	{
		document.getElementById("idfather_name").innerHTML = "Entered name is not valid...";
		document.getElementById("fname").focus();
		errstatus = "false";
	}
	if(document.frmform.father_name.value=="")
	{
		document.getElementById("idfather_name").innerHTML = "Father name should not be empty...";
		document.getElementById("fname").focus();
		errstatus = "false";
	}
	if(document.frmform.mother_name.value=="")
	{
		document.getElementById("idmother_name").innerHTML = "Mother name should not be empty...";
		document.getElementById("mname").focus();
		errstatus = "false";
	}
	if(document.frmform.address.value == "")
	{
		document.getElementById("idaddress").innerHTML = "Address should not be empty...";
		document.getElementById("add").focus();
				errstatus = "false";
	}
	if(!document.frmform.contact_no.value.match(numericExpression))
	{
		document.getElementById("idparent_no").innerHTML = "Contact number should contain digits..";
		document.getElementById("no").focus();
		errstatus = "false";
	}
	if(!document.frmform.contact_no.value.match(mobnoExp))
	{
		document.getElementById("idparent_no").innerHTML = "Entered Mobile Number is not valid..";
		document.getElementById("no").focus();
		errstatus = "false";
	}
	if(document.frmform.contact_no.value.length != 10)
	{
		document.getElementById("idparent_no").innerHTML = "Contact number should contain 10 digits..";
		document.getElementById("no").focus();
		errstatus = "false";
	}
	if(document.frmform.contact_no.value == "")
	{
		document.getElementById("idparent_no").innerHTML = "Mobile number should not be empty...";
		document.getElementById("no").focus();
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