<script type="text/javascript" src="<?php echo base_url().'media/ajaxupload/jquery.form.js' ?>"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_customer").validationEngine();     
});    
</script>
<?php $this->load->view('views/js/js.php') ?>
<script type="text/javascript">
$(document).ready(function()
{
    $('#photoimg').live('change', function()
    {
        $("#preview").html('');
        $("#preview").html('<img src="'+ template_url + 'images/loader.gif" alt="Uploading...."/>');
        $("#imageform").ajaxForm(
        {
            target: '#preview'
        }).submit();
    });
    $('.upload_pic').hide();
    $('.edit_pic').live('click', function()
    {
         $(this).hide();
         $('.upload_pic').show();
    });
});
//function getID(){
//        alert( $("#ProfilePic").val());
//    }
</script>


                               <h2>Edit Customer</h2>
                                <div class="rqd alcenter">* Required Information</div>
                                <?php foreach($qry_customer as $row): ?>
                                
                                <div class="boxtitle min">Profile Picture</div>
                                <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo base_url().'customer/do_upload' ?>'>
                                            <div class="profileSetting" >
                                                   <div class="avartar" id="preview">
                                                 
                                                    <td align="left" ><img width="200" height="200" src="<?php echo base_url().'images/customer/'.$row->CustomerId.'/'.$row->ProfilePic; ?>" /></td>
                                                    <a class="edit_pic">
                                                    <table>
                                                        <tr>
                                                            <td>
                                                                <img  src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" />
                                                            </td>
                                                            <td>
                                                                <span>Change Profile Picture.</span>
                                                            </td>
                                                        </tr>
                                                     </table>
                                                     </a>
                                                   </div>
                                                    
                                                   <div class="avartar upload_pic">
                                                     <input type="file" name="photoimg" id="photoimg" />
                                                     <span class="f_help">Allowed</span> 
                                                   </div>
                                            </div>
                               </form>
                               
                                <!-- <input type="button" onclick="getID();"/>-->
                                
                                <form id="add_customer" action="#" >
                                
                                <input type="hidden" id="ProfilePic" name="ProfilePic" value="<?php echo $row->ProfilePic ?>"/>
                                <input type="hidden" id="CustomerId" name="CustomerId" value="<?php echo $row->CustomerId ?>"/>
                                
                                 
                                <div class="boxtitle min">Profile Information</div>
                                
                                <div class="section ">
                                      <label> Company Name</label>   
                                      <div> 
                                      <input value="<?php echo $row->CompanyName ?>" type="text" class="large capitalize" name="CompanyName" id="CompanyName"/>
                                      </div>
                                  </div>
                                  
                                  <div class="section ">
                                      <label> First Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" value="<?php echo $row->FirstName ?>" class="validate[required] large capitalize" name="FirstName" id="FirstName"/>
                                      </div>
                                     </div>
                                     
                                     <div class="section ">
                                      <label> Last Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text"  value="<?php echo $row->LastName ?>" class="validate[required] large capitalize" name="LastName" id="LastName"/>
                                      </div>
                                     </div>  
                                     
                                     <div class="section ">
                                      <label> Middle Name<small>(Optional)</small></label>   
                                      <div> 
                                      <input type="text" value="<?php echo $row->MiddleName ?>" class="small capitalize" name="MiddleName" id="MiddleName"/>
                                      </div>
                                     </div>
                                     
                                      <div class="section ">
                                      <label> Email Address</label>   
                                      <div> 
                                      <input type="text" value="<?php echo $row->EmailAddress ?>" class="validate[custom[email]]  large" name="EmailAddress" id="EmailAddress"/>
                                      </div>
                                      </div>
                                      
                                      <div class="section ">
                                      <label> Home Address <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" value="<?php echo $row->HomeAddress ?>" class="validate[required]  large capitalize" name="HomeAddress" id="HomeAddress"/>
                                      </div>
                                      </div>

                                      <div class="section ">
                                      <label> Contact Number <b class="rqd">*</b></label>   
                                      <div> 
                                      <input value="<?php echo $row->ContactNumber ?>" type="text" class="validate[required,custom[phone]]  medium" name="ContactNumber" id="ContactNumber"/>
                                      </div>
                                      </div>
                                      
                                      
                                     <div class="section ">
                                          <label> Discount<b class="rqd">*</b> <small>Discount by %</small></label>   
                                          <div> 
                                          <input value="<?php echo $row->Discount?>" type="text" class="validate[required,custom[integer],max[100]]  small" name="Discount" id="Discount"/>
                                          <span class="f_help"> Discount must be not more than 100%.</span> 
                                          </div>
                                      </div>
                                   
                                <?php endforeach; ?>
                                    <div class="section last">
                                    <div>
                                      <a class="uibutton" onclick="validate_customer_edit();">Update</a>
                                      <a class="uibutton special"  onClick="go_back('#add_customer','customer');" title="Cancel"   >Cancel</a>

                                   </div>
                                   </div>
                              </form>