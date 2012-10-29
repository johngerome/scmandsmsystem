$(document).ready(function () {
              $('#password').keypress(function(e){
                if (e.keyCode == '13'){
                  login_now();
                  return false;
                }
              });
             $('#username_id').keypress(function(e){
                if (e.keyCode == '13'){
                  login_now();
                  return false;
                }
              });

    
			$('#login').show().animate({   opacity: 1 }, 2000);
			$('.logo').show().animate({   opacity: 1,top: '40%'}, 800,function(){			
			$('.logo').show().delay(1200).animate({   opacity: 1,top: '12%' }, 300,function(){
				$('.formLogin').animate({   opacity: 1,left: '0' }, 300);
				$('.userbox').animate({ opacity: 0 }, 200).hide();
			 });		

			  })	
			$(".on_off_checkbox").iphoneStyle();
			$('.tip a ').tipsy({gravity: 'sw'});
			$('.tip input').tipsy({ trigger: 'focus', gravity: 'w' });
	
	});
	    $('.userload').click(function(e){
			$('.formLogin').animate({   opacity: 1,left: '0' }, 300);			    
			  $('.userbox').animate({ opacity: 0 }, 200,function(){
				  $('.userbox').hide();				
			   });
	    });
function login_now(){
    		  if(document.formLogin.username.value == "" || document.formLogin.password.value == "")
		  {
			  //showError("Please Input Username / Password");
              show_modal_warning("Please Input Username / Password");
			  //$('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
			  //$('.inner').trigger('startRumble');
			  ///setTimeout('$(".inner").trigger("stopRumble")',500);
			  //setTimeout('hideTop()',5000);
			  return false;
		  }
          	
		var action = $("#formLogin").attr('action');
		var form_data = {
			username: $("#username_id").val(),
			password: $("#password").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				if(response == true){
  		             hideTop();
            		 //loading('Checking',1);		
            		 //setTimeout( "unloading()", 2000 );
            		 //setTimeout( "Login()", 0 );
                     setTimeout( "window.location.href='do_login/"+$("#username_id").val()+"'", 0 );
				}else{
                  //alert(response);
                  //showError(response);
                  show_modal_warning(response);
    			  //$('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
    			  //$('.inner').trigger('startRumble');
    			 // setTimeout('$(".inner").trigger("stopRumble")',500);
    			  //setTimeout('hideTop()',5000);
    			  return false;	
                  }
			}
            });	
}	    

		
																 
function Login(){
	
	$("#login").animate({   opacity: 1,top: '49%' }, 200,function(){
		 $('.userbox').show().animate({ opacity: 1 }, 500);
			$("#login").animate({   opacity: 0,top: '60%' }, 500,function(){
				$(this).fadeOut(200,function(){
				  $(".text_success").slideDown();
				  $("#successLogin").animate({opacity: 1,height: "200px"},500);   			     
				});							  
			 })	
     })	
			setTimeout( "window.location.href='do_login/"+$("#username_id").val()+"'", 3000 );
}


	
$('#alertMessage').click(function(){
	hideTop();
});

function showError(str){
	$('#alertMessage').addClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
	
}

function showSuccess(str){
	$('#alertMessage').removeClass('error').html(str).stop(true,true).show().animate({ opacity: 1,right: '10'}, 500);	
}

function hideTop(){
	$('#alertMessage').animate({ opacity: 0,right: '-20'}, 500,function(){ $(this).hide(); });	
}	
function loading(name,overlay) {  
	  $('body').append('<div id="overlay"></div><div id="preloader">'+name+'..</div>');
			  if(overlay==1){
				$('#overlay').css('opacity',0.1).fadeIn(function(){  $('#preloader').fadeIn();	});
				return  false;
		 }
	  $('#preloader').fadeIn();	  
 }
 function unloading() {  
		$('#preloader').fadeOut('fast',function(){ $('#overlay').fadeOut(); });
 }
 
 
 function forgotpass(){
    
 	  if($('#user_login').val() == "")
 {
			  showError("Please Input Username or E-mail");
			  $('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
			  $('.inner').trigger('startRumble');
			  setTimeout('$(".inner").trigger("stopRumble")',500);
			  setTimeout('hideTop()',5000);
			  return false;
 }else{
          
          
        var action = base_url + 'account/do_forgotpass';
   	    var form_data = {
   	        user_login: $('#user_login').val(),
            is_ajax: 1
		};
        
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
			
			  if(response == 'true'){
			     
			  }else{
			     
			     showError(response);
                 $('.inner').jrumble({ x: 4,y: 0,rotation: 0 });	
			     $('.inner').trigger('startRumble');
                 setTimeout('$(".inner").trigger("stopRumble")',500);
			     setTimeout('hideTop()',5000);
			     return false;
			  }
              
			}
            });
    }
}
