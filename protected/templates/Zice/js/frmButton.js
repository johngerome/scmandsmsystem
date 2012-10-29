/*!
 * jQuery Function
 *
 * Copyright 2012, John Gerome Baldonado
 * Dual licensed under the MIT or GPL Version 2 licenses.
 */

var id;
/*****************************************************************************
 * - BEFORE UPDATING DATA
 ****************************************************************************/
function update_data(form_name,controller_name){
            if($('#ProductLineId').val() == null && controller_name == 'branch_type'){
                    jQuery('#plinemsg').validationEngine('showPrompt', 'Please Select Atleast 1 Product Line!', 'red','topRight');            
            }
            if(jQuery(form_name).validationEngine('validate') == true){
                
                if($('#ProductLineId').val() == null && controller_name == 'branch_type'){
                    jQuery('#plinemsg').validationEngine('showPrompt', 'Please Select Atleast 1 Product Line!', 'red','topRight');            
                }
                else{
                //I Believe this is a Bug!
                jQuery(form_name).validationEngine('hide'); 
                updating_data(controller_name,form_name);
                }
            }
};
/*****************************************************************************
 * - BEFORE SAVING DATA
 ****************************************************************************/
function save_data(form_name,controller_name,function_name){
        
           if($('#ProductLineId').val() == null && controller_name == 'branch_type'){
                    jQuery('#plinemsg').validationEngine('showPrompt', 'Please Select Atleast 1 Product Line!', 'red','topRight');            
           }
            if(jQuery(form_name).validationEngine('validate') == true){
              
                if($('#ProductLineId').val() == null && controller_name == 'branch_type'){
                    jQuery('#plinemsg').validationEngine('showPrompt', 'Please Select Atleast 1 Product Line!', 'red','topRight');            
                }
                else{
                    //I Believe this is a Bug!
                   jQuery(form_name).validationEngine('hide');
                   saving_data(controller_name,function_name,form_name);
                }
            }
};

/* Uncomment for Future use.
function load_data(controller,function_name){
    var overlay = '0';
     //$("#load_data").empty();
     //loading('loading...',overlay);

    $.ajax({
      url: base_url + controller + "/" + function_name,
      cache: false
    }).done(function( html ) {
      $("#data_table").empty();  
      $("#data_table").append(html);
      
    });
    //unloading();
};
*/

/**
 * - SHOW ADD FORM
 * 
 * @param controller -> Controller to Call
 * @param function_name -> Function to Call
 */
function show_add(controller,function_name){ 
    $.ajax({
      url: base_url + controller + "/" + function_name,
      cache: false
    }).done(function( html ) {
      $(".show_add").empty();  
      $(".show_add").append(html);
    });
};
/* Uncomment for Future use.

function check_data_edit(input_id,controller_name,param_tbl,param_col_id){
        var col_id = $(input_id).attr("id");
        var action = base_url + controller_name + '/check_edit';
		var form_data = {
            name: $(input_id).val(),
            tbl: param_tbl,
            col_name: col_id,
            col_id: param_col_id,
            id: $('#' + param_col_id).val(),
			is_ajax: 1
		};
  
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
			   
    			 if(response == 'true'){
                    jQuery(input_id).validationEngine('showPrompt', $(input_id).val() + " already Exists!", col_id,true);
                    $('#error').attr('value','1');  
    			 }else{
    			    $('#error').attr('value','0');
    			 }
			}
            });
            //return obj_error;

};
*/
/* Uncomment for Future use.
function check_data_add(input_id,controller_name,param_tbl){
        
        var col_id = $(input_id).attr("id");
        var action = base_url + controller_name + '/check_add';
		var form_data = {
            name: $(input_id).val(),
            tbl: param_tbl,
            col_name: col_id,
			is_ajax: 1
		};
  
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
    			 if(response){
                    jQuery(input_id).validationEngine('showPrompt', $(input_id).val() + " already Exists!", col_id,true);
                    $('#error').attr('value','1');
    			 }else{ $('#error').attr('value','0'); }
			}
            });
};
*/

