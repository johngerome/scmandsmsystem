<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($this->uri->uri_string() == 'product_package/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     show_modal_information('Successfully Deleted');
});    
</script>
<?php endif; ?>

<div class="topcolumn">
<div class="logo"></div>
        <ul  id="shortcut">
            <li> <span class="tip"><a href="#" title="Set New Product Package" class="on_load" onclick="show_add('product_package','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png"/><strong>New</strong> </a> </span></li>
       </ul>
</div>
<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header">
                  <span >
                  <span class="ico  gray square">
                  </span>Set Product Package</span>
                  </div>
                  <!-- End header -->	
                  <div class="clear"></div>
                  <div class="content" >
                  
                      <div id="uploadTab">
                      <div class="tab_container">
                      <input type="hidden" id="error" value=""/>  
                      <!-- Current Url -->
                      <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>       
                      
                              <div class="load_page">
                              <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;"></div>
                              <form class="tableName toolbar" id="load_data">
                              <!-- Data -->
                              <table class="display data_table2_1 " id="data_table">
                                                              <thead>
                                  <tr>
                                    <th width="174" >Product Name</th>
                                    <th width="352">Package(s)</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php foreach($product_package as $row): ?>
                                  <tr>
                                    <td ><b><?php echo getReturnValue($this->db->dbprefix('product'),'ProductName','ProductId',$row->product_id)  ?> </b></td>
                                     <td >
                                     <?php
                                    $pl = $this->product_package_model->get_products_under_package($row->product_id);
                                    $sz_pl = sizeof($pl) - 1;
                                    $x = 0;
                                    foreach($pl as $row){
                                        echo '<span class="tags">'.$row->name.'</span>';
                                        if($x < $sz_pl){
                                            echo ' ';
                                        }
                                        $x++;
                                    }
                                     ?>
                                    </td>
                                    
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->product_id ?>" onclick="edit_data('<?php echo $row->product_id ?>','product_package')" title="Edit" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->product_id ?>" class="delete_product_package"  name="<?php echo getReturnValue($this->db->dbprefix('product'),'ProductName','ProductId',$row->product_id) ?>" title="Delete"  >
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
                              	
                             <div class="show_add" style=" display:none">
                              <!-- Add -->
                             </div>
                             
                             <div class="show_edit" style=" display:none">
                              <!-- Edit -->
                             </div>      
                     </div>
                     </div>
                     <!--/END TAB/-->

                  <div class="clear"></div>  
                  </div>
</div>
