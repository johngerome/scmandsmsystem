<script type="text/javascript" src="<?php echo base_url().'media/ajaxupload/jquery.form.js' ?>"></script>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_account").validationEngine();
//$('.sec_branch').hide();           
});
function select_branch(){
    if($('#user_type').val() == 1){
        $('.sec_branch').hide();
        $('#branch_id').val('0');
    }else{
        $('.sec_branch').show();
    }
}      
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

                    <h2>Add New User Account</h2>   
                    <div class="formEl_b">	
                   	
                    <div class="rqd alcenter">* Required Information</div>             
                    <div class="boxtitle min">Profile Picture</div>
                    
                    
                    <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo base_url().'account/do_upload' ?>'>
                    <div class="profileSetting" >
                        <div class="avartar" id="preview">
                            <img src="<?php echo $this->gtemplate->theme_path() ?>images/default_large.png" width="200" height="200" alt="avatar" />
                        </div>
                    <div class="avartar">
                    <input type="file" name="photoimg" id="photoimg" />
                        <span class="f_help">Only jpg,png,gif and bmp is allowed.</span> 
                    </div>
                    </div>
                    </form>
                    
                    <form id="add_account" action="#" >
                    <input type="hidden" id="ProfilePic" value="default_large.png"/>   
                    <!-- <input type="hidden" id="account_id" value="<?php echo $qry_max_account_id ?>" />-->        
                   
                                <fieldset >
                                <legend>Login Information</legend>
                                  
                                <div class="section ">
                                      <label> Username <b class="rqd">*</b></label>   
                                    <div>
                                        <input type="text"  placeholder="Username" name="username" id="username"  class="validate[required,custom[onlyLetterNumber],minSize[3],maxSize[20],ajax[ajaxUsername]] medium"  />
                                        <span class="f_help"> Username Should be between 3 and not more than 20 characters.No Special characters allowed.</span> 
                                    </div>
                                </div>
                                <div class="section ">
                                      <label> Password <b class="rqd">*</b></label>       
                                    <div>
                                        <input type="password" placeholder="Password" class="validate[required,minSize[3],maxSize[20]] medium"  name="password" id="password"  />
                                        <span class="f_help"> Should be between 3 and not more than 20 characters.</span> 
                                    </div>
                                 </div>  
                                 <div class="section ">
                                      <label> Confirm Password <b class="rqd">*</b></label>    
                                    <div>
                                        <input type="password" placeholder="Confirm Password" class="validate[required,minSize[3],maxSize[20],equals[password]] medium"  name="confirm_password" id="confirm_password"  />
                                        <span class="f_help"> Should be between 3 and not more than 20 characters.</span> 
                                    </div>
                                  </div>  
								
                                    
                                </fieldset >
                                
                                
                                 
                                <br />     
                                <fieldset >      
                                   <legend>Account Details</legend> 
                                   
                                   <br />
                                   
                                    <div class="section">
                                      <label>User Type <b class="rqd">*</b></label>   
                                     <div>
                              	     <select class="validate[required] cbo_style"  name="user_type" id="user_type" onchange="">
                                          <option value="">Choose User Type...</option>
                                          <?php foreach($qry_group as $row): ?>
                                          <option value="<?php echo $row->user_type_id ?>"><?php echo $row->name ?> </option>
                                          <?php endforeach; ?>
                                     </select>       
                                     </div>
                                     </div>
                                     
                                     <div class="section sec_branch">
                                     <label>Branch <b class="rqd">*</b></label>   
                                     <div>
                              	     <select class="validate[required] cbo_style"  name="branch_id" id="branch_id">
                                          <option value="">Choose Branch...</option>
                                          <?php foreach($qry_branch as $row): ?>
                                          <option value="<?php echo $row->branch_id ?>"><?php echo $row->branch_name ?> </option>
                                          <?php endforeach; ?>
                                     </select>       
                                     </div>
                                     </div>
                                     
                                     <div class="section ">
                                      <label> First Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" class="validate[required,custom[onlyLetterSp]] large capitalize" name="first_name" id="first_name" />
                                      </div>
                                     </div>
                                     
                                     <div class="section ">
                                      <label> Last Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" class="validate[required,custom[onlyLetterSp]] large capitalize"  name="last_name" id="last_name"/>
                                      </div>
                                     </div>  
                                     
                                     <div class="section ">
                                      <label> Middle Name</label>   
                                      <div> 
                                      <input type="text" class="validate[custom[onlyLetterSp]] small capitalize" name="middle_name" id="middle_name"/>
                                      </div>
                                     </div>
                                     
                                      <div class="section ">
                                      <label> Email Address</label>   
                                      <div> 
                                      <input type="text" class="validate[custom[email]]  large" name="email_address" id="email_address"/>
                                      </div>
                                      </div>
                                      
                                      <div class="section ">
                                      <label> Home Address <b class="rqd">*</b></label>   
                                      <div> 
                                      <input type="text" class="validate[required]  large capitalize" name="home_address" id="home_address"/>
                                      </div>
                                      </div>
                                     
                                      <div class="section ">
                                        <label> Contact Number <b class="rqd">*</b><small>Telephone Number or Mobile Number</small></label>   
                                        <div> 
                                        <input type="text" class="validate[required,custom[phone]]  medium" name="contact_number" id="contact_number" />
                                      </div>
                                      </div>
                                      
                                      
                                      
                                     
                                      
                                      <div class="section last">
                                      <div>
                                        <a class="uibutton" onclick="validate_account_add();">Save</a>
                                        <a class="uibutton special"  onClick="go_back('#add_account','account');" title="Cancel"   >Cancel</a>
                                     </div>
                                     </div>
                                     
                                </fieldset>
                                </form>
                                </div>