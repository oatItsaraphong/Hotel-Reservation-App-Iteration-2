
<html>
<head>
<title>Check Out Confirmation</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>

<body>

<div id="wrapper">
	<table width=100% height=30 bgcolor="brown"><tr></tr>
	</table>
        <h2> Add New Guest</h2>
        <br>
        <div id="professor">
            <strong>Add Guest</strong>
        <form action="AddGuestInsert.php" method="POST">
		<table>
			<tr>
	        	<td>Enter Guest Name:</td>
				<td><input type="text" name="GName" maxlength = "100" required>
				<br></td>
				<td></td>
			</tr>	

			<tr>
				<td>Enter Guest Phone Number:</td>
				<td><input type="number" name="GTel" maxlength = "20">
				<br></td>
				<td></td>
			</tr>

			<tr>
				<td>Enter Guest Email:</td> 		
	            <td><input type="text" name="GEmail" maxlength = "70">
				<br></td>
				<td></td>
			</tr>

			<tr>
				<td>Comment:</td>
				<td><input type="text" name="GComment" maxlength = "70">
	            </td>
				<td><input type="submit"></td>
			</div>
			</tr>
		</table>
    	</form>

    	</div>

</div>
</body>
</html>