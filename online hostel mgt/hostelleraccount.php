<?php
include("header.php");
if(!isset($_SESSION['hostellerid']))
{
	echo "<script>window.location='hostellerlogin.php';</script>";
}
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM mess_bill WHERE mess_bill_id='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Record deleted successfully..');</script>";
		echo "<script>window.location='viewmessbill.php';</script>";
	}
}


function getWorkingDays($startDate,$endDate){
  $startDate = strtotime($startDate);
  $endDate = strtotime($endDate);

  if($startDate <= $endDate){
    $datediff = $endDate - $startDate;
    return floor($datediff / (60 * 60 * 24));
  }
  return false;
}
?>



	<div class="serives-agile py-5" id="what" style="background-image:url(images/bg3.jpg);">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold" style="color:#000;">Student Account</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row welcome-bottom text-center">
				<div class="col-lg-12 col-sm-12">
					<div class="welcome-grid bg-white py-5 px-4">
						<h4 class="mt-4 mb-3 text-dark">Admission Detail</h4>
						<p>
<table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Room Type</th>		
			<th>Room No.</th>		
			<th>Start date</th>		
			<th>End date</th>		
			<th>Food Type</th>		
		</tr>
	</thead>
	<tbody>
	<?php
	$sql ="SELECT * FROM admission LEFT JOIN hosteller ON admission.hostellerid=hosteller.hostellerid LEFT JOIN room ON room.room_id=admission.room_id LEFT JOIN fees_structure ON fees_structure.fee_str_id=room.fee_str_id LEFT JOIN blocks on blocks.block_id=fees_structure.block_id WHERE admission.status='Active' AND ('$dt' BETWEEN admission.start_date AND admission.end_date) AND  hosteller.hostellerid='" . $_SESSION['hostellerid'] . "'  Order by admission_id DESC limit 0,1";
	$qsql = mysqli_query($con,$sql);
	while($rs = mysqli_fetch_array($qsql))
	{
		echo "<tr>
			<td>$rs[block_name] - $rs[room_type]</td>		
			<td>$rs[room_no]</td>			
			<td>" . date("d-m-Y",strtotime($rs['start_date'])) . "</td>		
			<td>" . date("d-m-Y",strtotime($rs['end_date'])) . "</td>		
			<td>$rs[food_type]</td>			
		</tr>";
	}
	?>
	</tbody>
</table>							
						</p>
					</div>
				</div>
				<br><hr>
			</div>
			<div class="row welcome-bottom text-center mt-5">
				<div class="col-lg-12 col-sm-12">
					<div class="welcome-grid bg-white py-5 px-4">
					<h4 class="mt-4 mb-3 text-dark">Mess Bill</h4>
						<p><table id="datatable"  class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Student Detail</th>
			<th>Room <br>Rent</th>		
			<th>Mess <br>Bill</th>		
			<th>Water & <br>Electricity</th>		
			<th>Maintanance <br>Charge</th>		
			<th>Penalty</th>		
			<th>Total</th>
			<th>Last Date</th>
			<th>Action</th>			
		</tr>
	</thead>
	<tbody>
	<?php
	$sqlmess_bill = "SELECT date FROM `mess_bill` LEFT JOIN admission ON admission.admission_id=mess_bill.admission_id WHERE admission.hostellerid='" . $_SESSION['hostellerid'] . "' GROUP BY date ORDER BY date DESC  limit 0,1";
	$qsqlmess_bill = mysqli_query($con,$sqlmess_bill);
	while($rsmess_bill = mysqli_fetch_array($qsqlmess_bill))
	{
		$_GET['month'] = date('Y-m', strtotime("+0 month", strtotime($rsmess_bill[0])));
		$fmonth = $_GET['month']."-01";
		$tmonth = $_GET['month']."-31";
		$sql ="SELECT admission.admission_id, hosteller.name, hosteller.hostellertype,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Room Rent' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth'  limit 0,1) as roomrent,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Mess Bill' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' limit 0,1) as messbill,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Water Electricity' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth'  limit 0,1) as waterelectricity,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Maintenance' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' limit 0,1) as maintenance,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Total Charges' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' limit 0,1) as totcharges,(SELECT mess_bill.mess_bill FROM mess_bill WHERE admission_id=admission.admission_id AND charge_type='Penalty' AND status='Active' AND mess_bill.date BETWEEN '$fmonth' and '$tmonth' limit 0,1) as penalty FROM `admission` left join hosteller on admission.hostellerid=hosteller.hostellerid where  admission.hostellerid='" . $_SESSION['hostellerid'] . "' and admission.status='Active'";
		$qsql = mysqli_query($con,$sql);
		echo mysqli_error($con);
		while($rs = mysqli_fetch_array($qsql))
		{
			$sqlbilling = "SELECT * FROM billing where admission_id='$rs[admission_id]' AND bill_type='Mess bill' AND status='Active' AND particulars='$_GET[month]'";
			$qsqlbilling = mysqli_query($con,$sqlbilling);
			$rsbilling = mysqli_fetch_array($qsqlbilling);
			
			$effectiveDate = date('10-M-Y', strtotime("+1 month", strtotime($_GET['month'])));
			$effectiveDate1 = date('Y-m-10', strtotime("+1 month", strtotime($_GET['month'])));
			
			$days = getWorkingDays($effectiveDate1,$dt);
			
			if($rs[3] != "")
			{
			echo "<tr>
				<td><b>Admission No.</b> $rs[admission_id]<br><b>$rs[hostellertype] :</b> $rs[name] </td>
				<td>₹$rs[3]</td>
				<td>₹$rs[4]</td>
				<td>₹$rs[5]</td>	
				<td>₹$rs[6]</td>	
				<td>₹$rs[8]</td>	";
				$totamt = $rs[3] + $rs[4] + $rs[5] + $rs[6] + $rs[8];
			echo "<td><b>₹" .  $totamt  ."</b></td>		
				<td>";
	echo $effectiveDate;
			echo "</td>"; 
			
			echo "<td>";
			if(mysqli_num_rows($qsqlbilling) >=1)
			{
				echo "<b>Paid</b>";
				echo "<br><b><a class='btn btn-info' href='messbillreceipt.php?billid=$rs[0]&month=$_GET[month]'>Bill Receipt</a></b>";
			}
			else
			{
				echo "<b>Unpaid</b>";
				echo "<br><b><a class='btn btn-info' href='messbillpayment.php?billid=$rs[0]&month=$_GET[month]&totamt=$totamt'>Make Payment</a></b>";
			}
			echo "</td></tr>";
			}
		}
	}
	?>
	</tbody>
