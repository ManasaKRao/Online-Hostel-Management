<?php
include("header.php");
if(isset($_GET['attdate']))
{
	$attdate = $_GET['attdate']; 
}
else
{
	$attdate  = date("Y-m-d"); 
}
if(isset($_POST['submit']))
{
		//print_r($_POST[admission_id]);
		$sql ="DELETE FROM attendance WHERE attdate='$_POST[attdate]'";
		mysqli_query($con,$sql);
		$aeeadmission_id  = $_POST['aeeadmission_id'];
		$attendancestatus = $_POST['attendancestatus'];
		
		$sql ="SELECT admission.*,hosteller.*,room.*,blocks.*,IFNULL(attendance.attendancestatus, 'Present') as attendancestatus FROM admission LEFT JOIN hosteller ON admission.hostellerid=hosteller.hostellerid LEFT JOIN room ON room.room_id=admission.room_id LEFT JOIN blocks ON blocks.block_id=room.block_id LEFT JOIN attendance ON attendance.admission_id=admission.admission_id and attendance.attdate='$attdate' WHERE admission.status='Active' AND ('$dt' BETWEEN start_date AND end_date)";
		$qsql = mysqli_query($con,$sql);
		while($rs  = mysqli_fetch_array($qsql))
		{
			$admid=$rs[0];
			//echo $admission_id['$admid'] . "-"; 
			$sqlatt = "INSERT INTO attendance(admission_id,attdate,attendancestatus) VALUES('$aeeadmission_id[$admid]','$_POST[attdate]','$attendancestatus[$admid]')";
			mysqli_query($con,$sqlatt);
		}
		
			echo "<script>viewmessagebox('Attendance record inserted successfully....','attendance.php')</script>";
}
if(isset($_POST['submitattendance']))
{
	$sqledit = "SELECT * FROM attendance WHERE attendanceid='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
	

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Attendance</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">


	<div class="row">
		<div class="form-group col-md-6">
			<label>
				Attendance Date
			</label><span class="errclass" id="idhostellertype"></span>
			<input class="form-control" type="date" placeholder="Attendance Date" name="attdate" id="attdate" value="<?php 
			if(isset($_GET['attdate']))
			{
				echo $_GET['attdate']; 
			}
			else
			{
				echo date("Y-m-d"); 
			}
			?>" max="<?php echo date("Y-m-d"); ?>"> 
		</div>
		<div class="form-group mt-42 mb-0 col-md-6" ><br>
			<button type="button" name="submitattendance" class="btn btn-w3layouts w-100" onclick="window.location='attendance.php?attdate='+attdate.value">Select</button>
		</div>
	</div>
	
		<hr>
	<table id="datatable"  class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>Student</th>	
				<th>Hosteller Type</th>					
				<th>Room No.</th>					
				<th>Attendance status</th>
			</tr>
		</thead>
		<tbody>
		<?php
		$dt = date("Y-m-d");
		$sql ="SELECT admission.*,hosteller.*,room.*,blocks.*,IFNULL(attendance.attendancestatus, 'Present') as attendancestatus FROM admission LEFT JOIN hosteller ON admission.hostellerid=hosteller.hostellerid LEFT JOIN room ON room.room_id=admission.room_id LEFT JOIN blocks ON blocks.block_id=room.block_id LEFT JOIN attendance ON attendance.admission_id=admission.admission_id and attendance.attdate='$attdate' WHERE admission.status='Active' AND ('$dt' BETWEEN start_date AND end_date)";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		while($rs = mysqli_fetch_array($qsql))
		{
			echo "<tr>
				<td>$rs[name]</td>	
				<td>$rs[hostellertype]</td>		
				<td>$rs[room_no] ($rs[block_name])</td>		
				<td>";
		?>
			<input type="hidden" name="aeeadmission_id[<?php echo $rs[0]; ?>]" value="<?php echo $rs[0]; ?>" >

			<input type="radio" name="attendancestatus[<?php echo $rs[0]; ?>]" value="Present"		<?php
		if($rs['attendancestatus'] == "Present")
		{
			echo "checked";
		}
		?> > Present 
			<br>
			<input type="radio" name="attendancestatus[<?php echo $rs[0]; ?>]" value="Absent"<?php
		if($rs['attendancestatus'] == "Absent")
		{
			echo "checked";
		}
		?> > Absent 			
		<?php
			echo "</td>	
			</tr>";
		}
		?>
		</tbody>
	</table>	

	<button type="submit" name="submit" class="btn btn-w3layouts w-100">Update</button>

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
<script>
function validateform()
{
	var errstatus = "true";
	if(document.frmform.attdate.value == "")
	{
		document.getElementById("idattdate").innerHTML = "Attendance date should not be empty...";
		errstatus = "false";
	}
	if(errstatus == "true")
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>