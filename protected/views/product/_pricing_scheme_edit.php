<script>
jQuery(document).ready(function(){
    jQuery("#stock_in").validationEngine();
});
</script>

<?php $this->load->view('views/js/js.php') ?>

<div id="frm_cont">
<h2>Price Change</h2>
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
    <label> Old Price </label>   
    <div> 
        <b><?php echo $row->ProductPrice ?> PHP</b>
    </div>
    </div>
    
    <div class="section ">
    <label> Old Price With VAT of <?php echo $row->vat ?> % </label>   
    <div> 
        <b><?php echo sprintf("%01.2f", $row->ProductPrice + ($row->ProductPrice * ($row->vat / 100)));  ?> PHP</b>
    </div>
    </div>
    
    <div class="section ">
    <label> New Price <b class="rqd">*</b></label>   
    <div> 
          <input value="" type="text" class="validate[required,custom[number],min[1],max[1000000]] small" name="new_price" id="new_price" />
          <span class="f_help"> New price in Philippine Peso.</span>
    </div>
    </div>
    
    <?php endforeach; ?>
    
                                 
    <div class="section last">
    <div>
        <a class="uibutton" onclick="update_price();">Update</a>
        <a href="<?php echo base_url().'product/pricing_scheme.html' ?>" class="uibutton special " title="Cancel">Cancel</a>
    </div>
    </div>
</form>
</div>