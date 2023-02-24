<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE room SET block_id='$_POST[block_id]',fee_str_id='$_POST[fee_str_id]',room_no='$_POST[room_no]',no_of_beds='$_POST[no_of_beds]',description='$_POST[description]',status='$_POST[status]' WHERE room_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			/*//echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			//echo "<script>window.location='viewroom.php';</script>";*/
			echo "<script>viewmessagebox('Room record updated successfully  ....','viewroom.php')</script>";
		}
		//Update statement ends here		
	}
	else
	{
	$sql = "INSERT INTO room(block_id,fee_str_id,room_no,no_of_beds,description,status) VALUES('$_POST[block_id]','$_POST[fee_str_id]','$_POST[room_no]','$_POST[no_of_beds]','$_POST[description]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) ==1 )
	{
		/*//echo "<SCRIPT>alert('record inserted successfully..');</SCRIPT>";
		//echo "<script>window.location='room.php';</script>";*/
		echo "<script>viewmessagebox('Room record inserted successfully....','room.php')</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM room WHERE room_id='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Room</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
	

	<div class="form-group">
		<label>
		Block 
		</label><span class="errclass" id="idblock_id"></span>
		<select name="block_id" class="form-control">
			<option value="">Select</option>
			<?php
			$sqlblocks = "SELECT * FROM blocks where status='Active'";
			$qsqlblocks = mysqli_query($con,$sqlblocks);
			while($rsblocks = mysqli_fetch_array($qsqlblocks))
			{
				if($rsblocks['block_id'] == $rsedit['block_id'])
				{
				echo "<option value='$rsblocks[block_id]' selected>$rsblocks[block_name]</option>";
				}
				else
				{
				echo "<option value='$rsblocks[block_id]'>$rsblocks[block_name]</option>";
				}
			}
			?>
		</select>
	</div>
	
	<div class="form-group">
		<label>
		Fee structure 
		</label><span class="errclass" id="idfee_str_id"></span>
		<select name="fee_str_id" class="form-control">
			<option value="">Select</option>
			<?php
			$sqlblocks = "SELECT * FROM fees_structure where status='Active'";
			$qsqlblocks = mysqli_query($con,$sqlblocks);
			while($rsblocks = mysqli_fetch_array($qsqlblocks))
			{
				if($rsblocks['fee_str_id'] == $rsedit['fee_str_id'])
				{
				echo "<option value='$rsblocks[fee_str_id]' selected>$rsblocks[hostellertype] - $rsblocks[room_type] - ₹$rsblocks[cost]</option>";
				}
				else
				{
				echo "<option value='$rsblocks[fee_str_id]' >$rsblocks[hostellertype] - $rsblocks[room_type] - ₹$rsblocks[cost]</option>";
				}
			}
			?>
		</select>
	</div>
	
	<div class="form-group">
		<label>
				Room No
		</label><span class="errclass" id="idroom_no"></span>
		<input class="form-control"  type="text" name="room_no" value="<?php echo $rsedit['room_no'];?>">
	</div>
	
	<div class="form-group">
		<label>
				Number of beds
		</label><span class="errclass" id="idno_of_beds"></span>
		<input class="form-control"  type="text" name="no_of_beds"value="<?php echo $rsedit['no_of_beds'];?>">
	</div>
	
	<div class="form-group">
		<label>
			Description
		</label>
		<textarea name="description" class="form-control"><?php echo $rsedit['description'];?></textarea>
	</div>
	
	<div class="form-group">
		<label>
			Status
		</label><span class="errclass" id="idstatus"></span>
		<select name="status" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				
				if($val == $rsedit['status'])
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

	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Submit</button>
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
<script>
	function validateform()
{
	var numericExpression = /^[0-9]+$/;
	var alphaExp = /^[a-zA-Z]+$/;
	var alphaSpaceExp = /^[a-zA-Z\s]+$/;
	var alphanumericExp = /^[0-9a-zA-Z]+$/;
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
	
	$(".errclass").html('');
	
	var errstatus = "true";
	if(document.frmform.block_id.value == "")
	{
		document.getElementById("idblock_id").innerHTML = " Block ID should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.fee_str_id.value == "")
	{
		document.getElementById("idfee_str_id").innerHTML = "Fees structure ID should not be empty...";
		errstatus = "false";
	}
	if(!document.frmform.room_no.value.match(numericExpression))
	{
		document.getElementById("idroom_no").innerHTML = "Room number should contain digits...";
		errstatus = "false";
	}
	if(document.frmform.room_no.value == "")
	{
		document.getElementById("idroom_no").innerHTML = "Room number should not be empty...";
		errstatus = "false";
	}
	if(!document.frmform.no_of_beds.value.match(numericExpression))
	{
		document.getElementById("idno_of_beds").innerHTML = "No.of beds should contain digits...";
		errstatus = "false";
	}
	if(document.frmform.no_of_beds.value == "")
	{
		document.getElementById("idno_of_beds").innerHTML = "number of beds should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.status.value == "")
	{
		document.getElementById("idstatus").innerHTML = "Please select the status...";
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