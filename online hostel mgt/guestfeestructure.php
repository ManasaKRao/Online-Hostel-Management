<?php
include("header.php");
if(isset($_POST['submit']))
{
	$sqlfees_structure= "SELECT * FROM fees_structure WHERE hostellertype='Guest'";
	$qsqlfees_structure = mysqli_query($con,$sqlfees_structure);
	$rsfees_structure = mysqli_fetch_array($qsqlfees_structure);
	if(mysqli_num_rows($qsqlfees_structure) >= 1)
	{
		//Update statement starts here
		 $sql ="UPDATE fees_structure SET cost='$_POST[cost]' WHERE  hostellertype='Guest'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('Guest fee updated successfully..');</SCRIPT>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{
		$sql = "INSERT INTO fees_structure(hostellertype,cost,status)VALUES('Guest','$_POST[cost]','Active')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('Guest Fee inserted successfully..');</SCRIPT>";
		}
	}
}
$sqledit = "SELECT * FROM fees_structure WHERE hostellertype='Guest'";
$qsqledit = mysqli_query($con,$sqledit);
$rsedit = mysqli_fetch_array($qsqledit);
?>
	</div>
	<!-- //banner -->
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Fees for Guest</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">
<input type="hidden" name="hostellertype" id="hostellertype" value="Guest">

	<div class="form-group">
		<label>
			Cost per day
		</label><span class="errclass" id="idcost"></span>
		<input class="form-control"  type="text" name="cost" value="<?php echo $rsedit['cost'];?>">
	</div>

	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">UPDATE</button>
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
	if(document.frmform.block_id.value == "")
	{
		document.getElementById("idblock_id").innerHTML = "Kindly select Block ID...";
		errstatus = "false";
	}
	if(document.frmform.hostellertype.value == "")
	{
		document.getElementById("idhostellertype").innerHTML = "Hostellertype should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.room_type.value == "")
	{
		document.getElementById("idroom_type").innerHTML = "Roomtype should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.cost.value == "")
	{
		document.getElementById("idcost").innerHTML = "Cost should not be empty...";
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