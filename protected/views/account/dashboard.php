<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="topcolumn">
<div class="logo"></div>
       <!-- <ul  id="shortcut">
        <li> <a href="#" title="Back To home"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/shortcut/home.png" alt="home"/><strong>Home</strong> </a> </li>
        <li> <a href="#" title="Setting" > <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/shortcut/setting.png" alt="setting" /><strong>Setting</strong></a> </li> 
        <li> <a href="<?php echo base_url() ?>notification" title="Messages" > <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/shortcut/mail.png" alt="messages" /><strong>Notifacation</strong></a><div class="notification" >0</div></li>
       </ul>-->
</div>

<div class="clear"></div>

<div class="onecolumn" >
                        <div class="header"> <span ><span class="ico gray home"></span> Dashboard</span> </div>
                        <div class="clear"></div>
                        <div class="content" >  <br  class="clear"/>
                            <div  class="grid3">
                                <div class="inner">
                                   <ul id="nav-shadow">
                                   
                                    <?php if (page_level_access('managed_account') == true): ?>  
                            		<li class="button-color-1"><span class="ntip"><a href="<?php echo base_url().'account.html' ?>" title="User Account Management"></a></span></li>
                            		<?php endif; ?>
                                    
                                    <?php if (page_level_access('managed_product_line') == true): ?>
                                    <li class="button-color-4"><span class="ntip"><a href="<?php echo base_url().'product_line.html' ?>" title="Product Line Management"></a></span></li>
                                    <?php endif; ?>
                                    
                                    <?php if (page_level_access('managed_products') == true): ?>
                                    <li class="button-color-5"><span class="ntip"><a href="<?php echo base_url().'product.html' ?>" title="Product Management"></a></span></li>
                                    <?php endif; ?>
                                  
                                  <!--  
                                    <?php if (page_level_access('managed_branch_type') == true): ?>
                                    <li class="button-color-7"><span class="ntip"><a href="<?php echo base_url().'system/config.html' ?>" title="System Configuration"></a></span></li>
                                    <?php endif; ?>
                                  -->
                                  
                                    <?php if (page_level_access('managed_branch') == true): ?>
                                    <li class="button-color-6"><span class="ntip"><a href="<?php echo base_url().'branch.html' ?>" title="branch Management">t</a></span></li>
                	                <?php endif; ?>
                                   
                                    <?php if (page_level_access('managed_customer') == true): ?>
                                    <li class="button-color-2"><span class="ntip"><a href="<?php echo base_url().'customer.html' ?>" title="Customer Management"></a></span></li>
                            		<?php endif; ?>
                                    
  
                    	            <?php if (page_level_access('managed_reports') == true): ?>
                                    <li class="button-color-3"><span class="ntip"><a href="<?php echo base_url().'reports.html' ?>" title="Reports">t</a></span></li>
                                    <?php endif; ?>
                                    
                                   
                                    
                                </ul>
                                <!-- end shadow navigation --> 
                                </div>
                            </div>
                        
                            <div class="grid1 rightzero">
                                <div class="shoutcutBox link_branch"> <span class="ico color window"></span> <strong><?php echo $this->branch_model->count_branch() ?></strong> <em>Total Branch</em> </div>
                                <div class="shoutcutBox managed_products" > <span class="ico color item"></span> <strong><?php echo $this->product_model->count_product() ?></strong> <em> Item(s) in Inventory</em> </div>
                                <!--<div class="shoutcutBox" > <span class="ico color item"></span> <strong><?php echo $this->product_model->count_product() ?></strong> <em> Total Stock In</em> </div>
                                -->
                                <div class="shoutcutBox link_user"> <span class="ico color user"></span> <strong><?php echo $this->account_model->count_user() ?></strong> <em>Total User Accounts</em> </div>
                                
                                <!-- <div class="shoutcutBox last"> 
                                    <span class="ico color connect"></span> <strong>152</strong> <em>user online </em> 
                                </div>
                                -->
                            </div>
                            <div class="clear"></div>
                        </div>