/*******************************************************************
 * - LINK BACK
 *
 * @param fname -> Function to Call
 * @param cname -> Controller To Call
 *******************************************************************/
function go_back(fname,cname){
    jQuery(fname).validationEngine('hideAll');
    setTimeout("window.location.href='" + base_url + cname + ".html'");
};

/********************************************************************
 * - VALIDATION
 *
 * @param type -> Add or Edit
 * @param controller_name -> Controller to Call
 *********************************************************************/
function _validate(type,controller_name){
    if(controller_name == 'product_line'){
        if (type == 'add'){
           check_data_add('#ProductLineName','product_line','product_line');
        }
        if (type == 'edit'){
           check_data_edit('#ProductLineName','product_line','product_line','ProductLineId');
        }
    }
        if(controller_name == 'branch'){
            if (type == 'add'){
               check_data_add('#branch_name','branch','branch');
            }
            if (type == 'edit'){
                check_data_edit('#branch_name','branch','branch','branch_id');
            }
    }
};

/********************************************************************
 * - CUSTOMER VALIDATION
 *
 * @param type -> Add or Edit
 * @param controller_name -> Controller to Call
 *********************************************************************/
function validate_customer(type,controller_name){
            var action = "";
            if (type == "add"){
                action = base_url + controller_name + '/check_add';
            }
            if (type == "edit"){
               action = base_url + controller_name + '/check_edit/' + $('#CustomerId').val();
          }
          
              var form_data = {
        		    FirstName: $('#FirstName').val(),
                    LastName: $('#LastName').val(),
                    MiddleName: $('#MiddleName').val(),
        			is_ajax: 1
        		};
                
        		$.ajax({
        			type: "POST",
        			url: action,
        			data: form_data,
        			success: function(response)
        			{
        			    //alert(response);
            			 if(response == 'true'){
                            showError('Customer Already Exists!',3000);
                            $('#error').attr('value','1');
                            alert('+' + $('#error').val() );
            			 }else{
            			    // alert(response);
            			     $('#error').attr('value','0'); 
                        }
        			}
                    });
            
};

/********************************************************************
 * - CUSTOMER VALIDATION ADD
 * -> This is more Specific than Above function.
 *********************************************************************/
function validate_customer_add(){
     var action = base_url + 'customer/check_add';
     var form_data = {
        		    FirstName: $('#FirstName').val(),
                    LastName: $('#LastName').val(),
                    MiddleName: $('#MiddleName').val(),
        			is_ajax: 1
        		};
                
        		$.ajax({
        			type: "POST",
        			url: action,
        			data: form_data,
        			success: function(response)
        			{
        			     //alert('Response'+response);
            			 if(response == 'true'){
            			     //alert('Customer Already Exist');
                             showError('Customer Already Exists!',3000);
                            
                            $('#error').attr('value','1');
                            //alert('+' + $('#error').val() );
                            //alert($('#error').val());
                            
            			 }else{
            			     //alert(response);
            			     $('#error').attr('value','0');
                             
                             if($('#add_customer').validationEngine('validate') == true){
                                 saving_data('customer','save');
                            } 
                             
                             
                        }
        			}
                    });
           
};

/********************************************************************
 * - CUSTOMER VALIDATION EDIT
 * -> This is more Specific function.
 *********************************************************************/
function validate_customer_edit(){
    var action = base_url + 'customer/check_edit/' + $('#CustomerId').val();
    var form_data = {
        		    FirstName: $('#FirstName').val(),
                    LastName: $('#LastName').val(),
                    MiddleName: $('#MiddleName').val(),
                    
        			is_ajax: 1
        		};
                
        		$.ajax({
        			type: "POST",
        			url: action,
        			data: form_data,
        			success: function(response)
        			{
        			    //alert('Response' + response);
            			 if(response == 'true'){
            			     //alert('TRUE'+response);
                            showError('Customer Already Exists!',3000);
                            //$('#error').attr('value','1');
                            //alert('+' + $('#error').val() );

            			 }else{
       			             //alert('FALSE User Not Exists'+response);
            			     //$('#error').attr('value','0');
                             updating_data('customer');
                        }
        			}
                    });             
};

