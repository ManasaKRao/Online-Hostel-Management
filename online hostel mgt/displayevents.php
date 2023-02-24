<?php
include("header.php");
?>	
<style>
.main-w3pvt-2 {
    background: url('images/plain.png') no-repeat top;
    background-size: cover;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    -ms-background-size: cover;
    min-height: 300px;
}
.about-w3sec {
    background: url('images/plain.png') no-repeat top;
    background-size: contain;
    -webkit-background-size: contain;
    -o-background-size: contain;
    -moz-background-size: contain;
    -ms-background-size: contain;
}
</style>
	<!-- events -->
	<div class="about-w3sec py-5" id="event" >
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">News & Events</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			
<?php
	$sql ="SELECT * FROM event WHERE status='Published' ORDER BY eventid DESC";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		$img = unserialize($rs['event_banner']);
?>		
		<div class="evnt-grid p-sm-5 p-4">
			<div class="row">
				<div class="col-lg-2 col-sm-3 text-center mt-2">
					<img src='imgevent/<?php echo $img[0]; ?>' style='width: 150px;height:150px;'  class="img-fluid">
				</div>
				<div class="col-lg-7 col-sm-9 abt-block pr-lg-5 mt-sm-0 mt-4">
					<h3 class="mb-2"><?php echo $rs['event_title']; ?></h3>
					<p><?php echo substr($rs['event_description'], 0, 125); ?></p>
					<ul class="list-unstyled mt-3">
						<li class="mx-md-4 mx-2">
							<span class="fa fa-clock-o mr-2"></span>Event Date:<?php echo date("d-M-Y",strtotime($rs['event_date'])); ?>
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
				<div class="col-lg-3 abt-block text-center">
					<a href="eventdetail.php?eventid=<?php echo $rs[0]; ?>" style="max-width: 150px;" class="btn button-style mt-sm-5 mt-4">View More</a>
				</div>
			</div>
		</div>
<?php
	}
?>	
		</div>
	</div>
	<!-- //events -->

<?php
include("footer.php");
?>