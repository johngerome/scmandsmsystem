<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if($this->uri->uri_string() == 'product/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     showSuccess('Successfully Deleted',6000);
});    
</script>
<?php endif; ?>

<div class="topcolumn">
<div class="logo"></div>

</div>
<div class="clear"></div>
<div class="onecolumn" >
 <div class="header"><span ><span class="ico  gray arrow_down2"></span>Replenish Stock</span> </div>                  
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
                             
                              <table class="display data_table7_1"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="352" >Product Name</th>
                                    <th width="200" >Description</th>
                                    <th width="220" >Product Line</th>
                                    <th width="174" >Price</th>
                                    <th width="146" >Quantity Left</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                             <?php foreach($qry_product as $row): ?>
                            
                                  <tr>
                                    <td align="left" ><?php echo $row->ProductId ?></td>
                                    <td><b><span class="tip"><a id="<?php echo $row->ProductId ?>" onclick="stock_in('<?php echo $row->ProductId ?>','product')" title="Replenish Stock" ><?php echo $row->ProductName ?></a></span> </b></td>
                                    <td><?php echo $row->Description ?></td>
                                    <td ><?php echo getReturnValue($this->db->dbprefix('Product_line'),'ProductLineName','ProductLineId',$row->ProductLineId) ?></td>
                                    <td align = "right"><?php echo $row->ProductPrice ?> PHP</td>
                                    <td ><?php echo $row->Quantity ?></td>
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->ProductId ?>" onclick="stock_in('<?php echo $row->ProductId ?>','product')" title="Replenish Stock" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/color_18/arrow_down2.png" />
                                          </a>
                                      </span> 
                                      </td>
                                  </tr>
                                 
                            <?php endforeach; ?>
                                 
                                 
                                </tbody>
                              </table>
                              </form>
                              </div>

                             <div class="show_edit" style=" display:none">
                             <!-- EDIT -->
                             </div>
                             
      
                  </div>
                  </div><!--/END TAB/--> 
                  
                    
                  <div class="clear"></div>  
				  
               </div>  
</div>
