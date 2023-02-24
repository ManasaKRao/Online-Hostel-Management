<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM photo WHERE photo_id ='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>viewmessagebox('Photo deleted from Album...','viewphoto.php');</script>";
	}
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item">
				<a href="index.php">Home</a>
			</li>
		</ol>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Photos</h3>
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
			<th>Gallery type</th>		
			<th>Title</th>		
			<th>Image</th>		
			<th>Status</th>		
			<th style="width: 50px;">Action</th>			
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM photo LEFT JOIN gallery_type ON photo.gallery_type_id=gallery_type.gallery_type_id";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[gallery_type]</td>			
			<td>$rs[photo_title]</td>				
			<td><img src='imggallery/$rs[photo_img]' style='width: 100px;height: 100px;' ></td>				
			<td>$rs[photo_status]</td>	
			<td><a href='photo.php?editid=$rs[0]' class='btn btn-info' style='width: 100px;' >Edit</a><hr><a href='#' onclick='return confirmtodel(`$rs[0]`)' class='btn btn-danger'  style='width: 100px;'>Delete</a></td>	
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