/********************************************************************
 * - ACCOUNT VALIDATION ADD
 * -> This is more Specific function.
 *********************************************************************/
function validate_account_add(){
    
     if(jQuery('#add_account').validationEngine('validate') == true){
        
                 var action = base_url + 'account/check_add';
                 var form_data = {
                    		    first_name: $('#first_name').val(),
                                last_name: $('#last_name').val(),
                                middle_name: $('#middle_name').val(),
                    			is_ajax: 1
                    		};
                
        		$.ajax({
        			type: "POST",
        			url: action,
        			data: form_data,
        			success: function(response)
        			{
            			 if(response == 'true'){
                             saving_data('account','save');
            			 }else{
            			     show_modal_warning(response);
                        }
        			}
                    });
                    
        }else{
            
            show_modal_warning('asd');
        }   
           
};

/********************************************************************
 * - CUSTOMER VALIDATION ADD
 * -> This is more Specific function.
 *********************************************************************/
function validate_account_edit(){
     var action = base_url + 'account/check_edit/' + $('#account_id').val();
     var form_data = {
        		    first_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    middle_name: $('#middle_name').val(),
        			is_ajax: 1
    };
        		$.ajax({
        			type: "POST",
        			url: action,
        			data: form_data,
        			success: function(response)
        			{
        			    //alert('Response' + response);
            			 if(response == 'true'){
            			   
            			     //alert('TRUE'+response);
                            showError('Account Already Exists!',3000);
                            //$('#error').attr('value','1');
                            //alert('+' + $('#error').val() );

            			 }else{
       			             //alert(jQuery('#confirm_password').validationEngine('validateField', '#confirm_password'));
            			     //$('#error').attr('value','0');
                             
                            if((jQuery('#confirm_password').validationEngine('validateField', '#confirm_password') == true) && ($('#password').val() != "")){
                                jQuery('#confirm_password').validationEngine('showPrompt', 'Password did not match!', 'red');
                                showError('Password did not match!',6000);
                            }else{
                                 if($('#add_account').validationEngine('validate') == true){  
                                  
                                     updating_data('account','.edit_account');
                                 }
                             }
                        }
        			}
                    });             
};

/********************************************************************
 * - CUSTOMER VALIDATION ADD
 * -> Validation for Editing Own Profile.
 *********************************************************************/
function validate_account_edit_myprofile(){
     var action = base_url + 'account/check_edit/' + $('#account_id').val();
     var form_data = {
        		    first_name: $('#first_name').val(),
                    last_name: $('#last_name').val(),
                    middle_name: $('#middle_name').val(),
        			is_ajax: 1
    };
        		$.ajax({
        			type: "POST",
        			url: action,
        			data: form_data,
        			success: function(response)
        			{
            			 if(response == 'true'){
                            showError('Account Already Exists!',3000);
            			 }else{
                            if((jQuery('#confirm_password').validationEngine('validateField', '#confirm_password') == false) && ($('#new_password').val() != "")){
                                jQuery('#confirm_password').validationEngine('showPrompt', 'Password did not match!', 'red');
                                showError('Password did not match!',6000);
                            }else{
                                 if($('#add_account').validationEngine('validate') == true){  
                                     updating_data_myprofile('account');
                                 }
                             }
                        }
        			}
                    });             
};


/************************************************************************
 * - DELETING ITEM/DATA
 *
 * @param controller_name -> Controller to Call
 * @param function_name -> Function to Call
 * @param current_url -> url to Redirect after Deleting.
 ************************************************************************/
