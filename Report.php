<?php
	session_start();
?>
<html>
<head>
<title>Enter Date for report</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<link rel="stylesheet" type="text/css" href="theme.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/styleOne.css">
</head>

<body >
    <div class='container backFull' id="wrapper">

     	<h2>Check Room</h2>
	<br>

<?php
	//echo "Enter Update";
	//update the database
	require "configHotel.php";
	require "functionUse.php";
	$link = LoginDB($_SESSION['User'],$_SESSION['Pass']);
	if($link == 0)
	{
		echo "Wrong UserName";
		BackToMainBTN(); 
		exit();

	}
	$allIn ="SELECT * FROM ReservationTable WHERE (Statue = 'Check Out' OR Statue = 'Cancel')";
	//echo $allIn;
	$result = mysqli_query($link,$allIn);
	if($result != false)
	{	
		$numEle = mysqli_num_rows($result);
		if($numEle == 0)
		{
			echo "No Update needed";
		}
		else
		{
			while($row = mysqli_fetch_assoc($result))
			{
				echo "There are ".$numEle." element got update<br><br>";
				
				
				$moving ="INSERT INTO ResevHistoryTable (ResevHisID, ResevID, HisCheckInDate, HisCheckOutDate,
					ResevRoom, 
        				ResevForGuest,
       	 				HisNumberOfGuest, ResevFrom, HisPaymentMethod,
					HisStatus, HisDiscount, HisAmount, 
				        HisEmployee, 
				        HisComment)
					VALUES (NULL, '$row[ReservationID]', '$row[CheckInDate]', '$row[CheckOutDate]',
						(SELECT RoomIDNum FROM RoomTable WHERE RoomIDNum = '$row[ReservedRoom]'), 
				            	(SELECT GuestIDNum FROM GuestTable WHERE GuestIDNum = '$row[ReservedForGuest]'), 
					        '$row[NumberOfGuest]', '$row[ReseredFrom]', '$row[PaymentMethod]',
						'$row[Statue]', '$row[DiscountPercent]', '$row[PaidAmount]', 
					        (SELECT EmployeeID FROM EmployeeTable WHERE EmployeeID = '$row[HandlerEmployee]'), 
					        '$row[ReservedComment]')";

				$deleting="DELETE FROM ReservationTable
						WHERE ReservationID = '$row[ReservationID]'";


				$movingQ = mysqli_query($link, $moving);
				if($movingQ != false)
				{
					//echo "Moving Successful<br>";
					$deletingQ = mysqli_query($link, $deleting);
					
					if($deletingQ == false)
					{
						echo "Error deleting record<br>";
					}
					//echo "Deleting Successful<br>";
				}
				else
				{
					echo "Error moving record<br>.";
				}
			}//end while


		}//end of number of element
	}
	else
	{
		echo "Query to update is wrong";
	}

	//BackToMainBTN(); 
	mysqli_close($link);
?>


	<div id= 'CheckingInGuest'>
	<strong><h4>Enter Date</h4></strong>


		<form action='DateHistory.php' target='_blank' method='post'>


			<div class="form-group">
            <label for="DateMin">Start Date:</label>
            <input type="text" class="form-control" name="DateMin" placeholder="mm/dd/yyyy" required>
        	</div>

        	<div class="form-group">
            <label for="DateMax">End Date:</label>
            <input type="text" class="form-control" name="DateMax" placeholder="mm/dd/yyyy" required>
        	</div>

        	<div>
	        	<input type="submit" class='btn-block btn btn-primary' value="Report"></td>
	        </div>


		</form>

	
	</div>
	<br>

</div>
</body>
</html>
