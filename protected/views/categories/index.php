<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="topcolumn">
<div class="logo"></div>
        <ul  id="shortcut">
       <!-- <li> <a href="#" title="Settings"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/setting.png" alt="Settings"/><strong>Settings</strong> </a> </li>
        <li> <a href="#" title="Help"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/help.png" alt="Help" /><strong>Help</strong></a></li>
        -->
        </ul>
</div>

<div class="clear"></div>

<div class="onecolumn" >
                  <div class="header"><span ><span class="ico  gray point"></span>Managed Categories</span> </div><!-- End header -->	
                  <div class="clear"></div>
                  <div class="content" >
                  
                   <div id="uploadTab">
                      <ul class="tabs" >
                       
                          <li ><a href="#tab1"   >  EGG STORE </a></li>            
                      </ul>
                      <div class="tab_container" >

                           <div id="tab1" class="tab_content"> 
                              <div class="load_page">
                              <ul class="uibutton-group">
                                    <li><span class="tip"><a class="uibutton icon add on_load"  name="#tab1"  title="Click Add Category">Add Category</a></span></li>
                              </ul>
                              <form class="tableName toolbar">

							  <h3>Egg Store</h3>
                              <table class="display data_table4 " id="data_table">
                                <thead>
                                  <tr>
                                    <th width="352" align="left">Category Name</th>
                                    <th width="174" >Quantity</th>
                                    <th width="246" >Discount</th>
                                     <th width="251" >Item</th>
                                    <th width="199" >Management</th>
                                  </tr>
                                </thead>
                                <tbody>
                                
                                  <tr>
                                    <td  align="left">Tray</td>
                                    <td >25</td>
                                    <td >10%</td>
                                     <td >1</td>
                                   <td >
                                      <span class="tip" >
                                          <a  title="Edit" >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_edit.png" >
                                          </a>
                                      </span> 
                                      <span class="tip" >
                                          <a id="1" class="Delete"  name="1" title="Delete"  >
                                              <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/icon_delete.png" >
                                          </a>
                                      </span> 
                                      </td>
                                  </tr>
                             
                              
                                </tbody>
                              </table>
                              </form>
                              </div>
                              	
                             <div class="show_add" style=" display:none">
                             
                              <ul class="uibutton-group" >
                                <li><span class="tip"><a class="uibutton icon prev on_prev "  id="on_prev_pro" name="#tab1" onClick="jQuery('#add_Product').validationEngine('hideAll')" title="Go Back" >Go Back</a></span></li>
                                <li><span class="tip"><a class="uibutton special"   onClick="ResetForm()" title="Reset  Form"   >Clear Form</a></span></li>
                              </ul>
                               <form id="validation" action="#"> 
                                     
                                    <div class="section ">
                                    <label> Category Name<small>this is Required field!</small></label>   
                                    <div> 
                                    <input type="text" class="validate[required] large" name="Category_name" id="Category_name">
                                    </div>
                                    </div>
                                    
                                    <div class="section ">
                                    <label> Quantity</label>   
                                    <div> 
                                    <input type="text" class="validate[required] small" name="Quantity" id="Quantity">
                                    </div>
                                    </div>
                                     
                                    <div class="section ">
                                    <label> Discount<small>Discount by 0%</small></label>   
                                    <div> 
                                    <input type="text" class="validate[required] small" name="Discount" id="Discount">
                                    </div>
                                    </div>
                                    
                              
         
                                    <div class="section last">
                                    <div>
                                      <a class="uibutton submit_form" >submitForm</a>
                                   </div>
                                   </div>
                              </form>
                             
                             </div>	
                          </div><!--tab1-->
                          
                          
                           
                          
                         
                          
                  </div>
                  </div><!--/END TAB/--> 
                  
                    
                  <div class="clear"></div>  
			</div>
            	  
 </div>             