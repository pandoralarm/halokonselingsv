<?php
/**
 * The template part for displaying post 
 *
 * @package advance-education
 * @subpackage advance-education
 * @since advance-education 1.0
 */
?>  
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?> 
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $video = false;
  // Only get video from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $video = get_media_embedded_in_content( $content, array( 'video', 'object', 'embed', 'iframe' ) );
  }
?>
<article class="page-box p-3 m-3">
  <?php if(get_theme_mod('advance_education_blog_post_description_option') != 'Full Content'){ ?>
    <div class="box-img">
      <?php
        if ( ! is_single() ) {
          // If not a single post, highlight the video file.
          if ( ! empty( $video ) ) {
            foreach ( $video as $video_html ) {
              echo '<div class="entry-video">';
                echo $video_html;
              echo '</div>';
            }
          };
        }; 
      ?>
    </div>
  <?php } ?>
  <div class="new-text p-2">
    <h2><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h2>
    <?php if( get_theme_mod( 'advance_education_date_hide',true) != '' || get_theme_mod( 'advance_education_comment_hide',true) != '' || get_theme_mod( 'advance_education_author_hide',true) != '') { ?>
      <div class="metabox pt-3 px-0 pb-2">
        <?php if( get_theme_mod( 'advance_education_date_hide',true) != '') { ?>
          <span class="entry-date mr-2"><i class="fa fa-calendar mr-2"></i><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_education_comment_hide',true) != '') { ?>
          <span class="entry-comments mr-2"><i class="fas fa-comments mr-2"></i><?php comments_number( __('0 Comments','advance-education'), __('0 Comments','advance-education'), __('% Comments','advance-education') ); ?></span><?php echo esc_html( get_theme_mod('advance_education_metabox_separator_blog_post') ); ?>
        <?php } ?>
        <?php if( get_theme_mod( 'advance_education_author_hide',true) != '') { ?>
          <span class="entry-author mr-2"><i class="fa fa-user mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span>
        <?php } ?>
      </div>
    <?php }?>
    <?php if(get_theme_mod('advance_education_blog_post_description_option') == 'Full Content'){ ?>
      <div class="entry-content"><p class="my-2 mx-0"><?php the_content(); ?></p></div>
    <?php }
    if(get_theme_mod('advance_education_blog_post_description_option', 'Excerpt Content') == 'Excerpt Content'){ ?>
      <?php if(get_the_excerpt()) { ?>
        <div class="entry-content"><p class="my-2 mx-0"><?php $excerpt = get_the_excerpt(); echo esc_html( advance_education_string_limit_words( $excerpt, esc_attr(get_theme_mod('advance_education_excerpt_number','20')))); ?> <?php echo esc_html( get_theme_mod('advance_education_post_suffix_option','...') ); ?></p></div>
      <?php }?>
    <?php }?>
    <?php if( get_theme_mod('advance_education_button_text','READ MORE') != ''){ ?>
      <div class="read-more-btn my-3 mx-0">
        <a href="<?php the_permalink(); ?>" class="p-3"><?php echo esc_html(get_theme_mod('advance_education_button_text','READ MORE'));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('advance_education_button_text','READ MORE'));?></span></a>
      </div>
    <?php } ?>
  </div>
  <div class="clearfix"></div>
</article>