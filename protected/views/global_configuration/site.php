<center>

<h2>&nbsp;<?php echo $this->lang->line('site_settings') ?></h2>
<?php //echo form_open('global_configuration/site'); ?>
<table class="form" id="sample">
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('site_name') ?></td>
    <td><input type="text" id="site_name" name="site_name"  size="40" value="<?php echo set_value('site_name'); ?>" />
    <?php echo form_error('site_name','<span id="error">','</span>'); ?>
    </td>
</tr>
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('site_offline') ?></td>
    <td>
      <?php
  $data = array(
    'name'        => 'site_offline',
    'id'          => 'site_offline',
    'value'       => 1,
    'checked'     => TRUE,
    'style'       => 'margin:10px',
    );
    echo form_radio($data).$this->lang->line('yes');
      
 $data2 = array(
    'name'        => 'site_offline',
    'id'          => 'site_offline',
    'value'       => 0,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
    echo form_radio($data2).$this->lang->line('no');
  ?>
    </td>
</tr>
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('offline_message') ?></td>
    <td><textarea id="offline_message" name="offline_message" cols="50" rows="10" ><?php echo set_value('offline_message'); ?></textarea>
        <?php echo form_error('offline_message','<span id="error">','</span>'); ?>
    </td>
</tr>
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('licensed_to') ?></td>
    <td><textarea id="licensed_to" name="licensed_to" cols="50" rows="2" ><?php echo set_value('licensed_to'); ?></textarea>
        <?php echo form_error('licensed_to','<span id="error">','</span>'); ?>
    </td>
</tr>
</table>
<hr />
<table class="form">
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('meta_description') ?></td>
    <td><textarea id="meta_description" name="meta_description" cols="50" rows="2" ><?php echo set_value('meta_description'); ?></textarea>
        <?php echo form_error('meta_description','<span id="error">','</span>'); ?>
    </td>
</tr>
<tr>
    <td id="form_lbl"><?php echo $this->lang->line('meta_keywords') ?></td>
    <td><textarea id="meta_keywords" name="meta_keywords" cols="50" rows="2" ><?php echo set_value('meta_keywords'); ?></textarea>
        <?php echo form_error('meta_keywords','<span id="error">','</span>'); ?>
    </td>
</tr>
</table>
<hr />
<input type="submit" id="login" name="submit" value="<?php echo $this->lang->line('btn_update') ?>" />

</center>