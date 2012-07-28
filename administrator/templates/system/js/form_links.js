/*---------------*
| Author: Gerome
| Copyright 2012
/*----------------*/
jQuery(document).ready(function()
  {
  // binds form submission and fields to the validation engine
  jQuery("#formID").validationEngine('attach');
  jQuery("#formID_reg").validationEngine('attach');
  jQuery("#preview form#frmQTY").validationEngine('attach');
  jQuery("#formID_login").validationEngine('attach');
  jQuery("#formID_create").validationEngine('attach'); 
  jQuert("#formID_create2").validationEngine('attach'); // WTF! Bug!
 // Binding
 
// Everytime i Click the Email and Password textbox the text will disappear. *_*
$('#formID_login #email').click(function(){
		$(this).attr('value','');
});// End Email Click
$('#formID_login #password').click(function(){
		$(this).attr('value','');
});// End Password Click
});
