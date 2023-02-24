<?php
include("header.php");
$fmonth = $_GET['month']."-01";
$tmonth = $_GET['month']."-31";
$sql ="SELECT admission.admission_id, hosteller.name, hosteller.hostellertype,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Room Rent' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' AND mess_bill.admission_id='$_GET[billid]' ) as roomrent,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Mess Bill' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' AND mess_bill.admission_id='$_GET[billid]') as messbill,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Water Electricity' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' AND mess_bill.admission_id='$_GET[billid]') as waterelectricity,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Maintenance' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' AND mess_bill.admission_id='$_GET[billid]') as maintenance,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Total Charges' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' AND mess_bill.admission_id='$_GET[billid]') as totcharges, (SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Penalty' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth') as penalty FROM `admission` left join hosteller on admission.hostellerid=hosteller.hostellerid where admission.status='Active' AND admission.admission_id='$_GET[billid]'";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$rs = mysqli_fetch_array($qsql);
$sqlbilling = "SELECT * FROM billing where admission_id='$rs[admission_id]' AND bill_type='Mess bill' AND status='Active' AND particulars='$_GET[month]'";
$qsqlbilling = mysqli_query($con,$sqlbilling);
echo mysqli_error($con);
$rsbilling = mysqli_fetch_array($qsqlbilling);
?>
	</div>
	<!-- //banner -->
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Bill Receipt</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
					
	<div class="container">
  <div class="card">
<div class="card-header">
 
<strong>Admission No.<?php echo $_GET['billid']; ?></strong> 
  <span class="float-right"> <strong>Bill Month:</strong><?php echo date("M-Y",strtotime($_GET['month'])); ?></span>

</div>
<div class="card-body">
	<div class="row mb-4">
			<div class="col-sm-12">
				<center>
				<h2>ONLINE HOSTEL MANAGEMENT SYSTEM (HMS)</h2>
			
				
				</center>
			</div>
			
			<div class="col-sm-12">
<br>
<br>
			</div>
<?php
$sqlhosteller = "SELECT * FROM admission LEFT JOIN hosteller on admission.hostellerid=hosteller.hostellerid where admission.admission_id='$_GET[billid]'";
$qsqlhosteller = mysqli_query($con,$sqlhosteller);
echo mysqli_error($con);
$rshosteller = mysqli_fetch_array($qsqlhosteller);
?>
<?php
if(mysqli_num_rows($qsqlbilling) >=1)
{
?>
			<div class="col-sm-12">
				<div style="font-size:16px;"><b>Received from Miss. /Mr. <u ><?php echo $rshosteller['name']; ?></u> Collected Amount <u >Rs.<?php echo $rsbilling[4]; ?></u>  from <u ><?php echo date("01-M-Y",strtotime($_GET['month'])); ?></u>  to <u ><?php echo date("31-M-Y",strtotime($_GET['month'])); ?></u></b></div>
			</div>
<?php
}
else
{
?>
			<div class="col-sm-12">
					<div style="font-size:16px;">
					
					<b>Name - </b><?php echo $rshosteller['name']; ?><br>
					<b>Address - </b><?php echo $rshosteller['address']; ?><br>
					<b>Contact No. - </b><?php echo $rshosteller['contact_no']; ?>
					</div>
			</div>
<?php
}
?>
	</div>
	
	


<div class="table-responsive-sm">
<table class="table">
	<thead>
		<tr>
			<th class="center">Description</th>
			<th class="right">Cost</th>
		</tr>
	</thead>
	<tbody>

	<tr>
		<td class="left">Monthly Room Rent</td>
		<td class="right">₹<?php echo $rs[3]; ?></td>
	</tr>
	<tr>
		<td class="left">Mess Bill</td>
		<td class="right">₹<?php echo $rs[4]; ?></td>
	</tr>
	<tr>
		<td class="left">Water & Electricity Charge</td>
		<td class="right">₹<?php echo $rs[5]; ?></td>
	</tr>
	<tr>
		<td class="left">Maintanance Charge</td>
		<td class="right">₹<?php echo $rs[6]; ?></td>
	</tr>
	<tr>
		<td class="left">Penalty</td>
		<td class="right">₹<?php echo $rs[8]; ?></td>
	</tr>

	<tr>
		<th class="left">Total Cost</th>
		<th class="right">₹<?php echo $rs[3]+$rs[4]+$rs[5]+$rs[6]+$rs[8]; ?></th>
	</tr>
	</tbody>
</table>
</div>
</div>
</div>
</div>

<hr>
<center><button type="button" class="btn btn-success btn-lg btn-block" style="width:250px;" onclick="printme('contact')">Print</button></center>
            </div>
			
        </div>
    </div>
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
function printme(divName)
{
	     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>