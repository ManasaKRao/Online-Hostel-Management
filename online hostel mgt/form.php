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
			<li class="breadcrumb-item active" aria-current="page">Contact Us</li>
		</ol>
	</div>
	<!-- //page details -->

	<!-- contact -->
	<section class="contact-wthree py-5" id="contact">
		<div class="container py-xl-5 py-lg-3">
			<div class="title text-center mb-sm-5 mb-4">
				<h3 class="title-w3 text-bl text-center font-weight-bold">Contact Us</h3>
				<div class="arrw">
					<i class="fa fa-building-o" aria-hidden="true"></i>
				</div>
			</div>
			<div class="row pt-xl-4">
				<div class="col-lg-12">
					<div class="contact-form-wthreelayouts">
						<form action="#" method="post" class="register-wthree">
							<div class="form-group">
								<label>
									Your Name
								</label>
								<input class="form-control" type="text" placeholder="Johnson" name="name" required="">
							</div>
							<div class="form-group">
								<label>
									Mobile
								</label>
								<input class="form-control" type="text" placeholder="xxxx xxxxx" name="mobile" required="">
							</div>
							<div class="form-group">
								<label>
									Email
								</label>
								<input class="form-control" type="email" placeholder="example@email.com" name="email" required="">
							</div>
							<div class="form-group">
								<label>
									Your message
								</label>
								<textarea placeholder="Type your message here" name="message" class="form-control"></textarea>
							</div>
							<div class="form-group mt-4 mb-0">
								<button type="submit" class="btn btn-w3layouts w-100">Send</button>
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