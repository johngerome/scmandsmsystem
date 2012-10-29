<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script type="text/javascript">
    $('.tbl_product').dataTable({
	"sDom": 'fCl<"clear">rtip',
	"sPaginationType": "full_numbers",
	 "aaSorting": [],
	  "aoColumns": [
					{ "bSortable": false },null,null
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
  Available Products in All Branch
 </span> </div>                  
                  <div class="clear"></div>
                  <div class="content" >
                   <div id="uploadTab">
                      <div class="tab_container" >
                         <b>Filter by Branch Name:</b>
                         <div>
                      	  <select class=""  name="branch_id" id="branch_id" onchange="load_prod_avail();">
                          <option value="">All Branch</option>
                         <?php foreach($branch_qry as $row): ?>
                         <option value="<?php echo $row->branch_id ?>">-<?php echo $row->branch_name ?> </option>
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
                                    <th width="246" >Branch Name</th>
                                    <th width="352" ># Product</th>
                                  </tr>
                                </thead>
                                <tbody>
                             <?php foreach($product as $row): ?>
                                  <tr>
                                    <td align="left" ><?php echo $row->branch_id ?></td>
                                    <td><b><a href="<?php echo base_url().'product/view/'.$row->branch_id.'/available-products.html' ?>"><?php echo $row->branch_name ?></a></b></td>
                                    <td><?php echo getReturnValue($this->db->dbprefix('branch_product'),'COUNT(product_id)','branch_id',$row->branch_id) ?></td>
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
