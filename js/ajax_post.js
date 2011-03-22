$(document).ready(function(){

  $("#login_submit").click( 
  
    function(){
    
        var message=$("#message").val();
		var ajax_user_id=$("#ajax_user_id").val();
		var club_id=$("#club_id").val();
		var ajax_name = $("#ajax_name").val();
		var ajax_email = $("#ajax_email").val();
		var ajax_img = $("#ajax_img").val();

      
        $.ajax({
        type: "POST",
        url: "http://danu2.it.nuigalway.ie/DavidOrgansFYP/fypsite/club/post_action",
        dataType: "json",
        data: "message="+message+"&ajax_user_id="+ajax_user_id+"&club_id="+club_id+"&ajax_name="+ajax_name+"&ajax_email="+ajax_email+"&ajax_img="+ajax_img,
        cache:false,
        success: function(data){
            $("#form_messages").prepend("<div class='message'><img src='"+data.img+"' /><span class='author'>Sent by: "+data.name+"</span><br />"+data.message+"<br /><div class='clear'></div></div>").fadeIn('slow');
          }
        
        });

		$("#message").val("");
      return false;

    });
  

});