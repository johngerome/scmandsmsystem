<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($this->uri->uri_string() == 'branch/trash/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
      show_modal_information('Successfully Deleted');
     //showSuccess('Item Successfully Deleted!',6000);
});    
</script>
<?php endif; ?>

<?php if($this->uri->uri_string() == 'branch/trash/restored'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     show_modal_information('Successfully Restored');
     //showSuccess('Item Successfully Restored!',6000);
});    
</script>
<?php endif; ?>

<div class="topcolumn">
<div class="logo"></div>
        <div style="height:133px;margin: 0px 0px 0px 0px;">
</div>
<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header"><span ><span class="ico  gray trash_can"></span>Branch Trash</span> </div><!-- End header -->	
                  <div class="clear"></div>
                  <div class="content" >
                  
                      <div id="uploadTab">
                      <div class="tab_container" >
                     <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;">
                      <ul class="uibutton-group" >
                        <li><span class="tip"><a class="uibutton icon prev on_prev "  title="Go Back" href="<?php echo base_url().'branch.html' ?>">Go Back</a></span></li>
                      </ul>
                     </div>
                          
                              <div class="load_page">
                              <form class="tableName toolbar">
                              <!-- Current Url -->
                              <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>
                              
                              <table class="display data_table3_1 " id="data_table">
                                <thead>
                                  <tr>
                                   
                                    <th width="352" align="left">Branch Name</th>
                                    <th width="174" >Location</th>
                                    <th width="174" >Type</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                 <?php foreach($archive_branch_qry as $row): ?> 
                                  <tr>
                                    <td  align="left"><?php echo $row->branch_name; ?></td>
                                    <td ><?php echo $row->location; ?></td>
                                    <td ><?php echo $row->business_title; ?></td>
                                    <td >
                                      <span class="tip" >
                                          <a id="<?php echo $row->branch_id; ?>" class="restore_branch"  name="<?php echo $row->branch_name; ?>" title="Restore"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/color_18/redo.png" width="16" height="16"/>
                                          </a>
                                      </span>
                                      <span class="tip" >
                                          <a id="<?php echo $row->branch_id ?>" class="delete_branch"  name="<?php echo $row->branch_name ?>" title="Delete"  >
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
