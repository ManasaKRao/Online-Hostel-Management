<?php
include("header.php");
/*
$sqladmission = "SELECT * FROM admission WHERE ('$dt' BETWEEN start_date AND end_date) AND admission.status='Active' AND hostellerid='" . $_SESSION['hostellerid'] . "'";
$qsqladmission = mysqli_query($con,$sqladmission);
if(mysqli_num_rows($qsqladmission) >=1)
{
	$rsadmission = mysqli_fetch_array($qsqladmission);
	echo $sqlbilling = "SELECT * FROM billing WHERE admission_id='$rsadmission[0]'";
	$qsqlbilling = mysqli_query($con,$sqlbilling);
	echo mysqli_error($con);
	$rsbilling = mysqli_fetch_array($qsqlbilling);
	echo "<script>window.location='billingreceipt.php?insid=$rsbilling[0]';</script>";
}
*/
?>
	<!-- news -->
	<section class="blog_w3ls py-5" id="news">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Select Block</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-4">
			
	<?php
	$sql ="SELECT * FROM blocks WHERE status='Active'";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
	?>
<!-- blog grid -->
<div class="col-lg-6 col-md-6">
	<div class="card border-0 med-blog">
		<?php
		/*
		<div class="card-header p-0">
			<a href="single.html">
				<img class="card-img-bottom" src="images/blog2.jpg" alt="Card image cap">
			</a>
		</div>
		*/
		?>
		<div class="card-body border border-top-0 pb-5">
			<div class="mb-3">
				<h5 class="blog-title card-title font-weight-bold m-0">
					<a href="hostelbookingfeestructure.php?block_id=<?php echo $rs['block_id']; ?>"><?php echo $rs['block_name']; ?></a>
				</h5>
				<p>
				<?php echo $rs['description']; ?>
				</p>
			</div>
			<a href="hostelbookingfeestructure.php?block_id=<?php echo $rs['block_id']; ?>" class="blog-btn">Select</a>
		</div>
	</div>
</div>
<!-- //blog grid -->
	<?php
	}
	?>	
				
			</div>
		</div>
	</section>
	<!-- //blog -->



<?php
include("footer.php");
?>