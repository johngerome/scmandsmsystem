<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>    
        <?php $this->gtemplate->load_template();  ?>
        <!-- Link shortcut icon-->
        <link rel="shortcut icon" type="image/ico" href="<?php echo $this->gtemplate->theme_path() ?>favicon.ico" /> 
        <!-- Link css-->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/zice.style.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/icon.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/ui-custom.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/timepicker.css"  />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/colorpicker/css/colorpicker.css"  />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/elfinder/css/elfinder.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/datatables/dataTables.css"  />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/validationEngine/validationEngine.jquery.css" />
         
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/jscrollpane/jscrollpane.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/fancybox/jquery.fancybox.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/tipsy/tipsy.css" media="all" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/editor/jquery.cleditor.css"  />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/chosen/chosen.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/confirm/jquery.confirm.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/sourcerer/sourcerer.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/fullcalendar/fullcalendar.css"/>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>components/Jcrop/jquery.Jcrop.css"  />
   
        <!-- Print 
         <link rel="stylesheet" href="<?php //echo base_url() ?>media/print/src/css/print.css" type="text/css" media="print" />
         <link rel="stylesheet" href="<?php //echo base_url() ?>media/print/src/css/print-preview.css" type="text/css" media="screen"/>
         -->
        
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/flot/excanvas.min.js"></script><![endif]-->
        
        <script type="text/javascript">
        var base_url = "<?php echo $this->config->item('base_url'); ?>";
        var template_url = "<?php echo $this->gtemplate->theme_path() ?>";
       
        </script>
        
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/ui/jquery.ui.min.js"></script> 
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/ui/jquery.autotab.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/ui/timepicker.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/colorpicker/js/colorpicker.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/checkboxes/iphone.check.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/elfinder/js/elfinder.full.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/datatables/dataTables.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/scrolltop/scrolltopcontrol.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/fancybox/jquery.fancybox.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/jscrollpane/mousewheel.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/jscrollpane/mwheelIntent.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/jscrollpane/jscrollpane.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/spinner/ui.spinner.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/tipsy/jquery.tipsy.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/editor/jquery.cleditor.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/chosen/chosen.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/confirm/jquery.confirm.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/validationEngine/jquery.validationEngine.js" ></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/validationEngine/jquery.validationEngine-en.js" ></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/vticker/jquery.vticker-min.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/sourcerer/sourcerer.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/fullcalendar/fullcalendar.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/flot/flot.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/flot/flot.pie.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/flot/flot.resize.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/flot/graphtable.js"></script>

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
        
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/uploadify/swfobject.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/uploadify/uploadify.js"></script>        
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/checkboxes/customInput.jquery.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/effect/jquery-jrumble.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/filestyle/jquery.filestyle.js" ></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/placeholder/jquery.placeholder.js" ></script>
		<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/Jcrop/jquery.Jcrop.js" ></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/imgTransform/jquery.transform.js" ></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/webcam/webcam.js" ></script>
		<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/rating_star/rating_star.js"></script>
		<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/dualListBox/dualListBox.js"  ></script>
		<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/smartWizard/jquery.smartWizard.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/jquery.cookie.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/zice.custom.js"></script>
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/frmButton.js"></script>
        
        
        <!-- Jfontsize -->
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/jquery.jfontsize-1.0.js"></script>   
        
          
        <!-- ColorBox -->            
        <link rel="stylesheet" type="text/css" href="<?php echo $this->gtemplate->theme_path() ?>css/screen.css" media="all" />
        <script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>js/execute.js"></script>
        
        <link rel="stylesheet" href="<?php  echo $this->config->item('base_url') ?>media/colorbox/example5/colorbox.css" />
		<script src="<?php  echo $this->config->item('base_url') ?>media/colorbox/colorbox/jquery.colorbox.js"></script>
		<script>
			$(document).ready(function(){
				//Examples of how to assign the ColorBox event to elements
				$(".group1").colorbox({rel:'group1'});
				$(".group2").colorbox({rel:'group2', transition:"fade"});
				$(".group3").colorbox({rel:'group3', transition:"none", width:"75%", height:"75%"});
				$(".group4").colorbox({rel:'group4', slideshow:true});
				$(".ajax").colorbox();
				$(".youtube").colorbox({iframe:true, innerWidth:425, innerHeight:344});
				$(".iframe").colorbox({iframe:true, width:"80%", height:"80%"});
				$(".inline").colorbox({inline:true, width:"50%"});
				$(".callbacks").colorbox({
					onOpen:function(){ alert('onOpen: colorbox is about to open'); },
					onLoad:function(){ alert('onLoad: colorbox has started to load the targeted content'); },
					onComplete:function(){ alert('onComplete: colorbox has displayed the loaded content'); },
					onCleanup:function(){ alert('onCleanup: colorbox has begun the close process'); },
					onClosed:function(){ alert('onClosed: colorbox has completely closed'); }
				});
				
				//Example of preserving a JavaScript event for inline calls.
				$("#click").click(function(){ 
					$('#click').css({"background-color":"#f00", "color":"#fff", "cursor":"inherit"}).text("Open this window again and this message will still be here.");
					return false;
				});
                
                //ETC..
                $('.noty_modal').hide();
			});
		</script>
        
        </head>        
        <body class="dashborad">
      
       <!-- Modal -->
        <div style="position: fixed; width: 100%; height: 100%; background-color: rgb(0, 0, 0); z-index: 10000; opacity: 0.6; left: 0px; top: 0px;" class="noty_modal"></div>
        <div id="alertMessage" class="error"></div> 
        <div id="banner"><img src="<?php echo $this->gtemplate->theme_path() ?>images/banner.png" /></div>               
        <?php $this->gtemplate->get_top_header(); ?>
            
			<div id="shadowhead"></div>
            <div id="hide_panels"> 
                  <a class="butAcc" rel="0" id="show_menu"></a>
                  <a class="butAcc" rel="1" id="hide_menu"></a>
                  <a class="butAcc" rel="0" id="show_menu_icon"></a>
                  <a class="butAcc" rel="1" id="hide_menu_icon"></a>
            </div>
                      
            <!-- Main Menu -->       
            <?php $this->gtemplate->get_main_menu(); ?>
          
            
            <div id="content" class="jsize">
                <div class="inner">
                    <br />
					 <?php // $this->gtemplate->get_breadCrumbs(); ?>
                     
                    <!-- ->Start of Catch Browsers Javascript Settings --!>
                    <div id="nojs" style="background: red;color:black;font-size: 50px;padding: 5px;border: 5px solid #000;">
                    <font face=arial>JavaScript must be enabled in order for you to use this system in standard view. However, it seems JavaScript is either disabled or not supported by your browser. To use standard view, enable JavaScript by changing your browser options, then <a href="<?php echo base_url(); ?>">try again</a>.
                    <br/>
                    Don't know what to do? check <a href="<?php echo base_url() ?>help/javascript_problem.html" target="_blank">User Guide</a> Here!.
                    </font>
                    </div>
                    <script>
                    //if script enabled warning message hidden.
                    document.getElementById('nojs').style.display="none";
                    </script>
                    <!-- ->End of Catch Browsers Javascript Settings --!>
                    
                    
                    
                     <?php $this->gtemplate->get_content(); ?> 
                    </div> 
                     <?php // $this->gtemplate->get_breadCrumbs(); ?>
                    
                    <div class="clear"></div>
                    <div id="footer">
                    
                        <?php echo $this->config->item('site_name') ?>
                        &copy;<?php 
                       if($this->config->item('copyrighted') == date('Y')){
                        echo $this->config->item('copyrighted');
                       }else{
                        echo $this->config->item('copyrighted').'-'.date('Y');
                       }
                       ?>
                       <?php echo $this->config->item('company') ?>.
                        <br />
                       (<?php
                        $datestring = " %D, %m - %Y  %d Time: %h:%i %A";
                        $time = time();
                        echo mdate($datestring, $time);
                       
                       ?>
                       Time Zone: <?php echo date_default_timezone_get() ?>
                       )
                       
                       </div>
                </div><!--// End inner -->
            <!--// End content --> 
      
      
      
      
      <script type="text/javascript" language="javascript">
        $('.jsize').jfontsize({
        btnMinusClasseId: '#jfontsize-m',
        btnDefaultClasseId: '#jfontsize-d',
        btnPlusClasseId: '#jfontsize-p'
        });
        </script>
</body>
</html>