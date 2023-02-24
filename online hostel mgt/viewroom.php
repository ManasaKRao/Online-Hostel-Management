<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM room WHERE room_id='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>viewmessagebox('Room record deleted successfully...','viewroom.php');</script>";
	}
}
?>
	</div>
	<!-- //banner -->
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Room</h3>
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
			<th>Block</th>		
			<th>Fee structure</th>		
			<th>Room Number</th>		
			<th>Number of beds</th>		
			<th>Description</th>		
			<th>Status</th>		
			<th>Action</th>	
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT room.*,blocks.block_name,fees_structure.cost,fees_structure.hostellertype,fees_structure.room_type FROM room LEFT JOIN blocks ON room.block_id=blocks.block_id LEFT JOIN fees_structure ON room.fee_str_id=fees_structure.fee_str_id";
	
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[block_name]</td>		
			<td>$rs[hostellertype] - $rs[room_type] - ₹$rs[cost]</td>		
			<td>$rs[room_no]</td>		
			<td>$rs[no_of_beds]</td>		
			<td>$rs[description]</td>		
			<td>$rs[status]</td>		
			<td><a href='room.php?editid=$rs[0]' class='btn btn-info' >Edit</a>  <a href='#' onclick='return confirmtodel(`$rs[0]`)' class='btn btn-danger' >Delete</a></td>				
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
function confirmtodel(delid)
{
	swal({
	  title: "Are you sure?",
	  text: "Once deleted, you will not be able to recover this record!",
	  icon: "warning",
	  buttons: true,
	  dangerMode: true,
	})
	.then((willDelete) => {
	  if (willDelete) {
		window.location="?delid="+delid;
	  } else {
		swal("Your Delete request terminated..!");
	  }
	});
	return false;
}
</script>