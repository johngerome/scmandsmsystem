<script>
$(function(){
$("textarea#config").hide();
$("#button").hide();
});
$(document).ready(function() {
    $('#configa').click(function() {
        $('textarea#config').fadeIn();
        $('.source_code').hide();
        $(this).hide();
        $("#button").show();
    }); 
}); 
</script>

<center>

<h2>&nbsp;<?php echo $this->lang->line('system_configuration') ?></h2>
<?php echo form_open('global_configuration/system'); ?>
<p>NOTE: Editing this configuration can cause an error to your site,  Make sure you know what you are doing.</p>
<table class="form" id="sample">
<tr>
<td>
<div class="source_code" style="height: 500px; overflow: auto; background: #fffefa; border: 1px solid #ccc; padding: 10px; ">
    <?php echo highlight_code($config); ?>
</div>
</td>
</tr>
<tr>
    <td><textarea id="config" name="config" cols="100" rows="50" >
    <?php echo $config; ?>
    </textarea>
    </td>
</tr>

</table>

<hr />
<div class="wrapper" style="width: 200px; height: 100px; ">
<input type="submit" id="button" class="Frmbtn" name="submit" value="<?php echo $this->lang->line('btn_update') ?>" />
<a href="#" id="configa" class="btn edit" ><?php  echo $this->lang->line('edit')?></a>
</div>

<br />
</center>