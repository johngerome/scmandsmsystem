<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script>
	$('.tbl_order').dataTable({
	"sDom": 'fCl<"clear">rtip',
	 "aaSorting": [],
	  "aoColumns": [
					null,null,null
	  ]
	});
</script>

<div class="topcolumn">
<div class="logo"></div>
    <ul  id="shortcut"></ul>
</div>

<div class="clear"></div>

<div class="onecolumn" >
                    <div class="header">
                        <span >
                        <span class="ico  gray chat-exclamation">
                        </span>Notification (Trash)
                        </span>
                    </div>
                    <!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
           
                     <ul class="uibutton-group" >
                        <li><span class="tip"><a class="uibutton icon prev on_prev "  title="Go Back" href="<?php echo base_url().'order' ?>">Go Back</a></span></li>
                     </ul>         
                        <div class="comment" style="margin-left: -20px;">
                        <?php foreach($qry_order_list as $row): ?>
                              
                             <div id="message-<?php echo $row->order_id ?>"> 
                                	<div class="avartar">
                                    <img src="<?php echo load_account_profile($row->user_id_from,getReturnValue($this->db->dbprefix('account'),'ProfilePic','account_id',$row->user_id_from)); ?>"  alt="<?php echo getReturnValue($this->db->dbprefix('account'),'CONCAT(first_name,\' \',middle_name,\' \',last_name)','account_id',$row->user_id_from) ?>" /></div>
                                    
                                    
                                        <div id="order_msg" class="msg <?php if($row->state == 0){ echo 'unread_msg'; } ?>"> 
                                         
                                            <a class="order_link" href="<?php echo base_url().'order/view/'.$row->order_id ?>">   
                                            <span>From: <b><?php echo getReturnValue($this->db->dbprefix('account'),'CONCAT(first_name,\' \',middle_name,\' \',last_name)','account_id',$row->user_id_from) ?></b></span><span><?php  if(!$row->state) { echo 'Unread'; }else{ echo contextualTime($row->read_on); } ?>&nbsp;&nbsp;</span>   
                                        
                                       	    <div class="bodyMsg">Subj: <?php  echo $row->subject ?></div> 
                                            </a>
                                        <div class="toolMsg">
                                             <span class="iconRestore tip" title="Restore" onclick="restore_item('<?php echo $row->order_id ?>');"></span>
                                             <span class="iconDelete tip" title="Delete" onclick="deleteMessage_permanent('<?php echo $row->order_id ?>');"></span>
                                             
                                        </div>
                                        </div>
                                </div>        
                            <?php endforeach; ?>
                            
					   </div>
                    </div>
</div>