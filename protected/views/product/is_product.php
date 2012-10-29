<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
    $('.tbl_product2').dataTable({
	"sDom": 'fCl<"clear">rtip',
	"sPaginationType": "full_numbers",
	 "aaSorting": [],
	  "aoColumns": [
					{ "bSortable": false },null,null,null,null
	  ]
	});
</script>
<style>
select{
    border: 1px solid #ccc;
    color: #333;
    padding: 5px;
}
#data_table3_filter{
    margin-top: -10px;
}
</style>

<div class="onecolumn" >
 <div class="header"><span ><span class="ico  gray stats_bars"></span>

 Top  
 <?php
 if($date == 0){ echo 'Daily';}
 if($date == 1){ echo 'Montly';}
 if($date == 2){ echo 'Yearly';}
 ?>
Sold Products 

 </span> </div>                  
                  <div class="clear"></div>
                  <div class="content" >
                   <div id="uploadTab">
                      <div class="tab_container" >
                            <b>Filter Date:</b>
                            <div>
                             <select class=""  name="date2" id="date2" onchange="is_prod_load();">
                               <option value="0" <?php if($date == 0){ echo ' selected="selected" ';} ?> >Daily</option>
                               <option value="1" <?php if($date == 1){ echo ' selected="selected" ';} ?> >Monthly</option>
                               <option value="2" <?php if($date == 2){ echo ' selected="selected" ';} ?> >Yearly</option>
                             </select>
                            </div>
                            
                        
                          <div class="load_page">

                              <form class="tableName toolbar">
                             <!-- Current Url -->
                            <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>   
                             
                              <table class="display tbl_product2"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="352" >Date</th>
                                    <th width="200" >Product Name</th>
                                    <th width="200" >Total Stock In</th>
                                    <th width="200" >Total Stock Out</th>
                                    <th width="200" >Remaining</th>
                                  </tr>
                                </thead>
                                <tbody>
                              
                             <?php  foreach($is_product as $row): ?>
                                  <tr class="odd gradeX">
                                    <td ><?php echo $row->stock_date ?></td>
                                    <td ><b><?php  echo getReturnValue($this->db->dbprefix('product'),'ProductName','ProductId',$row->product_id) ?></b></td>
                                    <td><?php echo $row->stock_in ?></td>
                                    <td><?php echo $this->product_model->count_stock_out($row->product_id,$row->date_val,$date_label) ?></td>
                                    <td ><?php echo $row->stock_in - $this->product_model->count_stock_out($row->product_id,$row->date_val,$date_label) ?></td>
                                  </tr>
                            <?php  endforeach; ?>
                                 
                                 
                                </tbody>
                              </table>
                              </form>
                              </div>

                             
      
                  </div>
                  </div>                 
                  <div class="clear"></div>  
				  
               </div>  
</div>
