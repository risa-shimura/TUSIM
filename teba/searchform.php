<?php
/**
 * Template for displaying search forms in Teba
 */
?>
<div class="widget header_search" >
 <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url('/') ); ?>">
    <label class="label-field">
        <input type="search"  value="<?php echo esc_attr( get_search_query() ); ?>" name="s" class="search-field"  placeholder="<?php echo esc_attr_e( 'Search …', 'teba' ); ?>">
    </label>
    <input type="submit" class="search-submit" value="Search">
 </form>
</div>