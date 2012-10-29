<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<?php if($this->uri->uri_string() == 'customer/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     showSuccess('Successfully Deleted',6000);
});    
</script>
<?php endif; ?>



<div class="topcolumn">
<div class="logo"></div>
       <ul  id="shortcut">
            <li> <span class="tip"><a href="#" title="Add New Customer" class="on_load" onclick="show_add('customer','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png" /><strong>New</strong> </a> </span></li>        </ul>
</div>

<div class="clear"></div>

<input type="hidden" id="deleted"/>
<div class="onecolumn" >
                  <div class="header"><span ><span class="ico  gray group"></span>Valued Customer Management</span> </div><!-- End header -->	
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
                                
                              <table class="display data_table6_1" id="data_table">
                                <thead>
                                  <tr>
                                    <th width="50" align="left"></th>
                                    <th width="352" align="left">Full Name</th>
                                    <th width="246" >Company Name</th>
                                    <th width="246" >Address</th>
                                    <th width="174" >Discount</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach($qry_customer as $row): ?>
                                  <tr>
                               
                                   <td align="left" >
                                   <img width="25" height="25" src="<?php echo base_url().'images/customer/'.$row->CustomerId.'/'.$row->ProfilePic; ?>" />
                                   </td>
                                  
                                    <td  align="left"><p><a class='iframe' href="<?php echo base_url().'customer/view_profile/'.$row->CustomerId.'-'.$row->FirstName.'_'.$row->LastName; ?>" title="<?php echo $row->FirstName.' '.$row->MiddleName.' '.$row->LastName ?>"><?php echo $row->FirstName .' '.$row->MiddleName.' '.$row->LastName ?></a></p></td>
                                    <td ><?php echo $row->CompanyName ?></td>
                                    <td ><?php echo $row->HomeAddress ?></td>
                                    <td ><?php echo $row->Discount ?>%</td>
                                   <td>
                                      <span class="tip" >
                                          <a  title="Edit" onclick="edit_data('<?php echo $row->CustomerId ?>','customer')" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="<?php echo $row->CustomerId ?>" class="delete_customer" title="Delete" name="<?php echo $row->FirstName .' '.$row->MiddleName.' '.$row->LastName ?>" >
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