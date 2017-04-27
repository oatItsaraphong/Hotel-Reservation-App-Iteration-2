<?php
	session_start();
?>

<html>
<head>
<title>Change Room Status</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>

    <?php
    $User = $_SESSION['User'];
    $Pass = $_SESSION['Pass'];
    

    header('Content-Type: text/html; charset=utf8');
    require "configHotel.php";
    $link = LoginDB($User,$Pass);
    if($link == 0)
    {
        echo "Wrong UserName";
        echo "<a href='index.php' type='button' class='btn-block btn btn-warning'>Back to Login</a>";
        exit();

    }

    require "functionUse.php";
    mysqli_set_charset($link,"utf8");

?>

    <div id="wrapper">
        <h2> Change Room Status</h2>
        <br>

                <?php

                    $AllRoom = "SELECT RoomStatus, RoomIDNum FROM RoomTable";

                    $result = mysqli_query($link,$AllRoom);
                    //$per = CheckPermission($_SESSION['User'],$_SESSION['Pass'],$link);

                    if($result != false)
                    {
                            if(mysqli_num_rows($result) > 0)
                            {
                                echo "<h3>All the room</h3><br>";

                                //echo "<table border=1px>";
                                while($row = mysqli_fetch_array($result))
                                {
                                    //echo "A";
                                    RoomChange($row);
                                }
                            }
                    }
                    mysqli_close($link);

                       // BackToMainBTN();
                ?>

                    <!--
                    <div class="form-group">
                        <label for="RoomID">Room Number: </label>
                        <input type="number" class="form-control" name="roomNumStatus" placeholder="Room Number" required>
                    </div>
                    <div class="form-group">
                        <label for="RoomID">Status: </label><br>
                            <td>
                            <input type='radio' name='rStatus' value='Good' checked="true"> Available
                            <br><input type='radio' name='rStatus' value='Fix'> Need maintanance
                            <br><input type='radio' name='rStatus' value='Inactive'> Inactive
                            </td>
                    </div>
                    <input type='button' id="roomStatusBTNCon" class='btn btn-block btn-warning' value="Change Room Status">
                    -->



        <table width=100% height=30 bgcolor="blue"><tr></tr></table>

    </div>
    <script src="code/sample.js" type="text/javascript"></script>
</body>

</html>
