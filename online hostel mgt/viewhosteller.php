<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE FROM hosteller WHERE hostellerid='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>viewmessagebox('hosteller record deleted successfully...','viewhosteller.php');</script>";
	}
}
?>
	</div>
	<!-- //banner -->
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Student</h3>
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
				
			<th>Name</th>	
			<th>Email ID </th>	
			<th>DOB</th>	
			<th>Father name</th>	
			<th>Mother name</th>		
			<th>Address</th>		
			<th>Contact Number</th>
			<th>Status</th>				
			<th>Action</th>			
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM  hosteller";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			
			<td>$rs[name]</td>		
			<td>$rs[emailid]</td>	
			<td>" . date("d-m-Y",strtotime($rs['dob'])) . "</td>
			<td>$rs[father_name]</td>
			<td>$rs[mother_name]</td>
			<td>$rs[address]</td>
			<td>$rs[contact_no]</td>
			<td>$rs[status]</td>		
			<td>  <a href='#' onclick='return confirmtodel(`$rs[0]`)' class='btn btn-danger' >Delete</a></td>		
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