</div>
                    <!-- // End onecolumn -->
                    <?php if (page_level_access('managed_reports') == true): ?> 
                    <div  class="onecolumn">
                                <div  style="width:100%;height:500px; margin-left:25px">
                                    <table class="chart" style="width : 100%;">
                                        <thead>
                                            <tr>
                                                <th width="10%"></th>
                                                <th width="25%" style="color : #bedd17;">Sales in all branch</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($reports as $row): ?>                                        
                                            <tr>
                                                <th><?php echo $row->Sales_date ?></th>
                                                <td><?php echo $row->sales ?></td>
                                            </tr>
                                        <?php endforeach; ?>                                            
                                                                                        
                                        </tbody>
                                    </table>
                                    <br />
                                    <div class="chart_title"><span>Sales for the month of <?php echo date('F') ?> - <?php echo date('Y') ?></span></div>
                                </div>
                    </div>
                    <?php endif; ?>

                    <?php if (page_level_access('view_order_notification') == true): ?> 
                    <div class="onecolumn" >
                        <div class="header"><span>Unread Notification</span></div>
                        <div class="clear"></div>
                        <div class="content" > 
                        <?php if(!$qry_order_list): ?>
                            <div class="alertMessage">No Unread Notification!</div>
                        <?php endif; ?>
                        <br  class="clear"/>
                        <div class="comment" style="margin-left: -40px;">
                        <?php foreach($qry_order_list as $row): ?>
                             <div id="message-<?php echo $row->msg_id ?>"> 
                                	<div class="avartar">
                                    <img src="<?php echo load_account_profile($row->user_id_from,getReturnValue($this->db->dbprefix('account'),'ProfilePic','account_id',$row->user_id_from)); ?>"  alt="<?php echo getReturnValue($this->db->dbprefix('account'),'CONCAT(first_name,\' \',middle_name,\' \',last_name)','account_id',$row->user_id_from) ?>" /></div>
                                    
                                    
                                        <div id="order_msg" class="msg <?php if($row->state == 0){ echo 'unread_msg'; } ?>"> 
                                        <a class="order_link" href="<?php echo base_url().'order/view/'.$row->msg_id ?>">   
                                        <span>From: <b><?php echo getReturnValue($this->db->dbprefix('account'),'CONCAT(first_name,\' \',middle_name,\' \',last_name)','account_id',$row->user_id_from) ?></b></span><span><?php  if(!$row->state) { echo 'Unread'; }else{ echo $row->read_on; } ?>&nbsp;&nbsp;</span> 
                                       	  <div class="bodyMsg">Subj: <?php  echo $row->subject ?></div> 
						                </a>
                                        </div>
                                    
                              </div>
                        <?php endforeach; ?>
                        </div>
                                                            
                    
                    <div class="clear"></div>
                    </div>
                    </div>
                    <?php endif; ?>
                    
                    <?php if (page_level_access('managed_account') == true): ?>
                    <div class="column_left">
                            <div class="onecolumn">
                            <div class="header"><span><span class="ico gray user"></span> Last 5 User Added</span></div>
                            <br class="clear"/>
                            <div class="content">
                             <?php if(!$user_account): ?>
                                    <div class="alertMessage">No New User Added!</div>
                             <?php endif; ?>
                                <div id="news_update" style="position: relative;" >
                                    <ul style="position: absolute; margin: 0pt; padding: 0pt; top: 0px; width: 100%;">
                                        <?php foreach($user_account as $row): ?>
                                        <li>
                                            <div class="temp_news">
                                            <p><a class='iframe' href="<?php echo base_url().'account/view_profile/'.$row->account_id.'-'.$row->username; ?>" title="<?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name ?>">
                                            <img src="<?php echo load_account_profile($row->account_id,$row->ProfilePic) ?>" alt="<?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name ?>" /></div>
                                            </a></p>
                                            <div class="detail_news">
                                                <div class="boxtitle min" >User Type: <?php echo getReturnValue($this->db->dbprefix('usertype'),'name','user_type_id',$row->user_type_id) ?></div>
                                                <b><?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name ?></b>
                                                <span class="datepost">Added <?php echo contextualTime($row->time); ?></span>
                                                <!--
                                                <span class="morelink">
                                                    <p><a class='iframe' href="<?php echo base_url().'account/view_profile/'.$row->account_id.'-'.$row->username; ?>" title="<?php echo $row->first_name.' '.$row->middle_name.' '.$row->last_name ?>">View Account</a></p>
                                                </span> 
                                                -->
                                            </div>
                                            <br class="clear"/>
                                        </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                            </div>
                        </div>
                       <?php endif; ?>
                       
                       <?php if (page_level_access('managed_customer') == true): ?> 
                        <div class="column_right">
                            <div class="onecolumn">
                            <div class="header"><span><span class="ico gray user"></span> Last 5 Valued Customer Added</span></div>
                            <br class="clear"/>
                            <div class="content">
                                    <?php if(!$customer): ?>
                                    <div class="alertMessage">No New Customer Added!</div>
                                    <?php endif; ?>
                                <div id="customer_update" style="position: relative;" >
                                    <ul style="position: absolute; margin: 0pt; padding: 0pt; top: 0px; width: 100%;">
                                    
                                        <?php foreach($customer as $row): ?>
                                        <li>
                                            <div class="temp_news">
                                             <p><a class='iframe' href="<?php echo base_url().'customer/view_profile/'.$row->CustomerId.'-'.$row->FirstName.'_'.$row->LastName; ?>" title="<?php echo $row->FirstName.' '.$row->MiddleName.' '.$row->LastName ?>">
                                            <img src="<?php echo load_customer_profile($row->CustomerId,$row->ProfilePic) ?>" alt="<?php echo $row->FirstName.' '.$row->MiddleName.' '.$row->LastName ?>" /></div>
                                            </a></p>
                                            <div class="detail_news">
                                                <div class="boxtitle min" >Discount: <?php echo $row->Discount ?>%</div>
                                                <b><?php echo $row->FirstName.' '.$row->MiddleName.' '.$row->LastName ?></b>
                                                <span class="datepost">Added by <?php echo getReturnValue($this->db->dbprefix('account'),'username','account_id',$row->added_by) ?>   <?php echo contextualTime($row->time); ?></span>
                                                
                                                <!--<span class="morelink">
                                                    <p><a class='iframe' href="<?php echo base_url().'customer/view_profile/'.$row->CustomerId.'-'.$row->FirstName.'_'.$row->LastName; ?>" title="<?php echo $row->FirstName.' '.$row->MiddleName.' '.$row->LastName ?>">View Account</a></p>
                                                </span>
                                                -->
                                            </div>
                                            <br class="clear"/>
                                        </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                            </div>
                        </div>
                        <?php endif; ?>
                    <!-- // End onecolumn -->
