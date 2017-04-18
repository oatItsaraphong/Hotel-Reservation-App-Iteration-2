
<?php
    session_start();
    
    if($_POST['userPermission'] != NULL){
        $_SESSION['userPermission'] = $_POST['userPermission'];
        $_SESSION['permissionCode'] = $_POST['levelPermission'];
        echo "GGGg";
        exit(); 
    }

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
<div class='page-header'><h1>Change Permission</h1></div>

<div class="col-md-4 col-sm-0 col-lg-5">
<div>
<?php
    
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

    $level = 0;
    if($_SESSION['permissionCode'] == 'register'){
        $level = 1;
        //echo "normal";
    }
    else if ($_SESSION['permissionCode'] == 'manager'){
        $level = 2;
        //echo "manga";
    }
    else if ($_SESSION['permissionCode'] == 'maintainance'){
        $level = 3;
        //echo "main";
    }
    else{
        echo "Error Invalid permission";
        exit();
    }
       //echo $userToPutName;

    $upQuery = "UPDATE EmployeeTable SET Permission = '".$level."' WHERE EmployeeTable.UserName = '".$_SESSION['userPermission']."'";
    //echo $topID;
    $result = mysqli_query($link,$upQuery);
    //echo $result;
    if($result != false)
    {   
        echo "Update Successful<br>";
        if($level == 1){
            echo "Change to: Register level<br>";
        }
        else if ($level == 2){
            echo "Change to: Manager level<br>";
        }else if ($level == 3){
            echo "Change to: Maintainance level<br>";
        }
        else{
            echo "Error Invalid Database Modify";
        }

    }
    else{
        echo "Fail To update";
    }
    
?>
<script src="code/sample.js" type="text/javascript"></script>
</div>
</div>
</body>
</html>