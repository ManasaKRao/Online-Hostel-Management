<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM  leave_application WHERE leave_application_id='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>viewmessagebox('Leave Application record deleted successfully...','viewleaveapplication.php');</script>";
	}
}
?>
	</div>
	
	<!-- contact -->
	<section class="contact-wthree" id="contact">
		<div class="">
			<div class="row pt-xl-4">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Leave Applications</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>App No.</th>		
			<th>Type</th>		
			<th>Application Date</th>		
			<th>Leave from</th>		
			<th>Leave till</th>		
			<th>Leave Reason</th>		
			<th>Visiting Person</th>		
			<th>Guardian</th>
			<th>Leave Status</th>
<?php
if(isset($_SESSION['emp_id']))
{
?>
			<th>Action</th>			
<?php
}
?>
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT *,leave_application.leave_status as leavestatus FROM `leave_application` LEFT JOIN hosteller ON leave_application.hostellerid=hosteller.hostellerid";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[0]</td>		
			<td>$rs[name]</td>		
			<td>" . date("d-m-Y",strtotime($rs['application_dt'])) . "</td>		
			<td>" . date("d-m-Y",strtotime($rs['from_dt'])) . "</td>		
			<td>" . date("d-m-Y",strtotime($rs['to_dt'])) . "</td>		
			<td>$rs[leave_reason]</td>		
			<td>$rs[person_visiting]</td>		
			<td>$rs[guardian]</td>	
			<td>$rs[leave_status]";
		echo "<br><a href='leaveapplicationstatus.php?leave_application_id=$rs[0]' class='btn btn-warning'>View</a>";
		echo "</td>";	
		if(isset($_SESSION['emp_id']))
		{
		echo "<td><a href='updateleaveapplication.php?editid=$rs[0]' class='btn btn-info'>Update</a>   <a href='#' onclick='return confirmtodel(`$rs[0]`)' class='btn btn-primary' class='btn btn-danger' >Delete</a></td>";
		}
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