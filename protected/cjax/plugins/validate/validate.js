
/**
 * Plugin: validate 1.0
 * Dependencies: Cjax 4.2+, Jquery, jquery.validate
 * 
 * Ref:
 * 
 * http://docs.jquery.com/Main_Page
 * http://docs.jquery.com/Plugins/Validation
 * 
 * http://code.google.com/p/cjax
 * http://code.google.com/p/ajax-framework-for-codeigniter
 * 
 * @param form_id
 * @param fields
 */

function validate(btn_id, fields)
{
	if(typeof jQuery  =='undefined') {
		alert('CJAX: Validate Plugin requires Jquery library.');
		//jquery was not found
		return;
	}
	
	if(typeof $.validator =='undefined') {
		console.log('CJAX: Validate Plugin requires validate Jquery plugin.');
		return;
	}
	if(typeof fields !='object') {
		//an array was not passed.
		return false;
	}
	//get form
	var form = $('#'+btn_id).closest('form');
	
	//prevent request or api and sets in in cache
	//we can trigger it later with  the call_id.
	call_id = CJAX.preventDefault();
	
	if(fields.invalidHandler) {
		_invalidHandler = eval('('+fields.invalidHandler+')');
		
	} else {
		_invalidHandler =  function(form, validator) {}
	}
	if(fields.submitHandler) {
		_submitHandler = eval('('+fields.submitHandler+')');
	} else {
		_submitHandler =  function(form) {
			//triggers the cancelled request
			CJAX.trigger(call_id);
		}
	}
	
	$(document).ready(function() {
		$(form).validate({
			errorElement: (fields.errorElement? fields.errorElement: "div"), 
			invalidHandler: _invalidHandler,
			submitHandler: _submitHandler,
			rules: fields.rules,
			messages: fields.messages
		});
	});
	
	$('#'+btn_id).click(function() {
		
		$(form).submit();
	});
	
}