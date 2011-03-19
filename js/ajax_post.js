$(document).ready(function(){

		var club_id = $("#club_id").val();
		
		$.ajax({
			type: "POST",
			url: "http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/get_messages",
			dataType: "json",
			data: "club_id=" + club_id,
			cache: false,
			success: function(data){
				$("#form_message").html("<p>" + data.message + "</p>").fadeIn('slow');
				
			}
			
		});




  
  $("#login_submit").click( 
  
    function(){
    
        var message=$("#message").val();
		var user_id=$("#user_id").val();
		var club_id=$("#club_id").val();
      
        $.ajax({
        type: "POST",
        url: "http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/post_action",
        dataType: "json",
        data: "message="+message+"&user_id="+user_id+"&club_id="+club_id,
        cache:false,
        success: 
          function(data){
            $("#form_message").prepend("<div class='message'>"+data.message+"</div>").slideDown(1000); 
          }
        
        });

		$("#message").val("");
      return false;

    });
  

});