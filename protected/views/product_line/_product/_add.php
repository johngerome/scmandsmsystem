
<script>
jQuery(document).ready(function(){
    jQuery("#add_product").validationEngine();
    
});
  	//datepicker
	$("input.datepicker").datepicker({ 
		autoSize: true,
		appendText: '(dd/mm/yyyy)',
		dateFormat: 'dd/mm/yy'
	});
</script>

<?php $this->load->view('views/js/js.php') ?>


<h2>Add New Product</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="add_product" action="#"> 

    <div class="section">
    <label>Product Line<b class="rqd">*</b></label>   
    <div>
        <select class="validate[required] cbo_style" name="ProductLineId" id="ProductLineId" >
        <option value="">Choose Product Line...</option>
        <?php foreach($qry_product_line as $row): ?>
        <option value="<?php echo $row->ProductLineId ?>"><?php echo $row->ProductLineName ?> </option>
        <?php endforeach; ?>
        </select>       
    </div>
    </div>
                                   
    <div class="section ">
    <label> Product Name <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,ajax[ajaxProductName]] large capitalize" name="ProductName" id="ProductName" />
    </div>
    </div>
                                        
    <div class="section ">
        <label> Description<small>(Optional)</small></label>   
    <div> 
        <textarea class="large capitalize" name="Description" id="Description"></textarea>
    </div>
    </div>
     
    <div class="section ">
    <label> Price <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,custom[number],min[1],max[1000000]] small" name="ProductPrice" id="ProductPrice" />
    </div>
    </div> 
    
    <div class="section ">
    <label> Quantity </label>   
    <div> 
        <b>0</b>
    </div>
    </div>
    
    <div class="section ">
    <label> Date Expiration </label>   
    <div> 
        <input type="text" class="small datepicker" readonly="readonly"  name="DateExpiration" id="DateExpiration" />
        <span class="f_help"> this is required for product that have an expiration. e.g bread..</span>
    </div>
    </div>
    
    <div class="section ">
    <label> Product Unit </label>   
    <div> 
        <input type="text" class="validate[custom[onlyLetterSp]] meduim capitalize" name="ProductUnit" id="ProductUnit" />
    </div>
    </div>
    
    <div class="section ">
    <label> Re-Order Point <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,custom[integer],min[1],max[1000000]] small" name="ReorderPoint" id="ReorderPoint" />
        <span class="f_help"> </span>
    </div>
    </div>
    
    <div class="section ">
    <label> Ceiling <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,custom[integer],min[1],max[1000000]] small" name="Ceiling" id="Ceiling" />
        <span class="f_help"> </span>
    </div>
    </div>
    
    <div class="section ">
    <label> Flooring <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,custom[integer],min[1],max[1000000]] small" name="Flooring" id="Flooring" />
        <span class="f_help"> </span>
    </div>
    </div>
    
    
                                 
    <div class="section last">
    <div>
        <a class="uibutton" onclick="save_data('#add_product','product','save')">Save</a>
        <a class="uibutton special"  onClick="go_back('#add_product','product');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>