<script type="text/javascript">
        //usage
        $(".capitalize").keyup(function() {
           toUpper(this);
        });
        //function
        function toUpper(obj) {
            var mystring = obj.value;
            var sp = mystring.split(' ');
            var wl=0;
            var f ,r;
            var word = new Array();
            for (i = 0 ; i < sp.length ; i ++ ) {
                f = sp[i].substring(0,1).toUpperCase();
                r = sp[i].substring(1).toLowerCase();
                word[i] = f+r;
            }
            newstring = word.join(' ');
            obj.value = newstring;
            return true;  
        }
</script>
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/validationEngine/jquery.validationEngine.js" ></script>
<script type="text/javascript" src="<?php echo $this->gtemplate->theme_path() ?>components/validationEngine/jquery.validationEngine-en.js" ></script>