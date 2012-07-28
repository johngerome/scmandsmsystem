<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<center>

<div id="formWraper">
<h2 id="infoBox" >&nbsp;<?php echo $this->lang->line('register_new_member') ?></h2>
<br />
<?php $err = validation_errors(); ?>
<?php if (!empty($err)): ?>
<?php errorMsg($this->lang->line('errors_were_found_with_registration')) ?>
<?php endif; ?>

<b id="required"><b id="required_symbol">*</b> <?php echo $this->lang->line('required_information') ?> </b> <br /><br />
<form  method="POST" id="formID_create">
<table class="form">
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('lbl_email_address') ?><b id="required_symbol">*</b></td>
        <td><input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>" />
        <?php echo form_error('email','<span id="error">','</span>'); ?>
        </td>
        
        <td id="tip">&nbsp;</td>
    </tr>
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('lbl_password') ?><b id="required_symbol">*</b></td>
        <td><input type="password" id="password" name="password" maxlength="32" value="<?php echo set_value('password'); ?>"  />
        <?php echo form_error('password','<span id="error">','</span>'); ?>
        </td>
        <td id="tip">&nbsp;</td>
    </tr>
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('confirm_password') ?><b id="required_symbol">*</b></td>
        <td><input type="password" id="password" name="password2" maxlength="32" value="<?php echo set_value('password2'); ?>" />
        <?php echo form_error('password2','<span id="error">','</span>'); ?>
        </td>
    </tr>
</table>
 <hr />
<table class="form">
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('fname') ?><b id="required_symbol">*</b></td>
        <td><input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name'); ?>" />
        <?php echo form_error('first_name','<span id="error">','</span>'); ?>
        </td>
        <td id="tip">&nbsp;</td>
    </tr>
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('lname') ?><b id="required_symbol">*</b></td>
        <td><input type="text" id="last_name" name="last_name" value="<?php echo set_value('last_name'); ?>" />
        <?php echo form_error('last_name','<span id="error">','</span>'); ?>
        </td>
    </tr>
    <tr>
        <td id="form_lbl"><?php echo $this->lang->line('middle_initial') ?><b id="required_symbol">*</b></td>
        <td><input type="text" id="middle_initial" name="middle_initial" maxlength="1" value="<?php echo set_value('middle_initial'); ?>" />
        <br /><?php echo form_error('middle_initial','<span id="error">','</span>'); ?>
        </td>
    </tr>
   <tr>
        <td id="form_lbl"><?php echo $this->lang->line('address') ?><b id="required_symbol">*</b></td>
        <td><textarea id="address" name="address" ><?php echo set_value('address'); ?></textarea>
        <?php echo form_error('address','<span id="error">','</span>'); ?>
        </td>
   </tr>
  <tr>
        <td id="form_lbl"><?php echo $this->lang->line('phone_no') ?></td>
        <td><input type="text" id="phone_number" name="phone_number" value="<?php echo set_value('phone_number'); ?>" />
        <?php echo form_error('phone_number','<span id="error">','</span>'); ?>
        </td>
  </tr>   
  <tr>
        <td id="form_lbl"><?php echo $this->lang->line('cell_no') ?></td>
        <td><input type="text" id="cell_number" name="cell_number" maxlength="12" value="<?php echo set_value('cell_number'); ?>" />
        <?php echo form_error('cell_number','<span id="error">','</span>'); ?>
        </td>
  </tr>
</table>
<hr />
<table class="form">
  <tr>
  <td id="form_lbl"><?php echo $this->lang->line('group') ?></td>
  <td>
  <?php  echo form_dropdown('Group',$this->member_model->get_group(), '2','id="group" '); ?>
  </td>
  <td id="tip"></td>
  </tr>
    <tr>
  <td id="form_lbl"><?php echo $this->lang->line('send_confirmation_email_') ?></td>
  <td>
  <?php
  $data = array(
    'name'        => 'confirmation_email',
    'id'          => 'confirmation_email',
    'value'       => 1,
    'checked'     => TRUE,
    'style'       => 'margin:10px',
    );
    echo form_radio($data).$this->lang->line('yes');
      
 $data2 = array(
    'name'        => 'confirmation_email',
    'id'          => 'confirmation_email',
    'value'       => 0,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
    echo form_radio($data2).$this->lang->line('no');
  ?>
  <br/><i class="tip"><?php echo $this->lang->line('include_users_password') ?></i>
  </td>
  <td id="tip">&nbsp;</td>
  </tr>
</table>
<hr />
<input type="submit" class="Frmbtn" value="<?php echo $this->lang->line('register_new_account') ?>" name="member" id="btnregister"/>
</form>
</div>
</center>