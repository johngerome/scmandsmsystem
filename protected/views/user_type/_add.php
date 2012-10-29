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
 

<h2>Add User Type</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="add_user_type" action="<?php echo base_url().'user_type/save' ?>" method="POST">
    <input type="hidden" id="chk_is_checked" value="0"/>                      
    <div class="section ">
    <label> User Type <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,length[0,100],custom[onlyLetterSp],ajax[ajaxUserTypeName]] large capitalize" name="name" id="name" />
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
            <input  type="checkbox" name="<?php echo $row->class ?>" id="<?php echo $row->class ?>" value="1"  class="ck<?php echo $i++; ?>" />
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
                <input type="checkbox" name="<?php echo $row->class ?>" id="<?php echo $row->class ?>" value="1"  class="ck<?php echo $i++; ?>" />
                <label class="lbl"><?php echo $row->description ?></label>
                </div>
            <?php endforeach; ?>
        </fieldset>
    </td>
    </tr>
    
    </table>
    
    

    

                        
    <div class="section last">
    <div>
        <a class="uibutton"  id="save_usertype"  >save </a>
        <a class="uibutton special"  onClick="go_back('#add_user_type','user_type');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>