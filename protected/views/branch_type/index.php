<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if($this->uri->uri_string() == 'branch_type/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     //showSuccess('Successfully Deleted',6000);
     show_modal_information('Successfully Deleted');
});    
</script>
<?php endif; ?>
<div class="topcolumn">
<div class="logo"></div>
        <ul  id="shortcut">
            <li> <span class="tip"><a href="#" title="Add New Branch Type" class="on_load" onclick="show_add('branch_type','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png"/><strong>New</strong> </a> </span></li>
       </ul>
</div>
<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header"><span ><span class="ico  gray bill"></span>Branch Type</span> </div>	
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
                              <table class="display data_table_branch_type " id="data_table">
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="352">Branch Type</th>
                                    <th width="200" >Product Line(s)</th>
                                    <th width="100" ># Branch</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                   <?php foreach($branch_type as $row): ?>
                                  <tr>
                                    <td  align="left"><?php echo $row->branch_type_id ?></td>
                                    <td><?php echo $row->business_title ?></td>
                                    <td >
                                     <?php
                                    $pl = $this->branch_model->get_product_line_under_branch_type($row->branch_type_id);
                                    $sz_pl = sizeof($pl) - 1;
                                    $x = 0;
                                    foreach($pl as $p_line){
                                        echo '<span class="tags">'.$p_line->ProductLineName.'</span>';
                                        if($x < $sz_pl){
                                            echo ' ';
                                        }
                                        $x++;
                                    }
                                     ?>
                                    </td>
                                    
                                    <td ><?php echo getReturnValue($this->db->dbprefix('branch'),'COUNT(branch_id)','business_id',$row->business_id) ?></td>
                                    
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->branch_type_id ?>" onclick="edit_data('<?php echo $row->branch_type_id ?>','branch_type')" title="Edit" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->branch_type_id ?>" class="delete_branch_type"  name="<?php echo $row->business_title ?>" title="Delete"  >
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
