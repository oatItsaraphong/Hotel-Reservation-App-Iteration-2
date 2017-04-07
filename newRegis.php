
<?php
    session_start();
    if($_POST['UserName1'] != NULL){
        $_SESSION['UserRe'] = $_POST['UserName1'];
        $_SESSION['NameRe'] = $_POST['FullName1'];
        $_SESSION['Pass1Re'] = $_POST['Pass1'];
        $_SESSION['Pass2Re'] = $_POST['Pass2']; 
        exit();   
    }
?>

<html>
<head>
<title>Added Employee</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



</head>

<body>
<div class='page-header'><h1>Add Employee</h1></div>

<div class="col-md-4 col-sm-0 col-lg-5">
<div>
<?php
    
    $userToPutUser = $_SESSION['UserRe'];
    $userToPutName = $_SESSION['NameRe'];
    $userToPutPass1 = $_SESSION['Pass1Re'];
    if($_SESSION['Pass1Re'] != $_SESSION['Pass2Re']){
        echo "Invalid Password Input";
        exit();
    }

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

    //echo $userToPutName;

    $topID = "SELECT EmployeeID FROM EmployeeTable ORDER BY EmployeeTable.EmployeeID DESC";

    //echo $topID;
    $result = mysqli_query($link,$topID);
    //echo $result;
    if($result != false)
    {   
        

        $row = mysqli_fetch_assoc($result);
        //echo "TTE: ". $row['EmployeeID']."<br>";
        $newID = $row[EmployeeID] + 1;
        echo "<br>New Employee ID: ".$newID;

        $toAdd = "INSERT INTO EmployeeTable (EmployeeID, UserName, EmployeeName, EntryDate, Password, Permission) VALUES (".$newID.", '".$userToPutUser."', '".$userToPutName."', NULL, '".$userToPutPass1."', 1)";

        //echo "<br>".$toAdd;

        $AddedTo = mysqli_query($link, $toAdd);
        if($AddedTo != false)
        {
            echo "User have been Added<br>";
            echo "UserName: ". $userToPutUser. "<br>";
            echo "Access Level: Basic";
            
        }
        else
        {
            echo "Error Added";
        }
        //}
    }
    else{
        echo "Fail get";
    }
    
?>
</div>
</div>
</body>
</html>