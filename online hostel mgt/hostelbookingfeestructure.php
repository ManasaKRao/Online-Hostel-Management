<?php
include("header.php");
?>
	<!-- news -->
	<section class="blog_w3ls py-5" id="news">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Select Room type</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-4">
			
	<?php
	$sql ="SELECT * FROM fees_structure WHERE status='Active' AND hostellertype='$_SESSION[hostellertype]' AND block_id='$_GET[block_id]'";
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
					<a href="hostelbookingroom.php?block_id=<?php echo $_GET['block_id']; ?>&fee_str_id=<?php echo $rs['fee_str_id']; ?>"><?php echo $rs['room_type']; ?></a>
				</h5>
				<p>
				₹<?php echo $rs['cost']; ?>
				</p>
			</div>
			<a href="hostelbookingroom.php?block_id=<?php echo $_GET['block_id']; ?>&fee_str_id=<?php echo $rs['fee_str_id']; ?>" class="blog-btn">Select</a>
		</div>
	</div>
<hr>
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