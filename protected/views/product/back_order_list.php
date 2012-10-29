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
 <div class="header"><span ><span class="ico  gray list"></span>
Back Order Products in - <?php echo $branch_name; ?> 
</span> </div>                  
                  <div class="clear"></div>
                  <div class="content" >
                   <div id="uploadTab">
                      <div class="tab_container" >
                         <b>Filter by Branch Name:</b>
                         <div>
                      	  <select class=""  name="branch_id" id="branch_id" onchange="load_prod_back_order();">
                          
                          <?php if($branch_name): ?>
                          <option value="" selected="selected">All Branch</option>
                          <option value="" selected="selected">-<?php echo $branch_name ?></option>
                          <?php else: ?>
                          <option value="">All Branch</option>
                          <?php endif ?>
                         
                         <?php foreach($branch_qry as $row): ?>
                         
                         <?php if($branch_name != $row->branch_name): ?>
                         <option value="<?php echo $row->branch_id ?>">-<?php echo $row->branch_name ?> </option>
                         <?php endif; ?>
                         
                         <?php endforeach; ?>
                         
                         </select>       
                         </div>

                        
                          <div class="load_page">

                              <form class="tableName toolbar">
                             <!-- Current Url -->
                            <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>   
                             
                              <table class="display tbl_product"  id="data_table3">
                                <thead>
                                  <tr>
                                    <th width="50" align="left">ID</th>
                                     <th width="220" >Product Line</th>
                                    <th width="352" >Product Name</th>
                                    <th width="200" >Description</th>
                                    <th width="146" >Quantity</th>
                                  </tr>
                                </thead>
                                <tbody>
                             <?php foreach($product as $row): ?>
                                  <tr class="odd gradeX">
                                    <td align="left" ><?php echo $row->ProductId ?></td>
                                    <td ><?php echo $row->ProductLineName ?></td>
                                    <td><b><?php echo $row->ProductName ?></b></td>
                                    <td><?php echo $row->Description ?></td>
                                    <td ><?php echo $row->quantity ?></td>
                                  </tr>
                            <?php endforeach; ?>
                                 
                                 
                                </tbody>
                              </table>
                              </form>
                              </div>

                             
      
                  </div>
                  </div>                 
                  <div class="clear"></div>  
				  
               </div>  
</div>
