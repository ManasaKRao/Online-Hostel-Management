<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE guest SET name='$_POST[name]',visitreason='$_POST[visitreason]',emailid='$_POST[emailid]',password='$_POST[password]',contactno='$_POST[contactno]',comment='$_POST[comment]',fromdate='$_POST[fromdate]',todate='$_POST[todate]',status='$_POST[status]'WHERE  guestid='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			echo "<script>window.location='viewguest.php';</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{
	$sql = "INSERT INTO guest(name,visitreason,emailid,password,contactno,comment,fromdate,todate,status)VALUES('$_POST[name]','$_POST[visitreason]','$_POST[emailid]','$_POST[password]','$_POST[contactno]','$_POST[comment]','$_POST[fromdate]','$_POST[todate]','Active')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) ==1 )
	{
		echo "<SCRIPT>alert('record inserted successfully..');</SCRIPT>";
		echo "<script>window.location='guest.php';</script>";
	}
	else
	{
		echo mysqli_error($con);
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Guest</h3>
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
		<input class="form-control"  type="text" name="name" value="<?php echo $rsedit['name'];?>">
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
			Contact Number
		</label><span class="errclass" id="idcontactno"></span>
		<input class="form-control" type="text" name="contactno"value="<?php echo $rsedit['contactno'];?>">
	</div>
	<div class="form-group">
		<label>
			Visit Reason
		</label><span class="errclass" id="idvisitreason"></span>
		<input class="form-control"  type="text" name="visitreason" value="<?php echo $rsedit['visitreason'];?>">
	</div>
	<div class="form-group">
		<label>
			Comment
		</label><span class="errclass" id="idcomment"></span>
		<textarea name="comment" class="form-control"><?php echo $rsedit['comment'];?></textarea>
	</div>
	<div class="form-group">
		<label>
			From Date 
		</label><span class="errclass" id="idfromdate"></span>
		<input class="form-control"  type="date" name="fromdate" value="<?php echo $rsedit['fromdate'];?>" min="<?php echo date("Y-m-d"); ?>">
	</div>
	<div class="form-group">
		<label>
			To Date 
		</label><span class="errclass" id="idtodate"></span>
		<input class="form-control"  type="date" name="todate" value="<?php echo $rsedit['todate'];?>" min="<?php echo date("Y-m-d"); ?>">
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
	var errstatus = "true";
	if(document.frmform.name.value == "")
	{
		document.getElementById("idname").innerHTML = "Name should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.emailid.value == "")
	{
		document.getElementById("idemailid").innerHTML = "Email ID should not be empty...";
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
	if(document.frmform.contactno.value == "")
	{
		document.getElementById("idcontactno").innerHTML = "Contact number should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.fromdate.value == "")
	{
		document.getElementById("idfromdate").innerHTML = "Date should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.todate.value == "")
	{
		document.getElementById("idtodate").innerHTML = "Date should not be empty...";
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