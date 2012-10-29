<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<div class="topcolumn">
<div class="logo"></div>

</div>

<div class="clear"></div>

<div class="onecolumn" >
<div class="header">
                    <span ><span class="ico  gray clipboard"></span>Order Information for <?php echo $qry_order_subject; ?></span>
                    </div><!-- End header -->	
                    <div class=" clear"></div>
                    <div class="content" >
                    <ul class="uibutton-group" >
                        <li><span class="tip"><a class="uibutton icon prev on_prev "  title="Go Back" href="<?php echo base_url().'notification' ?>">Go Back</a></span></li>
                    </ul>
<div class="boxtitle min">Order Information</div>
<form id="frmPrdoduct_line" action="#">                     
    <div class="section ">
        <label for="Subject"> Subject</label>   
        <div> 
           <h3><?php echo $qry_order_subject; ?></h3>
        </div>
    </div>
    <div class="section ">
        <label> Branch Name</label>   
        <div> 
            <b>Tagbilaran Branch</b>
        </div>
    </div>
    
    <div class="section ">
        <label> Branch Location</label>   
        <div> 
            <b>Tagbilaran City</b>
        </div>
    </div>
    
    <div class="section ">
        <label> Order Type</label>   
        <div> 
            <b>Re-Order</b>
        </div>
    </div>
    
     <div class="section ">
        <label> Date and Time Order</label>   
        <div> 
            <b>08/25/2012 11:00 AM</b>
        </div>
     </div>
    
    <div class="section ">
        <label> Order Status</label>   
        <div> 
            <b>Last Read <small> on 08/25/2012 11:00 PM</small></b><br />
            <b>Approved <small> on 08/25/2012 11:00 PM</small></b>
        </div>
    </div>
    
    <div class="boxtitle min">Order Products</div>
    
    <table class="display static3 " id="static">
                                <thead>
                                  <tr>
                                    <th width="352" align="left">Product ID</th>
                                    <th width="174" >Product Name</th>
                                    <th width="174" >Quantity</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  
                               
                                <tr>
                                    <td  align="left">1</td>
                                    <td >England Bread</td>
                                    <td >10</td>
                                </tr>
                                <tr>
                                    <td  align="left">2</td>
                                    <td >China Bread</td>
                                    <td >10</td>
                                </tr>
                                 
                                </tbody>
    </table>
    
</form>
                    
</div>
</div