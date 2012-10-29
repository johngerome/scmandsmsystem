<script type="text/javascript" src="<?php echo base_url().'media/ajaxupload/jquery.form.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/zice.style.css"/>


<script type="text/javascript">
$(document).ready(function()
{   
    
 
});
</script>
<style>
input[type=text], input[type=password]{
    border: 0px;
    color: #888;
}
input[type=text]:hover, input[type=password]:hover{
    border: 0px;
    
}
.odd{
    background: #f4f4f4;
}

</style>

<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header">
                  <span >
                  <span class="ico  gray window">
                  </span>View User Account</span>
                  </div>	
                  <div class="clear"></div>
                  <div class="content" >
       
                    <div class="formEl_b">	
                            
                    <div class="boxtitle min">Profile Picture</div>
                    
                    <?php foreach($qry_account as $row): ?>
                    
                    <form id="imageform" method="post" enctype="multipart/form-data" action='<?php echo base_url().'account/do_upload' ?>'>
                    <div class="profileSetting" >
                    <div class="avartar odd" id="preview">
                        <td align="left" ><img width="200" height="200" src="<?php echo base_url().'images/user/'.$row->account_id.'/'.$row->ProfilePic; ?>" /></td>
                    </div>
                                                    
                    </div>
                    </form>
                    
                    <form id="add_account" action="#" >
                    <input type="hidden" id="ProfilePic" value="<?php echo $row->ProfilePic ?>"/>
                    <input type="hidden" id="account_id" value="<?php echo $row->account_id ?>"/>   
                         
                   
                                <fieldset >
                                <legend>Login Information</legend>
                                  
                                <div class="section ">
                                    <label>Username</label>   
                                    <div>
                                        <input readonly="readonly" type="text" value="<?php echo $row->username ?>" />
                                    </div>
                                </div>
                                
                                <div class="section odd">
                                    <label>Password </label>       
                                    <div>
                                        <input readonly="readonly" value="<?php echo $row->password ?>" type="password" class="read_only_txt" />
                                    </div>
                                 </div>  
                                   
                                </fieldset >
                                  
                                <fieldset >      
                                   <legend>Account Details</legend> 
                                   <br />
                                  
                                   <div class="section">
                                   <label>User Type </label>   
                                     <div>
                                    <input readonly="readonly" type="text" value="<?php echo $this->account_model->get_usertype_Name($row->user_type_id) ?>" />
                                     </div>
                                    </div>
                                    
                                    <div class="section odd">
                                      <label> Assign Branch </label>   
                                      <div> 
                                      <?php if($row->branch_id == 0): ?>
                                         <input readonly="readonly" value="All Branch" type="text" class="large capitalize" />
                                       <?php else: ?>
                                        <input readonly="readonly" value="<?php echo getReturnValue($this->db->dbprefix('branch'),'branch_name','branch_id',$row->branch_id)  ?>" type="text" class="large capitalize" />
                                      <?php endif ?>
                                      </div>
                                     </div>
                                     
                                    <div class="section odd">
                                      <label> First Name </label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->first_name ?>" type="text" class="validate[required,custom[onlyLetterSp]] large capitalize" name="first_name" id="first_name" />
                                      </div>
                                     </div>
                                     
                                     <div class="section ">
                                      <label> Last Name </label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->last_name ?>" type="text" class="validate[required,custom[onlyLetterSp]] large capitalize"  name="last_name" id="last_name"/>
                                      </div>
                                     </div>  
                                     
                                     <div class="section odd">
                                      <label> Middle Name</label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->middle_name ?>" type="text" class="validate[custom[onlyLetterSp]] small capitalize" name="middle_name" id="middle_name"/>
                                      </div>
                                     </div>
                                     
                                      <div class="section ">
                                      <label> Email Address</label>   
                                      <div> 
                                      <input readonly="readonly"value="<?php echo $row->email_address ?>" type="text" class="validate[custom[email]]  large" name="email_address" id="email_address"/>
                                      </div>
                                      </div>
                                      
                                      <div class="section odd">
                                      <label> Home Address </label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->home_address ?>" type="text" class="validate[required]  large capitalize" name="home_address" id="home_address"/>
                                      </div>
                                      </div>
   
                                    
                                      
                                      <div class="section ">
                                      <label> Contact Number</label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->contact_number ?>" type="text" class="validate[custom[phone]]  medium" name="contact_number" id="contact_number" />
                                      </div>
                                      </div>
                            
                                     
                                     <div class="section odd">
                                      <label> Registered </label>   
                                        <div>
                                            <input readonly="readonly" type="text" value="<?php echo contextualTime($row->time); ?>" />
                                        </div>
                                    </div>
                                     <div class="section ">
                                      <label> Last Visit Date</label>   
                                        <div>
                                            <input readonly="readonly" type="text" value="<?php  if($row->lastvisit_date) { echo contextualTime($row->lastvisit_date); }else { echo 'Never'; } ?>" />
                                        </div>
                                    </div>
                                    <?php  endforeach; ?>  
                                     
                                      
                                     
                                </fieldset>
                                </form>
                                </div>
</div>