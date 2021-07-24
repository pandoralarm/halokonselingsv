<?php
/**
 * The template part for displaying Image content
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
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="entry-content">
        <h1><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h1>
        <div class="entry-attachment">
            <div class="attachment">
                <?php advance_education_the_attached_image(); ?>
            </div>
            <?php if ( has_excerpt() ) : ?>
                <div class="entry-caption">
                    <div class="entry-content">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>    
        <?php
            the_content();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . __( 'Pages:', 'advance-education' ),
                'after'  => '</div>',
            ) );
        ?>
    </div>    
    <?php edit_post_link( __( 'Edit', 'advance-education' ), '<footer role="contentinfo" class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
    <?php
        // If comments are open or we have at least one comment, load up the comment template
        if ( comments_open() || '0' != get_comments_number() )
            comments_template();

        if ( is_singular( 'attachment' ) ) {
            // Parent post navigation.
            the_post_navigation( array(
                'prev_text' => _x( '<span class="meta-nav text-uppercase p-2">Published in</span><span class="post-title my-2 mx-0">%title</span>', 'Parent post link', 'advance-education' ),
            ) );
        }   elseif ( is_singular( 'post' ) ) {
            // Previous/next post navigation.
            the_post_navigation( array(
                'next_text' => '<span class="meta-nav text-uppercase p-2" aria-hidden="true">' . __( 'Next', 'advance-education' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Next post:', 'advance-education' ) . '</span> ' .
                    '<span class="post-title my-2 mx-0">%title</span>',
                'prev_text' => '<span class="meta-nav text-uppercase p-2" aria-hidden="true">' . __( 'Previous', 'advance-education' ) . '</span> ' .
                    '<span class="screen-reader-text">' . __( 'Previous post:', 'advance-education' ) . '</span> ' .
                    '<span class="post-title my-2 mx-0">%title</span>',
            ) );
        }
    ?>
</article>  