<?php

if(isset($_POST['submit']))
{
	echo "<script>viewmessagebox('You have entered invalid login credentials..','index.php')</script>";
	}

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>online Hostel Management</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
<style>
.img
{
	size:300px;
	padding:40px,70px;
	
}
</style>
  
</head>

<body>

 

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between" >

     <h1 class="logo"><a href="index.html">Online Hostel Management</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!--<a href="index.html" class="logo" ><img src="images/employ.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li class="dropdown"><a href="#"><span>Student</span>
           <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="hosteller.php">Register</a></li>
             <li><a href="hostellerlogin.php">Login</a></li>
            </ul>
          </li>
          
          <li class="dropdown"><a href="#"><span>Guest</span>
           <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="guest.php">Register</a></li>
             <li><a href="guestlogin.php">Login</a></li>
            </ul>
          </li>
          
          <li class="dropdown"><a href="emplogin.php"><span>Admin</span>
           <i></i></a>
           
          </li>
          
          
       
			
           <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          </li>
          
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="500">
      <h1>Online Hostel Management</h1>
      <h2>Feel Yourself At Home.....</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left"><img src="assets/img/about.jpg" alt="" height="528" class="img-fluid"></div>
          <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right">
            <h3>Home Away From Home</h3>
            <p class="fst-italic">
              Life in a hostel is helpful to the students.
      It teaches them a sense of responsibility and they become 
      self-dependent.Hostel life teaches many lessons, self-dependence,
      self-reliance and disciplined way of life.Most importantly 
      they will adjust to all kinds of situations.<br />
      
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i>Admission is restricted to lady students of the college and preference is given to those who are non-residents of Udupi.<br><br>
 
              <li><i class="bi bi-check-circle"></i> The students are placed under the care of the Warden who is responsible for the discipline and moral well-being of the students.All the students-in-residence should strictly carry out the routine and rules framed by the chairman/Warden.<BR><br>
</li>
              <li><i class="bi bi-check-circle"></i>Students whose conduct is not satisfactory may be asked to leave the Hostel.The decision of the chairman in all matters concerning the Hostel shall be     final.<br><br> </li>
              <li><i class="bi bi-check-circle"></i>Fees once paid will not be refunded.<br><br></li>
              <li><i class="bi bi-check-circle"></i>MONTHLY HOSTEL CHARGE:</I> Monthly expenditure on sharing basis to be paid every month with mess charges.<br><br></li>
              <li><i class="bi bi-check-circle"></i>The routine of meals etc, are fixed by the authorities should be strictly adhered to. </li>
            </ul>
            
          </div>
        </div>

      </div>
    </section><!-- End About Section -->
    

 <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <span>Contact Us</span>
          <h2>Contact Us</h2>
          <p>Swing by for a cup of coffee, or leave us a message..</p>
        </div>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-6">
            <div class="info-box mb-4">
              <i class="bx bx-map"></i>
              <h3>Our Address</h3>
              <p>Kunjibettu, Udupi-576102</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-envelope"></i>
              <h3>Email Us</h3>
              <p>hostel@gmail.com</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="info-box  mb-4">
              <i class="bx bx-phone-call"></i>
              <h3>Call Us</h3>
              <p>0820-2520736</p>
            </div>
          </div>

        </div>

        <div class="row" data-aos="fade-up">
        
        
         <div class="col-lg-6">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

         <!--- <div class="col-lg-6 ">
            <iframe class src="https://www.google.co.in/maps/place/Mgm+College+Indoor+Stadium/@13.3464068,74.7619521,17z/data=!4m12!1m6!3m5!1s0x3bbcbb5a4a2027c3:0xbaca5987973bc727!2sMahatma+Gandhi+Memorial+College+Udupi!8m2!3d13.3464068!4d74.7664368!3m4!1s0x3bbcbb5bceae9c97:0xd2223c1498ceafb0!8m2!3d13.3474708!4d74.7645977?hl=en" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>-->

          <!--<div class="col-lg-6"
            <form action="forms/contact.php" method="post" name="frmform" role="form" class="php-email-form" onsubmit="return validateform">
              <div class="row">
                <div class="col-md-6 form-group">
                
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
                 
            <div class="form-group mt-3">
              <div class="text-center"><button type="submit" name="submit" style="background-color:transparent;color:#000;size:90px; padding:10px,30px" ; onClick="fun()">Send Message</button></div>
              <div class="form-group mt-3">
                <div class="text-center" ><button type="reset" name="reset" style="background-color:transparent; color:#000; size:90px; border:none; padding:10px,30px"  >Reset</button></div>
              </div>-->
              
              
              
              

<script>
function fun() {
	window.alert("your message has been sent successfully");
	
		
	}


  
</script>


	
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
   <!-- <div class="footer-top">
      <div class="container">
       <div class="row">

            <div class="col-lg-20 col-md-20">
            <div class="footer-info">
              <h3></h3>
              <p>Kunjibettu, Udupi-576102<br>
                <strong>Phone:</strong>0820-2520736 <br>
                <strong>Email:</strong> hostel@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

         
      </div>
    </div>-->

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Online Hostel Management</span></strong><br> All Rights Reserved
      </div>
      
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>