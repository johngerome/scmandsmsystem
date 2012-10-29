<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if($this->uri->uri_string() == 'product/trash/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     //showSuccess('Successfully Deleted',6000);
     show_modal_information('Successfully Deleted');
});    
</script>
<?php endif; ?>

<?php if($this->uri->uri_string() == 'product/trash/restored'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
    show_modal_information('Successfully Restored');
     //showSuccess('Item Successfully Restored!',6000);
});    
</script>
<?php endif; ?>

<div class="topcolumn">
<div class="logo"></div>
</div>
<div class="clear"></div>
<div class="onecolumn" >
 <div class="header"><span ><span class="ico  gray trash_can"></span>Product Trash</span> </div>                  
                  <div class="clear"></div>
                  <div class="content" >
                  <input type="hidden" id="error" />
                   <div id="uploadTab">
                      <div class="tab_container" >

                          <div class="load_page">
                              <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;">
                                <ul class="uibutton-group" >
                                    <li><span class="tip"><a class="uibutton icon prev on_prev "  title="Go Back" href="<?php echo base_url().'product' ?>">Go Back</a></span></li>
                                </ul>
                              
                              </div>
                              <form class="tableName toolbar">
                             <!-- Current Url -->
                            <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>   
                             
                              <table class="display data_table7_1"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="220" >Product Line</th>
                                    <th width="352" >Product Name</th>
                                    <th width="200" >Description</th>
                                    <th width="174" >Price</th>
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
                                    <td ><?php echo $row->Quantity ?></td>
                                    
                                    
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->ProductId ?>" name="<?php echo $row->ProductName ?>" class="restore_product" title="Restore" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/color_18/redo.png" width="16" height="16"/>
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->ProductId ?>" class="delete_product"  name="<?php echo $row->ProductName ?>" title="Delete"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_delete.png" />
                                          </a>
                                      </span> 
                                      </td>
                                  </tr>
                            <?php endforeach; ?>
                                 
                                 
                                </tbody>
                              </table>
                              </form>
                              </div>

                  </div>
                  </div><!--/END TAB/--> 
                  
                    
                  <div class="clear"></div>  
				  
               </div>  
</div>
