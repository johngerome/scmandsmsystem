<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
<title><?php echo $this->config->item('site_name') ?> </title>
<!--[if lt IE 9]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<link href="<?php echo $this->gtemplate->theme_path() ?>css/zice.style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->gtemplate->theme_path() ?>css/icon.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/tipsy/tipsy.css" media="all"/>

<!-- ->Start CSS --!>  
<style type="text/css">
html {
	background-image: none;
}
#versionBar {
	background-color:#212121;
	position:fixed;
	width:100%;
	height:35px;
	bottom:0;
	left:0;
	text-align:center;
	line-height:35px;
}
.copyright{
	text-align:center; font-size:10px; color:#CCC;
}
.copyright a{
	color:#A31F1A; text-decoration:none
}    
</style>
<!-- ->END CSS --!>

</head>
<body >
                    <!-- ->Start of Catch Browsers Javascript Settings --!>
                    <div id="nojs" style="background: #f4f4f4;color:black;font-size: 20px;padding: 5px;border: 5px solid #000;">
                    <font face=arial>JavaScript must be enabled in order for you to use this system in standard view. However, it seems JavaScript is either disabled or not supported by your browser. To use standard view, enable JavaScript by changing your browser options, then <a href="<?php echo current_url(); ?>">try again</a>.
                    <br/>
                    Don't know what to do? check <a href="<?php echo base_url() ?>help/javascript_problem.html" target="_blank">Follow this Guide</a> Here!.
                    </font>
                    </div>
                    <script>
                    //if script enabled warning message hidden.
                    document.getElementById('nojs').style.display="none";
                    </script>
                    <!-- ->End of Catch Browsers Javascript Settings --!>              
                                      

                           
<div id="alertMessage" class="error"></div>
<div id="successLogin"></div>
<div class="text_success"><img src="<?php echo $this->gtemplate->theme_path() ?>images/loadder/loader_green.gif"  alt="ziceAdmin" /><span>Please wait</span></div>

<!-- ->Start of Login div --!>              
<div id="login" >
  <div class="ribbon"></div>
  <div class="inner">
  <div  class="logo" ><img src="<?php echo $this->gtemplate->theme_path() ?>images/logo/logo_login.png" alt="ziceAdmin" /></div>
  <div class="userbox"></div>
  <div class="formLogin">
  
   	<?php echo form_open('account/login',array('id' => 'formLogin','name' => 'formLogin')); ?>
    
          <div class="tip">
            <input name="username" type="text"  id="username_id"  title="Username"   />
          </div>
          <div class="tip">
            <input name="password" type="password" id="password"   title="Password"  />
          </div>
          <div style="padding:20px 0px 0px 0px ;">
          <!-- <div style="float:left; padding:0px 0px 2px 0px ;">
              <input type="checkbox" id="on_off" name="remember" class="on_off_checkbox"  value="1"   />
              <span class="f_help">Remember me</span>
           </div> -->
          <div style="float:right;padding:2px 0px ;">
              <div> 
                <ul class="uibutton-group">
                   <li><a class="uibutton normal" href="#"  id="but_login" onclick="login_now();">Login</a></li>
				   <li><a class="uibutton  normal" href="<?php echo base_url().'account/forgotpass.html' ?>" id="forgetpass">forgot password</a></li>
               </ul>
              </div>
            </div>
          </div>

    </form>
  </div>
  </div>
  <div class="clear"></div>
  <div class="shadow"></div>
</div>
<!-- ->End of Login div --!>  

<div class="clear"></div>
<div id="versionBar" >
<div class="copyright" ><p>
  
<?php echo $this->config->item('site_name') ?>
&copy;
<?php 
                       if($this->config->item('copyrighted') == date('Y')){
                        echo $this->config->item('copyrighted');
                       }else{
                        echo $this->config->item('copyrighted').'-'.date('Y');
                       }
?>
                       <?php echo $this->config->item('company') ?>.
                        &nbsp;
  </p></div>
  <!-- // copyright-->
</div>
          <!-- Link Jquery-->
          <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/jquery.min.js"></script>

          <!-- start noty -->
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/jquery.noty.js"></script>
          
          <!-- layouts -->
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/bottom.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/bottomCenter.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/bottomLeft.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/bottomRight.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/center.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/centerLeft.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/centerRight.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/inline.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/top.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/topCenter.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/topLeft.js"></script>
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/layouts/topRight.js"></script>
          <!-- themes -->
          <script type="text/javascript" src="<?php echo base_url() ?>media/noty/js/noty/themes/default.js"></script>
          <!-- Functions -->
          <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/function.js"></script> 
          <!-- end noty -->
  
         <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/effect/jquery-jrumble.js"></script>
         <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/ui/jquery.ui.min.js"></script>     
         <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/tipsy/jquery.tipsy.js"></script>
         <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/checkboxes/iphone.check.js"></script>



         <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/login.js"></script>
</body>
</html>