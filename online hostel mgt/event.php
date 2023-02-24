<?php
include("header.php");
if(isset($_POST['submit']))
{
	$file = $_FILES['event_banner']['name'];
	for($i=0;$i<count($file); $i++)
	{
		$filename[$i] =  rand(). $file[$i];
		move_uploaded_file($_FILES['event_banner']['tmp_name'][$i],"imgevent/".$filename[$i] );
	}
	$filearr =serialize($filename);
	if(isset($_GET['editid']))
	{
		//Update statement starts here
		 $sql ="UPDATE event SET event_title='$_POST[event_title]'";
		 if($_FILES['event_banner']['name'] != "")
		 {
		 $sql = $sql . ", event_banner='$filearr'";
		 }
		 $sql = $sql . ",event_description='$_POST[event_description]',event_date='$_POST[event_date]',status='$_POST[status]' WHERE eventid='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			//echo "<script>window.location='viewevent.php';</script>";
			echo "<script>viewmessagebox('Event record updated successfully  ....','viewevent.php')</script>";
		}
		//Update statement ends here		
	}
	else
	{
		$sql = "INSERT INTO event(event_title,event_banner,event_description,event_date,status) VALUES('$_POST[event_title]','$filearr','$_POST[event_description]','$_POST[event_date]','$_POST[status]')";
		$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			//echo "<SCRIPT>alert('Event record inserted successfully..');</SCRIPT>";
			//echo "<script>window.location='event.php';</script>";
			echo "<script>viewmessagebox('Event record inserted successfully....','event.php')</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM event WHERE eventid='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item"><a href="index.php">Home</a></li>	
		</ol>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Events Publisher</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" enctype="multipart/form-data"name="frmform" onsubmit="return validateform()">
	
	<div class="form-group">
		<label>
			Event title
		</label><span class="errclass" id="idevent_title"></span>
		<input class="form-control" type="text" placeholder="Event title" name="event_title" value="<?php echo $rsedit['event_title'];?>" >
	</div>
		
	<div class="form-group">
		<label>
			Event banner
		</label><span class="errclass" id="idevent_banner"></span>
		<input class="form-control" type="file" placeholder="Event banner" name="event_banner[]" id="event_banner" multiple value="<?php echo $rsedit['event_banner'];?>" >
	</div>
	<div class="form-group">
		<label>
			Event description
		</label><span class="errclass" id="idevent_description"></span>
		<textarea name="event_description" class="form-control" placeholder="Event description"><?php echo $rsedit['event_description'];?></textarea>
	</div>
	<div class="form-group">
		<label>
			Event date
		</label><span class="errclass" id="idevent_date"></span>
		<input class="form-control" min="<?php echo date("Y-m-d"); ?>" type="date" placeholder="Event banner" name="event_date" value="<?php echo $rsedit['event_date'];?>" >
	</div>
	
	<div class="form-group">
		<label>
			Status
		</label><span class="errclass" id="idstatus"></span>
		<select name="status" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Published","Draft");
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
	var errstatus = "true";
	if(document.frmform.event_title.value == "")
	{
		document.getElementById("idevent_title").innerHTML = "Name should not be empty...";
		errstatus = "false";
	}
	
	if(document.getElementById("event_banner").value == "")
	{
		document.getElementById("idevent_banner").innerHTML = "Event banner should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.event_description.value == "")
	{
		document.getElementById("idevent_description").innerHTML = "Event description should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.event_date.value == "")
	{
		document.getElementById("idevent_date").innerHTML = "Event date should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.status.value == "")
	{
		document.getElementById("idstatus").innerHTML = "Kindly select status ...";
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