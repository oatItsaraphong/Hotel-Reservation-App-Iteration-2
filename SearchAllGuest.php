<?php
	session_start();
?>

<html>
<head>
<title>Search All Guest</title>
<meta name="Content-Type" content="text/html; charset=utf8"/>
<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>


 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="css/styleOne.css">
<!-- LiveSearch -->
<script type="text/javascript">
$(document).ready(function()
{
    $('.search-box input[type="text"]').on("keyup input", function(){
        console.log("bbn222");
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length)
        {
            $.get("Search/LiveSearchSearchAllGuest.php", {term: inputVal}).done(function(data){
                console.log("bbn");
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } 
        else
        {
            resultDropdown.empty();
        }
    });
    // Set search input value on click of result item
    $(document).on("click", ".result p", function()
    {
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>

</head>

<body>
    <div id="wrapper">
        <h2>Can Search Name Tel Email</h2>
        <div class="search-box">
        <input type="text" autocomplete="off" placeholder="Search Name..." />
        <p>--------------------------------------------</p>
        <h2> Search All Guest</h2>
        <div class="result"></div>
        
        </div>



        <br>

        <table width=100% height=30 bgcolor="blue"><tr></tr></table>

    </div>
</body>
</html>
