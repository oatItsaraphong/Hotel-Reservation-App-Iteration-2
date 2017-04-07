   //echo $userToPutName;

    $upQuery = "UPDATE EmployeeTable SET Permission = '".$level."' WHERE EmployeeTable.UserName = '".$_SESSION['userPermission']."'";
    //echo $topID;
    $result = mysqli_query($link,$upQuery);
    //echo $result;
    if($result != false)
    {   
        echo "Update Successful<br>";
        if($level == 1){
            echo "Change to: Register level<br>";
        }
        else if ($level == 2){
            echo "Change to: Manager level<br>";
        }else if ($level == 3){
            echo "Change to: maintainance level<br>";
        }
        else{
            echo "Error Invalid Database Modify";
        }

    }
    else{
        echo "Fail To update";
    }



UPDATE `EmployeeTable` SET `Permission` = '3' WHERE `EmployeeTable`.`EmployeeID` = 1136;

SELECT EmployeeID FROM `EmployeeTable` ORDER BY `EmployeeTable`.`EmployeeID` DESC 

INSERT INTO `EmployeeTable` (`EmployeeID`, `UserName`, `EmployeeName`, `EntryDate`, `Password`, `Permission`) VALUES ('1044', 'executive', 'prime ', NULL, '112233', '3');


            $row = mysqli_fetch_assoc($result);
            $newID = $row[EmployeeID] + 1;

            $toAdd = "INSERT INTO EmployeeTable (EmployeeID, UserName, EmployeeName, EntryDate, Password, Permission) VALUES (".$newID.", ".$userToPutUser.", ".$userToPutName.", NULL, ".$userToPutPass1." , 1)";

            $AddedTo = mysqli_query($link, $toAdd);
            if($AddedTo != false)
            {
                echo "User have been Added";
                
            }
            else
            {
                echo "Error Added";
            }


        <?php
    
    $userToPutUser $_SESSION['UserRe'];
    $userToPutName $_SESSION['NameRe'];
    $userToPutPass1 = $_SESSION['Pass1'];
    if($_SESSION['Pass1'] != $_SESSION['Pass2']){
        echo "Invalid Password Input";
        exit();
    }

    require "configHotel.php";
    $link = LoginDB($_SESSION['User'],$_SESSION['Pass']);
    if($link == 0)
    {
        echo "Wrong UserName";
        echo "<a href='index.php' type='button' class='btn-block btn btn-warning'>Back to Login</a>";
        exit();

    }


    $topID = "SELECT EmployeeID FROM EmployeeTable ORDER BY EmployeeTable.EmployeeID DESC";

    $result = mysqli_query($link,$allIn);
    if($result != false)
    {   
        $numEle = mysqli_num_rows($result);
        if($numEle == 0)
        {
            echo "No Update needed";
        }
        else{


            echo "No Update needed -2";

            $row = mysqli_fetch_assoc($result);
            $newID = $row[EmployeeID] + 1;

            $toAdd = "INSERT INTO EmployeeTable (EmployeeID, UserName, EmployeeName, EntryDate, Password, Permission) VALUES (".$newID.", ".$userToPutUser.", ".$userToPutName.", NULL, ".$userToPutPass1." , 1)";

            $AddedTo = mysqli_query($link, $toAdd);
            if($AddedTo != false)
            {
                echo "User have been Added";
                
            }
            else
            {
                echo "Error Added";
            }
        }
    }
?>