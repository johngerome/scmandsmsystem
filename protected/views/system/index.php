<script type="text/javascript">
jQuery(document).ready(function(){
    load_time_zone();
});
function chkstatus(){
    var val = $('#online').attr('checked');
    alert(val);
};
</script>                            
<style>
#secret_key{
    background: #F5FCE5;
    font-size: 12px;
}
</style>
<div class="topcolumn">
<div class="logo"></div>
<ul  id="shortcut">
</ul>
</div>
<div class="clear"></div>

<script type="text/javascript" src="<?php echo base_url().'media/ajaxupload/jquery.form.js' ?>"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/zice.style.css"/>


<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header">
                  <span >
                  <span class="ico  gray screwdriver">
                  </span>System Configuration</span>
                  </div>	
                  <div class="clear"></div>
                  <div class="content" >
       
                    <div class="formEl_b">	
                            

                    
                    <form id="add_account" action="#" >      
                    <fieldset >      
                                   <legend>System</legend> 
                                   <br />
  
                                   <div class="section">
                                   <label> Server Time Zone </label>                                   
                                        <div id="mainContent">
                                        </div>
                                    </div>
                                     
                                    <!-- <div class="section ">
                                      <label> Secret Key </label>   
                                      <div> 
                                        <input readonly="readonly" value="<?php echo $secret_key; ?>" type="text" class="meduim"  name="secret_key" id="secret_key"/>
                                        <span class="f_help">You can use this key if you forgot your password.</span>
                                      </div>
                                     </div> 
                                     -->
                                     
                                     <div class="section ">
                                      <label> VAT <small>by percent (%).</small></label>   
                                      <div> 
                                        <input value="<?php echo $vat; ?>" type="text" class="meduim"  name="vat" id="vat"/>
                                        <span class="f_help">This is a default VAT to all Products.</span>
                                      </div>
                                     </div>
                                     
                                    <!--
                                    <div class="section odd">
                                      <label> Maximum Discount <small>Discount by %</small></label>   
                                      <div> 
                                       <input  type="text" id="max_discount" name="max_discount"/>
                                       <span class="f_help">This will apply for Valued Customer.<br />Default is 100.</span>
                                      </div>
                                     </div>
                                     -->
                                     

                    </fieldset>
                    <br />
                    <!--
                    <fieldset >      
                                   <legend>User</legend> 
                                   <br />
  
                                   <div class="section">
                                      <label>User Type that can login to any branch.</label>   
                                      <?php if(!$qry_group): ?>
                                      <div class="SE">
                                        No User Type Found.
                                      </div>
                                      <?php endif;  ?>
                                     <div>
                                          <?php foreach($qry_group as $row): ?>
                                            <div class="ch">
                                            <input  type="checkbox" name="<?php echo $row->user_type_id ?>" id="<?php echo $row->user_type_id ?>" value="1"  class="ck-<?php echo $row->user_type_id ?>" />
                                            <label class="lbl"><?php echo getReturnValue($this->db->dbprefix('usertype'),'name','user_type_id',$row->user_type_id) ?> </label>
                                            </div>
                                          <?php endforeach; ?>
                                     </select>   
                                         
                                     </div>
                                     </div>

                    </fieldset>
                    -->
                    
                      <div class="section last">
                          <div>
                            <a class="uibutton" onclick="save_config();">Update</a>
                         
                          </div>
                      </div>
                    </form>
                    </div>
</div>


</div>