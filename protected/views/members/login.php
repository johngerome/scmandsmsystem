<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php echo form_open('member/login'); ?>
<p>Username:</p>
<p><input type="text" name="username" value="<?php echo set_value('username'); ?>" /></p>
<p><?php echo form_error('username'); ?></p>
<p>Password:</p>
<p><input type="password" name="password" value="<?php echo set_value('password'); ?>" /></p>
<p><?php echo form_error('password'); ?></p>
<p><input type="submit" name="submit" value="Login" /></p>