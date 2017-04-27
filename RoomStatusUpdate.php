
<?php
    session_start();
    /*
    if($_POST['roomNumStatus'] != NULL){
        $_SESSION['RoomID'] = $_POST['roomNumStatus'];
        $_SESSION['rStatus'] = $_POST['rStatus'];
        //echo "GGGg";
        exit(); 
    }
    */

    //test full function
    $_SESSION['RoomID'] = $_POST['roomNumStatus'];
    $_SESSION['rStatus'] = $_POST['rStatus'];

?>

<html>
<head>
<title>Change Permission</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>

<body>
<div class='page-header'><h1>Change room availability</h1></div>

<div class="col-md-4 col-sm-0 col-lg-5">
<div>
<?php
    
    echo "Change room: ";
    echo $_SESSION['RoomID'];
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
        BackToMainBTN();
        exit();

    }

        $upQuery = "UPDATE RoomTable SET RoomStatus = '".$_SESSION['rStatus']."' WHERE RoomTable.RoomIDNum = ".$_SESSION['RoomID'];

        //$upQuery = "UPDATE EmployeeTable SET Permission = '".$level."' WHERE EmployeeTable.UserName = '".$_SESSION['userPermission']."'";
        //echo $topID;
        //echo $upQuery;
        $result = mysqli_query($link,$upQuery);
        //echo $result;
        if($result != false)
        {   
            echo "Update Successful<br>";

        }
        else{
            echo "Fail To update";
        }

    
        if($_SESSION['rStatus'] == 'Fix')
        {
            //echo "DDd -- <br>";
            //Get Today Value    
            $Today = getDate();
            $date = $Today[year] +"-" + $Today[mon] + "-" + $Today[mday];
            $MoIn = date('Y-m-d', strtotime($date));

            $AddIn = "INSERT INTO `MaintenanceTable` (`MainID`, `MainType`, `MainCost`, `StartDate`, `EndDate`, `MainDetail`, `RoomToFix`, `ActiveStatus`) VALUES (NULL,'"
                    .'Unknown'."','" 
                    .'0'."','"
                    .$MoIn."','"
                    .$MoIn."','"
                    ."Unknown"."','"
                    .$_SESSION['RoomID']."','"
                    .'1'."')";
            
            $runAdd = mysqli_query($link,$AddIn);

            if($runAdd != false)
            {
                echo "Update Maintenance Detail";
            }
            else{
                echo "Fail to Update Maintenance Detail";
            }
            
        }


    
    echo "<br>";
    BackToMainBTN();
    mysqli_close($link);
?>
<script src="code/sample.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>