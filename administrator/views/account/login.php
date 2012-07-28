<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $ajax = CJAX::getInstance(); ?>


<?php $this->load->view('views/header/header'); ?>
<?php echo link_tag($this->gtemplate->theme_path('css/main_style.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path('css/login_form.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path().'favicon.ico', 'shortcut icon', 'image/ico'); ?>
<script>
$(document).ready(function() {
var username = "Username";
var password = "Password";

$('#username').val(username);
$('.password').val(password);
$('.password').addClass('clicked');
$('#username').addClass('clicked');

    $('#username').click(function() {
        //Clear
        if($('#username').val() == "Username"){
             $(this).val('');
        }
        if($('#username').val() != "Username"){
            $('#username').removeClass('clicked');
        }
        if($('.password').val() == "" || $('#username').val() == "Username" && $('.password').val() == "Password"){
            //alert('Please supply a name in the Name field.');
           $('.password').addClass('clicked');
           $('.password').val(password);
        }
            
    });
    $('.password').click(function() {
        // Clear
        if($('.password').val() == "Password"){
             $(this).val('');
        }
        if($('.password').val() != "Password"){
            $('.password').removeClass('clicked');
        }
        if($('#username').val() == "" || $('.password').val() == "Password" && $('#username').val() == "Username"){
        $('#username').addClass('clicked');
        $('#username').val(username);
        }
    });        
}); // end ready
</script>
<?php $return_lang = $this->uri->segment(3) ?>
</head>
<body>
<?php if(!empty($return_lang)): ?>
<h4 id="required"><?php echo $this->lang->line($return_lang) ?></h4>
<? endif; ?>
<div class="con_error">
<?php echo validation_errors('<div id="error"><img src="'.$this->config->base_url().
          '../images/notice-alert.png" />&nbsp;<div class="error">', '</div>&nbsp;</div>'); ?>
</div>
<div id="loginContainer">


	<?php echo form_open('',array('id' => 'frmLogin')); ?>
	<?php 
		 // Return URL
		 echo form_hidden('return_url', $this->uri->uri_string());
	?>
	<table class="Gform">
    	<tr>
        <td>
    		<input type="text" class="username" id="username" name="username"  size="30" value="<?php echo set_value('username'); ?>" />
    	</td>
        </tr>
    	<div style="height:19px;"></div>
    	<tr>
         <td>
    		<input  type="password" class="password"  name="password" size="30" value="<?php echo set_value('password'); ?>" />
    	 </td>
        </tr>
    	</table>
	<input type="submit" id="login" name="submit" class="Frmbtn" value="" />
	</form>
</div>
<div id="footer">
 <p>&copy;<?php 
       if($this->config->item('copyright_year') == date('Y')){
        echo $this->config->item('copyright_year');
       }else{
        echo $this->config->item('copyright_year').'-'.date('Y');
       }
       ?>&nbsp;<?php echo $this->config->item('site_name') ?></p>
</div>
</body>

<?php exit; ?>
