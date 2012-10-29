<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="topcolumn">
<div class="logo"></div>
<div style="height:133px;margin: 0px 0px 0px 0px;">
</div>

<div class="clear"></div>

<div class="onecolumn" >
                    <div class="header">
                    <span ><span class="ico  gray chat-exclamation"></span> Backup Database</span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    
                    <p>You are about to backup your database. This will download a gzip file from your browser that you can save on your computer. It will also create a dated backup file on the web server in the directory:
                    <b><?php echo $backup_path; ?></b></p>
                 <div>
                    <a class="uibutton submit_form" href="<?php echo base_url().'tools/download_backup' ?>" >ok</a>
                </div>

					</div>
</div>