<?php global $teba_options; ?>
<?php 
   $footer_to_top =& $teba_options["tb_footer_to_top"]; ?>
   <a href="#" id="back-to-top" class="progress <?php if($footer_to_top == 0){ echo "hide_icon"; }?> "><div class="arrow-top"></div>
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="xMinYMin meet"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/></svg>
   </a>

<?php $footer_fixed =& $teba_options["tb_footer_V1_fixed"]; ?>
<footer class="footer footer_v1 <?php if($footer_fixed == 1){ echo "footer-fixed"; }?>"> 
   <div class="container">
     <div class="row">

     <?php if (is_active_sidebar("teba-footer-widget-5")) { ?>
        <div class="col-sm-12 col-xs-12"><div class="footer-widget-5 footer-top">
            <?php dynamic_sidebar("teba-footer-widget-5"); ?>
         </div> </div>
     <?php } ?>
     <div class="clearfix>"></div>

      <?php if (is_active_sidebar("teba-footer-widget")) { ?>
        <div class="footer-widget-1 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("teba-footer-widget"); ?>
        </div>
     <?php } 
	  if (is_active_sidebar("teba-footer-widget-2")) { ?>
        <div class="footer-widget-2 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("teba-footer-widget-2"); ?>
        </div>
     <?php }
	 if (is_active_sidebar("teba-footer-widget-3")) { ?>
        <div class="footer-widget-3 col-sm-3 col-xs-12">
            <?php dynamic_sidebar("teba-footer-widget-3"); ?>
        </div>
     <?php } ?>
      <?php if (is_active_sidebar("teba-footer-widget-4")) { ?>
		<div class="footer-widget-4 col-sm-3 col-xs-12">
		   <?php dynamic_sidebar("teba-footer-widget-4"); ?>
		</div>
	 <?php } ?> 
	
     <div class="clearfix>"></div>
	 <?php if (is_active_sidebar("teba-footer-widget-6")) { ?>
       <div class="col-sm-12 col-xs-12"> <div class="footer-widget-6 footer-bottom ">
            <?php dynamic_sidebar("teba-footer-widget-6"); ?>
        </div></div>
     <?php } ?>
     </div>
  </div>
</footer>