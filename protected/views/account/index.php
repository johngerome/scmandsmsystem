<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if($this->uri->uri_string() == 'account/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     showSuccess('Successfully Deleted',6000);
});    
</script>
<?php endif; ?>

<div class="topcolumn">
<div class="logo"></div>
<?php if(page_level_access('account/add') == true): ?>
        <ul  id="shortcut">
            <li> <span class="tip"><a href="#" title="Add New User Account" class="on_load" onclick="show_add('account','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png" alt="Add New User"/><strong>New</strong> </a> </span></li>
        </ul>
<?php endif; ?>
</div>
<div class="clear"></div>
<div class="onecolumn" >
<div class="header"><span ><span class="ico  gray user"></span> User Account Management </span></div>                  
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
                                
                              <table class="display data_table4_1"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="50" align="left"></th>
                                    <th width="352" align="left">Name</th>
                                    <th width="174" >User Type</th>
                                    <th width="246" >Branch Name</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                              <?php foreach($qry_user_account as $row): ?>
                              <?php if(getReturnValue($this->db->dbprefix('account'),'username','account_id',$row->account_id) != $this->session->userdata('username')): ?>
                                  <tr class="odd gradeX">
                                    <td align="left" >
                                  <img width="25" height="25" src="<?php echo base_url().'images/user/'.$row->account_id.'/'.$row->ProfilePic; ?>" />
                                    </td>
                                    <td  align="left">
                                    <p><a class='iframe' href="<?php echo base_url().'account/view_profile/'.$row->account_id.'-'.$row->username; ?>" title="<?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name ?>">
                                        <?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name ?>
                                    </a></p>
                                    </td>
                                    <td > <?php echo $this->account_model->get_user_position_byID($row->account_id) ?></td>
                                    <td ><?php echo getReturnValue($this->db->dbprefix('branch'),'branch_name','branch_id',$row->branch_id) ?></td>
                                    <td >
                                    <?php //if(page_level_access('account/edit') == true): ?>
                                      <span class="tip" >
                                          <a  onclick="edit_data('<?php echo $row->account_id ?>','account')" title="Edit" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                    <?php //endif; ?>
                                    <?php //if(page_level_access('account/delete') == true): ?>
                                      <span class="tip" >
                                          <a id="<?php echo $row->account_id ?>" class="delete_account"  name="<?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name ?>" title="Delete"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_delete.png" />
                                          </a>
                                      </span>
                                    <?php //endif; ?>
                                      </td>
                                  </tr>
                                  <?php endif; ?>
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
