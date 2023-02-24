<style>
#mmenu, #mmenu ul {
margin: 0;
padding: 0;
list-style: none;
}
#mmenu {
width: 100%;
border: 1px solid #222;
background-color: #111;
background-image: -moz-linear-gradient(#444, #111); 
background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111)); 
background-image: -webkit-linear-gradient(#444, #111); 
background-image: -o-linear-gradient(#444, #111);
background-image: -ms-linear-gradient(#444, #111);
background-image: linear-gradient(#444, #111);
-moz-border-radius: 6px;
-webkit-border-radius: 6px;
border-radius: 6px;
-moz-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
-webkit-box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
box-shadow: 0 1px 1px #777, 0 1px 0 #666 inset;
}
#mmenu:before,
#mmenu:after {
content: "";
display: table;
}
#mmenu:after {
clear: both;
}
#mmenu {
zoom:1;
}
#mmenu li {
float: left;
border-right: 1px solid #222;
-moz-box-shadow: 1px 0 0 #444;
-webkit-box-shadow: 1px 0 0 #444;
box-shadow: 1px 0 0 #444;
position: relative;
}
#mmenu a {
float: left;
padding: 12px 30px;
color: #999;
text-transform: uppercase;
font: bold 12px Arial, Helvetica;
text-decoration: none;
text-shadow: 0 1px 0 #000;
}
#mmenu li:hover > a {
color: #fafafa;
}
*html #mmenu li a:hover { /* IE6 only */
color: #fafafa;
}
#mmenu ul {
margin: 20px 0 0 0;
_margin: 0; /*IE6 only*/
opacity: 0;
visibility: hidden;
position: absolute;
top: 38px;
left: 0;
z-index: 9999; 
background: #444; 
background: -moz-linear-gradient(#444, #111);
background-image: -webkit-gradient(linear, left top, left bottom, from(#444), to(#111));
background: -webkit-linear-gradient(#444, #111); 
background: -o-linear-gradient(#444, #111); 
background: -ms-linear-gradient(#444, #111); 
background: linear-gradient(#444, #111);
-moz-box-shadow: 0 -1px rgba(255,255,255,.3);
-webkit-box-shadow: 0 -1px 0 rgba(255,255,255,.3);
box-shadow: 0 -1px 0 rgba(255,255,255,.3); 
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
-webkit-transition: all .2s ease-in-out;
-moz-transition: all .2s ease-in-out;
-ms-transition: all .2s ease-in-out;
-o-transition: all .2s ease-in-out;
transition: all .2s ease-in-out; 
} 
#mmenu li:hover > ul {
opacity: 1;
visibility: visible;
margin: 0;
}
#mmenu ul ul {
top: 0;
left: 150px;
margin: 0 0 0 20px;
_margin: 0; /*IE6 only*/
-moz-box-shadow: -1px 0 0 rgba(255,255,255,.3);
-webkit-box-shadow: -1px 0 0 rgba(255,255,255,.3);
box-shadow: -1px 0 0 rgba(255,255,255,.3); 
}
#mmenu ul li {
float: none;
display: block;
border: 0;
_line-height: 0; /*IE6 only*/
-moz-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
-webkit-box-shadow: 0 1px 0 #111, 0 2px 0 #666;
box-shadow: 0 1px 0 #111, 0 2px 0 #666;
}
#mmenu ul li:last-child { 
-moz-box-shadow: none;
-webkit-box-shadow: none;
box-shadow: none; 
}
#mmenu ul a { 
padding: 10px;
width: 130px;
_height: 10px; /*IE6 only*/
display: block;
white-space: nowrap;
float: none;
text-transform: none;
}
#mmenu ul a:hover {
background-color: #0186ba;
background-image: -moz-linear-gradient(#04acec, #0186ba); 
background-image: -webkit-gradient(linear, left top, left bottom, from(#04acec), to(#0186ba));
background-image: -webkit-linear-gradient(#04acec, #0186ba);
background-image: -o-linear-gradient(#04acec, #0186ba);
background-image: -ms-linear-gradient(#04acec, #0186ba);
background-image: linear-gradient(#04acec, #0186ba);
}
#mmenu ul li:first-child > a {
-moz-border-radius: 3px 3px 0 0;
-webkit-border-radius: 3px 3px 0 0;
border-radius: 3px 3px 0 0;
}
#mmenu ul li:first-child > a:after {
content: '';
position: absolute;
left: 40px;
top: -6px;
border-left: 6px solid transparent;
border-right: 6px solid transparent;
border-bottom: 6px solid #444;
}
#mmenu ul ul li:first-child a:after {
left: -6px;
top: 50%;
margin-top: -6px;
border-left: 0; 
border-bottom: 6px solid transparent;
border-top: 6px solid transparent;
border-right: 6px solid #3b3b3b;
}
#mmenu ul li:first-child a:hover:after {
border-bottom-color: #04acec; 
}
#mmenu ul ul li:first-child a:hover:after {
border-right-color: #0299d3; 
border-bottom-color: transparent; 
}
#mmenu ul li:last-child > a {
-moz-border-radius: 0 0 3px 3px;
-webkit-border-radius: 0 0 3px 3px;
border-radius: 0 0 3px 3px;
}
</style>
<?php
if(isset($_SESSION['hostellerid']))
{
?>
	<div id="mmenu">

		<li><a href="hostelleraccount.php">Main</a></li>

		<li>
			<a href="#">My Account</a>
			<ul>
			<li><a href="hostellerprofile.php">Profile</a></li>
			<li><a href="hostellerchangepswd.php">Change Password</a></li>
			</ul>
		</li>

		<li><a href="hostelbookingblock.php">Book Hostel</a></li>
		<li><a href="viewhostellermessbill.php">Mess Bill</a></li>

		
		<li>
			<a href="#">Leave Application</a>
			<ul>
			<li><a href="leaveapplication.php">Apply for Leave</a></li>
			<li><a href="viewleaveapplication.php">View Application</a></li>
			</ul>
		</li>

		<li>
			<a href="#">Feedback</a>
			<ul>
			<li><a href="feedback.php">Post Feedback</a></li>
			<li><a href="viewfeedback.php">View Feedbacks</a></li>
			</ul>
		</li>
		
		<li>
			<a href="#">Report</a>
			<ul>
				<li><a href="viewattendance.php">Attendance report</a></li>
				<li><a href="viewfees.php">Hostel Fees Report</a></li>
			</ul>
		</li>

		<li><a href="logout.php">Logout</a></li>
		
	</div>
<?php
}
if(isset($_SESSION['guestid']))
{
?>
	<div id="mmenu">

		<li><a href="guestaccount.php">Main</a></li>

		<li>
			<a href="#">My Account</a>
			<ul>
			<li><a href="guestprofile.php">Profile</a></li>
			<li><a href="guestchangepswd.php">Change Password</a></li>
			</ul>
		</li>

		<li><a href="hostelbookingreport.php">Hostel Booking Report</a></li>

		<li><a href="logout.php">Logout</a></li>
		
	</div>
<?php
}
if(isset($_SESSION['emp_id']))
{
?>
	<div id="mmenu">

		<li><a href="empaccount.php">Dashboard</a></li>

		<li>
			<a href="#">Account</a>
			<ul>
			<li><a href="employeeprofile.php">Profile</a></li>
			<li><a href="empchangepswd.php">Change Password</a></li>
			<?php
			if($_SESSION['emp_type'] == "Admin")
			{
			?>
			
			<?php
			}
			?>
			</ul>
		</li>

		<li>
			<a href="#">Student</a>
			<ul>
			<li><a href="viewhosteller.php">View Student</a></li>
			<li><a href="viewguest.php">View guest</a></li>
			<li><a href="viewadmission.php">View Admissions</a></li>
			<li><a href="viewfeedback.php" style="width: 200px;">View Feedback</a></li>
			<li><a href="viewbilling.php" style="width: 200px;">Income Report</a></li>
			</ul>
		</li>
		
		<li>
			<a href="#">Guest Booking</a>
			<ul>
			<li><a href="viewguestpendingbookings.php" style="width: 200px;">View Pending Bookings</a></li>
			<li><a href="viewguestapprovedbookings.php" style="width: 200px;">View Approved Bookings</a></li>
			<li><a href="viewguestrejectedbookings.php" style="width: 200px;">View Rejected Bookings</a></li>
			<li><a href="viewguestpaidbookings.php" style="width: 200px;">View Paid Guest</a></li>
			<li><a href="viewguest.php" style="width: 200px;">View Guest Records</a></li>
			</ul>
		</li>
		
		
		<li>
			<a href="#">Attendance</a>
			<ul>
			<li><a href="attendance.php">Add attendance</a></li>
			<li><a href="viewattendance.php">Attendance report</a></li>
			<li><a href="viewleaveapplication.php">View Leave report</a></li>
			</ul>
		</li>
		
		<?php
		if($_SESSION['emp_type'] == "Admin")
		{
		?>	
		<li>
			<a href="#">Room Settings</a>
			<ul>
				<li><a href="room.php" style="width: 200px;">Add room</a></li>
				<li><a href="viewroom.php" style="width: 200px;">View room</a></li>
				<li><a href="blocks.php" style="width: 200px;">Add blocks</a></li>
				<li><a href="viewblocks.php" style="width: 200px;">View blocks</a></li>
				<li><a href="feesstructure.php" style="width: 200px;">Add fees structure</a></li>
				<li><a href="viewfeesstructure.php" style="width: 200px;">View fees structure</a></li>
				<li><a href="guestfeestructure.php" style="width: 200px;">Guest Fee Settings</a></li>
			</ul>
		</li>	
		<?php
		}
		?>
		
		<li>
			<a href="#">Mess Bill</a>
			<ul>
			<li><a href="messbill.php">Mess bill & Others</a></li>
			<li><a href="viewmessbill.php">view messbill</a></li>
			</ul>
		</li>
		<li><a href="logout.php">Logout</a></li>
	</div>
<?php
}
?>