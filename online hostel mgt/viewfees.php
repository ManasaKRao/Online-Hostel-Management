<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM fees WHERE fee_id='" . $_GET['delid'] ."'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Record deleted successfully..');</script>";
		echo "<script>window.location='viewfees.php';</script>";
	}
}
?>
	</div>
	<!-- //banner -->
	

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Fees</h3>
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
			<th>Hosteller Type</th>		
			<th>Name</th>		
			<th>Room detail</th>		
			<th style="text-align: right;">Total fees</th>		
			<th>Invoice Date</th>			
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM fees left join admission on admission.admission_id=fees.admission_id LEFT JOIN fees_structure ON fees_structure.fee_str_id=fees.fee_str_id LEFT JOIN hosteller ON hosteller.hostellerid=admission.hostellerid  WHERE fees.status='Active'";
	if(isset($_SESSION['hostellerid']))
	{
		$sql  = $sql . " and admission.hostellerid='" . $_SESSION['hostellerid'] . "'";
	}
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>		
				<td>$rs[hostellertype]</td>		
				<td>$rs[name]</td>		
				<td>$rs[room_type]</td>		
				<td style='text-align: right;'>₹$rs[total_fees]</td>		
				<td>" . date("d-M-Y",strtotime($rs['invoice_date'])) . "</td></tr>";
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