</table>	
</p>
					</div>
				</div>
			</div>
			
			
			
			
			<div class="row welcome-bottom text-center mt-5">
				<div class="col-lg-12 col-sm-12">
					<div class="welcome-grid bg-white py-5 px-4"  style=" overflow-x: scroll;">
					<h4 class="mt-4 mb-3 text-dark">Attendance Report</h4>
<p>
<?php
$noofdaysinmonth = date("t",strtotime($_GET['month']));
?>
<table  class="table  table-bordered" style="background-color:#FFF;">
	<thead>
		<tr>
			<th>Name</th>		
			<th>Type</th>	
			<th>Room No.</th>	
			<?php
			for($i=1; $i<=$noofdaysinmonth; $i++)	
			{
				echo "<th>$i</th>";
			}
			?>
			<th>Present</th>
			<th>Absent</th>
		</tr>
	</thead>
	<tbody>
	
<?php
$dt = date("Y-m-d");
$sql ="SELECT * FROM `admission` left join hosteller on admission.hostellerid=hosteller.hostellerid LEFT JOIN room ON room.room_id=admission.room_id where '$dt' BETWEEN admission.start_date AND admission.end_date AND admission.status='Active'";
if(isset($_SESSION['hostellerid']))
{
		$sql = $sql . " AND hosteller.hostellerid='" . $_SESSION['hostellerid'] . "' ";
}
//echo $sql;
$qsql =mysqli_query($con,$sql);
while($rs = mysqli_fetch_array($qsql))
{
	
?>
		<tr>
			<th><?php echo $rs['name']; ?></th>		
			<th><?php echo $rs['hostellertype']; ?></th>	
			<th><?php echo $rs['room_no']; ?></th>	
			<?php
			$p=1;
			$a=1;
			for($i=1; $i<=$noofdaysinmonth; $i++)	
			{
				$attdt = $_GET['month'] . "-" . $i;
				$sqlatt = "SELECT * FROM attendance where attdate='$attdt' AND admission_id='$rs[0]'";
				$qsqlatt = mysqli_query($con,$sqlatt);
				$rsatt = mysqli_fetch_array($qsqlatt);
				
					echo "<td>";
					if($rsatt['attendancestatus'] == "Present")
					{
						echo "P</td>";
						$p = $p + 1;
					}
					else
					{
						if(mysqli_num_rows($qsqlatt) >= 1)
						{
						echo "A";
						$a = $a + 1;
						}
						
					}
					echo "</td>";
			}
			?>
			<td><?php echo $p; ?></td>
			<td><?php echo $a; ?></td>
		</tr>
<?php
}
?>
	</tbody>
</table>			

</p>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
	<!-- //what we do -->

	
	
	

<?php
include("footer.php");
?>