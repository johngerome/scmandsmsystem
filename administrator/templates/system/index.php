<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<!-- [START HEAD] -->
<head>

<?php $this->gtemplate->load_template();  ?>

<?php echo link_tag($this->gtemplate->theme_path('superfish/css/superfish.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path('megaWebButtons/css/buttons.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path('css/reset.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path('css/text.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path('css/960_24_col.css')); echo "\n"; ?>
<?php echo link_tag($this->gtemplate->theme_path('css/main_style.css')); echo "\n"; ?>


<?php echo '<script type="text/javascript" src="'.$this->gtemplate->theme_path('superfish/js/hoverIntent.js').'" ></script>'; echo "\n"; ?>
<?php echo '<script type="text/javascript" src="'.$this->gtemplate->theme_path('superfish/js/superfish.js').'" ></script>'; echo "\n"; ?>

<?php echo link_tag($this->gtemplate->theme_path().'favicon.ico', 'shortcut icon', 'image/ico'); ?>


<script type="text/javascript">
jQuery(function(){jQuery('ul.sf-menu').superfish();});
</script>

</head>
<!-- [END HEAD] -->


<body>
<div id="container">

<div id="headerContainer">
		<div id="topHeader">
        </div>
		<div id="midHeader">
        <?php  echo img($this->gtemplate->theme_path('images/banner.png')); ?>
        <form>
            <div id="searchCon">
                <input class="style_i" type="text" value="Search..." />
            </div>
        </form>
        </div>
		<div id="botHeader">
    		<!-- Main Menu -->
			<?php $this->gtemplate->get_main_menu(); ?>
		</div>
	</div>

	<div id="centerContainer">
    <div id="wrapper">
    <div id="wrapper">
        <div id="breadcrumbs">
            <?php $this->gtemplate->get_breadCrumbs(); ?>
        </div>
        
         <h1 id="headingTitle">
         <?php  $this->gtemplate->HeadingTitle(); ?>
         </h1>
         
            <!-- Toolbar -->
            <?php $this->gtemplate->get_toolbar(); ?>
            <!-- End toolbar -->

            <!-- Content Goes Here -->
            <?php $this->gtemplate->get_content(); ?>
            
            
        <div id="breadcrumbs">
            <?php $this->gtemplate->get_breadCrumbs(); ?>
        </div>
        
        </div>
    </div>
</div>    
    		
<div id="footerContainer">
       <p>&copy;<?php 
       if($this->config->item('copyright_year') == date('Y')){
        echo $this->config->item('copyright_year');
       }else{
        echo $this->config->item('copyright_year').'-'.date('Y');
       }
       ?>&nbsp;<?php echo $this->config->item('site_name') ?></p>
</div>
</body>
</html>