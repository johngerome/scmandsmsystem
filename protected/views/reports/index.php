
    
<script type="text/javascript">
jQuery(document).ready(function(){
    load_menu_page('reports','report');
     $('.sw').hide();
    
});
function summary(){
    $('.hd').hide();
    $('.summary').hide();
    $('.sw').show();
}
function summary_show(){
    $('.sw').hide();
    $('.summary').show();
    $('.hd').show();
}
</script>                            
          
<style>
#data_table_filter input{
    padding: 5px;
    background: #f4f4f4;
}
#undefined-button{
    width: 80px;
    margin-left: -20px;
}
select{
    padding: 5px;
    border: 1px solid #f4f4f4;
}
</style>
<?php
/*
$str = '9/23/2012 10:30:55 PM';
$time = strtotime($str);

    // You can now use date() functions with $time, like
    $weekday = date("h:i:s A", $time); // Wednesday or whatever date it is
    echo $weekday;
    echo contextualTime(1348961152);
    */
    
?>
<div class="topcolumn">
<div class="logo"></div>
<ul  id="shortcut">
</ul>
</div>
<div class="clear"></div>
<div class="onecolumn" id="mainContent">


</div>
<div class=" clear"></div>

<a class="uibutton normal hd" onclick="summary();">Hide Sales Summary</a>
<a class="uibutton normal sw" onclick="summary_show();">Show Sales Summary</a>

<div class="onecolumn">
<div class="content summary">
    <div class="grid_2 column_right">
    <h3>Highiest Sales for this <?php echo date('l') ?> </h3>
    
     <div class="section "> 
     <?php if(!$top_sales_day): ?>
        <div> 
        <h5>Branch Name: None </h5>
        </div>
        <div> 
            <h5>Location: None</h4>
        </div>  
        <div> 
            <h5>total Sales: None</h5>
        </div>
    <?php endif; ?>
    <?php foreach($top_sales_day as $row): ?>
   
    <div> 
        <h5>Branch Name: <?php echo $row->branch_name ?></h5>
    </div>
    <div> 
        <h5>Location: <?php echo $row->location ?></h4>
    </div>  
    <div> 
        <h5>total Sales: <?php echo $row->sales ?> Php</h5>
    </div>
     <?php endforeach; ?>
    </div>
   
    </div>
    
    <div class="grid_2">
    <h3>Highiest Sales for this Month of <?php echo date('F') ?></h3>
    <div class="section "> 
    <?php if(!$top_sales_month): ?>
        <div> 
        <h5>Branch Name: None </h5>
        </div>
        <div> 
            <h5>Location: None</h4>
        </div>  
        <div> 
            <h5>total Sales: None</h5>
        </div>
    <?php endif; ?>
    <?php foreach($top_sales_month as $row): ?>
    
    <div> 
        <h5>Branch Name: <?php echo $row->branch_name ?></h5>
    </div>
    <div> 
        <h5>Location: <?php echo $row->location ?> </h5>
    </div>  
    <div> 
        <h5>total Sales: <?php echo $row->sales ?> php</h5>
    </div>
    <?php endforeach; ?>
    </div>
    </div>
    
    <div class="grid_2">
    <h3>Highiest Sales for this Year <?php echo date('Y') ?></h3>
    <div class="section "> 
    <?php if(!$top_sales_month): ?>
        <div> 
        <h5>Branch Name: None </h5>
        </div>
        <div> 
            <h5>Location: None</h4>
        </div>  
        <div> 
            <h5>total Sales: None</h5>
        </div>
    <?php endif; ?>
    <?php foreach($top_sales as $row): ?>
   
    <div> 
        <h5>Branch Name: <?php echo $row->branch_name ?></h5>
    </div>
    <div> 
        <h5>Location: <?php echo $row->location ?></h5>
    </div>  
    <div> 
        <h5>total Sales: <?php echo $row->sales ?> php</h5>
    </div>
    
    <?php endforeach; ?>
    </div>
    </div>
</div>

</div>
