<?php
/**
 * Toolbar for Bakery Branch
 * @copyright 2012
 */

?>
<ul>
   <li><div class="tlbr_logo"><?php  $this->gtemplate->HeadingTitle(); ?></div></li>
       <div class="tlbr_icon">
           <ul>
                <li><?php echo anchor('branch/add/bakery','Add New Branch','class="tlbr_btn add" title="Add New Branch" '); ?></li>
                <li><?php echo anchor('branch/delete/bakery','Trash','class="trash tlbr_btn" title="Trash" '); ?></li>
           </ul>
        </div>
</ul>