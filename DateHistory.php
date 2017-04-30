<?php
	session_start();
?>

<html>
<head>
<title>All infor</title>

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
    <div id="wrapper">
        <table width=100% height=30 bgcolor="#555555"><tr></tr></table>
        <form>
        </form>
        <h2> Reservation Record History</h2>
        <br>

	<?php
	
	header('Content-Type: text/html; charset=utf8');
	require "configHotel.php";
	BackToMainBTN();

	$link = LoginDB($_SESSION['User'],$_SESSION['Pass']);
	if($link == 0)
	{
		echo "Wrong UserName";
		echo "<a href='index.php' type='button' class='btn-block btn btn-warning'>Back to Login</a>";
		exit();

	}
	//$InDate = date('Y-m-d', strtotime($_SESSION['DateIn']));
	//$OutDate= date('Y-m-d', strtotime($_SESSION['DateOut']));

	require "functionUse.php";
	require "hisFunction.php";
	mysqli_set_charset($link,"utf8");
	

	if(true)
	{
		
		$DateType = 'HisCheckOutDate';
		$Min = date('Y-m-d', strtotime($_POST[DateMin]));
		$Max = date('Y-m-d', strtotime($_POST[DateMax]));
		echo "<h3>Between ".$Min." and ".$Max." (inclusive)</h3>";

		$sqlCash ="SELECT *
			FROM ResevHistoryTable, GuestTable, EmployeeTable
			WHERE GuestIDNum = ResevForGuest
				AND HisEmployee = EmployeeID
				AND HisStatus = 'Check Out'
				AND HisPayMentMethod = 'Cash'
				AND ($DateType BETWEEN '$Min' AND '$Max')
			ORDER BY HisStatus";
		$COCashQ = mysqli_query($link,$sqlCash);


		$sqlCredit ="SELECT *
			FROM ResevHistoryTable, GuestTable, EmployeeTable
			WHERE GuestIDNum = ResevForGuest
				AND HisEmployee = EmployeeID
				AND HisStatus = 'Check Out'
				AND HisPayMentMethod = 'Credit Card'
				AND ($DateType BETWEEN '$Min' AND '$Max')
			ORDER BY HisStatus";
		$COCreditQ = mysqli_query($link,$sqlCredit);


		$sqlCancel ="SELECT *
			FROM ResevHistoryTable, GuestTable, EmployeeTable
			WHERE GuestIDNum = ResevForGuest
				AND HisEmployee = EmployeeID
				AND HisStatus = 'Cancel'
				AND ($DateType BETWEEN '$Min' AND '$Max')
			ORDER BY HisStatus";
		$CancelQ = mysqli_query($link,$sqlCancel);

		//=========================
		function DisplaySQL($result, $MethodP)
		{
			if($result != false)
			{
				$test = mysqli_num_rows($result);
				if($test == 0)
				{
					echo "No Reservation";
				}
				echo "<h4>There are ".$test." records for <b>".$MethodP. "</b> catagory</h4>";
				echo "<table>";
				_Title_for_History();
				$totalCash = _Fill_History_Table_with_Total($result);
				echo "</table><br>";
				echo "<h4>The total payment for <b>".$MethodP."</b> is <b>".$totalCash."</b></h4" ;
			}
			else
			{
				echo "Query is Wrong";
			}	
		}//end function

		echo "<div class='title'><h3><b>Cash</b></h3>" ;
		DisplaySQL($COCashQ,"Cash");
		echo "</div><br><br><br>";
		echo "<div class='title2'><h3><b>Credit Card</b></h3>" ;
		DisplaySQL($COCreditQ,"Credit Card");
		echo "</div><br><br><br>";
		echo "<div class='title3'><h3><b>Cancel Records</b></h3>" ;
		DisplaySQL($CancelQ, "None");
		echo "</div>";
	}
	else
	{
		echo "Please Enter Type to use CheckIn or Out";
	}
	mysqli_close($link);
	?>
     <table width=100% height=30 bgcolor="#555555"><tr></tr></table>

</div>
</body>
</html>
