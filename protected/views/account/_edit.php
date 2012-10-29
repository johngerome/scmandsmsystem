<script type="text/javascript" src="<?php echo base_url().'media/ajaxupload/jquery.form.js' ?>"></script>

<script type="text/javascript">
jQuery(document).ready(function(){
jQuery("#add_account").validationEngine();
select_branch();    
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



                    <h2>Edit User Account</h2>   
                    <div class="formEl_b edit_account">	
                   	
                    <div class="rqd alcenter">* Required Information</div>             
                    <div class="boxtitle min">Profile Picture</div>
                    
                    <?php foreach($qry_account as $row): ?>
                    
                    
                    <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo base_url().'customer/do_upload' ?>'>
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
                        <span class="f_help">Only jpg,png,gif and bmp is allowed.</span> 
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
                                        <input value="<?php echo $row->username ?>" type="text"  name="username" id="username-<?php echo $row->account_id ?>"  class="validate[required,minSize[3],custom[onlyLetterNumber],maxSize[20],ajax[ajaxUsernameEdit]] medium"  />
                                        <span class="f_help"> Username Should be between 3 and not more than 20 characters.No Special characters allowed.</span> 
                                    </div>
                                </div>
                                
                                <div class="section ">
                                      <label> New Password </label>       
                                    <div>
                                        <input type="password" class="validate[minSize[3],maxSize[20]] medium"  name="password" id="password"  />
                                        <span class="f_help"> Should be between 3 and not more than 20 characters.</span> 
                                    </div>
                                 </div>  
                                 <div class="section ">
                                      <label> Confirm Password </label>    
                                    <div>
                                        <input  type="password"  class="validate[minSize[3],maxSize[20],equals[password]] medium"  name="confirm_password" id="confirm_password"  />
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
                              	     <select class="validate[required] cbo_style"  onchange="select_branch();" name="user_type" id="user_type">
                                     
                                          <option value="<?php echo $row->user_type_id ?>"><?php echo $this->account_model->get_usertype_Name($row->user_type_id) ?></option> 
                                          <?php foreach($qry_group as $group): ?>
                                          <option value="<?php echo $group->user_type_id ?>"><?php echo $group->name ?> </option>
                                          <?php endforeach; ?>
                                     </select>       
                                     </div>
                                     </div>
                                     
                                     <div class="section sec_branch">
                                     <label>Branch <b class="rqd">*</b></label>   
                                     <div>
                              	     <select class="cbo_style"  name="branch_id" id="branch_id">
                                     <?php if(!getReturnValue($this->db->dbprefix('branch'),'branch_name','branch_id',$row->branch_id)):  ?>
                                         <option value="0">Choose Branch..</option> 
                                    <?php else: ?>
                                         <option value="<?php echo $row->branch_id ?>"><?php echo getReturnValue($this->db->dbprefix('branch'),'branch_name','branch_id',$row->branch_id) ?></option> 
                                     <?php endif; ?>
                                     <?php foreach($qry_branch as $branch): ?>
                                     <option value="<?php echo $branch->branch_id ?>"><?php echo $branch->branch_name ?> </option>
                                     <?php endforeach; ?>
                                     </select>       
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
                                        <label> Contact Number <b class="rqd">*</b><small>Telephone Number or Mobile Number</small></label>   
                                          <div> 
                                            <input value="<?php echo $row->contact_number ?>" type="text" class="validate[required,custom[phone]]  medium" name="contact_number" id="contact_number" />
                                          </div>
                                      </div>
                                      
                                      
                                     
                                     <div class="section ">
                                      <label> Registered</label>   
                                        <div>
                                            <b><?php echo contextualTime($row->time) ?></b>
                                        </div>
                                    </div>
                                    
                                     <div class="section ">
                                      <label> Last Visit</label>   
                                        <div>
                                            <b><?php if($row->lastvisit_date) { echo contextualTime($row->lastvisit_date); }else { echo 'Never'; } ?></b>
                                        </div>
                                     </div>
                                    <?php  endforeach; ?>  
                                     
                                      
                                      <div class="section last">
                                      <div>
                                        <a class="uibutton" onclick="validate_account_edit();">Update</a>
                                        <a class="uibutton special"  onClick="go_back('#add_account','account');" title="Cancel"   >Cancel</a>
                                     </div>
                                     </div>
                                     
                                </fieldset>
                                </form>
                                </div>