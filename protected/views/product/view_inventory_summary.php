<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<div class="topcolumn">
<div class="logo"></div>
</div>
<div class="clear"></div>
<div class="onecolumn" >
 <div class="header"><span ><span class="ico  gray stats_bars"></span>Invintory Summary in <?php echo $branch_name ?></span> </div>                  
                  <div class="clear"></div>
                  <div class="content" >
                  <input type="hidden" id="error" />
                   <div id="uploadTab">
                      <div class="tab_container" >
                         
                          <div class="load_page">
                          
                              <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;">
                              <a class="uibutton" href="<?php echo base_url().'product/inventory_summary.html' ?>" title="Cancel"   >Go Back</a>
                              </div>
                              
                              <form class="tableName toolbar">
                             
                              <table class="display data_table6_1"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="220" >Product Line</th>
                                    <th width="352" >Product Name</th>
                                    <th width="200" >Description</th>
                                    <th width="146" >Stock In </th>
                                    <th width="146" >Stock Out</th>
                                    <th width="146" >Remaining </th>
                                  </tr>
                                </thead>
                                
                                <tbody>
                                
                                <?php foreach($stocks as $row): ?>
                                <?php
                                $product_line_id = getReturnValue($this->db->dbprefix('product'),'ProductLineId','ProductId',$row->product_id);
                                
                                ?>
                                  <tr>
                                    <td ><?php echo getReturnValue($this->db->dbprefix('Product_line'),'ProductLineName','ProductLineId',$product_line_id) ?></td>
                                    
                                    <td><b><?php echo getReturnValue($this->db->dbprefix('product'),'ProductName','ProductId',$row->product_id) ?></b></td>
                                    <td><?php echo getReturnValue($this->db->dbprefix('product'),'ProductName','ProductId',$row->product_id) ?></td>
                                    <td ><?php echo $row->total_stock_in ?></td>
                                    <td ><?php echo $this->product_model->count_stock_out_branch($branch_id,$date,$date_label) ?></td>
                                    <td><?php  echo $row->total_stock_in - $this->product_model->count_stock_out_branch($branch_id,$date,$date_label) ?></td>
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
