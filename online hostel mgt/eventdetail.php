<?php
include("header.php");
$sqlevent ="SELECT * FROM event WHERE eventid='$_GET[eventid]' ";
$qsqlevent = mysqli_query($con,$sqlevent);
$revents = mysqli_fetch_array($qsqlevent);
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php">Home</a>
			</li>
		</ol>
	</div>
	<!-- //page details -->

	<!-- single -->
	<div class="blog-w3l py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold"><?php echo $revents['event_title'];?></h3>
				<img src="images/titt.png" alt="" class="img-fluid">
										<ul class="list-unstyled mt-3">
							<li class="mx-md-4 mx-2">
								<span class="fa fa-clock-o mr-2"></span>Event Date:<?php echo date("d-M-Y",strtotime($revents['event_date'])); ?>
							</li>
							<?php
							/*
							<li>
								<span class="fa fa-map-marker mr-2"></span>Hall No.1
							</li>
							*/
							?>
						</ul>
			</div>
			
			<div class="row blog-content pt-lg-3">
				<!-- left side -->
				<div class="col-lg-12 blog_section">

				<div class="row">
					
				<?php
		$img = unserialize($revents['event_banner']);
		$imgcount =0;		
		foreach($img as $imgname)
		{
			if($imgcount > 2)
			{
				break;
			}
				?><div class="card col-md-4 gal-img">
						<a href="#gal1" title="Pomeranian"><img src="imgevent/<?php echo $imgname; ?>" alt="gallery" class="img-fluid"></a>
					</div>
				<?php
			$imgcount =$imgcount + 1;
		}
				?>
				</div>
<?php
if(count($img) >3)				
{
?>
				<center><a href="gallery.php?eventid=<?php echo $_GET['eventid']; ?>" class="btn btn-info">View more Images <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a></center>
<?php
}
?>
					<p><?php echo $revents['event_description']; ?></p>
				</div>
				<!-- //left side -->
			</div>
		</div>
	</div>
	<!-- //blog -->

	<?php
	include("footer.php");
	?>
	