function delete_data(controller_name,function_name,current_url){
      
        var action = base_url + controller_name + '/' + function_name;
		var form_data = {
			is_ajax: 1
		};
        
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
		      //alert(response);
			  if(response == 'true'){
			     
			        if(controller_name == 'user_type'){
                        setTimeout("window.location.href='" + base_url + controller_name + "/deleted' ");
                    }else{
                        setTimeout("window.location.href='" + current_url + "' ");
                    }
                   
                   
			  }else if(response== 'false'){
			      
			     if(controller_name == 'product_line'){
                    //alert('Product Line cannot be removed as they contain Products. There may currently be Products within the Product Line which you must delete first!');
			     }
                 if(controller_name == 'branch_type'){
                    //alert('Branch Type cannot be removed as they contain Branch. There may currently be Branch within the Branch Type which you must delete first!');
                 }
                 
              }else{
                
                if(controller_name == 'product'){
                    alert(response);
                 }
                if(controller_name == 'user_type'){
                    alert(response);
                 }
                if(controller_name == 'product_package'){
                    alert(response);
                 }
                 if(controller_name == 'package'){
                    alert(response);
                 } 
              }
			 
			}});
        
};

/************************************************************************
 * - ARCHIVE ITEM/DATA
 *
 * @param controller_name -> Controller to Call
 * @param function_name -> Function to Call
 ************************************************************************/
function archive_data(controller_name,function_name){
        var action = base_url + controller_name + '/' + function_name;
        if(controller_name == 'branch')
        {
       	    var form_data = {
			is_ajax: 1
		};
        }

		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
			 if(controller_name == "product"){
			     if(response != "true"){
			        alert(response); 
			     }else{
			         setTimeout("window.location.href='" + base_url + controller_name + "/archived.html'");
			     }
			 }
			}});
};
/************************************************************************
 * - RESTORE ITEM/DATA
 *
 * @param controller_name -> Controller to Call
 * @param function_name -> Function to Call
 ************************************************************************/
function restore_data(controller_name,function_name){
        var action = base_url + controller_name + '/' + function_name;
        if(controller_name == 'branch')
        {
       	    var form_data = {
			is_ajax: 1
		};
        }

		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
			 if(controller_name == 'branch'){
			      setTimeout("window.location.href='" + base_url +  controller_name + "/trash/restored.html'");
			 }else{
			      setTimeout("window.location.href='" + base_url +  controller_name + "/trash/restored.html'");
			 }
             
			}
            });
}

