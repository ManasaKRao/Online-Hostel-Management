<?php
include("header.php");

$sqlfees_structure ="SELECT * FROM fees_structure WHERE status='Active' AND hostellertype='$_SESSION[hostellertype]' AND fee_str_id='$_GET[fee_str_id]'";
$qsqlfees_structure = mysqli_query($con,$sqlfees_structure);
echo mysqli_error($con);
$rsfees_structure = mysqli_fetch_array($qsqlfees_structure);

$sqlblocks ="SELECT * FROM blocks WHERE status='Active' AND block_id='$_GET[block_id]'";
$qsqlblocks = mysqli_query($con,$sqlblocks);
echo mysqli_error($con);
$rsblocks = mysqli_fetch_array($qsqlblocks);

$sqlroom ="SELECT * FROM room WHERE status='Active' AND room_id='$_GET[room_id]'";
$qsqlroom = mysqli_query($con,$sqlroom);
echo mysqli_error($con);
$rsroom = mysqli_fetch_array($qsqlroom);

if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		 $sql ="UPDATE admission SET hostellerid='" . $_SESSION['hostellerid'] . "',room_id='$_POST[room_id]',start_date='$_POST[start_date]',end_date='$_POST[end_date]',food_type='$_POST[food_type]',status='$_POST[status]'WHERE  admission_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
		if(mysqli_affected_rows($con) ==1 )
		{
			/*//echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			//echo "<script>window.location='viewadmission.php';</script>";*/
			echo "<script>viewmessagebox('Admission record updated successfully  ....','viewadmission.php')</script>";
		}
		//Update statement ends here		
	}
	else
	{
		$sql ="INSERT INTO admission(hostellerid,room_id,start_date,end_date,food_type,status)VALUES('$_SESSION[hostellerid]','$_GET[room_id]','$_POST[start_date]','$_POST[end_date]','$_POST[food_type]','Pending')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);		
		$insid= mysqli_insert_id($con);		
		$sql = "INSERT INTO fees(admission_id,fee_str_id,total_fees,invoice_date,status) VALUES('$insid','$_GET[fee_str_id]','$_POST[cost]','$dt','Pending')";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		/*
		$sql = "INSERT INTO billing(admission_id,bill_type,paid_amt,paid_date,payment_type,particulars,status)VALUES('$insid','Hostel Fees','$_POST[cost]','$dt','$_POST[payment_type]','$_POST[particulars]','Pending')";
		$qsql = mysqli_query($con,$sql);
		*/
		if(mysqli_affected_rows($con) ==1 )
		{
			/*//echo "<SCRIPT>alert('Admission record inserted successfully..');</SCRIPT>";
			
			//echo "<script>window.location='billing.php?admission_id=$insid';</script>";*/
					echo "<script>viewmessagebox('Admission record inserted successfully....','billing.php?admission_id=$insid')</script>";
		}
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM admission WHERE admission_id='" . $_GET['editid'] ."'";
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
				<h3 class="title-w3 text-bl text-center font-weight-bold">Admission Form</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-8 offset-2">
					<div class="contact-form-wthreelayouts">
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
	
				<table  class="table table-striped table-bordered" style="width:100%;background-color: white;">
					<tr>
						<th>Block</th>
						<td><?php echo $rsblocks['block_name']; ?></td>
					</tr>
					<tr>
						<th>Room type</th>
						<td><?php echo $rsfees_structure['room_type']; ?></td>
					</tr>
					<tr>
						<th>Room Number</th>
						<td><?php echo $rsroom['room_no']; ?></td>
					</tr>
					<tr>
						<th>Number of beds</th>
						<td><?php echo $rsroom['no_of_beds']; ?></td>
					</tr>
					<tr>
						<th>Fees</th>
						<td>₹<?php echo $rsfees_structure['cost']; ?> / year</td>
					</tr>
				</table>
<input type="hidden" name="cost" value="<?php echo $rsfees_structure['cost']; ?>" >
	
	<div class="form-group">
		<label>
			Joining from
		</label><span class="errclass" id="idstart_date"></span>
		<input class="form-control" type="date" placeholder="Start Date" name="start_date" value="<?php echo $rsedit['start_date'];?>" onchange="changedate(this.value)" max="<?php echo date("Y-m-d", strtotime("+60 days")); ?>" min="<?php echo date("Y-m-d"); ?>" >
	</div>
	<div class="form-group">
		<label>
			End Date
		</label>
		<div id="divenddate"><span class="errclass" id="idend_date"></span>
			<input class="form-control" type="date" placeholder="End Date" name="end_date" value="<?php echo $rsedit['end_date']; ?>" readonly >
		</div>
	</div>
	<div class="form-group">
		<label>
			Food type
		</label><span class="errclass" id="idfood_type"></span>
		<select name="food_type" class="form-control">
			<option value="">Select</option>
			<?php
			$arr = array("Veg","Nonveg");
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
function changedate(startdate)
{
	
        if (window.XMLHttpRequest) {
     
            xmlhttp = new XMLHttpRequest();
        } else {
        
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("divenddate").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxoneyear.php?startdate="+startdate,true);
        xmlhttp.send();
}
</script>
<script>

function validateform()
{
	var errstatus = "true";
	if(document.frmform.start_date.value == "")
	{
		document.getElementById("idstart_date").innerHTML = "Kindly select Start date...";
		errstatus = "false";
	}
   
	if(document.frmform.end_date.value == "")
	{
		document.getElementById("idend_date").innerHTML = "Kindly select End date...";
		errstatus = "false";
	}

	if(document.frmform.food_type.value == "")
	{
		document.getElementById("idfood_type").innerHTML = "Kindly select Food type...";
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