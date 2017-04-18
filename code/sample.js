$(function(){

  $('#AddGuestBTN').click(function(){
    window.load('Login.php');
  });


	$('#AddGuestBTN').click(function(){
		console.log("Guest");
		$('.MainBODY').load('AddGuest.php');
	});

	$('#ReservationBTN').click(function(){
		console.log("Rsvp");
		$('.MainBODY').load('ReservationCheckDate.php');
	});

	$('#CheckInBTN').click(function(){
		console.log("In");
		$('.MainBODY').load('CheckInSnip.php');
	});

	$('#CheckOutBTN').click(function(){
		console.log("Out");
		$('.MainBODY').load('CheckOutSnip.php');
	});

	$('.testMix').click(function(){
		$('.phpContain').load('test.php');
	});

	$('#SearchAllGuestBTN').click(function(){
		$('.MainBODY').load('SearchAllGuest.php');
	});

	$('#ReportBTN').click(function(){
		$('.MainBODY').load('Report.php');
	});

	$('#SearchAllRoomBTN').click(function(){
		$('.MainBODY').load('DisplayAllRoom.php');
	});

	$('#RegisBTN').click(function(){
		//console.log("TEst");
		$('.MainBODY').load('Register.html');
	});

	


	//Register new employee
    $('#RegisterBtn').on('submit',function(e){
    	e.preventDefault();
    	//console.log('send');
    	//echo "Bule";
    	$('#MainBODY').empty();
    	$('#MainBODY').append("Bule");
    
    });

    $('#RegisterBtn2').click(function(e){
    	e.preventDefault();
    	//console.log('send');
    	//echo "Bule";
    	$.ajax({
       	type: "POST",
       		url: "newRegis.php",
       		data: $('#formR').serialize(),
       		success: function() {
         	//alert('success');
        	$('.MainBODY').empty();
         	$('.MainBODY').load('newRegis.php');

       }

    	});
    });


    // change employee's access level
    $('#PermissionBTN').click(function(){
		console.log("TEst");
		$('.MainBODY').load('PermissionForm.php');
	});

    $('#PermissionBtnSQL').click(function(e){
    	e.preventDefault();
    	//console.log($('#formPerMission').serialize());
    	//echo "Bule";
    	$.ajax({
       	type: "POST",
       		url: "newPermissionForm.php",
       		data: $('#formPerMission').serialize(),
       		success: function() {
         	//alert('success');
	        	$('.MainBODY').empty();
	         	$('.MainBODY').load('newPermissionForm.php');
       		}
    	});
    });


    //Cancel
    $('#CancelBTN').click(function(){
		//console.log("TEst");
		$('.MainBODY').load('Cancel.php');
	});

	$('#CancelBTNCon').click(function(e){
    	e.preventDefault();
    	//console.log($('#CancelForm').serialize());
    	//echo "Bule";
    	$.ajax({
       		type: "POST",
       		url: "CancelResult.php",
       		data: $('#CancelForm').serialize(),
       		success: function() {
         	//alert('success');
	        	$('.MainBODY').empty();
	         	$('.MainBODY').load('CancelResult.php');
       		}
    	});
    });


});