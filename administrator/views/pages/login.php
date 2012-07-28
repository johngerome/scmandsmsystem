<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<center>
<?php $return_lang = $this->uri->segment(3) ?>
<?php if(!empty($return_lang)): ?>
<h4 id="required"><?php echo $this->lang->line($return_lang) ?></h4>
<? endif; ?>
<?php if(!empty($error)): ?>
<div id="error">
<?php echo $error; ?>
</div>
<?php endif; ?>
<div id="loginContainer">
<h2>Log In</h2>
<?php echo form_open('member/login'); ?>
<table class="form">
<tr>
    <td id="form_lbl">Email Address</td>
    <td><input type="text" id="email_address" name="email_address" value="<?php echo set_value('email_address'); ?>" />
    <?php echo form_error('email_address','<span id="error">','</span>'); ?>
    </td>
</tr>
<tr>
    <td id="form_lbl">Password</td>
    <td><input type="password" name="password" value="<?php echo set_value('password'); ?>" />
    <?php echo form_error('password','<span id="error">','</span>'); ?>
    </td>
</tr>
</table>
<hr />
<input type="submit" id="login" name="submit" value="Login" />
</center>
</div>