<?php
include("header.php");
if(isset($_GET['st']))
{
	$sqlbilling = "UPDATE  billing SET status='$_GET[st]' WHERE billid='$_GET[bookingid]'";
	$qsqlbilling = mysqli_query($con,$sqlbilling);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Guest Booking confirmation Updated successfully..');</script>";
		echo "<script>window.location='viewguestapprovedbookings.php';</script>";
	}
}
?>
	</div>
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container">
			<div class="title text-center">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Guest Booking Report</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>	
			<th>Bill No.</th>	
			<th>Guest details</th>	
			<th>Particulars</th>
			<th>Booking Status</th>		
			<th>Receipt</th>		
		</tr>
	</thead>
	<tbody>
	<?php
	 $sql ="SELECT * FROM billing LEFT JOIN guest ON billing.guestid=guest.guestid WHERE  billing.bill_type='Guest Payment' AND billing.guestid='$_SESSION[guestid]' ORDER BY billing.billid DESC";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		$particulars  = unserialize($rs['particulars']);
		$particularsmsg =  "<b>Booking From</b> - $particulars[0] 
		<br><b>Booking to</b> - $particulars[1] 
		<br><b>Number of Days</b> - $particulars[2] 
		<br><b>Visit Reason</b> - $particulars[3]";
		echo "<tr>	";
		echo "<td>$rs[0]</td>";
		echo "<td>";
		echo "<b>Name -</b> $rs[name]<br>
			<b>Email ID -</b> $rs[emailid]<br>
			<b>Contact No. -</b> $rs[contactno]<br>
			</td>		
			<td>$particularsmsg</td>	
			<td>";
		echo $rs[8];
		echo "<br><b>Cost/day</b> - $particulars[5] 
		<br><b>Total cost</b> - $particulars[6] ";
		echo "</td>
			<td><br><center><a href='guestpaymentreceipt.php?billid=$rs[0]' target='_blank' class='btn btn-info'><b>Print</b></a></center></td>
			</tr>";
	}
	?>
	</tbody>
</table>					
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