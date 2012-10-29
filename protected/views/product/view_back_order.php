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
 <div class="header"><span ><span class="ico  gray list"></span>Back Order Products in <?php echo $branch_name ?></span> </div>                  
                  <div class="clear"></div>
                  <div class="content" >
                  <input type="hidden" id="error" />
                   <div id="uploadTab">
                      <div class="tab_container" >
                         
                          <div class="load_page">
                          
                              <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;">
                              <a class="uibutton" href="<?php echo base_url().'product/back_order_list' ?>" title="Go Back"   >Go Back</a>
                              </div>
                              
                              <form class="tableName toolbar">
                             
                              <table class="display data_table6_1"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="220" >Product Line</th>
                                    <th width="352" >Product Name</th>
                                    <th width="200" >Description</th>
                                    <th width="174" >Price</th>
                                    <th width="146" >Quantity</th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                <?php foreach($product as $row => $key): ?>
                                  <tr>
                                    <td align="left" ><?php echo $key['ProductId'] ?></td>
                                    <td ><?php echo getReturnValue($this->db->dbprefix('Product_line'),'ProductLineName','ProductLineId',$key['ProductLineId']) ?></td>
                                    
                                    <td><b><?php echo $key['ProductName'] ?></b></td>
                                    <td><?php echo $key['Description'] ?></td>
                                    <td align = "right"><?php echo $key['ProductPrice'] ?> PHP</td>
                                    <td ><?php echo $key['quantity'] ?></td>
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
