<?php
    session_start();
?>
<html>
<head>
<title>Register</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div>

<?php
	//echo "Send Result";
	//echo $_POST['Reciver1'];
	//echo $_POST['Subject1'];
	//echo $_POST['Message1'];

	//echo $_SESSION['User'];

	$Pass1 = $_POST['Pass1'];
	$Pass2 = $_POST['Pass2'];
	$User = $_POST['UserName1'];
	$Name = $_POST['FullName1'];

	if(strcmp($Pass1,$Pass2) != 0)
	{
		echo "Incorrect Password Input<br>";
		echo "<a href='HW3.php' align='right' type='button' class='btn btn-block btn-warning'>Back to Login</a>";
		exit();
	}
	//$link = $_SESSION['Link'];

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

	//check if the incoming informaiton is not empty
	if(($User != NULL) && ($Name != NULL))
	{
		//check if the user exist
		
		
		$sqlCheck = "SELECT UserName FROM `USER` WHERE UserName = '$User'";
		$checkResult = mysqli_query($link,$sqlCheck);
		
		//echo $checkResult;
			if(mysqli_num_rows($checkResult) == 0)
			{
				//start insert into a database
				//echo "Insert";
				//$sql = "SELECT * FROM `USER`";
				$sql = "INSERT INTO `USER` (`UserFullName`, `UserName`, `Password`) VALUES ('$Name', '$User', '$Pass1')";

				if(mysqli_query($link,$sql))
				{
						echo "<br><h2>Account Added</h2>". "<br>";
				}
				else
				{
						echo "Error Inserted". mysqli_error(). "<br>". "<br>";
				}
			}//end if number of user
			else
			{
				echo "<h2>Your username already exit please use other</h2><br>";
			}
	}
	else
	{
		echo "Missing arguemnt";
	}

	echo "<a href='HW3.php' align='right' type='button' class='btn btn-block btn-warning'>Back to Login</a><br>";
?>
	</div>
	<script src="jscode/page.js" type="text/javascript"></script>
</body>
</html>
