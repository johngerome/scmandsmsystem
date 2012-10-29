/*
 * jQuery Function
 *
 * Copyright 2012, John Gerome Baldonado
 * Dual licensed under the MIT or GPL Version 2 licenses.
 */
 
/********************************************************************
 *  -Start Modal Dialog Box
 *******************************************************************/
 /**
 * - SUCCESS DIALOG BOX
 *
 * @param layout -> Modal Layout
 * @param type -> Modal Type
 * @param text -> Modal Text
 * @param controller_name -> Controller to call
 */
function show_modal(text,type, layout,controller_name) {
    $('.noty_modal').show();
  	var n = noty({
  		text: '<div class="noty_msg_success noty_icon"></div><p class="noty_msg" > ' + text + '</p>',
  		type: type,
        dismissQueue: true,
        modal: true,
  		layout: layout,
  		theme: 'default',
      buttons: [
        {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
             $noty.close();
             //loading("Redirecting",0);
             //setTimeout("unloading()",9500);
             setTimeout("window.location.href='" + base_url + controller_name + ".html'",0);
            //noty({dismissQueue: true, force: true, layout: layout, theme: 'default', text: 'You clicked "Ok" button', type: 'success'});
          }
        }
      ]
  	});
  	console.log('html: '+n.options.id);
};
/**
 * - WARNING DIALOG BOX
 *
 * @param layout -> Modal Layout
 * @param type -> Modal Type
 * @param text -> Modal Text
 */
function show_modal_warning(text) {
    $('.noty_modal').show();
  	var n = noty({
  		text: '<table><tr><td><div class="noty_msg_warning noty_icon"></div></td><td><p class="noty_msg" > &nbsp;' + text + '</p></td></tr></table>',
  		type: 'warning',
        dismissQueue: true,
        modal: true,
  		layout: 'center',
  		theme: 'default',
      buttons: [
        {addClass: 'btn btn-warning-ok', text: 'Ok', onClick: function($noty) {
             $noty.close();
            }
        }
      ]
  	});
  	console.log('html: '+n.options.id);
};
 /**
 * - INFO DIALOG BOX
 *
 * @param layout -> Modal Layout
 * @param type -> Modal Type
 * @param text -> Modal Text
 * @param controller_name -> Controller to call
 */
function show_modal_information(text) {
  	var n = noty({
  		text: '<div class="noty_msg_info noty_icon"></div><p class="noty_msg" >' + text + '</p>',
  		type: 'information',
        dismissQueue: true,
  		layout: 'center',
  		theme: 'default',
      buttons: [
        {addClass: 'btn btn-information-ok', text: 'Ok', onClick: function($noty) {
             $noty.close();
            }
        }
      ]
  	});
  	console.log('html: '+n.options.id);
};
/**
 * - DELETE DIALOG BOX
 *
 * @param name -> Item Name to delete
 * @param type -> Modal type
 * @param layout -> Modal Layout
 * @param controller_name -> Controller to call
 * @param function_name -> Function to call
 * @param current_url -> Url to redirect after deleting
 */
function show_modal_delete(name, controller_name, function_name, current_url) {
    $('.noty_modal').show();
  	var n = noty({
  		text: '<div class="noty_msg_warning noty_icon"></div><p class="noty_msg" >ARE YOU SURE YOU WANT TO DELETE <font color=red> ' + name + '?. </font> <br> <font size=1>This  Item will Permanently Delete from the Database</font></p>',
  		type: 'warning',
        dismissQueue: true,
        modal: true,
  		layout: 'center',
  		theme: 'default',
        buttons: [
        {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
            $noty.close();
            //->DELETE NOW
            delete_data(controller_name, function_name, current_url);
            setTimeout("window.location.href='" + base_url + controller_name + '/' + current_url + ".html'");
            }
        },
        {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
            $noty.close();
            //->CLOSE NOW
            }
        }
      ]
  	});
  	console.log('html: '+n.options.id);
};
/**
 * - ARCHIVE DIALOG BOX
 *
 * @param name -> Item Name to Archive
 * @param type -> Modal type
 * @param layout -> Modal Layout
 * @param controller_name -> Controller to call
 * @param function_name -> Function to call w/ Param
 */
