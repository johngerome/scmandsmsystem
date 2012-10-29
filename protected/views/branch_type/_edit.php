<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_branch_type").validationEngine();
$(".chzn-select").chosen();              
});        
</script>
<?php $this->load->view('views/js/js.php') ?> 

<h2>Edit Branch Type</h2>
<div class="rqd alcenter">* Required Information</div>
<form id="add_branch_type" action="#">

<input type="hidden" id="business_id" name="business_id" value="<?php echo $b_id_type ?>" />                                
<div class="section ">
<label> Branch type Name<b class="rqd">*</b></label>   
<div> 
<input value="<?php echo $b_type ?>" type="text" class="validate[required,ajax[ajaxBranchTypeNameEdit]] medium capitalize" name="business_title" id="business_title-<?php echo $b_id_type ?>" />
</div>
</div> 

<div class="section">
<label> Product Line<b class="rqd">*</b></label>   
<div> 
<select  class="chzn-select validate[required]" multiple  tabindex="3" name="ProductLineId" id="ProductLineId">
<?php foreach($qry_pline as $row): ?>  
<option value="<?php echo $row->ProductLineId ?>" selected="selected"><?php echo $row->ProductLineName ?></option> 
<?php endforeach; ?>
                                      
<?php foreach($qry_pline_2 as $row): ?>  
<option value="<?php echo $row->ProductLineId ?>"><?php echo $row->ProductLineName ?></option> 
<?php endforeach; ?>
                                      
</select>
<span id="plinemsg"></span>
</div>
</div>  
                            
<div class="section last">
<div>
            <a class="uibutton" onclick="update_data('#add_branch_type','branch_type')">Update</a>
            <a class="uibutton special"  onClick="go_back('#add_branch_type','branch_type');" title="Cancel"   >Cancel</a>
</div>
</div>
</form>