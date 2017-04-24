<?php
session_start();
?>

<html>
<head>
<title>Need to Fix</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<link rel="stylesheet" type="text/css" href="theme.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<div class='page-header'><h1>Current Maintenance Record</h1></div>

<div class="col-md-8 col-sm-0 col-lg-12">

	<div>


	<?php
	$User = $_SESSION['User'];
	$Pass = $_SESSION['Pass'];
	

	header('Content-Type: text/html; charset=utf8');
	require "configHotel.php";
	$link = LoginDB($User,$Pass);
	if($link == 0)
	{
		echo "Wrong UserName";
		echo "<a href='index.php' type='button' class='btn-block btn btn-warning'>Back to Login</a>";
		exit();

	}

	require "functionUse.php";
	mysqli_set_charset($link,"utf8");

	$AllRoom = "SELECT RoomIDNum  FROM RoomTable WHERE RoomStatus = 'Fix'";
	$per = CheckPermission($_SESSION['User'],$_SESSION['Pass'],$link);

	$result = mysqli_query($link,$AllRoom);

	if($result != false)
	{
        if(mysqli_num_rows($result) > 0)
        {
            echo "<h3>Need Maintance</h3><br>";

            while($row = mysqli_fetch_array($result))
            {
            	//echo $row['RoomIDNum'];
            	$Main = "SELECT * FROM MaintenanceTable WHERE RoomToFix = ".$row['RoomIDNum']." AND ActiveStatus = '1'";

            	$result2 = mysqli_query($link,$Main);
            	if($result2 != false)
            	{
	            	if(mysqli_num_rows($result2) > 0)
	        		{
	            	
	            		$info = mysqli_fetch_assoc($result2);
	            		PrintRoomMain($info, $per);
	            	}
	            	else if(mysqli_num_rows($result2) == 0)
	            	{
	            		echo "No Room Detail";
	            	}
	            }
            	else{
            		echo "Error retrive infor";
            	}


            }
        }
        else{
        	echo "<h3>No Maintance</h3><br>";
        }
	}

	?>
	</div>
</div>

	<script src="code/sample.js" type="text/javascript"></script>
</body>
</html>
