<?php
include("header.php");
if(!isset($_SESSION['emp_id']))
{
	echo "<script>window.location='emplogin.php';</script>";
}
?>
</div>
    <!-- page details -->
	
	<!-- news -->
	<section class="blog_w3ls py-5" id="news">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Admin Dashboard</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>		
<div class="col-md-12">
<h4 style='color: black'>Recent Admissions:</h4>
	<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Student</th>		
			<th>Room No.</th>		
			<th>Start date</th>		
			<th>End date</th>		
			<th>Food Type</th>		
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM admission LEFT JOIN hosteller ON admission.hostellerid=hosteller.hostellerid LEFT JOIN room ON room.room_id=admission.room_id WHERE admission.status='Active' Order by admission_id DESC limit 0,3";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[hostellertype] - $rs[name]</td>		
			<td>$rs[room_no]</td>		
			<td>" . date("d-m-Y",strtotime($rs['start_date'])) . "</td>		
			<td>" . date("d-m-Y",strtotime($rs['end_date'])) . "</td>		
			<td>$rs[food_type]</td>			
		</tr>";
	}
	?>
	</tbody>
</table>					

</div>			
			
			
			
				
				
<?php
include("footer.php");
?>



