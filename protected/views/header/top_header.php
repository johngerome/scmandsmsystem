<div id="header" >
<div id="account_info">
<!--<div>
    <a href="#" title="Messages"> 
        <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/shortcut/mail.png" alt="messages" />
        <div class="msg_noty" >10</div>
    </a>
</div>
-->
<script type="text/javascript">
    setInterval(function()
    {
        $('.notification_top').load( base_url +'order/count_notification.html');
    }, 500);
</script>
<div class="box" style="float: left;">
<a class="jfontsize-button" id="jfontsize-m" href="#">A-</a>
<a class="jfontsize-button" id="jfontsize-d" href="#">A</a>
<a class="jfontsize-button" id="jfontsize-p" href="#">A+</a>
</div>

    <?php if (page_level_access('view_order_notification') == true): ?>    
        
        <a href="<?php echo base_url().'order'; ?>" >
        <div class="notification" title="Notification">
            <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/shortcut/chat-exclamation.png" alt="Notifacation" width="30" height="30" />
        </div>
        
        <?php if(count_unread_notification()): ?>
        <div class="notification_top" >
            
        </div>
         <?php endif; ?>
         
        </a>
      
    <?php endif; ?>
    
    <a href="<?php echo base_url().'account/view/'.getAccountID($this->session->userdata('username')).'-'.$this->session->userdata('username'); ?>">
        <div class="setting" title="Edit My Profile">
        <b>Welcome,</b> <b class="red">
        <?php echo $this->session->userdata('username'); ?></b>
        <!-- <img src="<?php echo $this->gtemplate->theme_path() ?>images/gear.png" class="gear"  alt="Profile Setting" />-->
        </div>

    <img width="32" height="32" src="<?php echo base_url() ?>images/user/<?php echo getAccountID($this->session->userdata('username')) ?>/<?php echo getAccountProfile($this->session->userdata('username')) ?>" alt="Online" class="avatar" />
    </a>
    
    <div class="disconnect logout" title="Logout"><b >Logout</b> <img src="<?php echo $this->gtemplate->theme_path() ?>images/connect.png" name="connect" alt="Logout" /></div> 
</div>
</div> <!--//  header -->