<?php
include("header.php");
?>
	</div>
	<!-- //banner -->
	

	<!-- contact -->
	<section class="contact-wthree" id="contact">
		<div class="container">
			<div class="title text-center">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View feedbacks</h3>
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
			<th>Date and Time</th>		
			<th>Feedback Title</th>		
			<th>Feedback Message</th>	
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT  * from feedback LEFT JOIN hosteller ON feedback.hostellerid=hosteller.hostellerid WHERE 0=0";	
	if(isset($_SESSION['hostellerid']))
	{
		$sql = $sql . " AND feedback.hostellerid='" . $_SESSION['hostellerid'] . "'";
	}
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[hostellertype] - $rs[name]</td>		
			<td>$rs[feedbackdttime]</td>		
			<td>$rs[feedbacksubject]</td>		
			<td>$rs[feedbackmessage]</td>					
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