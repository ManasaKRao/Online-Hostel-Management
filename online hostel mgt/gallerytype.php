<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE gallery_type SET gallery_type='$_POST[gallery_type]',gallery_type_description='$_POST[gallery_type_description]',gallery_type_status='$_POST[gallery_type_status]' WHERE  gallery_type_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==1 )
		{
		 echo "<script>viewmessagebox('Gallery Type updated successfully  ....','viewgallerytype.php')</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO gallery_type(gallery_type,gallery_type_description,gallery_type_status)VALUES('$_POST[gallery_type]','$_POST[gallery_type_description]','$_POST[gallery_type_status]')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			echo "<script>viewmessagebox('Gallery Type inserted successfully....','gallerytype.php')</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM gallery_type WHERE gallery_type_id='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Gallery Type</h3>
				<div class="arrw">
					<i class="fa fa-glass" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree"name="frmform" onsubmit="return validateform()">
	<div class="form-group">
		<label>Gallery Type</label><span class="errclass" id="idgallery_type"></span>
		<input class="form-control"  type="text" name="gallery_type" value="<?php echo $rsedit['gallery_type']; ?>">
	</div>
	<div class="form-group">
		<label>
			Description
		</label><span class="errclass" id="idgallery_type_description"></span>
		<textarea name="gallery_type_description" class="form-control"><?php echo $rsedit['gallery_type_description']; ?></textarea>
	</div>
	<div class="form-group">
		<label>
			Status
		</label><span class="errclass" id="idgallery_type_status"></span>
		<select name="gallery_type_status" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Active","Inactive");
			foreach($arr as $val)
			{
				if($val == $rsedit['gallery_type_status'])
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
	
	if(!document.frmform.gallery_type.value.match(alphaSpaceExp))
	{
		document.getElementById("idgallery_type").innerHTML = "Entered Gallery Type is not valid...";
		errstatus = "false";
	}
	if(document.frmform.gallery_type.value == "")
	{
		document.getElementById("idgallery_type").innerHTML = "Gallery Type should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.gallery_type_status.value == "")
	{
		document.getElementById("idgallery_type_status").innerHTML = "Kindly select status...";
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