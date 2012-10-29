<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_branch_type").validationEngine();
$(".chzn-select").chosen();             
});        
</script>
<?php $this->load->view('views/js/js.php') ?> 

<h2>Add New Branch Type</h2>
<div class="rqd alcenter">* Required Information</div>
<form id="add_branch_type" action="branch_type/add">

                                  
                              
                                    <div class="section ">
                                        <label> Branch type Name<b class="rqd">*</b></label>   
                                        <div> 
                                            <input type="text" class="validate[required,ajax[ajaxBranchTypeName]] medium capitalize" name="business_title" id="business_title" />
                                        </div>
                                    </div>
                                    
                                  <div class="section">
                                  <label> Product Line<b class="rqd">*</b></label>   
                                  <div> 
                                 
                                    <select  class="chzn-select validate[required]" multiple  tabindex="2" name="ProductLineId" id="ProductLineId">
                                      <option value=""></option>
                                      <?php foreach($product_line as $row): ?>  
                                      <option value="<?php echo $row->ProductLineId ?>" ><?php echo $row->ProductLineName ?></option> 
                                      <?php endforeach; ?> 
                                    </select>
                                     <span id="plinemsg"></span>
                                    </div>
                                  </div>
                                        
    <div class="section last">
        <div>
            <a class="uibutton" onclick="save_data('#add_branch_type','branch_type','save')">Save</a>
            <a class="uibutton special"  onClick="go_back('#add_branch_type','branch_type');" title="Cancel"   >Cancel</a>
        </div>
    </div>
</form>