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

<body>
	<div>
	<?php
	$User = $_SESSION['User'];
	$Pass = $_SESSION['Pass'];
	

	header('Content-Type: text/html; charset=utf8');
	require "configHotel.php";
	require "functionUse.php";
	$link = LoginDB($User,$Pass);
	if($link == 0)
	{
		echo "Wrong UserName";
		BackToMainBTN();
		exit();

	}

	
	mysqli_set_charset($link,"utf8");

	$_SESSION["User"] = $User;
	$_SESSION["Pass"] =$Pass;

	$_SESSION["Link"] = $link;


	?>
	</div>
	
		<div>
		<?php
			$per = CheckPermission($_SESSION['User'],$_SESSION['Pass'],$link);
			if(($per == 2) OR ($per==4))
			{
		?>
			<div class="col-md-4 col-sm-0 col-lg-5">

			<form id ='formPerMission' method="POST">

				<div class="form-group">
		            <label for="UserName1">Username:</label>
		            <input type="text" class="form-control" name="userPermission" placeholder="Username" required>
		        </div>

		        <div class="form-group">
		            <label for="Pass2">Level:</label><br>
		           	<input type="radio" name="levelPermission" value="register" checked>Register<br>
		           	<input type="radio" name="levelPermission" value="manager">Manager<br>
		           	<input type="radio" name="levelPermission" value="maintainance">Maintain<br>
		        </div>

			</form>
			<button type="button" id="PermissionBtnSQL" class="btn btn-block btn-Info">Update Permissions</button>
		</div>


		<?php
			}
			else{
				echo "<p>New</p>";
			}

			mysqli_close($link);
		?>


	


	</div>

	<script src="code/sample.js" type="text/javascript"></script>
</body>
</html>
