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
</head>

<body>
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

    $MainRoom = "SELECT * FROM MaintenanceTable WHERE ".$_POST[MainDetailID]." = MainID";

    $result = mysqli_query($link,$MainRoom);
    //echo $MainRoom;

    //echo $_SESSION['RoomToEdit'];
    //echo $result;

    $test = mysqli_num_rows($result);
    

?>
<div class='page-header'><h1>Edit Room Detail</h1></div>


<div class='page-header'><h2>Room number <?php echo $_SESSION['RoomToEdit']; ?></h2></div>
<div class="col-md-4 col-sm-0 col-lg-6">
<div>


<?php
    if($test == 0){
        echo "<h2>Unable to access the data</h2>";

        BackToMainBTN();
        exit();
    }
    else{
        $test2 = mysqli_fetch_assoc($result);
        //echo $test2['RoomIDNum'];

?>
	<form action='MainUpdate.php' method="POST">

        <div class='row'>
        <div class="col-lg-6">
        <div class="form-group">
            <label for="MainIDP">Maintenance ID:</label>
            <input type="text" class="form-control" name="MainIDP" value =<?php
                echo $test2['MainID'];
            ?> disabled='disabled' required>
        </div>
        </div>

        <div class="col-lg-6">
        <div class="form-group">
            <label for="RoomP">Room Number:</label>
            <input type="date" class="form-control" name="RoomP"  value =<?php
                echo $test2['RoomToFix'];
            ?> disabled='disabled' required>
        </div>
        </div>
        </div>

        <div class="form-group">
            <label for="MainTypeP">Type:</label>
            <input type='text' class='form-control' name='MainTypeP' value=<?php 
                echo $test2['Maintype']; 
            ?>
            required>
        </div>

        <div class="form-group">
            <label for="MainCostP">Estimate Cost:</label>
            <input type="number" class="form-control" name="MainCostP" value =<?php
                echo $test2['MainCost'];
            ?> required>
        </div>

        <div class='row'>
        <div class="col-lg-6">
        <div class="form-group">
            <label for="StartP">Start Date:</label>
            <input type="date" class="form-control" name="StartP" value =<?php
                echo date('m/d/Y', strtotime($test2['StartDate']));
            ?> required>
        </div>
        </div>

        <div class="col-lg-6">
        <div class="form-group">
            <label for="EndP">End Date:</label>
            <input type="date" class="form-control" name="EndP"  value =<?php
                echo date('m/d/Y', strtotime($test2['EndDate']));
            ?> required>
        </div>
        </div>
        </div>

        <div class="form-group">
            <label for="MainDetailP">Detail:</label>
            <input type='textbox' class='form-control' name='MainDetailP' value =
            <?php 
                echo $test2['MainDetail']; 
            ?>
            required>
        </div>

        <!---->

        <div class="form-group container">
            <div class='row'>
            <div class='col'>
            <label for="Bal">Balcony: </label></div></div>

            <div class='row'>
                <div class='col-lg-3'>
                    <input type='radio' name='ActVal' value='1' checked="true"> Under Maintencance
                </div>
                <div class='col-lg-3'>
                    <input type='radio' name='ActVal' value='0'> Room is Available 
                </div>
            </div>


        </div> 
        <?php
            echo "<input value=".$test2['MainID']." name='MainIDP2' hidden></input>";
            echo "<input value=".$test2['RoomToFix']." name='RoomP2' hidden></input>";
		?>
        <input type="submit" id="EditMainDetailBTN" class="btn btn-block btn-Info" value="Maintenance Detail Room">
	</form>
    
</div>

    <?php 
    }// end else
        echo "<br>";
        BackToMainBTN();

    ?>
</div>
    <script src="code/sample.js" type="text/javascript"></script>
</body>
</html>