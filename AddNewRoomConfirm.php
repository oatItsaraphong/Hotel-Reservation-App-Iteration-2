
<?php
    session_start();
?>

<html>
<head>
<title>Change Room Detail</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>

<body>
<div class='page-header'><h1>Add Room </h1></div>

<div class="col-md-4 col-sm-0 col-lg-5">
<div>
<?php
    
    echo "Add room: ";
    echo $_SESSION['AddRoomNum1'];
    echo "<br><br>";

    $User = $_SESSION['User'];
    $Pass = $_SESSION['Pass'];

    //echo $userToPutName;
    //echo $userToPutPass1;
    require "configHotel.php";
    //$link = LoginDB($User,$Pass);
    $link = LoginDB($_SESSION['User'],$_SESSION['Pass']);
    if($link == 0)
    {
        echo "Wrong UserName";
        echo "<a href='index.php' type='button' class='btn-block btn btn-warning'>Back to Login</a>";
        mysqli_close($link);
        exit();

    }

    $check = "SELECT RoomIDNum FROM `RoomTable` WHERE RoomIDNum =".$_POST['AddRoomNum1']; 

     $result = mysqli_query($link,$check);
     $test = mysqli_num_rows($result);
     if($test != 0){
     	echo "<h3>The room number already been taken.</h3><br>";
     	echo "<br>";
        BackToMainBTN();
        exit();
     }


    /**INSERT INTO `RoomTable` (`RoomIDNum`, `RoomPrice`, `NumberOfBed`, `RoomStatus`, `BedType`, `LocationType`, `Kitchen`, `Balcony`, `Special`) VALUES ('401', '1200', '3', 'Good', 'Twin Beds', 'Lake view', '1', '0', 'smoking');
    */
    //echo $_SESSION['RoomID'];
    //echo $_SESSION['rStatus'];

       //echo $userToPutName;
    $addQuery = "INSERT INTO `RoomTable` (`RoomIDNum`, `RoomPrice`, `NumberOfBed`, `RoomStatus`, `BedType`, `LocationType`, `Kitchen`, `Balcony`, `Special`) 
    	VALUES ('".
   			$_POST['AddRoomNum1']."','".
        	$_POST['AddRPrice']."','".
        	$_POST['AddNumBed']."','".
        	$_POST['AddrStatusE']."','".
        	$_POST['AddBed']."','".
        	$_POST['AddLocation']."','".
        	$_POST['AddKitVal']."','".
        	$_POST['AddBalVal']."','".
        	$_POST['AddOtherCom']."'".
    		")";

    //$upQuery = "UPDATE EmployeeTable SET Permission = '".$level."' WHERE EmployeeTable.UserName = '".$_SESSION['userPermission']."'";
    //echo $topID;
    //echo $upQuery;
    $result = mysqli_query($link,$addQuery);
    //echo $result;
    if($result != false)
    {   
        echo "Update Successful<br>";
        echo "<br>";
        BackToMainBTN(); 


    }
    else{
        echo "Fail To update";
        echo "<br>";
        BackToMainBTN(); 
    }
    mysqli_close($link);
?>
<script src="code/sample.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>