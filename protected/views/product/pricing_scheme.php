<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>



<div class="topcolumn">
<div class="logo"></div>
</div>

<div class="clear"></div>
<div class="onecolumn" >
 <div class="header"><span ><span class="ico  gray coin"></span>Pricing Scheme</span> </div>                  
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
                                    <th width="174" >VATable Price</th>
                                     <th width="100" >VAT</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                             <?php foreach($qry_product as $row): ?>
                            
                                  <tr>
                                    <td align="left" ><?php echo $row->ProductId ?></td>
                                     <td ><?php echo getReturnValue($this->db->dbprefix('Product_line'),'ProductLineName','ProductLineId',$row->ProductLineId) ?></td>
                                    <td><b><span class="tip"><a id="<?php echo $row->ProductId ?>" onclick="show_form('<?php echo $row->ProductId ?>','product','edit_pricing_scheme');" title="Edit Price" ><?php echo $row->ProductName ?></a></span> </b></td>
                                    <td><?php echo $row->Description ?></td>
                                    <td align = "right"><?php echo $row->ProductPrice ?> PHP</td>
                                    <td align = "right"><?php echo sprintf("%01.2f", $row->ProductPrice + ($row->ProductPrice * ($row->vat / 100)));  ?> PHP</td>
                                    <td ><?php echo $row->vat ?> %</td>
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->ProductId ?>" onclick="show_form('<?php echo $row->ProductId ?>','product','edit_pricing_scheme');" title="Edit Price" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
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
