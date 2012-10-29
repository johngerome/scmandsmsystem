
<div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray chat-exclamation"></span>Notification</span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                              
                        <div class="comment" style="margin-left: -40px;">
                        <?php foreach($qry_order_list as $row): ?>
                             <div id="message-<?php echo $row->order_id ?>"> 
                                	<div class="avartar">
                                    <img src="<?php echo load_account_profile($row->user_id_from,getReturnValue($this->db->dbprefix('account'),'ProfilePic','account_id',$row->user_id_from)); ?>"  alt="<?php echo getReturnValue($this->db->dbprefix('account'),'CONCAT(first_name,\' \',middle_name,\' \',last_name)','account_id',$row->user_id_from) ?>" /></div>
                                    
                                    
                                        <div id="order_msg" class="msg <?php if($row->state == 0){ echo 'unread_msg'; } ?>"> 
                                         
                                        <a class="order_link" href="<?php echo base_url().'order/view/'.$row->order_id ?>">   
                                        <span style="color: #888;">From: <?php echo getReturnValue($this->db->dbprefix('account'),'CONCAT(first_name,\' \',middle_name,\' \',last_name)','account_id',$row->user_id_from) ?></span><span><?php  if(!$row->state) { echo 'Unread'; }else{ echo 'Read '.contextualTime($row->read_on); } ?>&nbsp;&nbsp;</span>   
                                        
                                       	  <div class="bodyMsg" style="color: #555;"><b>Subj: <?php  echo $row->subject ?></b></div> 
						              </a>
                                        <div class="toolMsg"><span class="iconTrash tip" title="Archive" onclick="deleteMessage('<?php echo $row->order_id ?>');"></span></div>
                                        
                                        </div>
                                    
                              </div>
                        <?php endforeach; ?>
                        </div>
					</div>
</div>