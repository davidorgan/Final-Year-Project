$(document).ready(function(){

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
        success: function(data){
            $("#form_messages").prepend("<div class='message'>"+data.message+"</div>").fadeIn('slow');
          }
        
        });

		$("#message").val("");
      return false;

    });
  

});