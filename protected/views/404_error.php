
<script type="text/javascript">
          jQuery(function($){
			 $('#tv-wrap').jrumble({ x: 4,y: 0,rotation: 0 });	
			$('#tv-wrap').trigger('startRumble');		  
              $('.slides').addClass('active').cycle({
                  fx:     'none',
                  speed:   1,
                  timeout: 70
              }).cycle("resume");	
          });
</script>
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

<div class="onecolumn">
<div id="tv-wrap"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tv.png" width="300" height="273" id="tv"/>
  <div class="slideshow-block"> <a href="dashboard.html" class="link"></a>
    <ul class="slides">
      <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/1.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/2.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/3.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/4.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/5.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/6.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/7.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/8.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/9.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/10.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/11.jpg"/></li>
	  <li><img src="<?php echo $this->gtemplate->theme_path() ?>images/pageserror/12.jpg"/></li>
    </ul>
  </div>
</div>
<div id="text">
  <h1> 404 Page not found!</h1>
  <h2>Oops! Sorry, an error has occured.</h2>
</div>
</div>
<div class="clear"></div>
<script type="text/javascript">
var text = document.getElementById('text'),
	body = document.body,
	steps = 7;
function threedee (e) {
	var x = Math.round(steps / (window.innerWidth / 2) * (window.innerWidth / 2 - e.clientX)),
		y = Math.round(steps / (window.innerHeight / 2) * (window.innerHeight / 2 - e.clientY)),
		shadow = '',
		color = 190,
		radius = 3,
		i;	
	for (i=0; i<steps; i++) {
		tx = Math.round(x / steps * i);
		ty = Math.round(y / steps * i);
		if (tx || ty) {
			color -= 3 * i;
			shadow += tx + 'px ' + ty + 'px 0 rgb(' + color + ', ' + color + ', ' + color + '), ';
		}
	}
	shadow += x + 'px ' + y + 'px 1px rgba(0,0,0,.2), ' + x*2 + 'px ' + y*2 + 'px 6px rgba(0,0,0,.3)';	
	text.style.textShadow = shadow;
	text.style.webkitTransform = 'translateZ(0) rotateX(' + y*1.5 + 'deg) rotateY(' + -x*1.5 + 'deg)';
	text.style.MozTransform = 'translateZ(0) rotateX(' + y*1.5 + 'deg) rotateY(' + -x*1.5 + 'deg)';
}
document.addEventListener('mousemove', threedee, false);
</script>