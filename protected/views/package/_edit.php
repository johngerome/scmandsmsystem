<script>
jQuery(document).ready(function(){
    jQuery("#add_product_package").validationEngine();
});
</script>

<?php $this->load->view('views/js/js.php') ?>

<h2>Edit Product Package</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="add_product_package" action="#">
    <?php foreach($package as $row): ?> 
    
    <input type="hidden" id="package_id" name="package_id" value="<?php echo $row->package_id; ?>" /> 
                            
    <div class="section ">
    <label> Package Name <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php echo $row->name ?>" type="text" class="validate[required,length[0,100],custom[onlyLetterSp],ajax[ajaxProductPackageName]] meduim capitalize" name="PackageName" id="PackageName-<?php echo $row->package_id; ?>" />
    </div>
    </div>
    
    <div class="section ">
    <label> Quantity <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php echo $row->quantity ?>" type="text" class="validate[required,custom[integer],min[1],max[100]] small" name="quantity" id="quantity" />
    </div>
    </div>
    
    <div class="section ">
    <label> Discount<small>Discount by %.</small></label>
    
    <div> 
        <input value="<?php echo $discount = $row->discount * 100; ?>" type="text" class="validate[custom[integer],min[0],max[100]] small" name="discount" id="discount" />
    </div>
    </div>
     <?php endforeach; ?> 
                         
    <div class="section last">
    <div>
        <a class="uibutton" onclick="update_data('#add_product_package','package')">Update</a>
        <a class="uibutton special"  onClick="go_back('#add_product_package','package');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>