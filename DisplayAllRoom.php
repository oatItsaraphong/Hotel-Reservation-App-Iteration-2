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


</head>

<body>
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

	$AllRoom = "SELECT * FROM RoomTable WHERE RoomStatus = 'Good'";

	$result = mysqli_query($link,$AllRoom);
	$per = CheckPermission($_SESSION['User'],$_SESSION['Pass'],$link);

	if($result != false)
	{
            if(mysqli_num_rows($result) > 0)
            {
                echo "<h2>All the room</h2><br>";

                //echo "<table border=1px>";
                while($row = mysqli_fetch_array($result))
                {
                	//echo "A";
                	PrintRoom($row,$per);
                }
            }
	}

	mysqli_close($link);

	?>
	</div>

	<script src="code/sample.js" type="text/javascript"></script>
</body>
</html>
