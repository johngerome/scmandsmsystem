<script>
jQuery(document).ready(function(){
    jQuery("#add_user_type").validationEngine();
    	// checkbox,selectbox customInput 
    $('input[placeholder], textarea[placeholder]').placeholder();
	$('.ck,.chkbox,.checkAll ,.branch_checkAll1 ,.branch_checkAll2 ,input:radio').customInput();	
	$('.limit3m').limitInput({max:3,disablelabels:true});
	// Dual select boxes
	$.configureBoxes();
});
</script>
<style>
label.lbl{
    margin-left: 30px;
    margin-bottom: 30px;
}
.ch{
    margin-bottom: 10px;
}
fieldset{
    background: #f1f1f1;
    border: 1px solid #ccc;
    color: #444;
}

legend {
    color: #000;
    font-size: 15px;
    background: #fff;
    border: 1px solid #ccc;
    padding: 8px;
    font-weight: bold;
}

</style>
<?php $this->load->view('views/js/js.php') ?>
 

<h2>Edit User Type</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="add_user_type" action="<?php echo base_url().'user_type/update' ?>" method="POST">
    <input type="hidden" id="user_type_id" name="user_type_id" value="<?php echo $user_type_id ?>"/>                      
    <div class="section ">
    <label> User Type <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php  echo $title; ?>" type="text" class="validate[required,length[0,100],custom[onlyLetterSp],ajax[ajaxUserTypeNameEdit]] large capitalize" name="name" id="name-<?php echo $user_type_id ?>" />
    </div>
    </div>
                                        
    <h6>User Permission</h6>
    <table style="width: 100%;">
    <tr>
        <td>
        <fieldset>
        <legend>Backend</legend><br />
        <?php $i=0; ?>
        <?php foreach($qry_permission_server as $row): ?>
            <div class="ch">
            <?php
            //Debug
            if($this->user_type_model->page_access_edit($user_type_id,$row->permission_id) == true){ echo '<script>l++;</script>'; }
            ?>
            <input <?php  if($this->user_type_model->page_access_edit($user_type_id,$row->permission_id) == true){ echo ' checked="checked" '; }?> type="checkbox" name="<?php echo $row->class ?>" id="<?php echo $row->class ?>" value="1"  class="ck<?php echo $i++; ?>" />
            <label class="lbl"><?php echo $row->description ?></label>
            </div>
        <?php endforeach; ?>
        </fieldset>
        </td>
        
    <td> 
        <fieldset>
            <legend>Frontend</legend>
            <br />
            <?php foreach($qry_permission_client as $row): ?>
                <div class="ch">
                <?php
                //Debug
                if($this->user_type_model->page_access_edit($user_type_id,$row->permission_id) == true){ echo '<script>l++;</script>'; }
                ?>
                <input <?php  if($this->user_type_model->page_access_edit($user_type_id,$row->permission_id) == true){ echo ' checked="checked" '; }?> type="checkbox" name="<?php echo $row->class ?>" id="<?php echo $row->class ?>" value="1"  class="ck<?php echo $i++; ?>" />
                <label class="lbl"><?php echo $row->description ?></label>
                </div>
            <?php endforeach; ?>
        </fieldset>
    </td>
    </tr>
    
    </table>
    
    

    

                        
    <div class="section last">
    <div>
         <a class="uibutton"  id="update_usertype"  >Update </a>
        <a class="uibutton special"  onClick="go_back('#add_user_type','user_type');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>