<?php
session_start();
?>

<html>
<head>
<title>BaseHotel</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<link rel="stylesheet" type="text/css" href="theme.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/styleOne.css">


</head>

<body class="back">
	
	<?php

	$User = 0;
	$Pass = 0;

	//check to use session or post
	if(!is_null($_POST['feededUser']))
	{
		session_destroy();
		//echo "LogIn 1";
		session_start();
	}

	if(is_null($_SESSION['User']))
	{
		if(is_null($_POST['feededUser']))
		{
			exit("Invalid Access");
		}

		$User = $_POST['feededUser'];
		$Pass = $_POST['feededPass'];

	}
	else
	{

		$User = $_SESSION['User'];
		$Pass = $_SESSION['Pass'];
	}

	header('Content-Type: text/html; charset=utf8');
	require "configHotel.php";
	$link = LoginDB($User,$Pass);
	if($link == 0)
	{	
		echo "<div class='newMain2'>";
		//echo "<div class ='col-lg-12'>";
		echo "<h3>Wrong UserName</h3>";
		echo "<a href='Login.php' type='button' class='btn-block btn btn-danger'>Back to Login</a>";
		echo "</div>";
		exit();
		

	}

	require "functionUse.php";
	mysqli_set_charset($link,"utf8");

	$_SESSION["User"] = $User;
	$_SESSION["Pass"] =$Pass;

	$_SESSION["Link"] = $link;


	$per = CheckPermission($_SESSION['User'],$_SESSION['Pass'],$link);
	?>
	

	<div class="navMain col-sm-4 col-md-3 col-lg-3 MainNAV black">

	<img src="images/logo.jpg" class="logo">
	<?php
		//for everyone except maintenance
		if(($per == 1) Or ($per == 2) Or ($per ==4))
		{
	?>
		<button type="button" id="TodayActivityBTN" class="btn-block btn btn-info">Today's Activity</button>
		<br>
		
		<button type="button" id="ReservationBTN" class="btn-block btn btn-primary">Reservation</button>
		<button type="button" id="CheckInBTN" class="btn-block btn btn-success">Check In</button>
		<button type="button" id="CheckOutBTN" class="btn-block btn btn-danger">Check Out</button>

		<br>
		<button type="button" id="AddGuestBTN" class="btn-block fit btn btn-primary">Add Guest</button>
		<button type="button" id="SearchAllGuestBTN" class="btn-block btn btn-info">SearchAllGuest</button>
		<button type="button" id="SearchAllRoomBTN" class="btn-block btn btn-info">Search All Room</button>


		<?php
		} //end if for the main Fincitn
			//$per = CheckPermission($_SESSION['User'],$_SESSION['Pass'],$link);

		//for Manager Only
		if(($per == 2) Or ($per ==4))
			{
				echo "<br><br>";
				echo "<br><button type='button' id='CancelBTN' class='btn-block btn btn-danger'>Cancel Reservation</button>";

				echo "<button type='button' id='ReportBTN' class='btn-block btn btn-primary'>Report By Date</button>";

				echo "<button type='button' id='RegisBTN' class='btn-block btn btn-primary'>Register New Employee</button>";

				echo "<button type='button' id='PermissionBTN' class='btn-block btn btn-primary'>Manage Employee Permission Level</button>";

				echo "<button type='button' id='addRoomMainBTN' class='btn-block btn btn-primary'>Add New Room</button>";
			}

			//for Manager and Maintenance
			if(($per == 3) Or ($per == 2) Or ($per ==4))
			{
				echo "<button type='button' id='roomStatusBTN' class='btn-block btn btn-primary'>Change Room Availability</button>";

			}


			//for Maintenance only
			if(($per == 3) Or ($per ==4))
			{
				echo "<button type='button' id='roomMainBTN' class='btn-block btn btn-primary'>Maintenance List</button>";

			}
	

			mysqli_close($link);
		
		?>
		<br>
		<a href="Login.php" type="button" id="LogoutBTN" class="btn-block btn btn-danger">Log Out</a>
	</div>


	
	<div class="newMain MainBODY col-sm-6 col-md-8 col-lg-9 " id="MainBODY"></div>
	 <script src="code/sample.js" type="text/javascript"></script>
</body>
</html>
