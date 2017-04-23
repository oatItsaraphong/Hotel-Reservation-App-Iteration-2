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
    <div id="wrapper">
        <h2> Change Room Status</h2>
        <br>
        <form id="roomStatusForm" method="post">
            <div class='panel panel-warning'>
                <div class='panel-heading'> Change Room Status </div>
                <div class='panel-body'>
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
                    <input type='button' id="roomStatusBTNCon" class='btn btn-block btn-warning' value="Cancel">
                </div>
            </div>
        </form>
        <table width=100% height=30 bgcolor="blue"><tr></tr></table>

    </div>
    <script src="code/sample.js" type="text/javascript"></script>
</body>

</html>
