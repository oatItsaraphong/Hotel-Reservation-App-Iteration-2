
<?php
    session_start();
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

<link rel="stylesheet" type="text/css" href="css/styleOne.css">

</head>

<body class='back'>
<div class='container back2'>
<div class='page-header'><h1>Change room availability</h1></div>

<div class="col-md-6 col-lg-12">
<div>
<?php
    echo "<h4>";
    echo "Update Maintenance Detail for Room: ";
    echo $_POST['RoomP2'];
    //echo $_POST['MainIDP2'];
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

       //echo $userToPutName;
    $upQuery = "UPDATE MaintenanceTable SET 
            MainCost = '".$_POST['MainCostP']."',
            MainType = '".$_POST['MainTypeP']."',
            StartDate = '".date('Y-m-d', strtotime($_POST['StartP']))."',
            EndDate = '".date('Y-m-d', strtotime($_POST['EndP']))."',
            MainDetail = '".$_POST['MainDetailP']."',
            ActiveStatus = '".$_POST['ActVal']."'
    WHERE MainID = ".$_POST['MainIDP2'];

    //echo $upQuery;

    //echo $result;
    $result = mysqli_query($link,$upQuery);
    //echo $result;
    if($result != false)
    {   
        echo "Update Successful<br>";

        if($_POST[ActVal] == 0)
        {
            echo "<h4>The room are already to use, but the status of the room is not yet updated</h4>";
        }
        echo "<br>";
        BackToMainBTN(); 


    }
    else{
        echo "Fail To update";
        echo "<br>";
        BackToMainBTN(); 
    }
    echo "</h4>";
    mysqli_close($link);
    
?>
<script src="code/sample.js" type="text/javascript"></script>
</div>
</div>
</div>
</body>
</html>