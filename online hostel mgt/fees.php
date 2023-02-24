<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE fees SET admission_id='$_POST[admission_id]', fee_str_id='$_POST[fee_str_id]',total_fees='$_POST[total_fees]',invoice_date='$_POST[invoice_date]',status='$_POST[status]' WHERE fee_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			//echo "<script>window.location='viewfees.php';</script>";
			
			echo "<script>viewmessagebox('Record updated successfully  ....','viewfees.php')</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{
		$sql = "INSERT INTO fees(admission_id,fee_str_id,total_fees,invoice_date,status) VALUES('$_POST[admission_id]','$_POST[fee_str_id]','$_POST[total_fees]','$_POST[invoice_date]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('Fee record inserted successfully..');</SCRIPT>";
			//echo "<script>window.location='fees.php';</script>";
			echo "<script>viewmessagebox('Record inserted successfully....','fees.php')</script>";
			
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM fees WHERE fee_id='" . $_GET['editid'] ."'";
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Fees</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">
	<div class="form-group">
		<label>
			Admission ID
		</label><span class="errclass" id="idadmission_id"></span>
		<select name="admission_id" class="form-control">
			<option value="">Select</option>
			<?php
			$sqlblocks = "SELECT * FROM admission where status='Active'";
			$qsqlblocks = mysqli_query($con,$sqlblocks);
			while($rsblocks = mysqli_fetch_array($qsqlblocks))
			{
				if($rsblocks['admission_id'] == $rsedit['admission_id'])
				{
				echo "<option value='$rsblocks[admission_id]' selected>$rsblocks[hostellerid]</option>";
				}
				else
				{
				echo "<option value='$rsblocks[admission_id]'>$rsblocks[hostellerid]</option>";
				}
			}
			?>
		</select>
	</div>
	
	<div class="form-group">
		<label>
			Fee Structure
		</label><span class="errclass" id="idfee_str_id"></span>
		<select name="fee_str_id" class="form-control">
			<option value="">Select</option>
			<?php
			$sqlblocks = "SELECT * FROM fees_structure where status='Active'";
			$qsqlblocks = mysqli_query($con,$sqlblocks);
			while($rsblocks = mysqli_fetch_array($qsqlblocks))
			{
				if($rsblocks['fee_str_id'] == $rsedit['fee_str_id'])
				{
				echo "<option value='$rsblocks[fee_str_id]' selected>$rsblocks[hostellertype] - $rsblocks[room_type] - ₹$rsblocks[cost]</option>";
				}
				else
				{
				echo "<option value='$rsblocks[fee_str_id]' >$rsblocks[hostellertype] - $rsblocks[room_type] - ₹$rsblocks[cost]</option>";
				}
			}
			?>
		</select>
	</div>
	
	<div class="form-group">
		<label>
			Total fees
		</label><span class="errclass" id="idtotal_fees"></span>
		<input class="form-control" type="text" placeholder="Total fees" name="total_fees" value="<?php echo $rsedit['total_fees'];?>" >
	</div>
		
	<div class="form-group">
		<label>
			Invoice Date
		</label><span class="errclass" id="idinvoice_date"></span>
		<input class="form-control" type="date" placeholder="Invoice Date" name="invoice_date" value="<?php echo $rsedit['invoice_date'];?>" >
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
	if(document.frmform.admission_id.value == "")
	{
		document.getElementById("idadmission_id").innerHTML = "Admission ID should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.fee_str_id.value == "")
	{
		document.getElementById("idfee_str_id").innerHTML = "Kindly select the Fees structure...";
		errstatus = "false";
	}
	if(!document.frmform.total_fees.value.match(numericExpression))
	{
		document.getElementById("idtotal_fees").innerHTML = "Total fees  should contain digits...";
		errstatus = "false";
	}
	if(document.frmform.total_fees.value == "")
	{
		document.getElementById("idtotal_fees").innerHTML = "Total fees should not be empty...";
		errstatus = "false";
	}
	
	
	if(document.frmform.invoice_date.value == "")
	{
		document.getElementById("idinvoice_date").innerHTML = "Date should not be empty...";
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