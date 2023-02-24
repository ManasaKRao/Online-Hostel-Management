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

$sqladmission = "SELECT * FROM admission WHERE ('$dt' BETWEEN start_date AND end_date) AND admission.status='Active' AND hostellerid='" . $_SESSION['hostellerid'] . "'";
$qsqladmission = mysqli_query($con,$sqladmission);
if(mysqli_num_rows($qsqladmission) >=1)
{
	$rsadmission = mysqli_fetch_array($qsqladmission);
	$sqlbilling = "SELECT * FROM billing WHERE admission_id='$rsadmission[0]'";
	$qsqlbilling = mysqli_query($con,$sqlbilling);
	echo mysqli_error($con);
	$countbooking = mysqli_num_rows($qsqlbilling);
	$rsbilling = mysqli_fetch_array($qsqlbilling);
	//echo "<script>window.location='billingreceipt.php?insid=$rsbilling[0]';</script>";
}
?>
	
	
	<!-- news -->
	<section class="blog_w3ls py-5" id="news">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Select Room No.</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
				<center>
				<table  class="table table-striped table-bordered" style="width:700px;background-color: white;">
					<tr>
						<th>Block</th>
						<td><?php echo $rsblocks['block_name']; ?></td>
					</tr>
					<tr>
						<th>Room type</th>
						<td><?php echo $rsfees_structure['room_type']; ?></td>
					</tr>
					<tr>
						<th>Fees</th>
						<td>₹<?php echo $rsfees_structure['cost']; ?></td>
					</tr>
				</table>
				</center>
			</div>
			<div class="row pt-4">
			
	<?php
	$sql ="SELECT * FROM room WHERE status='Active'  AND block_id='$_GET[block_id]' AND fee_str_id='$rsfees_structure[fee_str_id]'";
	$qsql = mysqli_query($con,$sql);
	echo mysqli_error($con);
	while($rs = mysqli_fetch_array($qsql))
	{
		$sqladmission = "SELECT * FROM admission WHERE room_id='$rs[room_id]' AND (('$dt' BETWEEN start_date AND end_date) OR (start_date>'$dt')) AND status='Active'";
		$qsqladmission = mysqli_query($con,$sqladmission);
		$rsadmission = mysqli_fetch_array($qsqladmission);
		$admissionnumrows = mysqli_num_rows($qsqladmission);
	?>
<!-- blog grid -->
<div class="col-lg-2 col-md-2">
	<div class="card border-0 med-blog">

		<div class="card-header p-0">
			<a href="#">
				<center><h2><?php echo $rs['room_no']; ?></h2></center>
			</a>
		</div>
		<div class="card-body border border-top-0 pb-5">
			<center>
			<?php
			for($i=0; $i<$rs['no_of_beds'];$i++)
			{
				if($admissionnumrows > $i)
				{
			?>
			<a href="" onclick="alert('Already booked..');return false;" class="blog-btn"style="background-color:grey;"><i class="fa fa-user-o" aria-hidden="true"></i></a> 
			<?php
				}
				else
				{	
			?>
			<a href="#"  onclick="return confirmbeforebook('<?php echo $countbooking; ?>','<?php echo $rs['room_id']; ?>')" class="blog-btn" style="background-color:green;"><i class="fa fa-user" aria-hidden="true" ></i></a> 
			<?php
				}
			}
			?>
			</center>
		</div>
	</div>
<hr>
</div>
<!-- //blog grid -->
	<?php
	}
	?>	
				
			</div>
		</div>
	</section>
	<!-- //blog -->
<script>
function confirmbeforebook(bookid,room_id)
{
	if(bookid > 0)
	{
		/*alert("You have already booked a Room..");
		viewmessagebox('You have already booked a Room..');*/
		swal("You have already booked a Room..");
		return false;
	}
	else
	{
			swal({
			  title: "Are you sure?",
			  text: "Are you sure want to book this room?",
			  icon: "warning",
			  buttons: true,
			  dangerMode: true,
			})
			.then((willDelete) => {
			  if (willDelete) {
				window.location="admission.php?block_id=<?php echo $_GET['block_id']; ?>&fee_str_id=<?php echo $_GET['fee_str_id']; ?>&room_id="+room_id;
			  } else {
				swal("Your request terminated..!");
			  }
			});
			return false;
		/*
		if(confirm("Are you sure want to book this room?") == true)
		{
			return true;
		}
		else
		{
			return false;
		}
		*/
	}
}
</script>
<?php
include("footer.php");
?>