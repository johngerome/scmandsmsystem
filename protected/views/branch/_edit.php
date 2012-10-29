<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_branch").validationEngine();
$(".chzn-select").chosen();            
});        
</script>
<?php $this->load->view('views/js/js.php') ?> 

<h2>Edit Branch</h2>
<div class="rqd alcenter">* Required Information</div>
<form id="add_branch" action="<?php echo base_url().'branch/update' ?>" method="POST">
 <?php foreach($qry_branch_byID  as $value): ?>
<input type="hidden" name="branch_id" id="branch_id" value="<?php echo $value->branch_id ?>"/>


                                  <div class="section">
                                  <label>Branch Type <b class="rqd">*</b></label> 
                                    
                                  <div>
                                  <select class="validate[required] cbo_style"  name="branch_type" id="branch_type" >
                                      <?php foreach($branch_qry as $row): ?>
                                      <?php if($value->business_title == $row->business_title): ?>
                                                <option selected = "selected" value="<?php echo $row->business_id ?>"><?php echo $row->business_title ?> </option>
                                      <?php else: ?>
                                            <option value="<?php echo $row->business_id ?>"><?php echo $row->business_title ?> </option>
                                      <?php endif; ?>
                                      <?php endforeach; ?>
                                    </select>       
                                  </div>
                                  </div>
                                
                                  
                                    <div class="section ">
                                        <label> Branch Name <b class="rqd">*</b></label>   
                                        <div> 
                                            <input type="text" value="<?php echo $value->branch_name ?>"  class="validate[required,ajax[ajaxBranchNameEdit]] capitalize" name="branch_name" id="branch_name<?php echo '-'.$value->branch_id; ?>" />
                                        </div>
                                    </div>
                                    
                                  
                                    
                                    <div class="section ">
                                        <label> Branch Location<b class="rqd">*</b></label>   
                                        <div> 
                                            <input type="text" value="<?php echo $value->location ?>" class="validate[required] large  capitalize" name="branch_location" id="branch_location" />
                                        </div>
                                    </div>
                                    
                             
                             
          
         <div class="section last">
         <div>
            <!--<input type="submit"  value="ok"/>-->
            <a class="uibutton" onclick="update_data('#add_branch','branch')">Update</a>
            <a class="uibutton special"  onClick="go_back('#add_branch','branch');" title="Cancel"   >Cancel</a>
         </div>
         </div>
          <?php endforeach; ?>
         </form>