/************************************************************************
 * - BEFORE DELETING AN ITEM/DATA
 * -> START
 ************************************************************************/
 
   /*****************
    * Product Line
    ****************/
	$(".delete_product_line").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
          
          //->CHECK FIRST
          check_before_delete('product_line' ,id ,'deleted' ,name);

	});
    
   /*****************
    * Branch
    ****************/
    $(".archive_branch").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
          
        var action = base_url + 'branch/check_archive/' + id;
		var _data = {
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
                if(response != "true"){
                    /*if (confirm(name + response)){
                        archive_data("branch","archive/" + id);
                        setTimeout("window.location.href='" + base_url + "branch/archived.html'");
                    }*/
                    show_modal_warning('Branch cannot be removed as they contain Products. There may currently be Products within the Branch which you must delete first!','warning','center');
                }else{
                   // Archive(data,name,row,0,dataSet,"branch","archive/" + id,$('#current_url').val());
                   show_modal_archive(name, 'branch', 'archive/' + id)
                }
			}
        });	
	});
    $(".restore_branch").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
          show_modal_restore(name, 'branch', 'restore/' + id);
		  //Restore(data,name,row,0,dataSet,"branch","restore/" + id,$('#current_url').val());
         
	});
    $(".delete_branch").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
		  //Delete(data,name,row,0,dataSet,"branch","delete/" + id,$('#current_url').val());
          show_modal_delete(name, 'branch', 'delete/' + id, 'trash/deleted');
	});
    
   /*****************
    * Customer
    ****************/
    $(".delete_customer").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
		  //Delete(data,name,row,0,dataSet,"customer","delete/" + id,$('#current_url').val());
          show_modal_delete(name, 'customer' ,'delete/' + id, $('#current_url').val());
	});
   /*****************
    * User Account
    ****************/    
    $(".delete_account").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
		  //Delete(data,name,row,0,dataSet,"account","delete/" + id,$('#current_url').val());
          show_modal_delete(name, 'account' ,'delete/' + id, 'index');
	});
   /*****************
    * Product
    ****************/
    $(".delete_product").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
		  //Delete(data,name,row,0,dataSet,"product","delete/" + id,$('#current_url').val());
          show_modal_delete(name,'product', 'delete/' + id, 'trash/deleted');
	});
    $(".archive_product").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
          
          check_before_archive('product', id, $('#current_url').val(), name);
         
	});
    $(".restore_product").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
		  //Restore(data,name,row,0,dataSet,"product","restore_product/" + id,$('#current_url').val());
          show_modal_restore(name, 'product', 'restore/' + id);
         
	});
   /*****************
    * Branch Type
    ****************/
    $(".delete_branch_type").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
          check_before_delete('branch_type',id,'deleted',name);
		  //Delete(data,name,row,0,dataSet,"branch_type","delete/" + id,$('#current_url').val());
	});
   /*****************
    * User Type
    ****************/
    $(".delete_user_type").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
		  Delete(data,name,row,0,dataSet,"user_type","delete/" + id,$('#current_url').val());
	});
   /*****************
    * Package
    ****************/
    $(".delete_package").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
          check_before_delete('package',id,'deleted',name);
	});
   /********************
    * Product Package
    *******************/
    $(".delete_product_package").live('click',function() { 
		  var row=$(this).parents('tr');
		  var dataSet=$(this).parents('form');
		  var id = $(this).attr("id");
		  var name = $(this).attr("name");
		  var data ='id='+id;
          show_modal_delete(name,'product_package','delete/' + id,'deleted');
          //check_before_delete('product_package',id,'deleted',name);
		  //Delete(data,name,row,0,dataSet,"product_package","delete/" + id,$('#current_url').val());
	});
/************************************************************************
 * -> END
 * - BEFORE DELETING AN ITEM/DATA
 ************************************************************************/

    
// EDIT
function edit_data(div,controller_name){
        var div = "#" + div;
        id = $(div).attr("id");
    	$('body').append('<div id="overlay"></div>');
		$('#overlay').css('opacity',0.4).fadeIn(400);
		var activeLoad = $(div).attr("name");		
		var titleTabs = $(div).attr("title");		
		$("ul.tabs li").hide();		
				$('ul.tabs li').each(function(index) {
						var activeTab = $('ul.tabs li:eq('+index+')').find("a").attr("href")			
						if(activeTab==activeLoad){
							$("ul.tabs ").append('<li class=active><a>'+titleTabs+'</a></li>');
							$("ul.tabs li:last").fadeIn();	
							}
				});
		$('.onecolumn .content').css({'position':'relative','z-index':'1001'});
		$(".show_add").hide();
 	    $(".load_page").hide();
        $(".show_edit").empty();
        
        var action = base_url + controller_name + '/edit/' + $(div).attr("id");
		var _data = {
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
				//Response Here
                $(".show_edit").append(response);
                $('.show_edit').show();
			}
            });	
};

