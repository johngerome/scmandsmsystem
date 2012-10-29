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
<script type="text/javascript">
    setInterval(function()
    {
        $('#mainContent').load( base_url +'order/data.html');
    }, 500);
</script>


<div class="topcolumn">
<div class="logo"></div>
<ul  id="shortcut">
<li> 
<span class="tip"><a href="<?php echo base_url() ?>notification/trash.html" title="Archive" class="Viewarchive">
<img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/recycle.png" alt="View Archive"/>
<strong>Trash</strong></a> 
</span>
</li>
</ul>
</div>

<div class="clear"></div>

<div id="mainContent" >
                   
</div>