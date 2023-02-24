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
	<!-- //banner -->
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container">
			<div class="title text-center">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Guest Pending Bookings</h3>
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
			<th>Guest details</th>	
			<th>Particulars</th>
			<th>Status</th>
			<?php
			/*
			<th>Action</th>			
			*/
			?>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM billing LEFT JOIN guest ON billing.guestid=guest.guestid WHERE billing.status='Paid' AND billing.bill_type='Guest Payment' ORDER BY billing.billid DESC";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$particulars  = unserialize($rs['particulars']);
		//echo print_r($particulars);
		$particularsmsg =  "<b>Booking From</b> - $particulars[0] 
		<br><b>Booking to</b> - $particulars[1] 
		<br><b>Number of Days</b> - $particulars[2] 
		<br><b>Visit Reason</b> - $particulars[3] 
		<br><b>Comment</b>- $particulars[4]";
		echo "<tr>	
			<td>
			<b>Name -</b> $rs[name]<br>
			<b>Email ID -</b> $rs[emailid]<br>
			<b>Contact No. -</b> $rs[contactno]			
			</td>		
			<td>$particularsmsg</td>	
			<td>$rs[8]</td>	";
			
			/*
		echo "<td>";
		echo "<a href='viewguestpendingbookings.php?bookingid=$rs[0]&st=Approved' class='btn btn-info' style='width: 100%'>Print</a>";
		echo "</td>";
		*/
		echo "</tr>";
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