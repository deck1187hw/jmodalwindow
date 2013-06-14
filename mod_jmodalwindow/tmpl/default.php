<?php
// No direct access to this file
defined('_JEXEC') or die;

$conflict_load = $params->get('conflict_load',1);
$showScroll =  $params->get('scrollbars',1);
if($showScroll):
    $scrolling = 'yes';
else:
    $scrolling = 'no';
endif;

    //Cookie control
    $days = $params->get('cookietime',1);


?>
<script type="text/javascript">


    var ToolsModalRTVNAdv<?php echo $module->id;?> = {
        createCookie: function(name, value,days) {
            if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
            }else var expires = "";
            document.cookie = name+"="+value+expires+"; path=/";
        },

        readCookie: function(name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(';');
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        },

        eraseCookie: function(name) {
            ToolsModalRTVNAdv<?php echo $module->id;?>.createCookie(name,"",-1);
        }
    };



    (function($){


        $.fn.rtvnModalcwAllowCookiesAdv<?php $module->id;?> = function() {

            var CookieExistsrtvn<?php echo $module->id;?>=ToolsModalRTVNAdv<?php echo $module->id;?>.readCookie("<?php echo 'rtvnmodalAdv'.$module->id;?>");


            //Check if cookie exists
            if (CookieExistsrtvn<?php echo $module->id;?>) {

            } else {
                ToolsModalRTVNAdv<?php echo $module->id;?>.createCookie("<?php echo 'rtvnmodalAdv'.$module->id;?>",true);
                SqueezeBox.open("<?php echo $params->get('url','http://google.com');?>", {
                    handler: 'iframe',
                    size: { x: <?php echo $params->get('width',800);?>, y: <?php echo $params->get('height',600);?> },
                    iframeOptions: {scrolling: '<?php echo $scrolling;?>'}
                });

            }

        };

    })(jQuery);

</script>


<script type="text/javascript">

    <?php if($conflict_load == 1) { ?>
    var $rtvnmodalAdv = jQuery.noConflict();
    $rtvnmodalAdv(function(){
        $rtvnmodalAdv('body').rtvnModalcwAllowCookiesAdv<?php $module->id;?>();
    });
    <?php } else { ?>

    $(function(){
        $('body').rtvnModalcwAllowCookiesAdv<?php $module->id;?>();
    });
    <?php } ?>


</script>
