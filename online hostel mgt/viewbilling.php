<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM billing WHERE billid='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Record deleted successfully..');</script>";
		echo "<script>window.location='viewbilling.php';</script>";
	}
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container">
			<div class="title text-center">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Income Report</h3>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
<form method="get" action="">
	<table  class="table table-striped table-bordered">
		<tr>
			<th>From  : <input type="date" name="fdate"  class="form-control" value="<?php echo $_GET['fdate']; ?>" ></th>		
			<th>To :  <input type="date" name="tdate"  class="form-control" value="<?php echo $_GET['tdate']; ?>" ></th>		
			<th><br><input type="submit" name="Search" class="form-control" Value="Filter" ></th>
		</tr>
	</table>
</form>
<hr>
<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Bill No.</th>		
			<th>Name</th>		
			<th>Bill type </th>			
			<th>Paid date</th>		
			<th>Payment type</th>	
			<th>Paid amount</th>	
		</tr>
	</thead>
	<tbody>
	<?php
	$paidamt = 0;
	$sql ="SELECT * FROM billing WHERE (status='Active' OR status='Paid' )";
	if(isset($_GET['Search']))
	{
		$sql = $sql . " AND paid_date BETWEEN '$_GET[fdate]' AND '$_GET[tdate]' ";
	}
	//echo $sql;
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqlhosteller = "SELECT * FROM hosteller LEFT JOIN admission ON hosteller.hostellerid=admission.hostellerid where admission.admission_id='$rs[admission_id]'";
		$qsqlhosteller = mysqli_query($con,$sqlhosteller);
		$rshosteller = mysqli_fetch_array($qsqlhosteller);
		
		$sqlguest = "SELECT * FROM guest LEFT JOIN billing ON guest.guestid=billing.guestid where billing.admission_id='$rs[admission_id]'";
		$qsqlguest = mysqli_query($con,$sqlguest);
		$rsguest = mysqli_fetch_array($qsqlguest);
		
		echo "<tr>
			<td>$rs[billid]</td>
			<td>";
			if($rs['admission_id'] != 0)
			{
		echo $rshosteller['hostellertype'] . " - " .  $rshosteller['name'];
			}
			if($rs['guestid'] != 0)
			{
		echo " Guest - " . $rsguest['name'];
			}
		echo "</td>				
			<td>$rs[bill_type]</td>			
			<td>" . date("d-M-Y",strtotime($rs['paid_date'])) . " </td>		
			<td>$rs[payment_type]</td>	
			<th  style='text-align: right;color: blue;'>₹$rs[paid_amt]</th>	
		</tr>";
		$paid_amt = $paid_amt +$rs['paid_amt'];
	}
	?>
	</tbody>
	<tfoot>
		<tr style="text-align: right;color: red;">		
			<th colspan="5">Total Amount</th>	
			<th>₹<?php echo $paid_amt; ?></th>	
		</tr>
	</tfoot>
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