function stock_in(div,controller_name){
        var div = "#" + div;
        id = $(div).attr("id");
    	$('body').append('<div id="overlay"></div>');
		$('#overlay').css('opacity',0.4).fadeIn(400);
		var activeLoad = $(div).attr("name");		
		var titleTabs = $(div).attr("title");		
		$("ul.tabs li").hide();		
				$('ul.tabs li').each(function(index) {
						var activeTab = $('ul.tabs li:eq('+index+')').find("a").attr("href")			
						if(activeTab==activeLoad){
							$("ul.tabs ").append('<li class=active><a>'+titleTabs+'</a></li>');
							$("ul.tabs li:last").fadeIn();	
							}
				});
		$('.onecolumn .content').css({'position':'relative','z-index':'1001'});
		$(".show_add").hide();
 	    $(".load_page").hide();
        $(".show_edit").empty();
        
        var action = base_url + controller_name + '/stock_in_product/' + $(div).attr("id");
		var _data = {
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
				//Response Here
                $(".show_edit").append(response);
                $('.show_edit').show();
			}
            });	
};
/**
 * - SHOW PARTICULAR FORM
 * 
 * @param item_id -> item_id
 * @param controller_name -> Controller to Call
 * @param function -> Function to Call
 */
function show_form(item_id,controller_name,function_name){
        var div = "#" + item_id;
        id = $(div).attr("id");
    	$('body').append('<div id="overlay"></div>');
		$('#overlay').css('opacity',0.4).fadeIn(400);
		var activeLoad = $(div).attr("name");		
		var titleTabs = $(div).attr("title");		
		$("ul.tabs li").hide();		
				$('ul.tabs li').each(function(index) {
						var activeTab = $('ul.tabs li:eq('+index+')').find("a").attr("href")			
						if(activeTab==activeLoad){
							$("ul.tabs ").append('<li class=active><a>'+titleTabs+'</a></li>');
							$("ul.tabs li:last").fadeIn();	
							}
				});
		$('.onecolumn .content').css({'position':'relative','z-index':'1001'});
		$(".show_add").hide();
 	    $(".load_page").hide();
        $(".show_edit").empty();
        
        var action = base_url + controller_name + '/' + function_name + '/' + $(div).attr("id");
		var _data = {
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
				//Response Here
                $(".show_edit").append(response);
                $('.show_edit').show();
			}
            });	
};
function reasonz(){
       if($('#reason_type').val() == 'Other Reason'){
            $('#reason_form').show();
       }else{
            $('#reason_form').hide();
       }
        //alert($('#reason_type').val());
};


//LOAD PAGE W/O ID's
function load_menu_page(controller,function_name){
    $.ajax({
      url: base_url + controller + "/" + function_name,
      cache: false
    }).done(function( html ) {
      //alert(html);
      loading("loading..",0);
      $("#mainContent").empty();
      $("#mainContent").append(html);
      setTimeout("unloading()",900);
    });
};
function is_prod_load(){
    var date = $('#date2').val();
    load_is_product('product','is_product/' + date);
}
function load_is_product(controller,function_name){
    
    $.ajax({
      url: base_url + controller + "/" + function_name,
      cache: false
    }).done(function( html ) {
      //alert(html);
      loading("loading..",0);
      $("#is_product").empty();
      $("#is_product").append(html);
      setTimeout("unloading()",900);
    });
};
//LOAD PAGE BY ID's'
function load_prod_avail(){
    var branch_id = $('#branch_id').val();
    load_menu_page('product','product_avail/' + branch_id);
};
function load_prod_re_order(){
    var branch_id = $('#branch_id').val();
    load_menu_page('product','re_order_list_data/' + branch_id);
};
function load_prod_back_order(){
    var branch_id = $('#branch_id').val();
    load_menu_page('product','back_order_data/' + branch_id);
};
function load_prod_damage_order(){
    var branch_id = $('#branch_id').val();
    load_menu_page('product','prod_damage_data/' + branch_id);
};
function load_inventory_summary(){
    var branch_id = $('#branch_id').val();
    var date = $('#date').val();
    
    load_menu_page('product','inventory_summary_data/' + branch_id + '/' + date);

};


