<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<?php if($this->uri->uri_string() == 'product_line/deleted'):?>
<script type="text/javascript">
jQuery(document).ready(function(){
     show_modal_information('Successfully Deleted');
});    
</script>
<?php endif; ?>
<div class="topcolumn">
<div class="logo"></div>
        <ul  id="shortcut">
            <li> <span class="tip"><a href="#" title="Add New Product Line" class="on_load" onclick="show_add('product_line','add')"> <img src="<?php echo $this->gtemplate->theme_path() ?>images/tlbr_icon/add.png"/><strong>New</strong> </a> </span></li>
       </ul>
</div>
<div class="clear"></div>
<div class="onecolumn" >
                  <div class="header"><span ><span class="ico  gray folder"></span>Product Line Manager</span> </div><!-- End header -->	
                  <div class="clear"></div>
                  <div class="content" >
                  
                      <div id="uploadTab">
                      <div class="tab_container">
                      <input type="hidden" id="error" value=""/>  
                      <!-- Current Url -->
                      <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>       
                      
                              <div class="load_page">
                              <div style="height:33px;overflow: hidden;margin: 0px 0px 0px 0px;"></div>
                              <form class="tableName toolbar" id="load_data">
                              <!-- Data -->
                              <table class="display data_table3_1 " id="data_table">
                              <?php $this->load->view('views/product_line/data') ?>
                              </table>
                              </form>
                              </div>
                              	
                             <div class="show_add" style=" display:none">
                              <!-- Add -->
                             </div>
                             
                             <div class="show_edit" style=" display:none">
                              <!-- Edit -->
                             </div>      
                     </div>
                     </div>
                     <!--/END TAB/-->

                  <div class="clear"></div>  
                  </div>
</div>
