<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'expert_plumber_above_slider' ); ?>

	<?php if( get_theme_mod('expert_plumber_slider_hide_show') != ''){ ?>
		<?php $slider_backg = 'background-image:url(\''.esc_url(get_theme_mod('expert_plumber_slider_background_img')).'\')'; ?>
		<section id="slider" style="<?php echo esc_attr($slider_backg); ?>">
			<div id="carouselExampleIndicators" class="carousel" data-ride="carousel"> 
			    <?php $expert_plumber_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'expert_plumber_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $expert_plumber_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($expert_plumber_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $expert_plumber_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
			    <div class="carousel-inner" role="listbox">
			      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
			        <div <?php if($i == 1){echo 'class="carousel-item fade-in-image active"';} else{ echo 'class="carousel-item fade-in-image"';}?>>
			        	<div class="slider-bg"></div>
			          	<div class="carousel-caption">
				            <div class="inner-carousel row">
				            	<div class="col-lg-5 col-md-5 my-auto">
					              	<h2><?php the_title(); ?></h2>
					              	<p><?php $expert_plumber_excerpt = get_the_excerpt(); echo esc_html( expert_plumber_string_limit_words( $expert_plumber_excerpt,15 ) ); ?></p>
			            			<a href="<?php the_permalink(); ?>" class="read-btn"><?php esc_html_e('LEARN MORE','expert-plumber'); ?><i class="fas fa-long-arrow-alt-right"></i><span class="screen-reader-text"><?php esc_html_e('LEARN MORE','expert-plumber'); ?></span></a>
			            		</div>
			            		<div class="offset-lg-1 col-lg-6 col-md-7">
			            			<div class="slider-img">
			            				<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
			            			</div>
			            		</div>
		            		</div>
			          	</div>
			        </div>
			      	<?php $i++; endwhile; 
			      	wp_reset_postdata();?>
			    </div>
			    <?php else : ?>
			    <div class="no-postfound"></div>
		      		<?php endif;
			    endif;?>
			    <div class="slider-arrows px-5">
				    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				      	<span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
				      	<span class="screen-reader-text"><?php esc_html_e( 'Prev','expert-plumber' );?></span>
				    </a>
				    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				      	<span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
				      	<span class="screen-reader-text"><?php esc_html_e( 'Next','expert-plumber' );?></span>
				    </a>
				</div>
			</div>
		  	<div class="clearfix"></div>
		</section>
	<?php }?>

	<?php do_action('expert_plumber_below_slider'); ?>

	<?php if( get_theme_mod('expert_plumber_services_category') != '' || get_theme_mod('expert_plumber_services_section_title') != '' || get_theme_mod('expert_plumber_services_text') != ''){ ?>
		<section id="services-section">
			<div class="container">
				<div class="row mr-0">
					<div class="col-lg-6 col-md-6">
						<div class="services-head">
							<?php if(get_theme_mod('expert_plumber_services_section_title')) {?>
								<i class="fas fa-cog"></i>
								<h3><?php echo esc_html(get_theme_mod('expert_plumber_services_section_title')); ?></h3>
							<?php }?>
						</div>
					</div>
					<div class="col-lg-6 col-md-6">
						<?php if(get_theme_mod('expert_plumber_services_btn_url')) {?>
							<div class="service-btn py-md-5 text-md-right text-center">
								<a href="<?php echo esc_url(get_theme_mod('expert_plumber_services_btn_url')); ?>"><?php echo esc_html(get_theme_mod('expert_plumber_services_btn_text')); ?><i class="fas fa-long-arrow-alt-right"></i><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('expert_plumber_services_btn_text')); ?></span></a>
							</div>
						<?php }?>
					</div>
				</div>
	            <div class="row m-0">
		      		<?php $expert_plumber_catData1 =  get_theme_mod('expert_plumber_services_category');
	  				if($expert_plumber_catData1){ 
						$args = array(
							'post_type' => 'post',
							'category_name' => esc_html($expert_plumber_catData1 ,'expert-plumber'),
				          'posts_per_page' => get_theme_mod('expert_plumber_service_number', 8)
				        );
				        $i=1;
				        $page_query = new WP_Query( $args);?>
		        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
		          			<div class="col-lg-3 col-md-6">
		          				<div class="services-box">
		          					<div class="row">
		          						<div class="service-icon col-lg-3 col-md-3 col-3">
				      						<i class="<?php echo esc_attr(get_theme_mod('expert_plumber_service_icon' . $i, 'fas fa-wrench')); ?>"></i>
				      					</div>
				      					<div class="col-lg-9 col-md-9 col-9">
						            		<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						            	</div>
					            	</div>
		          				</div>
						    </div>
		          		<?php $i++; endwhile; 
		          		wp_reset_postdata();
		      		}?>
	      		</div>
				<div class="clearfix"></div>
			</div>
		</section>
	<?php }?>

	<?php do_action('expert_plumber_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>