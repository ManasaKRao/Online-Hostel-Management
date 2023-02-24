<?php
session_start();
error_reporting(0);
date_default_timezone_set('Asia/Kolkata');
$dt = date("Y-m-d");
include("connection.php");
$sqlguestfees_structure = "SELECT * FROM fees_structure WHERE hostellertype='Guest'";
$qsqlguestfees_structure = mysqli_query($con,$sqlguestfees_structure);
$rsguestfees_structure = mysqli_fetch_array($qsqlguestfees_structure);
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>ONLINE HOSTEL MANAGEMENT SYSTEM Hostel Management System</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="UTF-8" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Arizonia&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Righteous&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin-ext" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Lato:100,100i,300,300i,400,400i,700,700i,900,900i&amp;subset=latin-ext"
	 rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<!-- //Web-Fonts -->
	<link href="css/jquery.dataTables.min.css" rel="stylesheet">
	<script src="js/jquery-3.3.1.js"></script>	
	<script src="js/jquery.dataTables.min.js"></script>
	<style>
	.errclass
	{
		color: red;
		padding-left: 5px;
	}
	body
	{
		font-family:Arial, Helvetica, sans-serif;
	}
	.navbar{
		overflow:hidden;
		background-color:balck;
	}
	.navbar a{
		background-image:url(images/homeicn.png);
		background-size:cover;
		font-size:16px;
		color:black;
		left:500px;
		padding:30px 30px;
		text-decoration:none;
	
	}
	.dropdown{
		float:left;
		overflow:hidden;
	}
	.dropdown .dropbtn{
		font-size:16px;
		border:none;
		color:black;
		padding:14px 16px;
		background-color:black;
		font-family:inherit;
		margin:0;
		
	}
	.navbar a:hover,.dropdown:hover .dropbtn{
		background-color:red;
		}
		
		.dropdown-content{
			display:none;
			position:absolute;
			background-color:white;
			min-width:160px;
			box-shadow:0px 8px 16px 0px rgba(0,0,0,0,2);
			z-index:1;
		}
		.dropdown-content a{
			float:none;
			color:white;
			padding:12px 16px;
			text-decoration:none;
			display:block;
			text-align:left;
		}
		.dropdown-content a:hover{
			background-color:black;
			
			
		}
		.dropdown:hover .dropdown-content{
			display:block
	}
	</style>
<script src="js/sweetalert.min.js"></script>
<script>
function viewmessagebox(msg,pagename)
{
	swal({title: 'HMS Hostel..',text: msg, type: 'success'}).then(function() {  window.location =  pagename;});
}
</script>

</head>

<body>
<?php
include("topmenu.php");
?>
<?php
if(basename($_SERVER['PHP_SELF']) == "index.php")
{
?>
	<div class="main-w3pvt" id="home" style="background-color:#FFF;background-image:url(assets/img/hero-bg.jpg); ">
<?php
}
else
{
?>	
	<div class="main-w3pvt-2" id="home" style="background-image:url(images/bg3.png);display:block;
		width:1540px; min-height:0px;" >
<?php
}
?>
		<!-- header -->
		<header  >
			<div class="container-fluid" >
				
					<!-- logo -->
					
					<!-- //logo -->
					<!-- nav -->
					
<div class="navbar">
                    <a href="index.php"></a>
                 


</div>
</header>

</body>
</html>

        
        
        
        
        
        
        
        
        
       
       