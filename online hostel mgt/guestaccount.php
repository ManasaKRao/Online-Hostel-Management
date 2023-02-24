<?php
include("header.php");
if(!isset($_SESSION['guestid']))
{
	echo "<script>window.location='guestlogin.php';</script>";
}
if(isset($_POST['btnpayment']))
{
	$particulars = array($_POST['bookingfrom'],$_POST['bookingto'],$_POST['noofdays'],$_POST['visitreason'],$_POST['comment'],$_POST['costperday'],$_POST['totcost'],$_POST['cardholder'], $_POST['paymenttype'], $_POST['cardnumber'],$_POST['cvvnumber'],$_POST['expirydate']);
	$particularsarr = serialize($particulars);
	$sqlbillingApproved ="SELECT * FROM billing LEFT JOIN guest ON billing.guestid=guest.guestid WHERE billing.guestid='$_SESSION[guestid]' and billing.status='Approved'";
	$qsqlbillingApproved = mysqli_query($con,$sqlbillingApproved);
	$rsbillingApproved = mysqli_fetch_array($qsqlbillingApproved);
	$dt = date("Y-m-d");
	//paymenttype cardholder cvvnumber expirydate
	$sql = "UPDATE billing SET paid_amt='$_POST[totcost]',paid_date='$dt',payment_type='$_POST[paymenttype]',status='Paid',particulars='$particularsarr' WHERE billid='$rsbillingApproved[0]'";
	$qsql = mysqli_query($con,$sql);
	$billid=$rsbillingApproved[0];
	//echo "<script>alert('Payment done successfully..');
	//echo "<script>window.location='guestpaymentreceipt.php?billid=$billi
	echo "<script>viewmessagebox('guest record updated successfully  ....','guestpaymentreceipt.php?billid=$billid')</script>";
}
if(isset($_POST['btnbook']))
{
	/*$sql ="UPDATE guest SET visitreason='$_POST[visitreason]',comment='$_POST[comment]',fromdate='$_POST[fromdate]',todate='$_POST[todate]' WHERE  guestid='$_SESSION[guestid]'";
	$qsql = mysqli_query($con,$sql);
	
	$now = strtotime($_POST['todate']); // or your date as well
	$your_date = strtotime($_POST['fromdate']);
	$datediff = $now - $your_date;
	$nodays =  round($datediff / (60 * 60 * 24)) + 1;

	$particulars = array($_POST['fromdate'],$_POST['todate'],$nodays,$_POST['visitreason'],$_POST['comment']);
	$particularsarr = serialize($particulars);*/
		
	$sql = "INSERT INTO billing(guestid,bill_type,status,particulars)VALUES('$_SESSION[guestid]','Guest Payment','Pending','$particularsarr')";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	
	//echo "<SCRIPT>alert('Booking Completed.. Kindly wait for the Confirmation..');
	echo "<script>viewmessagebox('Booking Completed.. Kindly wait for the Confirmation...','guestaccount.php')</script>";
}

	$sqlbilling ="SELECT * FROM billing LEFT JOIN guest ON billing.guestid=guest.guestid WHERE billing.guestid='$_SESSION[guestid]' and billing.status='Pending'";
	$qsqlbilling = mysqli_query($con,$sqlbilling);
	$rsbilling = mysqli_fetch_array($qsqlbilling);
		
	$sqlbillingApproved ="SELECT * FROM billing LEFT JOIN guest ON billing.guestid=guest.guestid WHERE billing.guestid='$_SESSION[guestid]' and billing.status='Approved'";
	$qsqlbillingApproved = mysqli_query($con,$sqlbillingApproved);
	$rsbillingApproved = mysqli_fetch_array($qsqlbillingApproved);
?>
	</div>
	<!-- //banner -->
