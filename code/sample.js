$(function(){

  //$('#AddGuestBTN').click(function(){
  //  window.load('Login.php');
  //});


	$('#AddGuestBTN').click(function(){
		console.log("Guest");
		$('.MainBODY').load('AddGuest.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

	$('#ReservationBTN').click(function(){
		console.log("Rsvp");
		$('.MainBODY').load('ReservationCheckDate.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

	$('#CheckInBTN').click(function(){
		console.log("In");
		$('.MainBODY').load('CheckInSnip.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

  $('#roomStatusBTN').click(function(){
    console.log("In");
    $('.MainBODY').load('ChangeRoomStatus.php');
    $('html, body').animate({scrollTop: 0},'fast');
  });

	$('#CheckOutBTN').click(function(){
		console.log("Out");
		$('.MainBODY').load('CheckOutSnip.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

	$('.testMix').click(function(){
		$('.phpContain').load('test.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

	$('#SearchAllGuestBTN').click(function(){
		$('.MainBODY').load('SearchAllGuest.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

  $('#TodayActivityBTN').click(function(){
    $('.MainBODY').load('todayAct.php');
    $('html, body').animate({scrollTop: 0},'fast');
  });

  $('#addRoomMainBTN').click(function(){
    $('.MainBODY').load('AddNewRoom.html');
    $('html, body').animate({scrollTop: 0},'fast');
  });

	$('#ReportBTN').click(function(){
		$('.MainBODY').load('Report.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

	$('#SearchAllRoomBTN').click(function(){
		$('.MainBODY').load('DisplayAllRoom.php');
    $('html, body').animate({scrollTop: 0},'fast');
	});

	$('#RegisBTN').click(function(){
		//console.log("TEst");
		$('.MainBODY').load('Register.html');
    $('html, body').animate({scrollTop: 0},'fast');
	});

  $('#roomMainBTN').click(function(){
    //console.log("TEst");
    $('.MainBODY').load('MaintanceRoomNum.php');
    $('html, body').animate({scrollTop: 0},'fast');
  });

  $('#RoomEditBTN').click(function(){
    //console.log("TEst");
    $('.MainBODY').load('EditRoomDetail.php');
    $('html, body').animate({scrollTop: 0},'fast');
  });
	


	//Register new employee
    $('#RegisterBtn').on('submit',function(e){
    	e.preventDefault();
    	//console.log('send');
    	//echo "Bule";
    	$('#MainBODY').empty();
    	$('#MainBODY').append("Bule");
      $('html, body').animate({scrollTop: 0},'fast');
    
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
      $('html, body').animate({scrollTop: 0},'fast');
    });

    /*
    $('.RoomEditBTN').click(function(e){
      e.preventDefault();
      //console.log('send');
      //echo "Bule";
      $.ajax({
        type: "POST",
          url: "EditRoomDetail.php",
          data: $('.formRoomEdit').serialize(),
          success: function() {
          //alert('success');
          $('.MainBODY').empty();
          $('.MainBODY').load('EditRoomDetail.php');

       }

      });
    });
    */


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

    $('#roomStatusBTNCon').click(function(e){
      e.preventDefault();
      //console.log($('#CancelForm').serialize());
      //echo "Bule";
      $.ajax({
          type: "POST",
          url: "RoomStatusUpdate.php",
          data: $('#roomStatusForm').serialize(),
          success: function() {
          //alert('success');
            $('.MainBODY').empty();
            $('.MainBODY').load('RoomStatusUpdate.php');
          }
      });
    });

/*
    $('#EditRoomDetailBTN').click(function(e){
      e.preventDefault();
      //console.log($('#CancelForm').serialize());
      //echo "Bule";
      $.ajax({
          type: "POST",
          url: "EditRoomDetailConfirm.php",
          data: $('#roomStatusForm').serialize(),
          success: function() {
          //alert('success');
            $('.MainBODY').empty();
            $.load('EditRoomDetailConfirm.php');
          }
      });
    });
    */


});