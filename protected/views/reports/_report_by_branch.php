<script src="<?php echo base_url() ?>media/print/jquery.printPage.js" type="text/javascript"></script>

<script>  
  $(document).ready(function() {
    $(".btnPrint").printPage();
  });
</script>
<script type="text/javascript">
jQuery(document).ready(function(){
  	//datepicker
	$("input.datepicker").datepicker({ 
		autoSize: true,
		appendText: '(mm/dd/yyyy)',
		dateFormat: 'mm/dd/yy'
	});
});
</script>
<?php if($date != 3): ?>
<script type="text/javascript">
jQuery(document).ready(function(){
$('.fdate').hide();
});
</script>
<?php endif; ?>
<style>
.print{
    font-size: 9px;
}
.dataTables_wrapper .dataTables_filter input{
    padding: 5px;
    background: #f4f4f4;
}
</style>
                         
      
                  <div class="header">
                  <span ><span class="ico  gray stats_bars"></span>
                  <?php if($branch_id == 0): ?>
                   <?php echo $date_name ?> Sales Reports in All Branch
                  <?php else: ?>
                  <?php echo $date_name ?> Sales Reports in <?php echo getReturnValue($this->db->dbprefix('branch'),'branch_name','branch_id',$branch_id) ?>
                  <?php endif; ?>

                
                 <?php if($branch_id != 0):  ?> 
                  <script type="text/javascript">
                    $('.tbl_rpt').dataTable({
                	"sDom": 'fCl<"clear">rtip',
                	"sPaginationType": "full_numbers",
                	 "aaSorting": [],
                	  "aoColumns": [
                					null,null,null
                	  ]
                	});
                    </script>
                <?php endif; ?>
                
                 <?php if($branch_id == 0):  ?> 
                  <script type="text/javascript">
                    $('.tbl_rpt').dataTable({
                	"sDom": 'fCl<"clear">rtip',
                	"sPaginationType": "full_numbers",
                	 "aaSorting": [],
                	  "aoColumns": [
                					null,null
                	  ]
                	});
                    </script>
                <?php endif; ?>
                
                
                  </span> </div><!-- End header -->	
                  <div class="clear"></div>
                  
                  <div class="content" >
                      <div style="height:150px;width: 500px;overflow: hidden;margin: 0px 0px 0px 0px;">
                         <table>
                          <tr>
                              <td>
                                  <label>Filter Branch</label>
                                     <div>
                                  	  <select class=""  name="branch_id" id="branch_id" onchange="load_report();">
                                      <option value="0">All Branch</option>
                                      
                                     <?php foreach($branch_qry as $row): ?>
                                     <?php if($branch_id == $row->branch_id): ?>
                                     <option selected = "selected" value="<?php echo $branch_id ?>"><?php echo $row->branch_name ?></option>
                                     <?php else: ?>
                                     <option value="<?php echo $row->branch_id ?>">-<?php echo $row->branch_name ?> </option>
                                     <?php endif; ?>
                                     <?php endforeach; ?>
                                     
                                     </select>       
                                     </div>
                              </td>
                              
                              <td>
                                  <label>Filter Date</label>
                                     <div>
                                  	  <select class=""  name="date" id="date" onchange="load_report();">
                                      <option <?php if($date == 0){ echo 'selected="selected" '; } ?> value="0">Daily</option>
                                      <option <?php if($date == 1){ echo 'selected="selected" '; } ?> value="1">Monthly</option>
                                      <option <?php if($date == 2){ echo 'selected="selected" '; } ?> value="2">Yearly</option>
                                      <option <?php if($date == 3){ echo 'selected="selected" '; } ?> value="3">Specify Date</option>
                                     </select>       
                                     </div>
                              </td>
                              
                          </tr>
                          <tr class="fdate">
                            <script>
                            jQuery(document).ready(function(){
                                jQuery("#date_filter").validationEngine();
                            });
                            </script>
                          <form id="date_filter">
                              <td>
                                        <label>Date From</label>   
                                        <div><input value="<?php echo $date_from ?>" type="text"  readonly="readonly" id="datefrom" name="datefrom"  class="datepicker validate[required]"   /></div>
                              </td>
                              <td>
                                        <label>Date To</label>   
                                        <div><input value="<?php echo $date_to ?>" type="text"  readonly="readonly" id="dateto" name="dateto" class="datepicker validate[required]"   /></div>
                              </td>
                              <td>
                                        <label>&nbsp;</label>
                                        <div>
                                            <a class="uibutton" onclick="load_report_sp_date();" >Generate Sales</a>
                                        </div>
                                        
                              </td>
                          </form>
                          </tr>
                           <tr>
                            <td>
                                <label><i class="print">Print</i></label>
                                <div>
                                <a title="Print Generated Reports" class="btnPrint print ntip" href='<?php echo current_url() ?>'>
                                <img src="<?php echo $this->gtemplate->theme_path() ?>images/icon/gray_18/print.png" />
                                </a>
                               </div> 
                            </td>
                          </tr>
                          </table>
                      </div>
                      <!-- Current Url -->
                      <input type="hidden" id="current_url" value="<?php echo current_url() ?>"/>
                      
                        <div id="mainContent">
                              <table class="display tbl_rpt" id="aside">
                                <thead>
                                  <tr>
                                    
                                    <th>Date</th>
                                    <th align="right" >Total Sales</th>
                                    <?php if($branch_id != 0):  ?>
                                     <th >Branch</th>
                                    <?php endif; ?>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php foreach($reports as $row): ?>
                                  <tr>
                                    <td><?php  echo $row->Sales_date ?></td>
                                    <td align="right"><?php 
                                    
                                    echo $row->sales; ?> PHP</td>
                                    <?php if($branch_id != 0):  ?>
                                    <td><?php  echo getReturnValue($this->db->dbprefix('branch'),'branch_name','branch_id',$row->branch_id)  ?></td>
                                    <?php endif; ?>
                                  </tr>
                            <?php endforeach; ?>  
                                </tbody>
                              </table>
                         </div>     
                              
                  <div class="clear"></div>  
				  
                  </div>
                  