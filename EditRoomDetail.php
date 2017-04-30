<?php
    session_start();
    //if($_POST['RoomToEdit'] != NULL){
    ///    $_SESSION['RoomToEdit'] = $_POST['RoomToEdit'];
    //    exit(); 
    //}
?>

<html>
<head>
<title>Edit Room Detail</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>

<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/styleOne.css">

</head>

<body class='back'>
<div class="container back2">
<?php
    $User = $_SESSION['User'];
    $Pass = $_SESSION['Pass'];
    
    $_SESSION['RoomToEdit'] = $_POST['RoomToEdit'];
    //echo $_SESSION['RoomToEdit'];

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

    $AllRoom = "SELECT * FROM RoomTable WHERE ".$_SESSION[RoomToEdit]." = RoomIDNum";

    $result = mysqli_query($link,$AllRoom);

    //echo $_SESSION['RoomToEdit'];
    //echo $result;

    $test = mysqli_num_rows($result);
    

?>
<div class='page-header'><h1>Edit Room Detail</h1></div>


<div class='page-header'><h2>Room number <?php echo $_SESSION['RoomToEdit']; ?></h2></div>
<div class="col-lg-12">
<div>


<?php
    if($test == 0){
        echo "<h2>Unable to access the data</h2>";
        mysqli_close($link);
        BackToMainBTN();
        exit();
    }
    else{
        $test2 = mysqli_fetch_assoc($result);
        //echo $test2['RoomIDNum'];

?>
	<form id ='formR' action='EditRoomDetailConfirm.php' method="POST">

        <div class="form-group">
            <label for="RoomNum1">Room Number:</label>
            <input type="text" class="form-control" name="RoomNum1" value =<?php
                echo $_SESSION['RoomToEdit'];
            ?> disabled='disabled' required>
        </div>

        <div class="form-group">
            <label for="RPrice">Price:</label>
            <input type='text' class='form-control' name='RPrice' value =
            <?php 
                echo $test2['RoomPrice']; 
            ?>
            required>
        </div>

        <div class="form-group">
            <label for="NumBed">Number of Beds:</label>
            <input type="text" class="form-control" name="NumBed" value =<?php
                echo $test2['NumberOfBed'];
            ?> required>
        </div>

        <div class="form-group">
            <label for="Bed">Bed Type:</label>
            <input type="text" class="form-control" name="Bed" value =<?php
                echo $test2['BedType'];
            ?> required>
        </div>

        <div class="form-group">
            <label for="Location">View:</label>
            <input type="text" class="form-control" name="Location"  value =<?php
                echo $test2['LocationType'];
            ?> required>
        </div>

        <div class="form-group">
            <div class='row'>
            <div class='col'>
            <label for="rStatusE">Status: </label></div></div>

            <div class='row'>
                <div class='col-lg-4'>
                    <input type='radio' name='rStatusE' value='Good' checked="true"> Available
                </div>
                <div class='col-lg-4'>
                    <input type='radio' name='rStatusE' value='Fix'> Need maintanance   
                </div>
                <div class='col-lg-4'>
                    <input type='radio' name='rStatusE' value='Inactive'> Inactive   
                </div>
            </div>
        </div>

        <div class="form-group">
            <div class='row'>
            <div class='col'>
            <label for="Bal">Balcony: </label></div></div>

            <?php
                if($test2['Balcony'] == 1)
                {
            ?>
            <div class='row'>
                <div class='col-lg-6'>
                    <input type='radio' name='BalVal' value='1' checked="true"> Have
                </div>
                <div class='col-lg-6'>
                    <input type='radio' name='BalVal' value='0'> Have Not
                </div>
            </div>

            <?php
                }
                else
                {
            ?>
            <div class='row'>
                <div class='col-lg-6'>
                    <input type='radio' name='BalVal' value='1' > Have
                </div>
                <div class='col-lg-6'>
                    <input type='radio' name='BalVal' value='0' checked="true"> Have Not
                </div>
            </div>
            <?php 
                }//end else
            ?>
        </div> 

        <div class="form-group">
            <div class='row'>
            <div class='col'>
            <label for="Bal">Kitchen: </label></div></div>

            <?php

                if($test2['Kitchen'] == 1)
                {
            ?>
            <div class='row'>
                <div class='col-lg-6'>
                    <input type='radio' name='KitVal' value='1' checked="true"> Have
                </div>
                <div class='col-lg-6'>
                    <input type='radio' name='KitVal' value='0'> Have Not
                </div>
            </div>

            <?php
                }
                else
                {
            ?>
            <div class='row'>
                <div class='col-lg-6'>
                    <input type='radio' name='KitVal' value='1' > Have
                </div>
                <div class='col-lg-6'>
                    <input type='radio' name='KitVal' value='0' checked="true"> Have Not
                </div>
            </div>
            <?php 
                }//end else
            ?>
        </div> 


        <div class="form-group">
            <label for="OtherCom">Other:</label>
            <input type="text" class="form-control" name="OtherCom"  value =<?php
                echo $test2['Special'];
            ?> >
        </div>
		
        <input type="submit" id="EditRoomDetailBTN" class="btn btn-block btn-Info" value="Edit Room">
	</form>
    
</div>

    <?php 
    }// end else
        echo "<br>";
        BackToMainBTN(); 
        mysqli_close($link);
    ?>
</div>
    <script src="code/sample.js" type="text/javascript"></script>
</div>
</body>
</html>