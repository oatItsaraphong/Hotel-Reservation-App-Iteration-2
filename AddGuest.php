
<html>
<head>
<title>Check Out Confirmation</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<link rel="stylesheet" type="text/css" href="css/styleOne.css">

</head>

<body>

<div class='backFull' id="wrapper">
    <h2> Add New Guest</h2>
    <br>

    <div class='page-header'><h3>Create Account</h3></div>
	<div class="newPad col-md-4 col-sm-0 col-lg-12">
	<div>

        
        <form action="AddGuestInsert.php" method="POST">

	        <div align='left' class="form-group">
	            <label for="FullName1">Guest Name:</label>
	            <input type="text" class="form-control" name="GName" placeholder="Fullname" required>
	        </div>
	        <div align='left' class="form-group">
	            <label for="Phone">Phone Number:</label>
	            <input type="number" class="form-control" name="GTel" placeholder="0000000000" >
	        </div>

	        <div align='left' class="form-group">
	            <label for="Email">Email:</label>
	            <input type="email" class="form-control" name="GEmail" placeholder="aaa@me.com" required>
	        </div>

	        <div align='left' class="form-group">
	            <label for="Comment">Comment:</label>
	            <input type="text" class="form-control" name="GComment" placeholder="Comment" >
	        </div>

	        <div>
	        	<input type="submit" class='btn-block btn btn-info' value="Add New Guest"></td>
	        </div>

    	</form>
    </div>

    </div>

</div>
</body>
</html>