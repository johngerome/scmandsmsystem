

<form  method="POST" id="formID_create" >
    <?php echo validation_errors('<span>•','</span><br/>'); ?>

    <input class="validate[required] text-input"  type="text" id="username" name="username" value="<?php echo set_value('username'); ?>" />
    <br />
    <?php echo $this->lang->line('tooltip_create_username'); ?>
    <br />
    
    <input type="password" name="password" value="<?php echo set_value('password'); ?>" class="validate[required] text-input" />
    <br />
    <input type="password" name="password2" value="<?php echo set_value('password2'); ?>" class="validate[required] text-input" />
    <br />
    <select name="myselect">
    <option <?php echo set_select('myselect', 'one', TRUE); ?> >Select</option>
    <option value="one" <?php echo set_select('myselect', 'one'); ?> >One</option>
    <option value="two" <?php echo set_select('myselect', 'two'); ?> >Two</option>
    <option value="three" <?php echo set_select('myselect', 'three'); ?> >Three</option>
    </select> 
    <input type="submit" value="Register" name="member"/>

</form>
<?php
/*
    
    foreach($this->config->item('Main Menu') as $menu_label => $value){
        // $menu_label.'<br/>';
      //  echo element('link',$value);
        echo element('submenu',$menu_label);
        
        if( element('submenu',$menu_label) == null ){
            echo $menu_label.'have sub menu';
            
        }
    }
    //echo element($this->config->item('Main Menu'));
    
  */  
    
    
    