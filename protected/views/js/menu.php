     <script type="text/javascript">
     $(document).ready(function(){	
     <?php if($this->uri->segment('1') == 'dashboard' OR $this->uri->segment('1') == ''): ?>
        remove_class('link_dashboard');
     <?php elseif($this->uri->segment('1') == 'account'): ?>
        remove_class('link_user');
     <?php elseif($this->uri->segment('1') == 'user_type'): ?>
        remove_class('link_user_type');
     <?php elseif($this->uri->segment('1') == 'product_line'): ?>
        remove_class('managed_product_line');
     <?php elseif($this->uri->segment('1') == 'product' AND $this->uri->segment('2') == ''): ?>
        remove_class('managed_products');
     <?php elseif($this->uri->segment('1') == 'product' AND $this->uri->segment('2') == 'pricing_scheme'): ?>
        remove_class('managed_pricing_scheme');
     <?php elseif($this->uri->segment('1') == 'package'): ?>
        remove_class('managed_package');
     <?php elseif($this->uri->segment('1') == 'product_package'): ?>
        remove_class('managed_product_package');
     <?php elseif($this->uri->segment('1') == 'product' AND $this->uri->segment('2') == 'stock_in'): ?>
        remove_class('lnk_stock_in');
     <?php elseif($this->uri->segment('2') == 'type'): ?>
        remove_class('link_branch_type');
     <?php elseif($this->uri->segment('1') == 'branch' AND $this->uri->segment('2') == ''): ?>
        remove_class('link_branch');
     <?php elseif($this->uri->segment('1') == 'customer'): ?>
       remove_class('managed_customer');
     <?php elseif($this->uri->segment('2') == 'expire'): ?>
        remove_class('expiry_product');  
     <?php elseif($this->uri->segment('2') == 'availability'): ?>
        remove_class('product_availability');
     <?php elseif($this->uri->segment('2') == 'back_order_list'): ?>
        remove_class('back_order_list');
     <?php elseif($this->uri->segment('2') == 're_order_list'): ?>
        remove_class('product_re_order');
     <?php elseif($this->uri->segment('2') == 'damage_products'): ?>
        remove_class('damaged_products');
     <?php elseif($this->uri->segment('1') == 'reports'): ?>
        remove_class('reports');
     <?php elseif($this->uri->segment('2') == 'inventory_summary'): ?>
        remove_class('inventory_summary');
     <?php elseif($this->uri->segment('1') == 'notification'): ?>
        remove_class('notifacation');
     <?php elseif($this->uri->segment('2') == 'view'): ?>
        remove_class('setting');
     <?php elseif($this->uri->segment('1') == 'system'): ?>
        remove_class('configuration');
     <?php elseif($this->uri->segment('1') == 'tools'): ?>
        remove_class('backup');    
     <?php endif; ?>
     });
     </script>