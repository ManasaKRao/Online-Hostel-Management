<?php
include("header.php");
$sqlbilling = "SELECT * FROM billing WHERE billid='$_GET[insid]'";
$qsqlbilling = mysqli_query($con,$sqlbilling);
echo mysqli_error($con);
$rsbilling = mysqli_fetch_array($qsqlbilling);

$sqladmission = "SELECT admission.*,hosteller.*,room.* FROM admission LEFT JOIN hosteller on admission.hostellerid=hosteller.hostellerid LEFT JOIN room ON room.room_id=admission.room_id WHERE admission.admission_id='$rsbilling[admission_id]'";
$qsqladmission = mysqli_query($con,$sqladmission);
echo mysqli_error($con);
$rsadmission = mysqli_fetch_array($qsqladmission);
?>
	</div>
	
	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Admission Payment Receipt</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
					
	<div class="container">
  <div class="card">
<div class="card-header">
 
<strong>Bill No .<?php echo $rsbilling['billid']; ?></strong> 
  <span class="float-right"> <strong>Date:</strong><?php echo date("d-M-Y",strtotime($rsbilling['paid_date'])); ?></span>

</div>
<div class="card-body">
	<div class="row mb-4">
			<div class="col-sm-12">
				<center>
				<h2>ONLINE HOSTEL MANAGEMENT SYSTEM (HMS)</h2>
				<div></div>
				
				</center>
			</div>
			
			<div class="col-sm-12">
<br>
<br>
			</div>
			<div class="col-sm-12">
			<div style="font-size:16px;"><b>Received from Miss.  <u ><?php echo $rsadmission['name']; ?></u> Collected Amount <u >Rs.<?php echo $rsbilling[4]; ?></u>  from <u><?php echo date("d-M-Y",strtotime($rsadmission['start_date'])); ?></u>  to <u ><?php echo date("d-M-Y",strtotime($rsadmission['end_date'])); ?></u></b></div>
			</div>
	</div>
	
	


<div class="table-responsive-sm">
<table class="table table-striped">
<thead>
<tr>
<th class="center">#</th>
<th>Item</th>
<th>Description</th>

<th class="right">Total</th>
</tr>
</thead>
<tbody>
<tr>
<td class="center">1</td>
<td class="left strong">Room Fees</td>
<td class="left"><?php 
echo "<b>Room No. - </b>" . $rsadmission['room_no']."<br>";
echo "<b>Start date - </b>"  . date("d-M-Y",strtotime($rsadmission['start_date']))."<br>";
echo "<b>End date - </b>"  . date("d-M-Y",strtotime($rsadmission['end_date']))."<br>";
?></td>
<td class="right">₹<?php echo $rsbilling[4]; ?></td>
</tr>
</tbody>
</table>
</div>
<div class="row">
<div class="col-lg-4 col-sm-5">

</div>

<div class="col-lg-4 col-sm-5 ml-auto">
<table class="table table-clear">
<tbody>
<tr>
<td class="left">
<strong>Total</strong>
</td>
<td class="right">₹<?php echo $rsbilling[4]; ?></td>
</tr>
<tr>
<td class="left">
<strong>payment type</strong>
</td>
<td class="right"><?php echo $rsbilling[6]; ?></td>
</tr>
<tr>

</tbody>
</table>

</div>

</div>

</div>
</div>
</div>

<hr>
<center><button type="button" class="btn btn-success btn-lg btn-block" style="width:250px;" onclick="printme('contact')">Print</button></center>
            </div>
			
        </div>
    </div>
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
function printme(divName)
{
	     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>