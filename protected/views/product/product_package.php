<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#set_product_package").validationEngine();
$(".chzn-select").chosen();             
});        
</script>
<?php $this->load->view('views/js/js.php') ?> 

<h2>Add New Branch Type</h2>
<div class="rqd alcenter">* Required Information</div>
<form id="set_product_package" action="branch_type/add">

                                  
                              
                                    <div class="section ">
                                        <label> Branch type Name<b class="rqd">*</b></label>   
                                        <div> 
                                            <input type="text" class="validate[required,ajax[ajaxBranchTypeName]] medium capitalize" name="business_title" id="business_title" />
                                        </div>
                                    </div>
                                    
                                    <div class="section">
                                    
                                      <label> Package</label>   
                                      <div>                          
                                        <select  class="chzn-select validate[required]" multiple  tabindex="2" name="PackageId" id="PackageId">
                                        <option value=""></option>
                                        <?php foreach($package as $row): ?>  
                                        <option value="<?php echo $row->package_id ?>" ><?php echo $row->name ?></option> 
                                        <?php endforeach; ?> 
                                        </select>
                                      </div>
                                      </div>
                                        
    <div class="section last">
        <div>
            <a class="uibutton" onclick="save_data('#set_product_package','branch_type','save')">Save</a>
            <a class="uibutton special"  onClick="go_back('#set_product_package','branch_type');" title="Cancel"   >Cancel</a>
        </div>
    </div>
</form>