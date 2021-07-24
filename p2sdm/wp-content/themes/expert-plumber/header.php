<?php
/**
 * The header for our theme
 *
 * @subpackage Expert Plumber
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'expert-plumber' ); ?></a>

<div id="header">
	<div class="row">
		<div class="offset-lg-1 col-lg-3 col-md-3">
			<div class="logo text-center text-md-left">
				<?php if ( has_custom_logo() ) : ?>
            		<?php the_custom_logo(); ?>
	            <?php endif; ?>
             	<?php if (get_theme_mod('expert_plumber_show_site_title',true)) {?>
          			<?php $blog_info = get_bloginfo( 'name' ); ?>
	                <?php if ( ! empty( $blog_info ) ) : ?>
	                  	<?php if ( is_front_page() && is_home() ) : ?>
	                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	                  	<?php else : ?>
                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                  		<?php endif; ?>
	                <?php endif; ?>
	            <?php }?>
	            <?php if (get_theme_mod('expert_plumber_show_tagline',true)) {?>
	                <?php
                  		$description = get_bloginfo( 'description', 'display' );
	                  	if ( $description || is_customize_preview() ) :
	                ?>
                  	<p class="site-description">
                    	<?php echo esc_attr($description); ?>
                  	</p>
              		<?php endif; ?>
          		<?php }?>
			</div>
		</div>
		<div class="col-lg-8 col-md-9">
			<div class="top-header">
				<div class="container-fluid">
					<div class="row mx-md-0">
						<div class="col-lg-4 col-md-4">
							<?php if(get_theme_mod('expert_plumber_topheader_phone_no')) {?>
								<div class="call text-md-right text-center py-3">
									<?php if(get_theme_mod('expert_plumber_topheader_phone_no')) {?>
										<a href="tel:<?php echo esc_attr(get_theme_mod('expert_plumber_topheader_phone_no')); ?>"><p class="callno"><i class="fas fa-phone"></i><?php echo esc_html(get_theme_mod('expert_plumber_topheader_phone_no')); ?></p><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('expert_plumber_topheader_phone_no')); ?></span></a>
									<?php }?>
								</div>
							<?php }?>
						</div>
						<div class="col-lg-4 col-md-4 social-icons text-lg-right text-center pr-0">
							<?php if(get_theme_mod('expert_plumber_topheader_facebook_url')) {?>
								<a href="<?php echo esc_url(get_theme_mod('expert_plumber_topheader_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'expert-plumber'); ?></span></a>
							<?php }?>
							<?php if(get_theme_mod('expert_plumber_topheader_twitter_url')) {?>
								<a href="<?php echo esc_url(get_theme_mod('expert_plumber_topheader_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'expert-plumber'); ?></span></a>
							<?php }?>
							<?php if(get_theme_mod('expert_plumber_topheader_linkedin_url')) {?>
								<a href="<?php echo esc_url(get_theme_mod('expert_plumber_topheader_linkedin_url')); ?>"><i class="fab fa-linkedin-in"></i><span class="screen-reader-text"><?php echo esc_html('Linkedin', 'expert-plumber'); ?></span></a>
							<?php }?>
							<?php if(get_theme_mod('expert_plumber_topheader_youtube_url')) {?>
								<a href="<?php echo esc_url(get_theme_mod('expert_plumber_topheader_youtube_url')); ?>"><i class="fab fa-youtube"></i><span class="screen-reader-text"><?php echo esc_html('Youtube', 'expert-plumber'); ?></span></a>
							<?php }?>
						</div>
						<div class="col-lg-4 col-md-4">
							<?php if(get_theme_mod('expert_plumber_getquote_btn_url')) {?>
								<div class="getquote-btn py-3 text-md-right text-center">
									<a href="<?php echo esc_url(get_theme_mod('expert_plumber_getquote_btn_url')); ?>"><?php echo esc_html(get_theme_mod('expert_plumber_getquote_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('expert_plumber_getquote_btn_text')); ?></span></a>
								</div>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
			<div class="bottom-header">
				<div class="menu-section container-fluid">
					<div class="toggle-menu responsive-menu">
						<?php if(has_nav_menu('primary')){ ?>
			            	<button onclick="expert_plumber_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','expert-plumber'); ?></span></button>
			            <?php }?>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'expert-plumber' ); ?>">
		                  	<?php if(has_nav_menu('primary')){
			                    wp_nav_menu( array( 
									'theme_location' => 'primary',
									'container_class' => 'main-menu-navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
			                    ) ); 
		                  	} ?>
		                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="expert_plumber_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','expert-plumber'); ?></span></a>
		                </nav>
		            </div>
				</div>
			</div>
		</div>
	</div>
</div>