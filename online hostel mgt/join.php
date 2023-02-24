<?php
include("header.php");
?>
	</div>
	<!-- //banner -->
	<!-- page details -->
	<div class="breadcrumb-agile">
		<ol class="breadcrumb m-0">
			<li class="breadcrumb-item">
				<a href="index.html">Home</a>
			</li>
			<li class="breadcrumb-item active" aria-current="page">Register Form</li>
		</ol>
	</div>
	<!-- //page details -->

	<!-- register -->
	<div class="register-w3 py-5">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Event Register Form</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="comment-top mt-5">
				<div class="comment-bottom agileinfo_mail_grid_right text-center">
					<form action="#" method="post">
						<div class="row">
							<div class="col-lg-6 form-group">
								<input class="form-control" type="text" name="Name" placeholder="Name" required="">
							</div>
							<div class="col-lg-6 form-group">
								<input class="form-control" type="email" name="Email" placeholder="Email" required="">
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 form-group">
								<input class="form-control" type="text" name="number" placeholder="Phone Number" required="">
							</div>
							<div class="col-lg-6 form-group">
								<select required="" class="form-control">
									<option value="">Select Your Pay Type</option>
									<option value="1">Paypal</option>
									<option value="2">Cheque</option>
									<option value="3">DD</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 form-group">
								<select required="" class="form-control">
									<option value="">Select State</option>
									<option value="1">state1</option>
									<option value="2">state2</option>
									<option value="3">state3</option>
									<option value="4">state4</option>
								</select>
							</div>
							<div class="col-lg-6 form-group">
								<select required="" class="form-control">
									<option value="">Select City</option>
									<option value="1">city1</option>
									<option value="2">city2</option>
									<option value="3"> city3</option>
									<option value="4">city4</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6 form-group">
								<input class="form-control" type="text" name="Zip Code" placeholder="Zip Code" required="">
							</div>
							<div class="col-lg-6 form-group">
								<input class="form-control" type="text" name="tickets" placeholder="Number of Tickets" required="">
							</div>
						</div>
						<div class="form-group">
							<textarea class="form-control" name="Message" placeholder="Message..." required=""></textarea>
						</div>
						<button type="submit" class="btn submit mt-3">Buy Ticket</button>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- //blog -->

	<?php
	include("footer.php");
	?>