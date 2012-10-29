<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>


<?php if($this->uri->uri_string() == 'user_type/saved'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     //showSuccess('User Type Successfully Saved',6000);
     show_modal_information('User Type Successfully Saved');
});    
</script>
<?php endif; ?>

<?php if($this->uri->uri_string() == 'user_type/updated'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     //showSuccess('User Type Successfully Updated',6000);
     show_modal_information('User Type Successfully Updated');
});    
</script>
<?php endif; ?>

<?php if($this->uri->uri_string() == 'user_type/deleted'):?>
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
            <li> <span class="tip"><a href="#" title="Add New User Account" class="on_load" onclick="show_add('user_type','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png" alt="Add New User"/><strong>New</strong> </a> </span></li>
        </ul>
</div>
<div class="clear"></div>
<div class="onecolumn" >
                    <div class="header"><span ><span class="ico  gray user"></span> User Type Management</span></div>
                    <div class="clear"></div>
                    <div class="content">
                    
                      <div id="uploadTab">
                      <div class="tab_container" >
                      <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;"></div>
                      <!-- Current Url -->
                      <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/> 
                           
                              <div class="load_page inTab">
                              <form class="tableName toolbar">
                              <table class="display data_table3_1"  id="data_table">
                                <thead>
                                  <tr>
                                    <th width="15" ></th>
                                    <th width="352" align="left">Title</th>
                                    <th width="252">Accounts</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach($qry_usertype as $row): ?>
                                  <tr>
                                    <td > <img width="15" height="15" src="<?php echo $this->gtemplate->theme_path() ?>images/icon/color_18/group.png" /></td>
                                    <td  align="left"><b><?php echo $row->name ?></b></td>
                                     <td><?php echo $this->user_type_model->count_usertype_in_account($row->user_type_id); ?></td>
                                    <td >
                                 
                                    
                                      <span class="tip" >
                                          <a  title="Edit" onclick="edit_data('<?php echo $row->user_type_id ?>','user_type')">
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->user_type_id ?>" class="delete_user_type"  name="<?php echo $row->name ?>" title="Delete"  >
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
                        
                             </div>
                             
                             <div class="show_edit" style=" display:none">
                        
                             </div>
                             
                             <!-- End Show Add -->
                             </div>

                            </div>
                 <div class="clear"></div>         
         </div>
</div>