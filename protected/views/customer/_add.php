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
    
});
//function getID(){
//        alert( $("#ProfilePic").val());
//    }
</script>


                               <h2>Add New Customer</h2>
                                <div class="rqd alcenter">* Required Information</div>
                                
                                <div class="boxtitle min">Profile Picture</div>
                                <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo base_url().'customer/do_upload' ?>'>
                                            <div class="profileSetting" >
                                                   <div class="avartar" id="preview">
                                                    <img src="<?php echo $this->gtemplate->theme_path() ?>images/default_large.png" width="200" height="200" alt="avatar" />
                                                   </div>
                                                   <div class="avartar">
                                                    <input type="file" name="photoimg" id="photoimg" />
                                                     <span class="f_help">Allowed</span> 
                                                   </div>
                                            </div>
                               </form>
                               
                                <!-- <input type="button" onclick="getID();"/>-->
                                
                                <form id="add_customer" action="#" >
                                <input type="hidden" id="ProfilePic" value="default_large.png"/>
                                
                                
                                  
                                <div class="boxtitle min">Account Details</div>
                                
                                <div class="section ">
                                      <label> Company Name</label>   
                                      <div> 
                                      <input type="text" class="large capitalize" name="CompanyName" id="CompanyName"/>
                                      </div>
                                  </div>
                                  
                                  <div class="section ">
                                      <label> First Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" class="validate[required] large capitalize" name="FirstName" id="FirstName"/>
                                      </div>
                                  </div>
                                     
                                     <div class="section ">
                                      <label> Last Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" class="validate[required] large capitalize" name="LastName" id="LastName"/>
                                      </div>
                                     </div>  
                                     
                                     <div class="section ">
                                      <label> Middle Name<small>(Optional)</small></label>   
                                      <div> 
                                      <input type="text" class="small capitalize" name="MiddleName" id="MiddleName"/>
                                      </div>
                                     </div>
                                     
                                      <div class="section ">
                                      <label> Email Address</label>   
                                      <div> 
                                      <input type="text" class="validate[custom[email]]  large" name="EmailAddress" id="EmailAddress"/>
                                      </div>
                                      </div>
                                      
                                      <div class="section ">
                                      <label> Home Address <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" class="validate[required]  large capitalize" name="HomeAddress" id="HomeAddress"/>
                                      </div>
                                      </div>

                                      <div class="section ">
                                      <label> Contact Number <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" class="validate[required,custom[phone]]  medium" name="ContactNumber" id="ContactNumber"/>
                                      </div>
                                      </div>
                                      
                                      
                                      <div class="section ">
                                          <label> Discount<b class="rqd">*</b> <small>Discount by %</small></label>   
                                          <div> 
                                          <input type="text" class="validate[required,custom[integer],max[100]]  small" name="Discount" id="Discount"/>
                                          <span class="f_help"> Discount must be not more than 100%.</span> 
                                          </div>
                                      </div>
                                   
         
                                    <div class="section last">
                                    <div>
                                      <a class="uibutton" onclick="validate_customer_add();">Save</a>
                                     <a class="uibutton special"  onClick="go_back('#add_customer','customer');" title="Cancel"   >Cancel</a>
                                   </div>
                                   </div>
                              </form>