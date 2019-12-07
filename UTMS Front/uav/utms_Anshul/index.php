
<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = pg_query($conn,"SELECT * FROM users WHERE user_id=" . $_SESSION['user']);
$userRow = pg_fetch_assoc($res);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/styleMain.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta charset="utf-8">
	<title>Hello, <?php echo $userRow['name']; ?></title>
</head>

<body>
	<div class="wrapper">

		<div class="header">
			<a href="index.php"><img src="assets/logo.png" alt="logo" class="logo" height="70px" width="auto">
			</a>
			
			<div id="navItems">
				
    			<form action="/action_page.php" id="search-container">
      				<input type="text" placeholder="Search.." name="search">
      				<button type="submit"><i class="fa fa-search"></i></button>
    			</form>		
				<a href="logout.php?logout" id="logout">Logout</a>
			</div>
		</div>

		<div class="leftPanel">
			<nav>
				<ul class="leftPanelUL">
					<li id="profileLeftPanel">
						<div style="border-bottom: 1px #576170 solid; padding-bottom: 20px">
							<a href="#" style="float: left; margin-left: 20px;"><img src="assets/img_avatar.png" id="profilePic" ></a>
							<a href="profilePage.html" style="line-height: 35px; margin-left: 25px"> My Profile <i class="fa fa-angle-double-right"></i></a>
							<!-- <i class="fa fa-chevron-right icon" style="display: inline; border:1px black solid;"></i> -->
						</div>
					</li>
					<li class="justText">Registration Module</li>
					<li><a href="uin_form.html" target="_blank" class="leftPanelAnchor">UIN Form</a></li>
					<li class="justText">GeoSpace Module</li>
					<li><a href="map.html" class="leftPanelAnchor">Map</a></li>
					<li><a href="#" class="leftPanelAnchor">Flight Calendar</a></li>
					<li>
						<a href="#" class="leftPanelAnchor" onclick="Expand(); return false;">Request Geo-fence area</a>
						<div id="panel">
							<a href="Geo_fence.html" class="leftPanelAnchor"><i class="fa fa-angle-right"></i> Give Latitude and Longitude</a><br>
							<a href="#" class="leftPanelAnchor"><i class="fa fa-angle-right"></i> Draw on Map</a><br>
							<a href="#" class="leftPanelAnchor"><i class="fa fa-angle-right"></i> Upload KML file</a>
						</div>
					</li>
					<li><a href="manageGeofence.html" class="leftPanelAnchor">Manage Geo-fence requests</a></li>
					<li class="justText">Flight Module</li>
					<li>
						<a href="#" class="leftPanelAnchor" onclick="Expand1(); return false;">Request Flight Plan</a>
						<div id="panel1">
							<a href="Geo_fence.html" class="leftPanelAnchor"><i class="fa fa-angle-right"></i> Auto-Flight</a><br>
							<a href="#" class="leftPanelAnchor"><i class="fa fa-angle-right"></i> Draw on Map</a><br>
							<a href="#" class="leftPanelAnchor"><i class="fa fa-angle-right"></i> Upload KML file</a>
						</div>
					</li>
					<li class="justText">Traffic Module</li>
					<li><a href="#" class="leftPanelAnchor">More</a></li>
					<li><a href="#" class="leftPanelAnchor">Contact Us</a></li>
				</ul>
			</nav>
		</div>

		<div class="main">

			<div>
				Hello, <?php echo $userRow['name']; ?> <br>
			</div>

			<div>
				<iframe width="100%" height="450" src="https://embed.windy.com/embed2.html?lat=26.427&lon=80.307&zoom=11&level=surface&overlay=wind&menu=&message=&marker=&calendar=&pressure=&type=map&location=coordinates&detail=true&detailLat=26.445&detailLon=80.299&metricWind=kt&metricTemp=%C2%B0C&radarRange=-1" frameborder="0"></iframe>
			</div>

			<div>
				UAV Statistics: <br>
			</div>
			<div class="uavGallery">
				<div>
					<a href="">
						<img src="assets/uav1.jpeg" style="width: 100%">
					</a>
					<div class="desc">
						<b>DJI Mavic 2 Pro</b>
						<table align="center">
							<tr>
								<th>Category   </th>
								<td>Mini</td>
							</tr>
							<tr>
								<th>Recorded Flight Time   </th>
								<td>21 h 30 min</td>
							</tr>
							<tr>
								<th>Status   </th>
								<td>Healthy</td>
							</tr>
						</table>
					</div>
				</div>
				<div>
					<a href="">
						<img src="assets/uav2.jpeg" style="width: 100%">
					</a>
					<div class="desc">
						<b>DJI Mavic Air</b>
						<table align="center">
							<tr>
								<th>Category   </th>
								<td>Micro</td>
							</tr>
							<tr>
								<th>Recorded Flight Time   </th>
								<td>9 h 20 min</td>
							</tr>
							<tr>
								<th>Status   </th>
								<td>Healthy</td>
							</tr>
						</table>
					</div>
				</div>
				<div>
					<a href="uin_form.html" target="_blank">
						<img src="assets/roundAdd.png" style="width: 50%; margin-left: 65px; margin-top: 20px;">
					</a>
					<div class="desc">
						Add new UAV
					</div>
				</div>
			</div>

			<!-- <div>
				Flight Stats
			</div> -->
		</div>

		<div class="rightPanel">
			<div>
				<!-- <a class="weatherwidget-io" href="https://forecast7.com/en/26d4580d33/kanpur/" data-label_1="KANPUR" data-label_2="WEATHER" data-theme="original" >INDIA WEATHER</a>
				<script>
				!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
				</script> -->
				<p style="text-align: center;">Notifications</p>
				<div class="notifDiv" style="background-color: red">
					lorem ipsum
				</div>
				<div class="notifDiv" style="background-color: #2ECC71">
					lorem ipsum
				</div>
				<div class="notifDiv" style="background-color: #2ECC71">
					lorem ipsum
				</div>
			</div>
				
			
			<!-- <div>
				Div 3
			</div> -->
		</div>



		<div class="footer">

			<div class="footup">
				FOOT UP
			</div>
			<div class="footdown">
				FOOT DOWN
			</div>
		</div>

	</div>
</body>

<script>
	function Expand() {
		var x = document.getElementById('panel');
    	if (x.style.display === "none") {
        	x.style.display = "block";
    	} else {
        	x.style.display = "none";
    	}
	}

	function Expand1() {
		var x = document.getElementById('panel1');
    	if (x.style.display === "none") {
        	x.style.display = "block";
    	} else {
        	x.style.display = "none";
    	}
	}
</script>

</html>