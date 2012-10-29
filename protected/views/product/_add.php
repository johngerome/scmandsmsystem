
<script>
jQuery(document).ready(function(){
    jQuery("#add_product").validationEngine();
    $(".chzn-select").chosen();           
    
});
  	//datepicker
	$("input.datepicker").datepicker({ 
		autoSize: true,
		appendText: '(dd/mm/yyyy)',
		dateFormat: 'dd/mm/yy'
	});
function ceiling_reorder_flooring(){
    var Ceiling = $('#Ceiling').val();
    var ReorderPoint = $('#ReorderPoint').val();
    var Flooring = $('#Flooring').val();
    var error = 0;

    
    if(Number(ReorderPoint) >= Number(Ceiling)){
        show_modal_warning('Re Order Point can not be greater than or equal to Ceilling.');
        error = 1;
    }
    if(Number(Flooring) >= Number(ReorderPoint)){
        show_modal_warning('Flooring can not be greater than or equal to  Re Order Point or Ceiling.');
        error = 1;
    }
    if(error == 0){
        save_data('#add_product','product','save');
    }
 }
</script>

<?php $this->load->view('views/js/js.php') ?>


<h2>Add New Product</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="add_product" action="product/save" method="post"> 

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
    
    <!-- 
    <div class="section ">
    <label> Price <b class="rqd">*</b> <small>Philippine Peso</small></label>   
    <div> 
        <input type="text" class="validate[required,custom[price],min[1],max[1000000]] small" name="ProductPrice" id="ProductPrice" />
    </div>
    </div> 
    -->
    
    
    <div class="section ">
    <label> No. of day(s) Expire </label>   
    <div> 
        <input type="text" class="validate[custom[integer]] meduim" name="expiry_days" id="expiry_days" />
         <span class="f_help">No of days this product will expire.</span>
    </div>
    </div>
    
    <div class="section ">
    <label> VAT <b class="rqd">*</b></label>   
    <div> 
         <input value="<?php echo getReturnValue($this->db->dbprefix('config'),'vat') ?>" type="text" class="validate[custom[integer],required,min[0],max[100]] meduim" name="vat" id="vat" />
         <span class="f_help">VAT by %. 0 mean Non-VATable.</span>
    </div>
    </div>
    
    <div class="section ">
    <label> Product Unit </label>   
    <div> 
        <input type="text" class="validate[custom[onlyLetterSp]] meduim" name="ProductUnit" id="ProductUnit" />
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
    <label> Re-Order Point <b class="rqd">*</b> </label>   
    <div> 
        <input type="text" class="validate[required,custom[integer],min[1],max[1000000]] small" name="ReorderPoint" id="ReorderPoint" />
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
        <a class="uibutton" onclick="ceiling_reorder_flooring();">Save</a>
        <a class="uibutton special"  onClick="go_back('#add_product','product');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>