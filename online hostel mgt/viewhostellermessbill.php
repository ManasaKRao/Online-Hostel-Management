<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM mess_bill WHERE mess_bill_id='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Record deleted successfully..');</script>";
		echo "<script>window.location='viewmessbill.php';</script>";
	}
}
function getWorkingDays($startDate,$endDate){
  $startDate = strtotime($startDate);
  $endDate = strtotime($endDate);

  if($startDate <= $endDate){
    $datediff = $endDate - $startDate;
    return floor($datediff / (60 * 60 * 24));
  }
  return false;
}
?>
	</div>
	
    

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="" style="padding-left: 25px;padding-right: 25px;">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Mess bill</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
<hr>
			<div class="">
				<div class="">
					<div class="">
<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Student Detail</th>
			<th>Room <br>Rent</th>		
			<th>Mess <br>Bill</th>		
			<th>Water & <br>Electricity</th>		
			<th>Maintanance <br>Charge</th>		
			<th>Penalty</th>		
			<th>Total</th>
			<th>Last Date</th>
			<th>Action</th>			
		</tr>
	</thead>
	<tbody>
	<?php
	$sqlmess_bill = "SELECT date FROM `mess_bill` LEFT JOIN admission ON admission.admission_id=mess_bill.admission_id WHERE admission.hostellerid='" . $_SESSION['hostellerid'] . "' GROUP BY date ORDER BY date";
	$qsqlmess_bill = mysqli_query($con,$sqlmess_bill);
	while($rsmess_bill = mysqli_fetch_array($qsqlmess_bill))
	{
		$_GET['month'] = date('Y-m', strtotime("+0 month", strtotime($rsmess_bill[0])));
		$fmonth = $_GET['month']."-01";
		$tmonth = $_GET['month']."-31";
		$sql ="SELECT admission.admission_id, hosteller.name, hosteller.hostellertype,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Room Rent' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth') as roomrent,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Mess Bill' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth') as messbill,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Water Electricity' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth') as waterelectricity,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Maintenance' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth') as maintenance,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Total Charges' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth') as totcharges,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Penalty' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth') as penalty FROM `admission` left join hosteller on admission.hostellerid=hosteller.hostellerid where  admission.hostellerid='" . $_SESSION['hostellerid'] . "' and admission.status='Active'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlbilling = "SELECT * FROM billing where admission_id='$rs[admission_id]' AND bill_type='Mess bill' AND status='Active' AND particulars='$_GET[month]'";
			$qsqlbilling = mysqli_query($con,$sqlbilling);
			$rsbilling = mysqli_fetch_array($qsqlbilling);
			
			$effectiveDate = date('10-M-Y', strtotime("+1 month", strtotime($_GET['month'])));
			$effectiveDate1 = date('Y-m-10', strtotime("+1 month", strtotime($_GET['month'])));
			
			$days = getWorkingDays($effectiveDate1,$dt);
			
			if($rs[3] != "")
			{
			echo "<tr>
				<td><b>Admission No.</b> $rs[admission_id]<br><b>$rs[hostellertype] :</b> $rs[name] </td>
				<td>₹$rs[3]</td>
				<td>₹$rs[4]</td>
				<td>₹$rs[5]</td>	
				<td>₹$rs[6]</td>	
				<td>₹$rs[8]</td>	";
				$totamt = $rs[3] + $rs[4] + $rs[5] + $rs[6] + $rs[8];
			echo "<td><b>₹" .  $totamt  ."</b></td>		
				<td>";
	echo $effectiveDate;
			echo "</td>"; 
			
			echo "<td>";
			if(mysqli_num_rows($qsqlbilling) >=1)
			{
				echo "<b>Paid</b>";
				echo "<br><b><a class='btn btn-info' href='messbillreceipt.php?billid=$rs[0]&month=$_GET[month]'>Bill Receipt</a></b>";
			}
			else
			{
				echo "<b>Unpaid</b>";
				echo "<br><b><a class='btn btn-info' href='messbillpayment.php?billid=$rs[0]&month=$_GET[month]&totamt=$totamt'>Make Payment</a></b>";
			}
			echo "</td></tr>";
			}
		}
	}
	?>
	</tbody>
</table>	
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
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
<script>
function confirmdel()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>