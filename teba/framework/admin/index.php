<?php
require_once(TEBA_ABS_PATH_ADMIN .'/tgm-plugin-activation/plugin-options.php');
if( ! function_exists( 'teba_wbc_importer_description' ) ) {
 function teba_wbc_importer_description()
 {
  $output = "";
  /* validate server import */
  $validate_phpinfo_import = array(
   'memory_limit'    => array( 'val' => 128, 'type' => 'M' ),
   'post_max_size'    => array( 'val' => 128, 'type' => 'M' ),
   'upload_max_filesize'  => array( 'val' => 128, 'type' => 'M' ),
   'max_execution_time'  => array( 'val' => 180, 'type' => '' ),
   'max_input_time'   => array( 'val' => 180, 'type' => '' ),
  );
  $output .= ( function_exists( 'teba_VerifyImportSampleData' ) ) 
   ? teba_verifyImportSampleData( $validate_phpinfo_import ) 
   : "";
  /* backup database */
  $output .= ( function_exists( 'teba_VerifyImportSampleData' ) ) 
   ? teba_backupDatabase( __DIR__ . '/backup-database', get_template_directory_uri() . '/framework/admin/backup-database' ) 
   : ""; 
  return "<div class='teba-block-accordion-wrap'>{$output}</div>";
 }
 add_filter('wbc_importer_description', 'teba_wbc_importer_description' );
}