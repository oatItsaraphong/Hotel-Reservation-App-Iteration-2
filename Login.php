<?php
    session_start();
    session_destroy();
?>
<html>
<head>
<title>LogIn Page</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<div class='page-header'><h1>LogIn</h1></div>


<div class="container" style="margin-top:30px">
    <div class="col-md-4 col-sm-0 col-lg-5">
    <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><strong>Sign In </strong></h3></div>
        <div class="panel-body">
            <form role="form" action="MainMenu.php" method="post">
                <div class="form-group">
                <label for="InputUser1">Username </label>
                <input type="text" class="form-control" name="feededUser" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label for="InputPassword1">Password </label>
                    <input type="password" class="form-control" name="feededPass" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-block btn-primary">Sign in</button>

            </form>
            
        </div>
    </div>
    </div>
</div>

</body>
</html>
