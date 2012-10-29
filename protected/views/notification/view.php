<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<script>
	$('.dt_tbl').dataTable({
	"sDom": 'fCl<"clear">rtip',
    "sPaginationType": "full_numbers",
	 "aaSorting": [],
	  "aoColumns": [
					null,null,null,null,null
	  ]
	});
</script>
<div class="topcolumn">
<div class="logo"></div>

</div>

<div class="clear"></div>

<div class="onecolumn" >
<div class="header">
                    <span ><span class="ico  gray clipboard"></span>Order Information</span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <ul class="uibutton-group" >
                        <?php if($archive == 0): ?>
                        <li>
                        <span class="tip">
                            <a class="uibutton icon prev on_prev "  title="Go Back" href="<?php echo base_url().'notification.html' ?>">Go Back</a>
                        </span>
                        </li>
                        <?php else: ?>
                        <li>
                        <span class="tip">
                            <a class="uibutton icon prev on_prev "  title="Go Back" href="<?php echo base_url().'notification/trash.html' ?>">Go Back</a>
                        </span>
                        </li>
                        <?php endif; ?>
                    </ul>
<div class="boxtitle min">Order Information</div>
<form id="frmPrdoduct_line" action="#">                     
    <div class="section ">
        <label for="Subject"> Subject</label>   
        <div> 
           <h3><?php echo $subject; ?></h3>
        </div>
    </div>
    <div class="section ">
        <label> Branch Name</label>   
        <div> 
            <b><?php echo $branch_name ?></b>
        </div>
    </div>
    
    <div class="section ">
        <label> Branch Location</label>   
        <div> 
            <b><?php echo $branch_location ?></b>
        </div>
    </div>
    
     <div class="section ">
        <label> Date Order</label>   
        <div> 
            <b><?php
             $str = $date_time_ordered;
             $time = strtotime($str);
             echo date('l, F d,Y h:i:s A',$time) 
             ?></b>
        </div>
     </div>
     
    <div class="section ">
        <label> Read on</label>   
        <div> 
            <b><?php echo contextualTime($read_on) ?></b>
        </div>
    </div>
    
    <div class="section ">
        <label> Read By</label>   
        <div> 
        <b>
        <?php $x=0;
        $totalAmount = 0;
        $y = sizeof($read_by) - 1; ?>
            <?php foreach($read_by as $row => $key): ?>
            <?php if($x != $y): ?>
                <?php echo $key['username'].', '; $x++; ?>
            <?php else: ?>
                <?php echo $key['username']; $x++; ?>
            <?php endif ?>
            <?php endforeach; ?>
        </b>
        </div>
    </div>
    
    <div class="boxtitle min"><?php if($type == 'Cancellation'){ echo 'Canceled '; }else{ echo 'Re-Order '; } ?> Products</div>
    
    <table class="display dt_tbl " id="data_table">
                                <thead>
                                  <tr>
                                    <th width="10" align="left">Product ID</th>
                                    <th width="174" >Product Name</th>
                                    <th width="174" >Quantity</th>
                                    <th width="174" >Unit Price</th>
                                    <th width="174" >Amount</th>
                                  </tr>
                                </thead>
                                <tbody>
                               <?php foreach($ordered_products as $row): ?>
                                <tr>
                                    <td  align="left"><?php echo $row->ProductId ?></td>
                                    <td ><?php echo $row->ProductName ?></td>
                                    <td ><?php echo $row->quantity_ordered ?></td>
                                    <td ><?php echo $row->ProductPrice ?></td>
                                    <td>
                                    <?php
                                    $amount = $row->quantity_ordered * $row->ProductPrice;
                                    $totalAmount = $totalAmount + $amount;
                                    echo $amount;
                                    ?> PHP</td>
                                </tr>
                                <?php endforeach; ?>
                                </tbody>
                                
    </table>
    <div style="float: right;font-weight: bold;margin-right: 80px;">Total Amount: <?php echo $totalAmount; ?> PHP</div>
    <br />
</form>
                    
</div>
</div