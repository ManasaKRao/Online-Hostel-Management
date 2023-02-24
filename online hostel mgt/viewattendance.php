<?php
include("header.php");
if(isset($_GET['delid']))
{
	$sql = "DELETE  FROM attendance WHERE attendanceid='" . $_GET['delid'] . "'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	if(mysqli_affected_rows($con) == 1)
	{
		
		echo "<script>viewmessagebox('Record deleted successfully....','viewattendance.php')</script>";
		//echo "<script>alert('Record deleted successfully..');</script>";
		//echo "<script>window.location='viewattendance.php';</script>";
	}
}
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">View Attendance</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
<form method="get" action="" >
<table class="table table-striped table-bordered"  style="background-color: white;">
	<tr>
		<td>Select Month</td><td><input type="month" name="month" max="<?php echo date("Y-m"); ?>" value="<?php 
		if(isset($_GET['month']))
		{
		echo $_GET['month']; 
		}
		else
		{
			echo date("Y-m");
		}
		?>" ></td><td><input type="submit" name="submit" class="form-control"></td>
	</tr>
</table>
</form>
<?php
		if(isset($_GET['month']))
		{
$noofdaysinmonth = date("t",strtotime($_GET['month']));
		}
		else
		{
$noofdaysinmonth = date("t",strtotime(date("Y-m")));
		}
?>
			</div>
			<div class="">
				<div class="">
					<div class="">
<div id="attprint">
<table  class="table  table-bordered" style="background-color: white;">
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
			$p=0;
			$a=0;
			for($i=1; $i<=$noofdaysinmonth; $i++)	
			{
				$attdt = $_GET['month'] . "-" . $i;
				$sqlatt = "SELECT * FROM attendance where attdate='$attdt' AND admission_id='$rs[0]'";
				$qsqlatt = mysqli_query($con,$sqlatt);
				$rsatt = mysqli_fetch_array($qsqlatt);
				
					echo "<td>";
					if($rsatt['attendancestatus'] == "Present")
					{
						echo "P";
						$p = $p + 1;
					}
					if($rsatt['attendancestatus'] == "Absent")
					{
						echo "A";
						$a = $a + 1;
					}
					else
					{
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
</div>
<hr>
<button type="button" name="submit" class="btn btn-w3layouts w-100" onclick="printme('attprint')">Print</button>		
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- //contact -->
<script>
function printme(divName)
{
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
	<?php
	include("footer.php");
	?>
<script>
$(document).ready( function () {
    $('#datatable').DataTable();
} );
</script>
<script>
function confirmdel()
{
	if(confirm("Are you sure?") == true)
	{
		return true;
	}
	else
	{
		return false;
	}
}
</script>	