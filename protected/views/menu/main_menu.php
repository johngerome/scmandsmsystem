            <?php $this->load->view('views/js/menu.php') ?>   
            
            <div id="left_menu" class="jsize">
                    <ul id="main_menu" class="main_menu">
                    
                      <li class="limenu <?php if($this->uri->segment('1') == 'dashboard' OR $this->uri->segment('1') == ''){ echo 'select';}?>" ><a href="#" class="link_dashboard "><span class="ico gray shadow home" ></span><b>Dashboard</b></a></li>
                      
                      <?php if (page_level_access('managed_account') == true): ?>
                      <li class="limenu <?php if($this->uri->segment('1') == 'account' OR $this->uri->segment('1') == 'user_type' AND $this->uri->segment('2') != 'view'){ echo 'select';}?>" >
                      <a href="#" class="d_cursor"><span class="ico gray  user" >
                        </span><b>user</b></a>
                            <ul>
                                <li ><a href="#" class="link_user_type"> manage User Type </a></li>
                                <li ><a href="#" class="link_user"> manage User </a></li>
                            </ul>
                      </li>
                      <?php endif; ?>
                      
                      
                    <?php if (page_level_access('managed_product_line') == true): ?> 
                    <li class="limenu <?php if($this->uri->segment('1') == 'product_line'){ echo 'select';}?>  " >
                    <a href="#" class="managed_product_line"><span class="ico gray shadow folder"></span><b>product Line</b></a> </li> 
                    <?php endif; ?>
                    
                    <?php if (page_level_access('managed_products') == true): ?> 
                    <li class=" limenu <?php if($this->uri->segment('1') == 'product' AND $this->uri->segment('2') == 'index'){ echo 'select';}?>  " >
                        <a href="#" class="managed_products"><span class="ico gray shadow list"></span><b>products</b></a> </li> 
                    <?php endif; ?>
                    
                    <?php if (page_level_access('managed_pricing_scheme') == true): ?> 
                    <li class=" limenu <?php if($this->uri->segment('1') == 'product' AND $this->uri->segment('2') == 'pricing_scheme'){ echo 'select';}?>  " >
                        <a href="#" class="managed_pricing_scheme"><span class="ico gray shadow coin"></span><b>Pricing Scheme</b></a> </li> 
                    <?php endif; ?>
                    
                    <?php if (page_level_access('managed_package') == true): ?> 
                    <li class=" limenu <?php if($this->uri->segment('1') == 'package'){ echo 'select';}?>  " >
                        <a href="#" class="managed_package"><span class="ico gray shadow square"></span><b>product Package</b></a> </li> 
                    <?php endif; ?>
                    
                    <?php if (page_level_access('set_product_package') == true): ?> 
                    <li class="limenu <?php if($this->uri->segment('1') == 'product_package'){ echo 'select';}?>  " >
                        <a href="#" class="managed_product_package"><span class="ico gray shadow square"></span><b>Set Product Package</b></a> </li> 
                    <?php endif; ?>
                    
                     <?php if (page_level_access('managed_stock_in') == true): ?> 
                    <li class=" limenu <?php if($this->uri->segment('1') == 'product' AND $this->uri->segment('2') == 'stock_in'){ echo 'select';}?>  " >
                        <a href="#" class="lnk_stock_in"><span class="ico gray shadow arrow_down2"></span><b>Replenish Stock</b></a> </li> 
                    <?php endif; ?>

                    <?php if (page_level_access('managed_branch_type') == true): ?>  
                    <li class=" limenu <?php if($this->uri->segment('2') == 'type'){ echo 'select';}?>  " >
                        <a href="#" class="link_branch_type"><span class="ico gray shadow window"></span><b>branch type</b></a></li>
                    <?php endif; ?>
                    
                    <?php if (page_level_access('managed_branch') == true): ?>  
                    <li class="limenu <?php if($this->uri->segment('1') == 'branch' AND $this->uri->segment('2') == ''){ echo 'select'; }?>  " >
                        <a href="#" class="link_branch"><span class="ico gray shadow window"></span><b>Branch</b></a></li>
                    <?php endif; ?>


                    
                    <?php if (page_level_access('managed_customer') == true): ?> 
                    <li class="limenu <?php if($this->uri->segment('1') == 'customer'){ echo 'select';}?>" >
                        <a href="#" class="managed_customer"><span class="ico gray shadow group"></span><b>Valued Customers</b></a></li> 
                    <?php endif; ?> 
                    
                    <?php if (page_level_access('managed_inquiry') == true): ?>  
                    <li class="limenu <?php if($this->uri->segment('2') == 'availability' OR $this->uri->segment('2') == 'back_order_list' OR $this->uri->segment('2') == 're_order_list' OR $this->uri->segment('2') == 'damage_products' OR $this->uri->segment('2') == 'expire'){ echo 'select'; } ?>" ><a href="#" class="d_cursor"><span class="ico gray shadow world"></span><b>Inquiry </b></a>
                        <ul>
                            
                            <li><a class="product_availability">Available Product </a></li>
                            <li><a class="back_order_list">Back Order List</a></li>
                            <li><a class="damaged_products">Damage Products</a></li>
                            <li><a class="expiry_product">Expire Products</a></li>
                            <li><a class="product_re_order">Re-order List</a></li>
                            
                        </ul>
                    </li>
                    <?php endif; ?>
                    
                     <?php if (page_level_access('managed_reports') == true): ?> 
                    <li class="limenu <?php if($this->uri->segment('1') == 'reports'){ echo 'select';}?>" >
                    <a href="#" class="d_cursor"><span class="ico gray shadow  stats_bars"></span><b>Reports </b></a>
                    <ul>
                          <li ><a href="#" class="reports"> Sales </a></li>
                          <li ><a href="#" class="inventory_summary"> Inventory Summary </a></li>
                       </ul>
                    </li>
                     <?php endif ?>
                     
                    <?php if (page_level_access('view_order_notification') == true): ?> 
                    <li class=" limenu <?php if($this->uri->segment('1') == 'order' OR $this->uri->segment('1') == 'notification'){ echo 'select';}?>" >
                        <a href="#" class="notifacation"><span class="ico gray shadow  chat-exclamation"></span><b>Notification</b> </a>
                    </li>
                    <?php endif; ?>
                    
                    
                    <li class="limenu <?php if($this->uri->segment('1') == 'system'){ echo 'select';}?>" >
                        <a href="#" class="d_cursor"><span class="ico gray shadow  monitor"></span><b>system</b> </a>
                       <ul>
                       <!--
                            <li>
                                <a href="<?php echo base_url().'account/view/'.getAccountID($this->session->userdata('username')); ?>" class="setting"> my account </a>
                            </li>
                       -->
                            <?php
                            $user_type_id =  getReturnValue($this->db->dbprefix('account'),'user_type_id','account_id',getAccountID($this->session->userdata('username')));
                            ?>
                            <?php if($user_type_id == 1): ?>
                            <li><a href="#" class="configuration"> configuration</a></li>
                            <?php endif; ?>
                       </ul>
                    </li>
                    
                     <?php if($user_type_id == 1): ?>
                   <li class="limenu <?php if($this->uri->segment('1') == 'tools'){ echo 'select';}?>">
                    <a href="#" title="Tools" class="d_cursor"><span class="ico gray shadow  screwdriver "></span><b>Tools</b></a>
                         <ul>
                                <li ><a href='javascript:void(0);' onclick="window.open('<?php echo base_url() ?>help/index.html', '_blank', 'width=800,height=600,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');"> User Guide</a></li>
                                <li ><a href="#" class="backup"> Backup </a></li>
                         </ul>
                   </li>
                    <?php endif; ?>
                    </ul>
              </div>
            