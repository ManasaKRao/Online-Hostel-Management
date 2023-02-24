<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
	
	  <div class="item">
        <img src="slider/slider3.png" alt="New York" style="width:100%;height: 500px;">
        <div class="carousel-caption" style="opacity: 1.1;">
         <?php /*<h3 style="color: #d8a71b;"  >ONLINE HOSTEL MANAGEMENT SYSTEM..</h3>
          <b style="color: #d8a71b;"  >HOSTEL MANAGEMENT SYSTEM...</b>*/?>
        </div>
      </div>
  
      <div class="item active">
        <img src="slider/slider1.jpg" alt="ONLINE HOSTEL MANAGEMENT SYSTEM" style="width:100%;height: 500px;">
        <div class="carousel-caption" style="opacity: 1.1;">
          <h3 style="color: black;" >ONLINE HOSTEL MANAGEMENT SYSTEM..</h3>
          <b style="color: black;"  >HOSTEL MANAGEMENT SYSTEM...</b>
        </div>
      </div>

      <div class="item">
        <img src="slider/slider4.jpg" alt="ONLINE HOSTEL MANAGEMENT SYSTEM" style="width:100%;height: 500px;">
        <div class="carousel-caption" style="opacity: 1.1;">
          <h3 style="color: #d8a71b;"  >ONLINE HOSTEL MANAGEMENT SYSTEM..</h3>
          <b style="color: #d8a71b;"  >HOSTEL MANAGEMENT SYSTEM...</b>
        </div>
      </div>
    
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
