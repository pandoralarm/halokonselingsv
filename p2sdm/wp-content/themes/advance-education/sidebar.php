<?php
/**
 * The Sidebar containing the main widget areas.
 *
 * @package advance-education
 */
?>
<div id="sidebar" class="mt-3">    
    <?php if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>
        <aside role="complementary" aria-label="firstsidebar" id="archives" class="widget p-2 mb-4">
            <h3 class="widget-title text-left p-2 text-capitalize"><?php esc_html_e( 'Archives', 'advance-education' ); ?></h3>
            <ul>
                <?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
            </ul>
        </aside>
        <aside role="complementary" aria-label="secondsidebar" id="meta" class="widget">
            <h3 class="widget-title"><?php esc_html_e( 'Meta', 'advance-education' ); ?></h3>
            <ul>
                <?php wp_register(); ?>
                <li><?php wp_loginout(); ?></li>
                <?php wp_meta(); ?>
            </ul>
        </aside>
    <?php endif; // end sidebar widget area ?>  
</div>