<?php global $teba_options; ?>
<?php 
   $footer_v2_to_top =& $teba_options["tb_footer_v2_to_top"]; ?>
     <a href="#" id="back-to-top" class="progress <?php if($footer_v2_to_top == 0){ echo "hide_icon"; }?> "><div class="arrow-top"></div>
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
     </a>

<footer class="footer footer_v2">
   <div class="container">
      <div class="row">
         <?php if (is_active_sidebar("teba-footer-widget")) { ?>
         <div class="footer-widget-1 col-sm-3 col-xs-12">
               <?php dynamic_sidebar("teba-footer-widget"); ?>
         </div>
      <?php } 
      if (is_active_sidebar("teba-footer-widget-2")) { ?>
         <div class="footer-widget-2 col-sm-2 col-xs-12">
               <?php dynamic_sidebar("teba-footer-widget-2"); ?>
         </div>
      <?php }
      if (is_active_sidebar("teba-footer-widget-3")) { ?>
         <div class="footer-widget-3 col-sm-2 col-xs-12">
               <?php dynamic_sidebar("teba-footer-widget-3"); ?>
         </div>
      <?php } ?>
         <?php if (is_active_sidebar("teba-footer-widget-4")) { ?>
         <div class="footer-widget-4 col-sm-2 col-xs-12">
            <?php dynamic_sidebar("teba-footer-widget-5"); ?>
         </div>
      <?php } ?> 
      <?php if (is_active_sidebar("teba-footer-widget-5")) { ?>
         <div class="footer-widget-5 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("teba-footer-widget-4"); ?>
         </div>
      <?php } ?> 
     </div>   
    </div>   
    <div class="clearfix>"></div>
	<?php if (is_active_sidebar("teba-footer-widget-6")) { ?>
        <div class="footer-widget-6 footer-bottom">
            <div class="container"><div class="row"><?php dynamic_sidebar("teba-footer-widget-6"); ?></div> </div>   
        </div>
    <?php } ?>
</footer>