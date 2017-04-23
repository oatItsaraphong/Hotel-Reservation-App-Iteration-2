<?php
    session_start();
    //if($_POST['RoomToEdit'] != NULL){
    ///    $_SESSION['RoomToEdit'] = $_POST['RoomToEdit'];
    //    exit(); 
    //}
?>

<html>
<head>
<title>Today Activity</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>

<div class='page-header'><h1>Today Activity</h1></div>

<div class="col-md-6 col-sm-0 col-lg-12">
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


    //$MoIn = date('Y-m-d', strtotime(getElementById('dateSet')));
    $Today = getDate();
    $date = $Today[year] +"-" + $Today[mon] + "-" + $Today[mday];
    $MoIn = date('Y-m-d', strtotime($date));

    echo "<h2> Today is: ";
    echo date('m-d-Y', strtotime($date));


    //Check In Section
    $CheckIn = "SELECT ReservationID, GuestName, Statue, GuestIDNum, ReservedForGuest, CheckInDate, CheckOutDate
                 FROM ReservationTable, GuestTable 
                 WHERE Statue = 'Reserved' 
                 AND GuestIDNum = ReservedForGuest AND CheckInDate ='".$MoIn."'";

    $result = mysqli_query($link,$CheckIn);
    $num = mysqli_num_rows($result);
    if($num > 0)
    {
        echo "<h3>";
        echo $num;
        echo " Guests Check In Today</h3>";

        //echo "<table border=1px>";
        while($row = mysqli_fetch_array($result))
        {
            //1 = check in
            PrintCustomerToday($row,1);
        }
    }
    else{
        echo "<h3>No Check In Today</h3><br>";
    }

    //-------------------------------------------------------------------------
    //Check Out Section
    $CheckOut = "SELECT ReservationID, GuestName, Statue, GuestIDNum, ReservedForGuest, CheckInDate, CheckOutDate
                 FROM ReservationTable, GuestTable 
                 WHERE Statue = 'Reserved' 
                 AND GuestIDNum = ReservedForGuest AND CheckOutDate ='".$MoIn."'";

    $result2 = mysqli_query($link,$CheckOut);
    $num2 = mysqli_num_rows($result2);
    if($num2 > 0)
    {
        echo "<h3>";
        echo $num2;
        echo "Guests Check Out Today</h3>";

        //echo "<table border=1px>";
        while($row = mysqli_fetch_array($result2))
        {
            // 2 = check out
            PrintCustomerToday($row,2);
        }
    }
    else{
        echo "<h3>No Check Out Today</h3><br>";
    }

?>
</div>
    <script src="code/sample.js" type="text/javascript"></script>
</body>
</html>