<?php if (! defined('BASEPATH')) exit('No direct script access allowed'); ?>
<ul class="sf-menu">
<li>
<a href="#a"><?php echo $this->lang->line('system') ?></a>
<ul>
<li><a href="#"><?php echo $this->lang->line('my_control_panel') ?></a>
      <ul>
      <li id="my_dashboard"><?php echo anchor('account/dashboard', $this->lang->line('my_dashboard')); ?></li>
      <li><?php echo anchor('account/my_profile', $this->lang->line('my_profile')); ?></li>
      </ul>
</li>
<li><?php echo anchor('global_configuration', $this->lang->line('global_configuration')); ?>
    <ul>
    <li><?php echo anchor('global_configuration/site', $this->lang->line('site')); ?></li>
    <li><?php echo anchor('global_configuration/system', $this->lang->line('system')); ?></li>
    </ul>
</li>
<li><?php echo anchor('system/information', $this->lang->line('system_information')); ?></li>
<li><?php echo anchor('account/logout', $this->lang->line('logout')); ?></li>

</ul>
</li>

<li>
<a href="#"><?php echo $this->lang->line('members') ?></a>
    <ul>
    <li>
         <a href="#"><?php echo $this->lang->line('managed_member') ?></a>
         <ul>
            <li><?php echo anchor('member/create', $this->lang->line('add_new_account')); ?></li>
         </ul>	
    </li>
    </ul>
</li>


<li>
				<a href="#">Branch</a>
				<ul>
					<li>
						<a href="#"><?php echo $this->lang->line('branch_manager') ?></a>
						<ul>
							<li><?php echo anchor('branch', $this->lang->line('add_new_branch')); ?></li>
						</ul>
					</li>
                </ul>
					
</li>
</ul>
	
		