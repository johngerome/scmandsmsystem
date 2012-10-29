<script>
jQuery(document).ready(function(){
    jQuery("#add_product_package").validationEngine();
    $(".chzn-select").chosen(); 
});
</script>

<?php $this->load->view('views/js/js.php') ?>

<h2>Set New Product Package</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="add_product_package" action="#">    
                                
    <div class="section ">
    <label> Product <b class="rqd">*</b> </label>   
    <div> 
   <select data-placeholder="Select Product..." class="chzn-select" tabindex="2" name="product_id" id="product_id">
   <option value=""></option>
   <?php foreach($product as $row): ?>  
    <option value="<?php echo $row->ProductId ?>" ><?php echo $row->ProductName ?></option> 
    <?php endforeach; ?>
   </select>
    </div>
    </div>
    
    <div class="section">
    <label> Package<b class="rqd">*</b></label>   
    <div>                            
    <select  class="chzn-select" multiple  tabindex="2" name="package_id" id="package_id">
    <option value="0"></option>
    <?php foreach($package as $row): ?>  
    <option value="<?php echo $row->package_id ?>" ><?php echo $row->name ?></option> 
    <?php endforeach; ?> 
    </select>
    </div>
    </div>
                            
    <div class="section last">
    <div>
        <a class="uibutton" onclick="save_data('#add_product_package','product_package','save')">Save</a>
        <a class="uibutton special"  onClick="go_back('#add_product_package','product_package');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>