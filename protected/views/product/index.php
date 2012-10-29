<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($this->uri->uri_string() == 'product/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     showSuccess('Successfully Deleted',6000);
});    
</script>
<?php endif; ?>
<?php if($this->uri->uri_string() == 'product/archived'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
    show_modal_information('Successfully sent to Trash');
     //showSuccess('Successfully sent to Trash',6000);
});    
</script>
<?php endif; ?>
<div class="topcolumn">
<div class="logo"></div>
        <ul  id="shortcut">
            <li> <span class="tip"><a href="#" title="Add New Product" class="on_load" onclick="show_add('product','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png" alt="Add New Product"/><strong>New</strong> </a> </span></li>
            <li> <span class="tip"><a href="<?php echo base_url() ?>product/trash.html" title="Product Archive" class="Viewarchive"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/recycle.png" alt="View Archive"/><strong>Trash</strong></a> </span></li>

        </ul>
</div>
<div class="clear"></div>
<div class="onecolumn" >
 <div class="header"><span ><span class="ico  gray list"></span>Product Management</span> </div>                  
                  <div class="clear"></div>
                  <div class="content" >
                  <input type="hidden" id="error" />
                   <div id="uploadTab">
                      <div class="tab_container" >

                          <div class="load_page">
                              <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;"></div>
                              <form class="tableName toolbar">
                             <!-- Current Url -->
                            <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>   
                             
                              <table class="display data_table8_1"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="220" >Product Line</th>
                                    <th width="352" >Product Name</th>
                                    <th width="200" >Description</th>
                                    <th width="174" >Price</th>
                                    <th width="174" >VAT</th>
                                    <th width="146" >Quantity</th>
                                    
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                             <?php foreach($qry_product as $row): ?>
                                  <tr class="odd gradeX">
                                    <td align="left" ><?php echo $row->ProductId ?></td>
                                    <td ><?php echo getReturnValue($this->db->dbprefix('Product_line'),'ProductLineName','ProductLineId',$row->ProductLineId) ?></td>
                                    
                                    <td><b><?php echo $row->ProductName ?></b></td>
                                    <td><?php echo $row->Description ?></td>
                                    <td align = "right"><?php echo $row->ProductPrice ?> PHP</td>
                                    <td align = "right"><?php echo $row->vat ?> %</td>
                                    <td ><?php echo $row->Quantity ?></td>
                                    
                                    
                                    <td >
                                      <span class="tip" >
                                          <a  onclick="edit_data('<?php echo $row->ProductId ?>','product')" title="Edit" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->ProductId ?>" class="archive_product"  name="<?php echo $row->ProductName ?>" title="Trash"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/bin.png" />
                                          </a>
                                      </span> 
                                      </td>
                                  </tr>
                            <?php endforeach; ?>
                                 
                                 
                                </tbody>
                              </table>
                              </form>
                              </div>
                              	
                             <div class="show_add" style=" display:none">
                             <!-- ADD -->
                             </div>
                             
                             <div class="show_edit" style=" display:none">
                             <!-- EDIT -->
                             </div>
                             
      
                  </div>
                  </div><!--/END TAB/--> 
                  
                    
                  <div class="clear"></div>  
				  
               </div>  
</div>
