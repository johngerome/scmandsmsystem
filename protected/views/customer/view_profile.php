<script type="text/javascript" src="<?php echo base_url().'media/ajaxupload/jquery.form.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/zice.style.css"/>

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
                  </span>View Valued Customer</span>
                  </div>	
                  <div class="clear"></div>
                  <div class="content" >
       
                    <div class="formEl_b">	
                            
                    <div class="boxtitle min">Profile Picture</div>
                    
                    <?php foreach($qry_account as $row): ?>
                    
                    <form id="imageform" method="post" enctype="multipart/form-data" action='#'>
                    <div class="profileSetting" >
                    <div class="avartar odd" id="preview">
                        <td align="left" ><img width="200" height="200" src="<?php echo base_url().'images/customer/'.$row->CustomerId.'/'.$row->ProfilePic; ?>" /></td>
                    </div>
                                                    
                    </div>
                    </form>
                    
                    <form id="add_account" action="#" >
                                
                                <fieldset >      
                                   <legend>Customer Profile</legend> 
                                   <br />
  
                                   <div class="section odd">
                                      <label> First Name </label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->FirstName ?>" type="text" class="validate[required,custom[onlyLetterSp]] large capitalize" name="first_name" id="first_name" />
                                      </div>
                                     </div>
                                     
                                     <div class="section ">
                                      <label> Last Name </label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->LastName ?>" type="text" class="validate[required,custom[onlyLetterSp]] large capitalize"  name="last_name" id="last_name"/>
                                      </div>
                                     </div>  
                                     
                                     <div class="section odd">
                                      <label> Middle Name</label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->MiddleName ?>" type="text" class="validate[custom[onlyLetterSp]] small capitalize" name="middle_name" id="middle_name"/>
                                      </div>
                                     </div>
                                     
                                      <div class="section ">
                                      <label> Email Address</label>   
                                      <div> 
                                      <input readonly="readonly"value="<?php echo $row->EmailAddress ?>" type="text" class="validate[custom[email]]  large" name="email_address" id="email_address"/>
                                      </div>
                                      </div>
                                      
                                      <div class="section odd">
                                      <label> Home Address </label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->HomeAddress ?>" type="text" class="validate[required]  large capitalize" name="home_address" id="home_address"/>
                                      </div>
                                      </div>
   
                                    
                                      
                                      <div class="section ">
                                      <label> Contact Number</label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->ContactNumber ?>" type="text" class="validate[custom[phone]]  medium" name="contact_number" id="contact_number" />
                                      </div>
                                      </div>
                            
                                     <div class="section ">
                                      <label> Discount</label>   
                                      <div> 
                                      <input readonly="readonly" value="<?php echo $row->Discount ?>%" type="text" class="medium"  />
                                      </div>
                                      </div>
                                     
                                     <div class="section odd">
                                      <label> Registered</label>   
                                        <div>
                                            <input readonly="readonly" type="text" value="<?php echo contextualTime($row->time) ?>" />
                                        </div>
                                    </div>
                                    
                                     <div class="section ">
                                      <label> Added by</label>   
                                        <div>
                                            <input readonly="readonly" type="text" value="<?php echo getReturnValue($this->db->dbprefix('account'),'username','account_id',$row->added_by) ?>" />
                                        </div>
                                    </div>
                                    <?php  endforeach; ?>  
  
                                </fieldset>
                                
                                </form>
                                </div>
</div>
</div>