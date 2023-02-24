<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE billing SET admission_id='$_POST[admission_id]',guestid='$_POST[guestid]',bill_type='$_POST[bill_type]',paid_amt='$_POST[paid_amt]',paid_date='$_POST[paid_date]',payment_type='$_POST[payment_type]',particulars='$_POST[particulars]',status='$_POST[status]' WHERE  billid='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			echo "<script>window.location='viewbilling.php';</script>";
		}
		//Update statement ends here		
	}
	else
	{
		$sql ="UPDATE  admission SET status='Active' WHERE admission_id='$_GET[admission_id]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		
		$sql ="UPDATE  fees SET status='Active' WHERE admission_id='$_GET[admission_id]'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		
		$particulars = "Card Holder: $_POST[cardholder] <br> Card number: $_POST[cardnumber] <br> CVV Number: $_POST[cvvnumber] <br> Expiry Date: $_POST[month]";		
		$sql = "INSERT INTO billing(admission_id,guestid,bill_type,paid_amt,paid_date,payment_type,particulars,status)VALUES('$_GET[billid]','$_POST[guestid]','$_POST[bill_type]','$_POST[paid_amt]','$dt','$_POST[paymenttype]','$_GET[month]','Active')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		$insid=mysqli_insert_id($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<SCRIPT>alert('Payment done successfully..');</SCRIPT>";
			echo "<script>window.location='messbillreceipt.php?billid=$_GET[billid]&month=$_GET[month]';</script>";
		}
	}
}

$sqledit = "SELECT * FROM billing WHERE admission_id='$_GET[admission_id]'";
$qsqledit = mysqli_query($con,$sqledit);
echo mysqli_error($con);
$rsedit = mysqli_fetch_array($qsqledit);
$sqladmission = "SELECT * FROM admission LEFT JOIN room ON admission.room_id=room.room_id LEFT JOIN fees_structure ON fees_structure.fee_str_id=room.fee_str_id WHERE admission.admission_id='$_GET[admission_id]'";
$qsqladmission = mysqli_query($con,$sqladmission);
echo mysqli_error($con);
$rsadmission = mysqli_fetch_array($qsqladmission);

?>
	</div>
	

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Make Payment</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">

	<div class="row">
		<div class="form-group col-lg-6">
			<label>
				Bill type
			</label><span class="errclass" id="idbill_type"></span>
			<input type="text" value="Mess bill" name="bill_type" class="form-control" readonly>
		</div>
		<div class="form-group col-lg-6">
			<label>
				Total amount
			</label><span class="errclass" id="idpaid_amt"></span>
			<input class="form-control"  type="text" name="paid_amt" value="<?php echo $_GET['totamt'];?>" readonly>
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-lg-6">
			<label>
				Card Holder Name
			</label><span class="errclass" id="idcardholder"></span>
			<input class="form-control"  type="text" name="cardholder" >
		</div>
		<div class="form-group col-lg-6">
		</div>
	</div>
	
	<div class="row">

		<div class="form-group col-lg-6">
			<label>
				Payment type
			</label><span class="errclass" id="idpaymenttype"></span>
			<select name="paymenttype" class="form-control">
				<option value="">Select</option>
				<?php
				$arr = array("Credit card","Debit card","Visa","Master card");
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
		<div class="form-group col-lg-6">
			<label>
			Card Number
			</label><span class="errclass" id="idcardnumber"></span>
			<input class="form-control"  type="text" name="cardnumber" >
		</div>
	</div>
	
	<div class="row">
		<div class="form-group col-lg-6">
			<label>
			CVV Number
			</label><span class="errclass" id="idcvvnumber"></span>
			<input class="form-control"  type="text" name="cvvnumber" >
		</div>
		<div class="form-group col-lg-6">
			<label>
			Expiry date
			</label><span class="errclass" id="idExpiry date"></span>
			<input class="form-control" type="month" name="Expiry date" min="<?php echo date("Y-m"); ?>"  >
		</div>
	</div>
	
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Make Payment</button>
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
	if(document.frmform.admission_id.value == "")
	{
		document.getElementById("idadmission_id").innerHTML = "Admission ID should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.guestid.value == "")
	{
		document.getElementById("idguestid").innerHTML = "Guest ID should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.bill_type.value == "")
	{
		document.getElementById("idbill_type").innerHTML = "Kindly select Bill type...";
		errstatus = "false";
	}
	if(document.frmform.paid_amt.value == "")
	{
		document.getElementById("idpaid_amt").innerHTML = "Paid amount should not be empty..";
		errstatus = "false";
	}
	if(document.frmform.paid_date.value == "")
	{
		document.getElementById("idpaid_date").innerHTML = "Paid date should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.payment_type.value == "")
	{
		document.getElementById("idpayment_type").innerHTML = "Kindly select payment type...";
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
	