function load_report(){
    
    var branch_id = $('#branch_id').val();
    var date = $('#date').val();
    if(date == 3){
        $('.fdate').show();
    }else{
        load_menu_page('reports','report/' + branch_id + '/' + date);
        $('.fdate').hide(); 
    }
    
};
function load_time_zone(){
    load_menu_page('system','load_time_zone');
};
function load_report_sp_date(){
    var branch_id = $('#branch_id').val();
    var date = $('#date').val();
    

    if($('#datefrom').val() == ""){
        alert('Invalid Start Date');
    }else if($('#dateto').val() == ""){
        alert('Invalid Last Date');
    }else{
        
        var form_data = {
            datefrom: $('#datefrom').val(),
            dateto: $('#dateto').val()
        };
        $.ajax({
          type: "POST",
          url: base_url +"reports/report/" + branch_id + '/3',
          data: form_data,
          cache: false
        }).done(function( html ) {
            
         // alert(html);
          loading("loading..",0);
          $("#mainContent").empty();
          $("#mainContent").append(html);
          setTimeout("unloading()",900);
        });
        
    }
};
function load_notifacation(controller,function_name){
    $.ajax({
      url: base_url + controller + "/" + function_name,
      cache: false
    }).done(function( html ) {
      //alert(html);
      loading("loading..",0);
      $("#mainContent").empty();
      $("#mainContent").append(html);
      setTimeout("unloading()",900);
    });

};
//Archive Message
function deleteMessage(msg_id){
    var action = base_url + 'order/archive/' + msg_id;
		var _data = {
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
                $('#message-' + msg_id).fadeOut(900);
			}
            });	
    
    
};
//Delete Message
function deleteMessage_permanent(msg_id){
    var action = base_url + 'order/delete/' + msg_id;
		var _data = {
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
                $('#message-' + msg_id).fadeOut(900);
			}
            });	
    
    
};
//Restore
function restore_item(msg_id){
    var action = base_url + 'order/restore/' + msg_id;
		var _data = {
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
                $('#message-' + msg_id).fadeOut(900);
			}
            });	
    
    
};

/************************************************
 *  SAVE SYSTEM CONFIGURATION 
 ************************************************/
function save_config(){

        var action = base_url + 'system/save/';
		var _data = {
		   timezone: $('#timezone').val(),
           vat: $('#vat').val(),
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
                //showSuccess('Configuration Updated Successfully!',5000);
                show_modal('Configuration Successfully Updated!','success','center','system');
			}
            });	
};

var l=0;
$('input:checkbox').live('click',function(){
    var checkedStatus = this.checked;
    if(checkedStatus){
        l++;
    }else{
       l--; 
    }
});

//This is for user type
$('#save_usertype').live('click',function(){
        var form_id=$(this).parents('form').attr('id');
        jQuery("#"+form_id).validationEngine('hide'); 
        var action = base_url + 'user_type/check_add/';
		var _data = {
		    name: $('#name').val(),
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
               if(response){
                showError(response,5000);
               }else{
                if(l == 0){ 
                    if (confirm('No permissions have been checked, are you sure you want to continue?')){
                       $("#"+form_id).submit();
                    }else{ /*Nothing Happen ? Duh ?!*/  }
                }else{
                    //Check Box had been Checked
                    $("#"+form_id).submit();
                }
                
               }//End else
			}//End Success: Response
            });
 
});
//This is for user type
$('#update_usertype').live('click',function(){
        var form_id=$(this).parents('form').attr('id');
        jQuery("#"+form_id).validationEngine('hide'); 
        
        
        var action = base_url + 'user_type/check_update/';
		var _data = {
		    user_type_id: $('#user_type_id').val(),
		    name: $('#name-' + $('#user_type_id').val()).val(),
			is_ajax: 1
		};

		$.ajax({
			type: "POST",
			url: action,
			data: _data,
			success: function(response)
			{
               if(response){
                showError(response,5000);
               }else{
                if(l == 0){ 
                    if (confirm('No permissions have been checked, are you sure you want to continue?')){
                       $("#"+form_id).submit();
                    }else{
                          //Nothing Happen ? Duh ?!  
                        }
                    }else{
                        //Check Box had been Checked
                        $("#"+form_id).submit();
                    }
                    
               }//End else
			}//End Success: Response
            });
 
});





    