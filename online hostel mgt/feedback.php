<?php
include("header.php");
if(isset($_POST['submit']))
{
	$dttime = date("Y-m-d H:i:s");
	$sql = "INSERT INTO feedback(hostellerid,feedbackdttime,feedbacksubject,feedbackmessage) VALUES('$_SESSION[hostellerid]','$dttime','$_POST[feedbacktitle]','$_POST[feedbackmessage]')";
	$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
	if(mysqli_affected_rows($con) ==1 )
	{
		//echo "<SCRIPT>alert('Feedback published successfully..');</SCRIPT>";
		echo "<script>viewmessagebox('Feedback published successfully....','feedback.php')</script>";
	}
}
?>
	</div>
	

	<!-- contact -->
	<section class="contact-wthree" id="contact">
		<div class="container">
			<div class="title text-center">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Publish Feedback</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12 ">
					<div class="contact-form-wthreelayouts">

<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
	
	<div class="row">
	
		<div class="col-lg-12">
			<label>
				Feedback title
			</label> 
			<input class="form-control"  type="text" name="feedbacktitle" >
		</div>
	</div>
	<div class="form-group">
		<br>
		<label>
			Feedback message
		</label>
		<textarea name="feedbackmessage" class="form-control"></textarea>
	</div>
	
	
	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Click here to Post Feedback</button>
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
	var errstatus = "true";
	if(document.frmform.feedbacktitle.value == "")
	{
		document.getElementById("idfeedbacktitle").innerHTML = "Kindly select Start date...";
		errstatus = "false";
	}
	/*
	if(document.frmform.feedbackmessage.value == "")
	{
		document.getElementById("idfeedbackmessage").innerHTML = "Feedback message should not be empty...";
		errstatus = "false";
	}
	*/
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