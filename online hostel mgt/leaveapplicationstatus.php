<?php
include("header.php");
	$sqledit = "SELECT * FROM leave_application LEFT JOIN hosteller ON leave_application.hostellerid=hosteller.hostellerid WHERE leave_application.leave_application_id='" . $_GET['leave_application_id'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rs = mysqli_fetch_array($qsqledit);

?>
	</div>
	

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Leave Application status</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
	<input type="hidden" id="leave_application_id" name="leave_application_id" value="<?php echo $rs[0]; ?>" >
<table id="datatable"  class="table table-striped table-bordered">
		<tr><th>Application No.</th><td><?php echo $rs[0]; ?></td></tr>	
		<tr><th>Hosteller</th><td><?php echo $rs['name']; ?></td></tr>	
		<tr><th>Application Date</th><td><?php echo date("d-m-Y",strtotime($rs['application_dt'])); ?></td></tr>			
		<tr><th>Leave from</th><td><?php echo date("d-m-Y",strtotime($rs['from_dt'])); ?></td></tr>			
		<tr><th>Leave till</th><td><?php echo date("d-m-Y",strtotime($rs['to_dt'])); ?></td></tr>	
		<tr><th>Leave Reason</th><td><?php echo $rs['leave_reason']; ?></td></tr>	
		<tr><th>Visiting Person</th><td><?php echo $rs['person_visiting']; ?></td></tr>	
		<tr><th>Guardian</th><td><?php echo $rs['guardian']; ?></td></tr>	
		<tr><th>Warden Remark</th><td><?php echo $rs['warden_remark']; ?></td></tr>	
		<tr><th>Chief Warden Remark</th><td><?php echo $rs['cheif_warden_remark']; ?></td></tr>	
		<tr><th>Leave Status</th><td><?php echo $rs['leave_status']; ?></td></tr>
</table>

</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //contact -->
<?php
include("footer.php");
?>