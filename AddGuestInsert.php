
<?php
    session_start();
?>
<html>
<head>
<title>Guest Added</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<link rel="stylesheet" type="text/css" href="theme.css">
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/styleOne.css">
</head>

<body class='back'>

    <div class='back2' id="wrapper">

    <h2> Guest Added</h2>
    <br>

	<?php
	header('Content-Type: text/html; charset=utf8');
	require "configHotel.php";
    $link = LoginDB($_SESSION['User'],$_SESSION['Pass']);
    mysqli_set_charset($link,"utf8");

    //check Iput data if no NULL
	if (($_POST["GName"]!=NULL) 
		&&(($_POST["GTel"]!=NULL) || ($_POST["GEmail"])))
	{
        //Add to DB
		$insertQ ="INSERT INTO GuestTable (GuestIDNum, GuestName, GuestTel, GuestEmail, GuestNumberOfVisit, GuestComment) 
				VALUES (NULL,'$_POST[GName]','$_POST[GTel]','$_POST[GEmail]',0, '$_POST[GComment]' )";
		if(mysqli_query($link,$insertQ))
		{
			echo "<br><h2>Inserted</h2>". "<br>";
		}
		else
		{
			echo "Error Inserted". mysqli_error(). "<br>". "<br>";
            BackToMainBTN();
            exit();
		}
	}	
	else
	{
		echo "<font color='red'><h2>Insert Error !!!!!</h2></font>";
	}
		
        $sql ="SELECT GuestIDNum, GuestName, GuestTel, GuestEmail,
                        GuestNumberOfVisit, GuestComment
                FROM GuestTable
                WHERE GuestName = '$_POST[GName]'";

        $result = mysqli_query($link,$sql);

        if($result != false)
        {
                $test = mysqli_num_rows($result);
                if($test == 0)
                {
                        echo "No Guest";
                        BackToMainBTN();
                        exit();
                }
	           echo "<table class='cent'>";
               while($row = mysqli_fetch_assoc($result))
                    {
                		
                        echo "<tr>"
                        ."<td>Guest ID</td>"."<td>".$row["GuestIDNum"]."</td>"
                        ."</tr><tr>"
                        ."<td>Name</td>"."<td>".$row["GuestName"]."</td>"
                        ."</tr><tr>"
                        ."<td>Phone Number</td>"."<td>".$row["GuestTel"]."</td>"
                        ."</tr><tr>"
                        ."<td>Email</td>"."<td>".$row["GuestEmail"]."</td>"
                        ."</tr><tr>"
                         ."<td>Number of visit</td>"."<td>".$row["GuestNumberOfVisit"]."</td>"
                         ."</tr><tr>"
                        ."<td>Comment</td>"."<td>".$row["GuestComment"]."</td></tr>";

                    }
            echo "</table>";
        
	}
	else
	{
		echo "Query is Wrong";
        BackToMainBTN();
        exit();
	}
    echo "<br>";
    BackToMainBTN();
	mysqli_close($link);
	?>

    </div>

</body>
</html>
