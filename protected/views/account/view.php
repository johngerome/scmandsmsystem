<script type="text/javascript" src="<?php echo base_url().'media/ajaxupload/jquery.form.js' ?>"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_account").validationEngine();     
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
</script>
<div class="topcolumn">
<div class="logo"></div>
<div style="height: 150px;"></div>
</div>
<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header">
                  <span >
                  <span class="ico  gray window">
                  </span>My Account</span>
                  </div>	
                  <div class="clear"></div>
                  <div class="content" >
       
                    <div class="formEl_b">	
                    <div class="rqd alcenter">* Required Information</div>             
                    <div class="boxtitle min">Profile Picture</div>
                    
                    <?php foreach($qry_account as $row): ?>
                    
                    <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo base_url().'account/do_upload' ?>'>
                    <div class="profileSetting" >
                    <div class="avartar" id="preview">
                                                   
         
                    <td align="left" ><img width="200" height="200" src="<?php echo base_url().'images/user/'.$row->account_id.'/'.$row->ProfilePic; ?>" /></td>
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
                    
                    <form id="add_account" action="#" >
                    <input type="hidden" id="ProfilePic" value="<?php echo $row->ProfilePic ?>"/>
                    <input type="hidden" id="account_id" value="<?php echo $row->account_id ?>"/>   
                         
                   
                                <fieldset >
                                <legend>Login Information</legend>
                                  
                                <div class="section ">
                                      <label> Username <b class="rqd">*</b></label>   
                                    <div>
                                        <input value="<?php echo $row->username ?>" type="text"  name="username" id="username-<?php echo $row->account_id ?>"  class="validate[required,custom[onlyLetterNumber],minSize[3],maxSize[20],ajax[ajaxUsernameEdit]] medium"  />
                                        <span class="f_help"> Username Should be between 3 and not more than 20 characters.No Special characters allowed.</span> 
                                    </div>
                                </div>
                                <div class="section ">
                                      <label> Current Password </label>       
                                    <div>
                                        <input type="password" class="validate[required2,minSize[3],maxSize[20]] medium"  name="current_password" id="current_password"  value=""/>
                                        <span class="f_help"> Your current password is required to change your password.</span> 
                                    </div>
                                 </div>
                                 
                                <div class="section ">
                                      <label> New Password </label>       
                                    <div>
                                        <input type="password" class="validate[minSize[3],maxSize[20]] medium"  name="new_password" id="new_password"  value=""/>
                                        <span class="f_help"> Should be between 3 and not more than 20 characters.</span> 
                                    </div>
                                 </div>  
                                 
                                 <div class="section ">
                                      <label> Confirm Password </label>    
                                    <div>
                                        <input  type="password"  class="validate[minSize[3],maxSize[20],equals[new_password]] medium"  name="confirm_password" id="confirm_password"  />
                                        <span class="f_help"> Should be between 3 and not more than 20 characters.</span> 
                                    </div>
                                  </div>  
								
                                    
                                </fieldset >
                                 
                                <br />     
                                <fieldset >      
                                   <legend>Account Details</legend> 
                                   <br />
                                   <input type="hidden" name="user_type" id="user_type" value="<?php echo $row->user_type_id ?>"/>
                                   <div class="section">
                                   <label>User Type </label>   
                                     <div>
                                     <h5><?php echo $this->account_model->get_usertype_Name($row->user_type_id) ?></h5>
                                     </div>
                                    </div>
                                      
                                   <div class="section ">
                                      <label> First Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input value="<?php echo $row->first_name ?>" type="text" class="validate[required,custom[onlyLetterSp]] large capitalize" name="first_name" id="first_name" />
                                      </div>
                                     </div>
                                     
                                     <div class="section ">
                                      <label> Last Name <b class="rqd">*</b></label>   
                                      <div> 
                                      <input value="<?php echo $row->last_name ?>" type="text" class="validate[required,custom[onlyLetterSp]] large capitalize"  name="last_name" id="last_name"/>
                                      </div>
                                     </div>  
                                     
                                     <div class="section ">
                                      <label> Middle Name</label>   
                                      <div> 
                                      <input value="<?php echo $row->middle_name ?>" type="text" class="validate[custom[onlyLetterSp]] small capitalize" name="middle_name" id="middle_name"/>
                                      </div>
                                     </div>
                                     
                                      <div class="section ">
                                      <label> Email Address</label>   
                                      <div> 
                                      <input value="<?php echo $row->email_address ?>" type="text" class="validate[custom[email]]  large" name="email_address" id="email_address"/>
                                      </div>
                                      </div>
                                      
                                      <div class="section ">
                                      <label> Home Address <b class="rqd">*</b></label>   
                                      <div> 
                                      <input value="<?php echo $row->home_address ?>" type="text" class="validate[required]  large capitalize" name="home_address" id="home_address"/>
                                      </div>
                                      </div>
   
                                    
                                      
                                      <div class="section ">
                                      <label> Contact Number<b class="rqd">*</b><small>Telephone Number or Mobile Number</small></label>   
                                      <div> 
                                      <input value="<?php echo $row->contact_number ?>" type="text" class="validate[custom[phone]]  medium" name="contact_number" id="contact_number" />
                                      </div>
                                      </div>
                            
                                     
                                     <div class="section ">
                                      <label> Register Date</label>   
                                        <div>
                                            <b><?php echo $row->register_date ?></b>
                                        </div>
                                    </div>
                                     <div class="section ">
                                      <label> Last Visit Date</label>   
                                        <div>
                                            <b><?php echo contextualTime($row->lastvisit_date); ?></b>
                                        </div>
                                    </div>
                                    <?php  endforeach; ?>  
                                     
                                      
                                      <div class="section last">
                                      <div>
                                        <a class="uibutton" onclick="validate_account_edit_myprofile();">Update</a>
                                     </div>
                                     </div>
                                     
                                </fieldset>
                                </form>
                                </div>
</div>