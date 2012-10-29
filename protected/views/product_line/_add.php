<script>
jQuery(document).ready(function(){
    jQuery("#frmPrdoduct_line").validationEngine();
});
</script>

<?php $this->load->view('views/js/js.php') ?>


<h2>Add New Product Line</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="frmPrdoduct_line" action="#">                                    
    <div class="section ">
    <label> Product Line Name <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,length[0,100],custom[onlyLetterSp],ajax[ajaxProductLineName]] meduim capitalize" name="ProductLineName" id="ProductLineName" />
    </div>
    </div>
                                        
    <div class="section ">
        <label> Description<small>(Optional)</small></label>   
    <div> 
        <textarea class="large capitalize" name="description" id="description"></textarea>
    </div>
    </div>
    
    
                                    
    <div class="section last">
    <div>
        <a class="uibutton" onclick="save_data('#frmPrdoduct_line','product_line','save')">Save</a>
        <a class="uibutton special"  onClick="go_back('#frmPrdoduct_line','product_line');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>