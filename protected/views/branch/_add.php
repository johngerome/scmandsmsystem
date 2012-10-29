<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_branch").validationEngine(); 
$(".chzn-select").chosen();       
});        
</script>
<?php $this->load->view('views/js/js.php') ?> 

<h2>Add New Branch</h2>
<div class="rqd alcenter">* Required Information</div>
<form id="add_branch" action="branch/save" method="post">

                                  <div class="section">
                                  <label>Branch Type<b class="rqd">*</b></label>   
                                  <div>
                                  	  <select class="validate[required] cbo_style"  name="branch_type" id="branch_type" >
                                      <option value="">Choose Type...</option>
                                      <?php foreach($branch_qry as $row): ?>
                                      <option value="<?php echo $row->business_id ?>"><?php echo $row->business_title ?> </option>
                                      <?php endforeach; ?>
                                    </select>       
                                  </div>
                                  </div>
                              
                                    <div class="section ">
                                        <label> Branch Name<b class="rqd">*</b></label>   
                                        <div> 
                                            <input type="text" class="validate[required,ajax[ajaxBranchName]] medium capitalize" name="branch_name" id="branch_name" />
                                        </div>
                                    </div>

                                    <div class="section ">
                                        <label> Branch Location<b class="rqd">*</b></label>   
                                        <div> 
                                            <input type="text" class="validate[required] large capitalize" name="branch_location" id="branch_location" />
                                        </div>
                                    </div>

         <div class="section last">
         <div>

         <a class="uibutton" onclick="save_data('#add_branch','branch','save')">Save</a>
         <a class="uibutton special"  onClick="go_back('#add_branch','branch');" title="Cancel"   >Cancel</a>
         
         </div>
         </div>
         </form>