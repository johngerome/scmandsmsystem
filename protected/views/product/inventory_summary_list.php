

<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
    $('.tbl_product').dataTable({
	"sDom": 'fCl<"clear">rtip',
	"sPaginationType": "full_numbers",
	 "aaSorting": [],
	  "aoColumns": [
					{ "bSortable": false },null,null,null,null
	  ]
	});
</script>
<script src="<?php echo base_url() ?>media/print/jquery.printPage.js" type="text/javascript"></script>

<script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
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
<label><i class="print">Print</i></label>
<div>
    <a title="Print Page" class="btnPrint print ntip" href='<?php echo current_url() ?>'>
        <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/gray_18/print.png" />
    </a>
</div> 
<div class="onecolumn" >

 <div class="header"><span ><span class="ico  gray stats_bars"></span>
 <?php if($branch_name): ?>
 Inventory Summary ins - <?php echo $branch_name; ?> 
 <?php else: ?>
 Inventory Summary in All Branch
 <?php endif ?>
 
 </span></div>    
                                
                  <div class="clear"></div>
                  <div class="content" >
                   <div id="uploadTab">
                      <div class="tab_container" >
                         <b>Filter by Branch Name:</b>
                         <div>
                      	  <select class=""  name="branch_id" id="branch_id" onchange="load_inventory_summary();">
                          
                          <?php if($branch_name): ?>
                            <option value="0" selected="selected">All Branch</option>
                            <option value="<?php echo $branch_id ?>" selected="selected">-<?php echo $branch_name ?></option>
                          <?php else: ?>
                            <option value="0">All Branch</option>
                          <?php endif ?>
                         
                         <?php foreach($branch_qry as $row): ?>
                         
                         <?php if($branch_name != $row->branch_name): ?>
                         <option value="<?php echo $row->branch_id ?>">-<?php echo $row->branch_name ?> </option>
                         <?php endif; ?>
                         
                         <?php endforeach; ?>
                         
                         </select>       
                         </div>
                            <b>Filter Date:</b>
                            <div>
                             <select class=""  name="date" id="date" onchange="load_inventory_summary();">
                               <option value="0" <?php if($date == 0){ echo ' selected="selected" ';} ?> >Daily</option>
                               <option value="1" <?php if($date == 1){ echo ' selected="selected" ';} ?> >Monthly</option>
                               <option value="2" <?php if($date == 2){ echo ' selected="selected" ';} ?> >Yearly</option>
                             </select>
                            </div>
                            
                                
                        
                          <div class="load_page">

                              <form class="tableName toolbar">
                             <!-- Current Url -->
                            <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>   
                             
                              <table class="display tbl_product"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="352" >Date</th>
                                    <th width="200" >Branch</th>
                                    <th width="200" >Total Product Stock In</th>
                                    <th width="200" >Total Product Stock Out</th>
                                    <th width="200" >Remaining</th>
                                  </tr>
                                </thead>
                                <tbody>
                              
                             <?php  foreach($stocks as $row): ?>
                                  <tr class="odd gradeX">
                                    <td ><?php echo $row->date_stock ?></td>
                                    <td ><a href="<?php echo base_url().'product/view_inventory_summary/'.$row->branch_id.'/'.$row->day_stock.'/'.$date ?>"><b><?php echo getReturnValue($this->db->dbprefix('branch'),'branch_name','branch_id',$row->branch_id) ?></b></a></td>
                                    <td><?php echo $this->product_model->count_stock_in_branch($row->branch_id,$row->day_stock,$date_label) ?></td>
                                    <td><?php echo $this->product_model->count_stock_out_branch($row->branch_id,$row->day_stock,$date_label) ?></td>
                                    <td ><?php echo $this->product_model->count_stock_in_branch($row->branch_id,$row->day_stock,$date_label) - $this->product_model->count_stock_out_branch($row->branch_id,$row->day_stock,$date_label) ?></td>
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
