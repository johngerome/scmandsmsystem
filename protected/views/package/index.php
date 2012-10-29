<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($this->uri->uri_string() == 'package/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
    show_modal_information('Successfully Deleted');
});    
</script>
<?php endif; ?>

<div class="topcolumn">
<div class="logo"></div>
        <ul  id="shortcut">
            <li> <span class="tip"><a href="#" title="Add New Product Package" class="on_load" onclick="show_add('package','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png"/><strong>New</strong> </a> </span></li>
       </ul>
</div>
<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header">
                  <span ><span class="ico  gray square"></span>Product Package Management</span> </div>

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
                              <table class="display data_table6_1 " id="data_table">
                             <strong>
                             <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="352">Package Name</th>
                                    <th width="352">Quantity</th>
                                    <th width="352">Discount</th>
                                    <th width="174" ># Products</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php foreach($product_package as $row): ?>
                                  <tr>
                                    <td  align="left"><?php echo $row->package_id ?></td>
                                    <td ><b><?php echo $row->name ?></b></td>
                                    <td ><?php echo $row->quantity ?></td>
                                    <td ><?php echo $discount = $row->discount * 100; ?>%</td>
                                    <td ><?php echo getReturnValue($this->db->dbprefix('product_package'),'COUNT(DISTINCT product_id)','package_id',$row->package_id); ?></td>
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->package_id ?>" onclick="edit_data('<?php echo $row->package_id ?>','package')" title="Edit" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->package_id ?>" class="delete_package "  name="<?php echo $row->name ?>" title="Delete"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_delete.png" />
                                          </a>
                                      </span> 
                                      </td>
                                  </tr>
                                  <?php endforeach; ?>
                                </tbody>
                                </strong>
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