function show_modal_archive(name, controller_name, function_name) {
    $('.noty_modal').show();
  	var n = noty({
  		text: '<div class="noty_msg_warning noty_icon"></div><p class="noty_msg" >ARE YOU SURE YOU WANT TO SEND <font color=red> ' + name + '</font> TO THE TRASH? </p>',
  		type: 'warning',
        dismissQueue: true,
        modal: true,
  		layout: 'center',
  		theme: 'default',
        buttons: [
        {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
            $noty.close();
            //->ARCHIVE NOW
            archive_data(controller_name, function_name);
            setTimeout("window.location.href='" + base_url + controller_name + "/archived.html'");
            }
        },
        {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
            $noty.close();
            //->CLOSE NOW
            }
        }
      ]
  	});
  	console.log('html: '+n.options.id);
};
/**
 * - RESTORE DIALOG BOX
 *
 * @param name -> Item Name to Archive
 * @param type -> Modal type
 * @param layout -> Modal Layout
 * @param controller_name -> Controller to call
 * @param function_name -> Function to call w/ Param
 */
function show_modal_restore(name, controller_name, function_name) {
    $('.noty_modal').show();
  	var n = noty({
  		text: '<div class="noty_msg_warning noty_icon"></div><p class="noty_msg" >ARE YOU SURE YOU WANT TO RESTORE <font color=red> ' + name + '</font> ? </p>',
  		type: 'warning',
        dismissQueue: true,
        modal: true,
  		layout: 'center',
  		theme: 'default',
        buttons: [
        {addClass: 'btn btn-primary', text: 'Ok', onClick: function($noty) {
            $noty.close();
            //->ARCHIVE NOW
            restore_data(controller_name, function_name);
            setTimeout("window.location.href='" + base_url +  controller_name + "/trash/restored.html'");
            }
        },
        {addClass: 'btn btn-danger', text: 'Cancel', onClick: function($noty) {
            $noty.close();
            //->CLOSE NOW
            }
        }
      ]
  	});
  	console.log('html: '+n.options.id);
};
/****************************************************************
 * - End Modal Dialog Box
 ***************************************************************/
 
/*****************************************************
 * - CHECK BEFORE DELETING AN ITEM/DATA
 *
 * @param controller_name -> Controller to Call
 * @param id -> Item ID to Delete
 * @param current_url -> url to Redirect after Deleting
 * @param name -> Item Name
 *****************************************************/
function check_before_delete(controller_name, id, current_url, name ){
    var action = base_url + controller_name + '/check_delete/' + id;
    var _data = {
        is_ajax: 1
    };

    $.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
                if(response == "true"){
                    //->DELETE ITEM
                    show_modal_delete(name, controller_name ,'delete/' + id, current_url);
                }else{
                    //->SHOW WARNING
                    show_modal_warning(response);
                }
			}
   });
};

/*****************************************************
 * - CHECK BEFORE ARCHIVING AN ITEM/DATA
 *
 * @param controller_name -> Controller to Call
 * @param id -> Item ID to Archive
 * @param current_url -> url to Redirect after Archiving
 * @param name -> Item Name
 *****************************************************/
function check_before_archive(controller_name, id, current_url, name ){
    var action = base_url + controller_name + '/check_delete/' + id;
    var _data = {
        is_ajax: 1
    };

    $.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
                if(response == "true"){
                    //->DELETE ITEM
                    show_modal_archive(name, controller_name ,'archive/' + id, current_url);
                }else{
                    //->SHOW WARNING
                    show_modal_warning(response);
                }
			}
   });
};

/**
 *  - REMOVE PARTICULAR CLASS
 *
 * @param div
 */
function remove_class(div){
    $('.' + div).addClass('d_cursor');
    $('.' + div).removeClass(div);
    

};