<?php
if(mysqli_num_rows($qsqlbillingApproved) >= 1)
{
?>
		<div class="newsletter_right_w3w3pvt-lau py-5">
			<div class="container py-xl-4 py-lg-3">
				<div class="row">
					<div class="col-lg-4 border-right">
						<p class="text-li">Booking details</p>
						<h3 class="text-white font-weight-bold mt-2 mb-3">Guest Room Booking Panel</h3>
						<img src="images/reception-about.png">
					</div>
					<div class="col-lg-8 news-right-w3ls mt-lg-0 mt-4">
						<p class="text-light mb-3">Enter the details to book Room</p>
							<div class="row">

	<div class="col-md-12 form-group pr-md-0">
		<table id="datatable"  class="table table-striped table-bordered">
			<thead style="color: white;">
				<tr>
					<th>From Date</th>		
					<th><?php echo date("d-M-Y",strtotime($rsbillingApproved['fromdate'])); ?></th>		
					<th>To date</th>		
					<th><?php echo date("d-M-Y",strtotime($rsbillingApproved['todate'])); ?></th>		
				</tr>
				<tr>
					<th>Visit Reason</th>		
					<th colspan="4"><?php echo $rsbillingApproved['visitreason']; ?></th>
				</tr>
				<tr>
					<th>Note</th>		
					<th colspan="4"><?php echo $rsbillingApproved['comment']; ?></th>
				</tr>
			</thead>
		</table>
		<table id="datatable"  class="table table-striped table-bordered" style="color: white;">
				<tr>
					<th>Cost per Day</th>		
					<th>₹<?php echo $rsguestfees_structure['cost']; ?></th>
				</tr>
				<tr>
					<th>Number of Days</th>		
					<th><?php 
$now = strtotime($rsbillingApproved['todate']);
$your_date = strtotime($rsbillingApproved['fromdate']);
$datediff = $now - $your_date;
echo $nodays = round($datediff / (60 * 60 * 24))+1;
					?></th>
				</tr>
				<tr>
					<th>Total Cost</th>		
					<th>₹<?php echo $totcost = $nodays * $rsguestfees_structure['cost']; ?></th>
				</tr>
			</thead>
		</table>	
	</div>
								<div class="col-md-12 form-group pr-md-0 mt-md-0 mt-3">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">
<input type="hidden" name="billid" value="<?php echo $rsbillingApproved['billid']; ?>">
<?php
$particulars  = unserialize($rsbillingApproved['particulars']);
?>
<input type="hidden" name="bookingfrom" value="<?php echo $particulars[0]; ?>">
<input type="hidden" name="bookingto" value="<?php echo $particulars[1]; ?>">
<input type="hidden" name="noofdays" value="<?php echo $particulars[2]; ?>">
<input type="hidden" name="visitreason" value="<?php echo $particulars[3]; ?>">
<input type="hidden" name="comment" value="<?php echo $particulars[4]; ?>">

<input type="hidden" name="costperday" value="<?php echo $rsguestfees_structure['cost']; ?>">
<input type="hidden" name="totcost" value="<?php echo $totcost; ?>">

	<div class="row">
		<div class="form-group col-lg-6">
			<label style="color: white;">
				Card Holder Name
			</label><span class="errclass" id="idcardholder"></span>
			<input class="form-control"  type="text" name="cardholder" >
		</div>
		<div class="form-group col-lg-6">
		</div>
	</div>
	<div class="row">

		<div class="form-group col-lg-6">
			<label style="color: white;">
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
			<label style="color: white;">
			Card Number
			</label><span class="errclass" id="idcardnumber"></span>
			<input class="form-control"  type="text" name="cardnumber" >
		</div>
	</div>
	

	<div class="row">
		<div class="form-group col-lg-6">
			<label style="color: white;">
			CVV Number
			</label><span class="errclass" id="idcvvnumber"></span>
			<input class="form-control"  type="text" name="cvvnumber" >
		</div>
		<div class="form-group col-lg-6">
			<label style="color: white;">
			Expiry date
			</label><span class="errclass" id="idExpiry date"></span>
			<input class="form-control" type="month" name="expirydate" min="<?php echo date("Y-m"); ?>"  >
		</div>
	</div>
	
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="btnpayment" class="btn btn-w3layouts w-100">Make Payment</button>
	</div>
</form>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
<?php
}
else
{
	if(mysqli_num_rows($qsqlbilling) >= 1)
	{
	?>	
		<div class="newsletter_right_w3w3pvt-lau py-5">
			<div class="container py-xl-4 py-lg-3">
				<div class="row">
					<div class="col-lg-4 border-right">
						<p class="text-li">Enter the details to book Room</p>
						<h3 class="text-white font-weight-bold mt-2 mb-3">Guest Room Booking Panel</h3>
						<img src="images/reception-about.png">
					</div>
					<div class="col-lg-8 news-right-w3ls mt-lg-0 mt-4">
						<p class="text-light mb-3">Enter the details to book Room</p>
							<div class="row">

	<div class="col-md-12 form-group pr-md-0">
		<table id="datatable"  class="table table-striped table-bordered">
			<thead style="color: white;">
				<tr>
					<th>From Date</th>		
					<th><?php echo date("d-M-Y",strtotime($rsbilling['fromdate'])); ?></th>		
					<th>To date</th>		
					<th><?php echo date("d-M-Y",strtotime($rsbilling['todate'])); ?></th>		
				</tr>
				<tr>
					<th>Visit Reason</th>		
					<th colspan="4"><?php echo $rsbilling['visitreason']; ?></th>
				</tr>
				<tr>
					<th>Note</th>		
					<th colspan="4"><?php echo $rsbilling['comment']; ?></th>
				</tr>
				<tr>
					<th>Booking Status</th>		
					<th colspan="4"><?php echo $rsbilling['8']; ?></th>
				</tr>
			</thead>
		</table>	
	</div>
								<div class="col-md-12 form-group pr-md-0 mt-md-0 mt-3">
	<?php
	if($rsbilling[8] == "Pending")
	{
	?>
	<button class="form-control btn" name="btnbook" type="button" style="background-color: red;">Awaiting for Warden Confirmation</button>
	<?php
	}
	?>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	else
	{
	?>	
		<div class="newsletter_right_w3w3pvt-lau py-5">
			<div class="container py-xl-4 py-lg-3">
				<div class="row">
					<div class="col-lg-4 border-right">
						<p class="text-li">Enter the details to book Room</p>
						<h3 class="text-white font-weight-bold mt-2 mb-3">Guest Room Booking Panel</h3>
						<img src="images/reception-about.png">
					</div>
					<div class="col-lg-8 news-right-w3ls mt-lg-0 mt-4">
						<p class="text-light mb-3">Enter the details to book Room</p>
						<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">
							<div class="row">
								<div class="col-md-6 form-group pr-md-0">
								<label style="color: white;">From Date</label><span class="errclass" id="idfrmdate"></span>
									<input class="form-control" type="date" name="fromdate" placeholder="From Date" min="<?php echo date("Y-m-d"); ?>" >
								</div>
								<div class="col-md-6 form-group pr-md-0">
								<label style="color: white;">To Date</label><span class="errclass" id="idExpiry date"></span>
									<input class="form-control" type="date" name="todate" placeholder="To Date" min="<?php echo date("Y-m-d"); ?>">
								</div>
								<div class="col-md-12 form-group pr-md-0 mt-md-0 mt-3">
									<input class="form-control" type="text" name="visitreason" placeholder="Visit Reason">
								</div>
								<div class="col-md-12 form-group pr-md-0 mt-md-0 mt-3">
									<textarea class="form-control"  name="comment" placeholder="Any notes"></textarea>
								</div>
								<div class="col-md-12 form-group pr-md-0 mt-md-0 mt-3">
									<button class="form-control btn" name="btnbook" type="submit">Click here to Book</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
}
?>
	<!-- //newsletter -->
	<!-- //middle section -->


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
	
	if(document.frmform.visitreason.value == "")
	{
		document.getElementById("idvisitreason").innerHTML = "visitreason should not be empty...";
		errstatus = "false";
	}
	
	if(!document.frmform.cardholder.value.match(alphaSpaceExp))
	{
		document.getElementById("idcardholder").innerHTML = "Entered name is not valid...";
		errstatus = "false";
	}
	
	if(document.frmform.cardholder.value == "")
	{
		document.getElementById("idcardholder").innerHTML = "Name should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.cardnumber.value.length != 16)
	{
		document.getElementById("idcardnumber").innerHTML = "Card number should contain 16 digits...";
		errstatus = "false";
	}
	if(!document.frmform.cardnumber.value.match(numericExpression))
	{
		document.getElementById("idcardnumber").innerHTML = "Card number should contain digits...";
		errstatus = "false";
	}
	
	
	if(document.frmform.cardnumber.value == "")
	{
		document.getElementById("idcardnumber").innerHTML = "Card number should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.cvvnumber.value.length != 3)
	{
		document.getElementById("idcvvnumber").innerHTML = "CVV number should contain 3 digits...";
		errstatus = "false";
	}
	if(!document.frmform.cvvnumber.value.match(numericExpression))
	{
		document.getElementById("idcvvnumber").innerHTML = "CVV number should contain digits...";
		errstatus = "false";
	}
	
	if(document.frmform.cvvnumber.value == "")
	{
		document.getElementById("idcvvnumber").innerHTML = "CVV number should not be empty...";
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