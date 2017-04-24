<?php

function PrintCustomerToday($Item, $param){

    echo "<div class ='col-lg-12'>";
    echo "<div class='panel panel-default '>";
    echo "<div class='panel-heading'><h4>Guest: ".$Item[GuestName];
    echo "</h4></div>";

    echo "<div class='panel-body'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-5'>";
    echo "ReservationID: ".$Item[ReservationID];
    echo "</div>";
    echo "<div class='col-lg-5'>";
    echo "Status: ".$Item[Statue];
    echo "</div>";
    echo "<div class='col-lg-2'>";
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='col-lg-5'>";
    echo "Check In: ".$Item[CheckInDate];
    echo "</div>";
    echo "<div class='col-lg-5'>";
    echo "Check Out: ".$Item[CheckOutDate];
    echo "</div>";
    echo "<div class='col-lg-2'>";

    if($param == 1)
    {
        echo "<form action='CheckInConfirm.php' method='post'>";
        echo "<input value=".$Item[ReservationID]." name='RsvpID' hidden></input>";
        echo "<input type='submit' class='btn btn-Danger pull-right' value='Check In'>";
        echo "</form>";
    }

    echo "</div>";
    echo "</div>";

    echo "</div></div></div>";
}

function PrintRoom($Item, $Permission){

    echo "<div class='col-lg-4 '>";
    echo "<div class='panel panel-default '>";
    echo "<div class='panel-heading'><h4>Room Number: ".$Item[RoomIDNum];
    echo "</h4></div>";
    echo "<div class='panel-body'>";
    //echo "<div class='wrap'>";

    echo "Price: ".$Item[RoomPrice];
    echo "<br>";
    echo "Number of Bed: ".$Item[NumberOfBed];
    echo "<br>";
    echo "Bed Type: ".$Item[BedType];
    echo "<br>";


    echo "Kitchen: ".ZeroToNo($Item[Kitchen]);
    echo "<br>";
    echo "Balcony: ".ZeroToNo($Item[Balcony]);
    echo "<br>";
    echo "Other: ".$Item[Special];
    echo "<br>";

    

    if(($Permission == 2) Or ($Permission == 4))
    {

        //echo "Price: ".$Item[RoomIDNum];
        echo "<form action='EditRoomDetail.php' class='formRoomEdit' method='post'>";
        echo "<input value=".$Item[RoomIDNum]." name='RoomToEdit' hidden></input>";
        echo "<input type='submit' class='RoomEditBTN btn btn-Danger pull-right' value='Edit Room Info'>";

        echo "</form>";

    }

    echo "</div></div>";
    echo "</div>";
}

function PrintRoomMain($Item, $permission){

    echo "<div class ='col-lg-12'>";
    echo "<div class='panel panel-default '>";
    echo "<div class='panel-heading'><h4>Room Number: ".$Item[RoomToFix];
    echo "</h4></div>";

    echo "<div class='panel-body'>";
    echo "<div class='row'>";
    echo "<div class='col-lg-6'>";
    echo "Maintenance Type: ".$Item[MainType];
    echo "</div>";
    echo "<div class='col-lg-6'>";
    echo "Estimate Cost: ".$Item[MainCost];
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='col-lg-6'>";
    echo "Start Date: ".$Item[StartDate];
    echo "</div>";
    echo "<div class='col-lg-6'>";
    echo "End Dat: ".$Item[EndDate];
    echo "</div>";
    echo "</div>";

    echo "<div class='row'>";
    echo "<div class='col-lg-10'>";
    echo "Start Date: ".$Item[MainDetail];
    echo "</div>";
    echo "<div class='col-lg-2'>";
    
    if($permission >= 3)
    {
        echo "<form action='MainForm.php' method='post'>";
        echo "<input value=".$Item[MainID]." name='MainDetailID' hidden></input>";
        echo "<input type='submit' class='btn btn-block btn-Danger pull-right' value='Edit Detail'>";
        echo "</form>";
    }

    echo "</div>";
    echo "</div>";

    echo "</div></div></div>";
}

function ZeroToNo($inItem){
    if($inItem == 1){
        return 'yes';
    }
    else if($inItem == 0){
        return 'no';
    } 
}



function _Cal_Day($strr1, $strr2)
{
	//to show number of day different
        // this will convert value to string that useable by php

 	$date1=  strtotime($strr1);
        $date2= strtotime($strr2);
                        
	//Calculate the different
        $diff = $date2-$date1;
//	echo $diff."<br>";
        //convernt the result into day format
        // the $diff is in second format
      	//  so this will chang it to day format
        $diff=  floor($diff/(60*60*24));
	return $diff;
}


//can be done in CSS
function _Alt_TR($color)
{
	$colorString = NULL;
	if(($color%2) == 0)
        {	
		$colorString = "white";
		
        	//echo "<tr bgcolor='white'>";
                //$color = $color + 1;
        }
	else
        {
		$colorString = "#DCDCDC";
		
	        //echo "<tr bgcolor='#DCDCDC'>";
                //$color = $color + 1;
                //if($color == 6)
                //{
               	//	 $color = 0;
                //}
        }
	return $colorString;
}
?>
