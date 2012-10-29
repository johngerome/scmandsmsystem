<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($this->uri->uri_string() == 'branch/archived'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     show_modal_information('Successfully sent to Trash');
     //showSuccess('Successfully sent to Trash',6000);
});    
</script>
<?php endif; ?>

<div class="topcolumn">
<div class="logo"></div>
<ul  id="shortcut">
<li> <span class="tip"><a href="#" title="Add New Branch" class="on_load" onclick="show_add('branch','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png" alt="Add New User"/><strong>New</strong> </a> </span></li>
<li> <span class="tip"><a href="<?php echo base_url() ?>branch/trash.html" title="Branch Archive" class="Viewarchive"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/recycle.png" alt="View Archive"/><strong>Trash</strong></a> </span></li>
</ul>
</div>
<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header"><span ><span class="ico  gray window"></span>Branch Management</span> </div><!-- End header -->	
                  <div class="clear"></div>
                  <div class="content" >
                  
                      <div id="uploadTab">
                      <div class="tab_container" >
                      <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;"></div>
                      <!-- Current Url -->
                      <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>
                      <input type="hidden" id="error" value=""/>
                           
                              <div class="load_page inTab">
                              <form class="tableName toolbar">
                              <table class="display data_table5_1 " id="data_table">
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                    <th width="352">Branch Name</th>
                                    <th width="174" >Location</th>
                                    <th width="174" >Branch Type</th>
                                    <!-- <th width="274" >Product Line</th> -->
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($bakeshop_qry as $value): ?>
                                  <tr>
                                    <td  align="left"><span class="tip"><?php echo $value->branch_id; ?></span></td>
                                    <td><span class="tip"><b><?php echo $value->branch_name; ?></b></span></td>
                                    <td ><?php echo $value->location; ?></td>
                                    <td ><?php echo getReturnValue($this->db->dbprefix('business'),'business_title','business_id',$value->business_id); ?></td>
                                   <!-- <td >
                                    <?php
                                    $pl = $this->branch_model->get_product_line($value->branch_id);
                                    $sz_pl = sizeof($pl) - 1;
                                    $x = 0;
                                    foreach($pl as $row){
                                        echo $row->ProductLineName;
                                        if($x < $sz_pl){
                                            echo ',';
                                        }
                                        
                                        $x++;
                                    }
                                     ?>
                                     </td>-->
                                  <td >
                                      <span class="tip" >
                                          <a  title="Edit" onclick="edit_data('<?php echo $value->branch_id ?>','branch')">
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $value->branch_id; ?>" class="archive_branch"  name="<?php echo $value->branch_name; ?>" title="Trash"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/bin.png" />
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
                    <!-- ADD -->
                    <?php //$this->load->view('views/branch/_add') ?>
                    </div>
         
         
                     <div class="show_edit" style=" display:none">
                     <!-- Edit -->
                     </div> 
                     
                  </div>
                  </div><!--/END TAB/-->

                  <div class="clear"></div>  
				  
                  </div>
</div>
