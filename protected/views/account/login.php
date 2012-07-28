<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php $ajax = CJAX::getInstance(); ?>


<?php $this->load->view('views/header/header'); ?>
<?php echo link_tag($this->gtemplate->theme_path('css/main_style.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path('css/login_form.css')); echo "\n"; ?>
<script defer='defer' id='cjax_lib' type='text/javascript' src='<?php echo $this->config->item('public_url')?>cjax/core/js/cjax.js'></script>

<?php echo link_tag($this->gtemplate->theme_path().'favicon.ico', 'shortcut icon', 'image/vnd.microsoft.icon'); ?>


<?php
//$ajax->Exec('anchor1',$ajax->call('ajax.php?controller=account&function=test'));
$base_uri = $this->config->base_url();
$ajax->Exec("login",$ajax->form($base_uri."ajax.php?controller=account&function=login","frmLogin"));
?>
<?php $return_lang = $this->uri->segment(3) ?>

<body>
<?php if(!empty($return_lang)): ?>
<h4 id="required"><?php echo $this->lang->line($return_lang) ?></h4>
<? endif; ?>
<div id="loginContainer">
<form id="frmLogin" method="post" action="#">

<?php // echo form_open('',array('id' => 'frmLogin')); ?>
<?php 
     // Return URL
     echo form_hidden('return_url', $this->uri->uri_string());
?>
<table class="Gform">
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('lbl_email_address') ?>
    <input type="text" id="a[email_address]" name="a[email_address]"  size="30" value="<?php echo set_value('email_address'); ?>" />
    </td>
</tr>
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('lbl_password') ?>
    <input  type="password" id="a[password]" name="a[password]" size="30" value="<?php echo set_value('password'); ?>" />
    </td>
</tr>
</table>
<input type="submit" id="login" name="submit" class="Frmbtn" value="<?php echo $this->lang->line('btn_login') ?>" />
</form>
</div>
</body>

<?php exit; ?>
