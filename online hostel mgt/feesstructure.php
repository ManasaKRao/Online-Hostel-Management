<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE fees_structure SET block_id='$_POST[block_id]',hostellertype='$_POST[hostellertype]',room_type='$_POST[room_type]',cost='$_POST[cost]',status='$_POST[status]'WHERE  fee_str_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('record updated successfully..');
			//echo "<script>window.location='viewfeesstructure.php';
			echo "<script>viewmessagebox('record updated successfully  ....','viewfeesstructure.php')</script>";
		}
		//Update statement ends here		
	}
	else
	{
		$sql = "INSERT INTO fees_structure(block_id,hostellertype,room_type,cost,status)VALUES('$_POST[block_id]','$_POST[hostellertype]','$_POST[room_type]','$_POST[cost]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('record inserted successfully..');
			//echo "<script>window.location='feesstructure.php';
			
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM fees_structure WHERE fee_str_id='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	echo mysqli_error($con);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
	

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Fees structure</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">

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
		Hosteller type
		</label><span class="errclass" id="idhostellertype"></span>
		<select name="hostellertype" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Student","Employee");
			foreach($arr as $val)
			{
				
				if($val == $rsedit['hostellertype'])
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
        
        <!--<div class="form-group col-lg-6">
			<label>
				Hosteller Type
			</label><span class="errclass" id="idh_type"></span>
			<input type="text" value="Student" name="h_type" class="form-control" readonly>
		</div>-->
        
        
	<div class="form-group">
		<label>
		Room type
		</label><span class="errclass" id="idroom_type"></span>
		<select name="room_type" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Single Occupancy","Double Sharing","Triple Sharing","Dormitory");
			foreach($arr as $val)
			{
				
				if($val == $rsedit['room_type'])
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
		<label>
			Cost
		</label><span class="errclass" id="idcost"></span>
		<input class="form-control"  type="text" name="cost" value="<?php echo $rsedit['cost'];?>">
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
		document.getElementById("idblock_id").innerHTML = "Kindly select Block ID...";
		errstatus = "false";
	}
	if(document.frmform.hostellertype.value == "")
	{
		document.getElementById("idhostellertype").innerHTML = "Hostellertype should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.room_type.value == "")
	{
		document.getElementById("idroom_type").innerHTML = "Roomtype should not be empty...";
		errstatus = "false";
	}
	if(!document.frmform.cost.value.match(numericExpression))
	{
		document.getElementById("idcost").innerHTML = "cost should contain digits...";
		errstatus = "false";
	}
	if(document.frmform.cost.value == "")
	{
		document.getElementById("idcost").innerHTML = "Cost should not be empty...";
		errstatus = "false";
	}
	
	if(document.frmform.status.value == "")
	{
		document.getElementById("idstatus").innerHTML = "Kindly select status...";
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