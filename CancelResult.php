<?php
    session_start();
    if($_POST['RsvpIDCancel'] != NULL)
    {
    	$_SESSION['RSVP'] = $_POST['RsvpIDCancel'];
    }
?>
<html>
<head>
<title>CancelConfirm</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div>
	<h2>Confirm Cancel</h2>

<?php

	$RSVP = $_SESSION['RSVP'];

	require "configHotel.php";

	//check both the server connection and user account authentication
	$link = LoginDB($_SESSION['User'],$_SESSION['Pass']);
	if($link == 0)
	{
		//access
		echo "Unable to establish server connection<br>";
		echo "<a href='HW3.php' align='right' type='button' class='btn btn-block btn-warning'>Back to Login</a>";
		exit();
	}

	mysqli_set_charset($link,"utf8");
	
	$sqlCheck = "UPDATE `ReservationTable` SET `Statue` = 'Cancel' WHERE `ReservationTable`.`ReservationID` = ".$RSVP;
	$checkResult = mysqli_query($link,$sqlCheck);
	
	//echo $checkResult;
	if($checkResult != 0)
	{
		echo "<br><h2>Reservation have been Cancel</h2>". "<br>";
	}//end if number of user
	else
	{
		echo "<h2>Error</h2><br>";
	}


?>
	</div>

</body>
</html>
