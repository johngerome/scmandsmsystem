<script>
jQuery(document).ready(function(){
    jQuery("#stock_in").validationEngine();
});
</script>

<?php $this->load->view('views/js/js.php') ?>

<div id="frm_cont">
<h2>Replenish Stock</h2>
<div class="rqd alcenter">* Required Information</div> 
<br />
<form id="stock_in" action="#"> 
    <?php foreach($qry_product as $row): ?>
    <input type="hidden" id="ProductId"  value="<?php echo $row->ProductId ?>"/>
                                 
    <div class="section ">
    <label> Product Name</label>   
    
        <b><?php echo $row->ProductName ?></b>
    </div>

      
     <?php if($row->Description): ?>                                  
    <div class="section ">
    <label> Description</label>   
    <div> 
        <b><?php echo $row->Description ?></b>
    </div>
    </div>
    <?php endif; ?>
    
    <div class="section ">
    <label> Quantity Left </label>   
    <div> 
        <b><?php echo $row->Quantity ?></b>
    </div>
    </div>
    
    <div class="section ">
    <label> Quantity  <b class="rqd">*</b> </label>   
    <div> 
          <input value="" type="text" class="validate[required,custom[integer],min[1]] small" name="Quantity" id="Quantity" />
         <!-- <span class="f_help"> Input Quantity to Stock-In</span> -->
    </div>
    </div>
    
    <?php endforeach; ?>
    
                                 
    <div class="section last">
    <div>
        <a class="uibutton stock_in_product" onclick="stock_in_product();">Ok</a>
        <a href="<?php echo base_url().'product/stock_in.html' ?>" class="uibutton special stock_in_product" title="Cancel">Cancel</a>
    </div>
    </div>
</form>
</div>