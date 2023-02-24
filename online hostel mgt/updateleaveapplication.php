<?php
include("header.php");
if(isset($_POST['btnsubmit']))
{
	$sql = "UPDATE leave_application SET  warden_remark='" . $_POST['warden_remark'] . "',cheif_warden_remark='" . $_POST['cheif_warden_remark'] . "',leave_status='" . $_POST['leave_status'] . "' WHERE leave_application_id='" . $_POST['leave_application_id'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		echo "<script>viewmessagebox('Leave Application updated successfully...','viewleaveapplication.php')</script>";
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM leave_application LEFT JOIN hosteller ON leave_application.hostellerid=hosteller.hostellerid WHERE leave_application.leave_application_id='" . $_GET['editid'] . "'";
	$qsqledit = mysqli_query($con,$sqledit);
	echo mysqli_error($con);
	$rs = mysqli_fetch_array($qsqledit);
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Update Leave Application</h3>
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
		<tr><th>Leave Status</th><td><?php echo $rs['leave_status']; ?></td></tr>
</table>

	<div class="form-group">
		<label>
			Warden Remark
		</label><span class="errclass" id="idwarden_remark"></span>
		<textarea class="form-control" name="warden_remark" placeholder="Warden Remarks" id="warden_remark" ><?php echo $rs['warden_remark'];?></textarea>
	</div>
	
	<div class="form-group">
		<label>
			Chief Warden Remark
		</label><span class="errclass" id="idcheif_warden_remark"></span>
		<textarea class="form-control" name="cheif_warden_remark" placeholder="Chief Warden Remark" id="cheif_warden_remark" ><?php echo $rs['cheif_warden_remark'];?></textarea>
	</div>
	
	<div class="form-group">
		<label>
			Leave Status
		</label><span class="errclass" id="idleave_status"></span>
		<select class="form-control" name="leave_status" id="leave_status" >
			<?php
				$arr = array("Pending","Approved");
				foreach($arr as $val)
				{
					if($val == $rs['leave_status'])
					{
					echo "<option value='$val' selected>$val</option>";
					}
					else
					{
					echo "<option value='$val'>$val</option>";
					}
				}
			?>
		</select>
	</div>
	<div class="form-group">
		<input type="submit" name="btnsubmit" id="btnsubmit" class="btn btn-info" value="Update Leave Application">
	</div>
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