<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
	$sql ="UPDATE blocks SET block_name='$_POST[block_name]',description='$_POST[description]',status='$_POST[status]' WHERE  block_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==1 )
		{
		 /*// echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
		 //echo "<script>window.location='viewblocks.php';</script>";*/
		 echo "<script>viewmessagebox('blocks updated successfully  ....','viewblocks.php')</script>";
		}
		}
	else
	{
	$sql = "INSERT INTO blocks(block_name,description,status)VALUES('$_POST[block_name]','$_POST[description]','$_POST[status]')";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		/*//echo "<SCRIPT>alert('record inserted successfully..');</SCRIPT>";
		//echo "<script>window.location='blocks.php';</script>";*/
		echo "<script>viewmessagebox('blocks record inserted successfully....','blocks.php')</script>";
	}
}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM blocks WHERE block_id='" . $_GET['editid'] ."'";
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Blocks</h3>
				<div class="arrw">
					<i class="fa fa-glass" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">

	<div class="form-group">
		<label>
			Block name
		</label><span class="errclass" id="idblock_name"></span>
		<input class="form-control"  type="text" name="block_name" value="<?php echo $rsedit['block_name']; ?>">
	</div>
	<div class="form-group">
		<label>
			Description
		</label><span class="errclass" id="iddescription"></span>
		<textarea name="description" class="form-control"><?php echo $rsedit['description']; ?></textarea>
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
					echo "<option selected value='$val'>$val</option>";
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
	
	if(!document.frmform.block_name.value.match(alphaSpaceExp))
	{
		document.getElementById("idblock_name").innerHTML = "Entered name is not valid...";
		errstatus = "false";
	}
	if(document.frmform.block_name.value == "")
	{
		document.getElementById("idblock_name").innerHTML = "Block name should not be empty...";
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