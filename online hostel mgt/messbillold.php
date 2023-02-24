<?php
include("header.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
	 $sql ="UPDATE mess_bill SET admission_id='$_POST[admission_id]',charge_type='$_POST[charge_type]',date='$_POST[date]',mess_bill='$_POST[mess_bill]',note='$_POST[note]',status='$_POST[status]' WHERE  mess_bill_id='" . $_GET['editid'] ."'";
		$qsql = mysqli_query($con,$sql);
		if(mysqli_affected_rows($con) ==1 )
		{
			/*//echo "<SCRIPT>alert('record updated successfully..');</SCRIPT>";
			//echo "<script>window.location='viewbilling.php';</script>";*/
			echo "<script>viewmessagebox('Messbill record updated successfully...','viewbilling.php')</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
		//Update statement ends here		
	}
	else
	{		
		$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('0','Room rent','$_POST[month]-01','$_POST[varroomrent]','','Charges')";
		$qsql = mysqli_query($con,$sql);
		
		$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('0','Mess Bill','$_POST[month]-01','$_POST[varmessbill]','','Charges')";
		$qsql = mysqli_query($con,$sql);
		
		$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('0','Water Electricity','$_POST[month]-01','$_POST[varwaterelectricity]','','Charges')";
		$qsql = mysqli_query($con,$sql);
		
		$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('0','Maintenance','$_POST[month]-01','$_POST[varmaintanance]','','Charges')";
		$qsql = mysqli_query($con,$sql);
		
		$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('0','Total Charges','$_POST[month]-01','$_POST[vartotal]','','Charges')";
		$qsql = mysqli_query($con,$sql);
		
		$admission_id = $_POST['admission_id'];
		$noofdaysinmonth = $_POST['noofdaysinmonth'];
		$absent = $_POST['absent'];
		$roomrent = $_POST['roomrent'];
		$messbill = $_POST['messbill'];
		$waterelectricity = $_POST['waterelectricity'];
		$maintanance = $_POST['maintanance'];
		$totalamt = $_POST['totalamt'];
		$lastdate = $_POST['month']. "-01";
		$note = $_POST['note'];
		
		for($r=0; $r<count($_POST['messbill']);$r++)
		{
			$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('$admission_id[$r]','Room Rent','$lastdate','$roomrent[$r]','$note','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('$admission_id[$r]','Mess Bill','$lastdate','$messbill[$r]','$note','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('$admission_id[$r]','Water Electricity','$lastdate','$waterelectricity[$r]','$note','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('$admission_id[$r]','Maintenance','$lastdate','$maintanance[$r]','$note','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
			$sql = "INSERT INTO mess_bill(admission_id,charge_type,date,mess_bill,note,status) VALUES('$admission_id[$r]','Total Charges','$lastdate','$totalamt[$r]','$note','Active')";
			$qsql = mysqli_query($con,$sql);
			echo mysqli_error($con);
		}
		/*//echo "<script>alert('Bill Generated Successfully...');</script>";
		//echo "<script>window.location='viewmessbill.php';</script>";*/
		echo "<script>viewmessagebox('Bill Generated Successfully....','viewmessbill.php')</script>";
	}
}
if(isset($_GET['editid']))
{
	$sqledit = "SELECT * FROM mess_bill WHERE mess_bill_id='" . $_GET['editid'] ."'";
	$qsqledit = mysqli_query($con,$sqledit);
	$rsedit = mysqli_fetch_array($qsqledit);
}
if(isset($_GET['month']))
{
	$fmonth = $_GET['month']."-01";
	$tmonth = $_GET['month']."-31";
	$sql ="SELECT mess_bill.mess_bill FROM mess_bill WHERE  charge_type='Room Rent' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth'";
	$qsql = mysqli_query($con,$sql);
	if(mysqli_num_rows($qsql) >=1)
	{
		/*//echo "<script>alert('Mess Bill already generated for this month..');</script>";
		//echo "<script>window.location='messbill.php';</script>";*/
		if(!isset($_POST['submit']))
		{
		echo "<script>viewmessagebox('Mess Bill already generated for this month...','messbill.php')</script>";
		}
	}      
}
?>
	</div>
	<!-- //banner -->

	<!-- contact -->
	<section class="contact-wthree" id="contact">
		<div class="container py-lg-3">
			<div class="title text-center">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Mess Bill Entry</h3>
				<div class="arrw">
					<i class="fa fa-glass" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="contact-form-wthreelayouts">
					
					
					
					
<form action="" method="post" class="register-wthree" name="frmform" onsubmit="return validateform()">
<?php
if(!isset($_GET['month']))
{
?>
<div class="title text-center">
	<table class="table table-striped table-bordered"  style="background-color: white;">
	<tr>
	<td>Select Month</td><td><input type="month" name="month" id="month" max="<?php echo date("Y-m"); ?>" value="<?php echo $_GET['month']; ?>" ></td><td>
	<input type="button" name="btnsubmit" onclick="window.location='messbill.php?month='+month.value" value="Submit" class="form-control" style="cursor: pointer;">
	</td>
	</tr>
	</table>
	<?php
	$noofdaysinmonth = date("t",strtotime($_GET['month']));
	?>
</div>
<?php
}
else
{
?>
	<div class="title text-center">
	<table class="table table-striped table-bordered"  style="background-color: white;">
	<tr>
	<td>Selected Month</td><td><input type="month" name="month" id="month" max="<?php echo date("Y-m"); ?>" value="<?php echo $_GET['month']; ?>" ></td><td>
	<input type="button" name="btnsubmit" onclick="window.location='messbill.php?month='+month.value" value="Submit" class="form-control" style="cursor: pointer;">
	</td>
	</tr>
	</table>
	<?php
	$noofdaysinmonth = date("t",strtotime($_GET['month']));
	?>
</div>
	<hr>
	<div>	
	
		<div>
	<!-- contact -->
	<section>
		<div class="">
			<div class="">
				<div class="">
					<div class="">
<div >
<table  class="table  table-bordered" style="background-color: white;">
	<thead>
		<tr>
			<th>Name</th>		
			<th>Type</th>
			<th>No. of Days</th>
			<th>Present</th>
			<th>Absent</th>
			<th>Monthly Room Rent<br><input type="text" name="varroomrent" id="varroomrent" style="width: 75px;" onClick="this.select();"  onkeyup="calculatetotal()" onchange="calculatetotal()" value="0"></th>
			<th>Mess Bill<br><input type="text" name="varmessbill" id="varmessbill" style="width: 75px;" onClick="this.select();"  onkeyup="calculatetotal()" onchange="calculatetotal()" value="0"></th>
			<th>Water & Electricity Charge<br><input type="text" id="varwaterelectricity" name="varwaterelectricity" style="width: 75px;" onClick="this.select();"  onkeyup="calculatetotal()" onchange="calculatetotal()" value="0"></th>
			<th>Maintanance Charge<br><input type="text" id="varmaintanance" name="varmaintanance" style="width: 75px;"  onClick="this.select();" onkeyup="calculatetotal()" onchange="calculatetotal()" value="0"></th>
			<th>Total<br><input type="text" id="vartotal" name="vartotal" style="width: 75px; background-color: #efefb3;" onClick="this.select();"  onkeyup="calculatetotal()" onchange="calculatetotal()" value="0" readonly></th>
		</tr>
	</thead>
	<tbody>
<?php
$dt = date("Y-m-d");
$sql ="SELECT * FROM `admission` left join hosteller on admission.hostellerid=hosteller.hostellerid where '$dt' BETWEEN admission.start_date AND admission.end_date AND admission.status='Active'";
$qsql =mysqli_query($con,$sql);
$q=0;
$numrec= mysqli_num_rows($qsql);
echo "<input type='hidden' id='numberofrec' name='numberofrec' value='$numrec'>";
while($rs = mysqli_fetch_array($qsql))
{
?>
<input type="hidden" id="admission_id[<?php echo $q; ?>]" name="admission_id[]" value="<?php echo $rs[0]; ?>" >
		<tr>
			<th><?php echo $rs['name']; ?></th>
			<th><?php echo $rs['hostellertype']; ?></th>
			<th><?php echo $noofdaysinmonth; ?><input type="hidden" id="noofdaysinmonth[<?php echo $q; ?>]" name="noofdaysinmonth[]" value="<?php echo $noofdaysinmonth; ?>" ></th>
			<?php
			$p=0;
			$a=0;
			for($i=1; $i<=$noofdaysinmonth; $i++)	
			{
				$attdt = $_GET['month'] . "-" . $i;
				$sqlatt = "SELECT * FROM attendance where attdate='$attdt' AND admission_id='$rs[0]'";
				$qsqlatt = mysqli_query($con,$sqlatt);
				$rsatt = mysqli_fetch_array($qsqlatt);				
				if($rsatt['attendancestatus'] == "Present")
				{
					$p = $p + 1;
				}
				else
				{
					$a = $a + 1;
				}
			}
			?>
			<td><?php echo $p; ?></td>
			<td><?php echo $a; ?><input type="hidden" id="absent[<?php echo $q; ?>]" name="absent[]" value="<?php echo $a; ?>" ></td>
			<td><input type="text" id="roomrent[<?php echo $q; ?>]" name="roomrent[]" style="width: 75px; background-color: #efefb3;" readonly></td>
			<td><input type="text" id="messbill[<?php echo $q; ?>]" name="messbill[]" style="width: 75px; background-color: #efefb3;" readonly></td>
			<td><input type="text" id="waterelectricity[<?php echo $q; ?>]" name="waterelectricity[]" style="width: 75px; background-color: #efefb3;" readonly></td>
			<td><input type="text" id="maintanance[<?php echo $q; ?>]" name="maintanance[]" style="width: 75px; background-color: #efefb3;" readonly></td>
			<td><input type="text" id="totalamt[<?php echo $q; ?>]" name="totalamt[]" readonly style="width: 75px;background-color: red;color: white;padding-left: 2px;" readonly></td>
		</tr>
<?php
$q=$q +1;
}
?>
	</tbody>
</table>			
</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //contact -->
</div>
	
	</div>
	<div class="col-md-12">
		<label>
			Any Note
		</label><span class="errclass" id="idnote"></span>
		<textarea name="note" class="form-control" style="height: 100px;"></textarea>
	</div>

	<div class="form-group mt-4 mb-0">
		<button type="submit" name="submit" class="btn btn-w3layouts w-100">Submit</button>
	</div>
<?php
}
?>
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
	function calculatetotal()
	{
		var messamtperday=0;
		var noofdayspresent =0;
		document.getElementById("vartotal").value = parseFloat(document.getElementById("varroomrent").value) + parseFloat(document.getElementById("varmessbill").value) + parseFloat(document.getElementById("varwaterelectricity").value) + parseFloat(document.getElementById("varmaintanance").value);
		//noofdaysinmonth absent
		for(k=0; k<document.getElementById("numberofrec").value; k++)
		{
			messamtperday = parseFloat(document.getElementById("varmessbill").value) / parseFloat(document.getElementById("noofdaysinmonth[' + k + ']").value);
			noofdayspresent = parseFloat(document.getElementById("noofdaysinmonth[' + k + ']").value) - parseFloat(document.getElementById("absent[' + k + ']").value);
			
			document.getElementById("roomrent[' + k + ']").value = parseFloat(document.getElementById("varmessbill").value);
			
			document.getElementById("roomrent[' + k + ']").value = parseFloat(document.getElementById("varroomrent").value);
			document.getElementById("messbill[' + k + ']").value = parseInt(noofdayspresent * messamtperday);
			document.getElementById("waterelectricity[' + k + ']").value = parseFloat(document.getElementById("varwaterelectricity").value);
			document.getElementById("maintanance[' + k + ']").value = parseFloat(document.getElementById("varmaintanance").value);
			document.getElementById("totalamt[' + k + ']").value = parseFloat(document.getElementById("roomrent[' + k + ']").value)+parseFloat(document.getElementById("messbill[' + k + ']").value)+parseFloat(document.getElementById("waterelectricity[' + k + ']").value)+parseFloat(document.getElementById("maintanance[' + k + ']").value);
		}
	}
	function validateform()
{
	var errstatus = "true";
	if(document.frmform.admission_id.value == "")
	{
		document.getElementById("idadmission_id").innerHTML = " Please select Admission ID...";
		errstatus = "false";
	}
	if(document.frmform.charge_type.value == "")
	{
		document.getElementById("id	charge_type").innerHTML = "Please select charge type...";
		errstatus = "false";
	}
	if(document.frmform.date.value == "")
	{
		document.getElementById("iddate").innerHTML = "Date should not be empty...";
		errstatus = "false";
	}
	if(document.frmform.mess_bill.value == "")
	{
		document.getElementById("idmess_bill").innerHTML = "Messbill should not be empty...";
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