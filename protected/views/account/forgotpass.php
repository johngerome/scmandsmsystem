<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
<title><?php echo $this->config->item('site_name') ?> </title>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<script type="text/javascript">
        var base_url = "<?php echo $this->config->item('base_url'); ?>";
        var template_url = "<?php echo $this->gtemplate->theme_path() ?>";
</script>        
<link href="<?php echo $this->gtemplate->theme_path() ?>css/zice.style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->gtemplate->theme_path() ?>css/icon.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/tipsy/tipsy.css" media="all"/>
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
#lostpasswordform{
    width: 900px;
    height: 100px;
    margin: 0 auto;
    text-align: center;
    border: 1px solid #f4f4f4;
    -moz-box-shadow: 10px 10px 10px #f4f4f4;
    -webkit-box-shadow: 10px 10px 10px #f4f4f4;
    box-shadow: 10px 10px 10px #f4f4f4;
}
.underlined{
    text-decoration: underline;
}.submit{
    margin-left: 240px;
}.label_user{
    color: #9d9d9d;
}
</style>

</head>
<body >
         
<div id="alertMessage" class="error"></div>
<div id="successLogin"></div>
<div class="text_success"><img src="<?php echo $this->gtemplate->theme_path() ?>images/loadder/loader_green.gif"  alt="ziceAdmin" /><span>Please wait</span></div>
 <div id="" style="width: 900px;height: 800px;margin: 0 auto;margin-top: 200px;">
    <div class="alertMessage SE">
    Please enter the secret key given to you after the Installation.
    </div> 
    
    <form name="lostpasswordform" id="lostpasswordform" action="#" method="post">
	<p class="label_user">
		<label for="user_login" >Secret key:<br />
		<input type="text" name="user_login" id="user_login" class="medium" value=""  /></label>
	</p>

	<p class="submit"><input type="button" onclick="forgotpass();" name="submit" id="submit" class="uibutton  normal" value="Generate New Password" /></p>
    <p id="nav">
        <a href="<?php echo base_url() ?>" class="underlined">Log in</a>
    </p>
    </form>


 
 </div>

<!--Login div-->
<div class="clear"></div>
<div id="versionBar" >
  <div class="copyright" >
  
  <?php echo $this->config->item('site_name') ?>
                        &copy;<?php 
                       if($this->config->item('copyrighted') == date('Y')){
                        echo $this->config->item('copyrighted');
                       }else{
                        echo $this->config->item('copyrighted').'-'.date('Y');
                       }
                       ?>
                       <?php echo $this->config->item('company') ?>.
                        
  </div>
  <!-- // copyright-->
</div>
<!-- Link JScript-->
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/effect/jquery-jrumble.js"></script>
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/ui/jquery.ui.min.js"></script>     
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/tipsy/jquery.tipsy.js"></script>
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/checkboxes/iphone.check.js"></script>
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/login.js"></script>
</body>
</html>