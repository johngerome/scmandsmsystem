<?php
/**
 * Toolbar for Egg Store Branch
 * @copyright 2012
 */

?>
<ul>
<div class="tlbr_logo">
<?php  $this->gtemplate->HeadingTitle(); ?>
</div>
 <div class="tlbr_icon">
    <li><?php echo anchor('branch/add/eggstore','Add New Branch','class="tlbr_btn add" title="Add New Branch" '); ?></li>
    <li><?php echo anchor('branch/delete/bakery','Trash','class="tlbr_btn trash" title="Trash" '); ?></li>
  
</div>
</ul>