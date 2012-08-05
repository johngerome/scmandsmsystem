<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<center>

<div id="formWraper">
<h2 id="infoBox" >&nbsp;<?php echo $this->lang->line('add_new_branch') ?></h2>
<br />
<?php $err = validation_errors(); ?>
<?php if (!empty($err)): ?>
<?php errorMsg($this->lang->line('errors_were_found_with_registration')) ?>
<?php endif; ?>

<b id="required"><b id="required_symbol">*</b> <?php echo $this->lang->line('required_information') ?> </b> <br /><br />
<form  method="post" id="formID_create">
<table class="form">
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('branch_name') ?><b id="required_symbol">*</b></td>
        <td><input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" />
        <?php echo form_error('email','<span id="error">','</span>'); ?>
        </td>
        
        <td id="tip">&nbsp;</td>
    </tr>
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('location') ?><b id="required_symbol">*</b></td>
        <td><input type="password" id="password" name="password" maxlength="32" value="<?php echo set_value('password'); ?>"  />
        <?php echo form_error('password','<span id="error">','</span>'); ?>
        </td>
        <td id="tip">&nbsp;</td>
    </tr>
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('branch_manager') ?><b id="required_symbol">*</b></td>
        <td><input type="password" id="password" name="password" maxlength="32" value="<?php echo set_value('password'); ?>"  />
        <?php echo form_error('password','<span id="error">','</span>'); ?>
        </td>
        <td id="tip">&nbsp;</td>
    </tr>
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('branch_cashier') ?><b id="required_symbol">*</b></td>
        <td><input type="password" id="password" name="password" maxlength="32" value="<?php echo set_value('password'); ?>"  />
        <?php echo form_error('password','<span id="error">','</span>'); ?>
        </td>
        <td id="tip">&nbsp;</td>
    </tr>
</table>
<hr />
<input type="submit" class="Frmbtn" value="<?php echo $this->lang->line('add_new_branch') ?>" name="member" id="btnregister"/>
Or <?php echo anchor('branch/eggstore','Cancel','title="Cancel Adding Branch" '); ?>
</form>
</div>
</center>