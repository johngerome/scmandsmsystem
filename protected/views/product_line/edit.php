<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#frmPrdoduct_line").validationEngine();          
});        
</script>
<?php $this->load->view('views/js/js.php') ?>


<h2>Edit Product Line</h2>
<div class="rqd alcenter">* Required Information</div>

<form id="frmPrdoduct_line" method="POST" action="#">

<?php foreach($qry_product_line_byID  as $row): ?>

<input type="hidden" id="ProductLineId" name="ProductLineId" value="<?php echo $row->ProductLineId ?>" />                                

<div class="section ">
<label> Product Line Name <b class="rqd">*</b></label>   
<div> 
<input type="text" class="validate[required,ajax[ajaxProductLineNameEdit]] meduim capitalize" name="ProductLineName" id="ProductLineName<?php echo '-'.$row->ProductLineId; ?>" value="<?php echo $row->ProductLineName ?>" />
</div>
</div>
                                    
<div class="section ">
<label> Description<small>(Optional)</small></label>   
<div> 
<textarea class="large capitalize" name="description" id="edt_description">
<?php echo $row->Description ?>
</textarea>
</div>
</div>
<?php endforeach; ?>
                                    
<div class="section last">
<div>
<a class="uibutton" onclick="update_data('#frmPrdoduct_line','product_line')">Update</a>
<a class="uibutton special"  onClick="go_back('#frmPrdoduct_line','product_line');" title="Cancel"   >Cancel</a>
</div>
</div>

</form>