<?php


function PrintRoom($Item){

    echo "<h3>Room Number: ".$Item[RoomIDNum];
    echo "</h3><br>";
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
    echo "<br><br>";
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
