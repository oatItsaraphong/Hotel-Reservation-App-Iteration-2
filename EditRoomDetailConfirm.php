
<?php
    session_start();
    
    /*
    if($_POST['RoomNum1'] != NULL){
        $_SESSION['RoomDeEdit'] = $_POST['RoomNum1'];
        $_SESSION['RPrice'] = $_POST['RPrice'];
        $_SESSION['rStatusE'] = $_POST['rStatusE'];
        $_SESSION['NumBed'] = $_POST['NumBed'];
        $_SESSION['Bed'] = $_POST['Bed'];
        $_SESSION['Location'] = $_POST['Location'];
        $_SESSION['BalVal'] = $_POST['BalVal'];
        $_SESSION['KitVal'] = $_POST['KitVal'];
        $_SESSION['OtherCom'] = $_POST['OtherCom'];
        //echo "GGGg";
        
    }
    */

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
<div class='page-header'><h1>Change Detail for Room </h1></div>

<div class="col-md-4 col-sm-0 col-lg-5">
<div>
<?php
    
    echo "Change room: ";
    echo $_SESSION['RoomToEdit'];
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
        exit();

    }

    //echo $_SESSION['RoomID'];
    //echo $_SESSION['rStatus'];

       //echo $userToPutName;
    $upQuery = "UPDATE RoomTable SET RoomStatus = '".$_POST['rStatusE']."',
        RoomPrice = '".$_POST['RPrice']."',
        NumberOfBed = '".$_POST['NumBed']."',
        BedType = '".$_POST['Bed']."',
        LocationType = '".$_POST['Location']."',
        Balcony = '".$_POST['BalVal']."',
        Kitchen = '".$_POST['KitVal']."',
        Special = '".$_POST['OtherCom']."'
     WHERE RoomTable.RoomIDNum = ".$_SESSION['RoomToEdit'];

    //$upQuery = "UPDATE EmployeeTable SET Permission = '".$level."' WHERE EmployeeTable.UserName = '".$_SESSION['userPermission']."'";
    //echo $topID;
    //echo $upQuery;
    $result = mysqli_query($link,$upQuery);
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
    
?>
<script src="code/sample.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>