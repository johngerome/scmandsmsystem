<script>
jQuery(document).ready(function(){
    jQuery("#add_product").validationEngine();
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
        updating_data('product','#add_product');
    }
}
</script>

<?php $this->load->view('views/js/js.php') ?>

<ul class="uibutton-group" >
<li><span class="tip"><a class="uibutton icon prev"  id="on_prev_pro" onClick="go_back('#add_product','product');" title="Go Back" >Go Back</a></span></li>
</ul>
<h2>Edit Product</h2>
<div class="rqd alcenter">* Required Information</div>
<br />
<form id="add_product" action="#"> 
    <?php foreach($qry_product as $row): ?>
    <input type="hidden" id="ProductId"  value="<?php echo $row->ProductId ?>"/>
    
    <div class="section">
    <label>Product Line <b class="rqd">*</b></label>   
    <div>
        <select class="validate[required] cbo_style" name="ProductLineId" id="ProductLineId" >
        <option value="<?php echo $row->ProductLineId ?>"><?php echo getReturnValue($this->db->dbprefix('product_line'),'ProductLineName','ProductLineId',$row->ProductLineId) ?></option>
        <?php foreach($qry_product_line as $p_line): ?>
        <option value="<?php echo $p_line->ProductLineId ?>"><?php echo $p_line->ProductLineName ?> </option>
        <?php endforeach; ?>
        </select>       
    </div>
    </div>
                                   
    <div class="section ">
    <label> Product Name <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php echo $row->ProductName ?>" type="text" class="validate[required,ajax[ajaxProductNameEdit]] large capitalize" name="ProductName" id="ProductName-<?php echo $row->ProductId ?>" />
    </div>
    </div>
                                        
    <div class="section ">
        <label> Description<small>(Optional)</small></label>   
    <div> 
        <textarea class="large capitalize" name="Description" id="Description"><?php echo $row->Description ?></textarea>
    </div>
    </div>
     
    <!-- 
    <div class="section ">
    <label> Price <b class="rqd">*</b> <small>Philippine Peso</small></label>   
    <div> 
        <input value="<?php echo $row->ProductPrice ?>" type="text" class="validate[required,custom[price],min[1],max[1000000]] small" name="ProductPrice" id="ProductPrice" />
    </div>
    </div>
    -->
    
    
    <!--
     <div class="section ">
    <label> Discount<small>Discount by %.</small></label>   
    <div> 
        <input type="text" class="validate[custom[integer],min[1],max[100]] meduim capitalize" name="Discount" id="Discount" />
    </div>
    </div>
    --> 
  
    <!-- <div class="section ">
    <label> Quantity </label>   
    <div> 
        <b><?php echo $row->Quantity ?></b>
    </div>
    </div>
    -->
    
    <div class="section ">
    <label> No. of day(s) Expire </label>   
    <div> 
        <input value="<?php echo $row->expiration_days ?>" type="text" class="validate[custom[integer]] meduim" name="expiry_days" id="expiry_days" />
         <span class="f_help">No of days this product will expire.</span>
    </div>
    </div>
    
    <div class="section ">
    <label> VAT <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php echo $row->vat ?>" type="text" class="validate[custom[integer],required,min[0],max[100]] meduim" name="vat" id="vat" />
         <span class="f_help">VAT by %. 0 mean Non-VATable.</span>
    </div>
    </div>
    
   
    <div class="section ">
    <label> Product Unit </label>   
    <div> 
        <input value="<?php echo $row->ProductUnit ?>" type="text" class="validate[custom[onlyLetterSp]] meduim" name="ProductUnit" id="ProductUnit" />
    </div>
    </div>
    
    
    <div class="section ">
    <label> Ceiling <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php echo $row->Ceiling ?>" type="text" class="validate[required,custom[integer],min[1],max[1000000]] small" name="Ceiling" id="Ceiling" />
        <span class="f_help"> </span>
    </div>
    </div>
    
    <div class="section ">
    <label> Re-Order Point <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php echo $row->ReorderPoint ?>" type="text" class="validate[required,custom[integer],min[1],max[1000000]] small" name="ReorderPoint" id="ReorderPoint" />
        <span class="f_help"> </span>
    </div>
    </div>
    
    <div class="section ">
    <label> Flooring <b class="rqd">*</b> </label>   
    <div> 
        <input value="<?php echo $row->Flooring ?>" type="text" class="validate[required,custom[integer],min[1],max[1000000]] small" name="Flooring" id="Flooring" />
        <span class="f_help"> </span>
    </div>
    </div>
    
    <?php endforeach; ?>
    
                                 
    <div class="section last">
    <div>
        <a class="uibutton" onclick="ceiling_reorder_flooring();">Update</a>
        <a class="uibutton special"  onClick="go_back('#add_product','product');" title="Cancel"   >Cancel</a>
    </div>
    </div>
</form>