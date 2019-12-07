<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
// select logged in users detail
$res = pg_query($conn,"SELECT * FROM users WHERE id=" . $_SESSION['user']);
$userRow = pg_fetch_assoc($res);

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Hello,<?php echo $userRow['email']; ?></title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/index.css" type="text/css"/>
</head>
<style>
.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    font-size: 16px;
    border: none;
}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f1;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #ddd}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<body>

<!-- Navigation Bar-->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">UDAAN</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
			<div class="dropdown">
  <button class="dropbtn">Get UIN</button>
  <div class="dropdown-content">
    <a href="form - 1.html">Submit Form</a>
  </div>
</div>
			 <div class="dropdown">
  <button class="dropbtn">Geo-fenced Zones</button>
  <div class="dropdown-content">
    <a href="geofence.html">IIT Kanpur</a>
  </div>
</div>
               <div class="dropdown">
  <button class="dropbtn">Same Day Flight Request</button>
  <div class="dropdown-content">
    <a href="upload_kml.html">By Uploading KML File</a>
    <a href="perfect - Copy.html">By Drawing Path </a>
  </div>
</div>
<div class="dropdown">
  <button class="dropbtn">Future Flight Request</button>
  <div class="dropdown-content">
    <a href="upload_kml_10days.html">By Uploading KML File</a>
    <a href="10_days_draw.html">By Drawing Path </a>
  </div>
</div>
               <div class="dropdown">
  <button class="dropbtn">Geo-fence Request</button>
  <div class="dropdown-content">
    <a href="upload_kml_geofence.html">By Uploading KML File</a>
    <a href="drwng_path_geofence.html">By Drawing Path </a>
  </div>
</div>               <div class="dropdown">
  <button class="dropbtn"> Requests Status</button>
  <div class="dropdown-content">
    <a href="process - Copy.php">Accepted Flight Requests</a>
    <a href="#">Accepted Geo-fence requests</a>
	    <a href="show_rejected_paths.php">Rejected Flight Requests</a>
    <a href="#">Rejected Geo-fence requests</a>
  </div>
</div>
            </ul>
            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">
                        <span
                            class="glyphicon glyphicon-user"></span>&nbsp;Logged
                        in: <?php echo $userRow['email']; ?>
                        &nbsp;<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php?logout"><span class="glyphicon glyphicon-log-out"></span>&nbsp;Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>




<div class="container">
    <!-- Jumbotron-->
    <div class="jumbotron">
        <h1>Hello, <?php echo $userRow['username']; ?></h1>
        <p>You have been successfully registered in our system. Please read the <a href="information.html"target=blank">Information</a> to know about how you can use this system. </p>
      <!--  <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a></p>-->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h2>Some Instructions</h2>
            <p>This is your account page. Here you can register for your UAV and can get UIN for each UAV you registered..</p>
            <p>
                Here you can also request about the zones you want to be treated as geofenced zone. You can submit your request and also check the final status of your request here.
            </p>
            <p>You can also <strong>request for your flight path </strong>. and you will get to know about the final status of your request here</p>
         <!--   <p>The following snippet of text is <em>rendered as italicized text</em>.</p>  -->
            <p>You may know about All your previous requests, their final status and Associated UINs(Unique Identification Numbers) here.</p>

        </div>


    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

</body>
</html>
